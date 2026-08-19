<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Imports taxonomies, CPT records and site settings from 12-SEED-DATA.json.
 *
 * Mirror of the admin ContentSeeder conventions (wp_insert_post +
 * update_post_meta + wp_set_object_terms) but idempotent by title, and it also
 * writes SCF repeater rows in both supported formats (list-of-rows array and
 * {field}_count + {field}_{index}_{subfield}) so the frontend renderer and the
 * admin field display both work.
 */
final class SeedImporter
{
    private const SUPPORTED_TYPES = [
        'pwt_destination',
        'pwt_safari',
        'pwt_vehicle',
        'pwt_resort',
        'pwt_room_type',
        'pwt_room_unit',
        'pwt_safari_schedule',
        'pwt_restaurant',
        'pwt_local_trip',
        'pwt_gallery',
        'pwt_package',
        'pwt_faq',
        'pwt_testimonial',
        'pwt_review',
    ];

    /**
     * @var array<int, array<string, mixed>>
     */
    private array $log = [];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function import(): array
    {
        $file = PWTCI_CONTENT_DIR . '12-SEED-DATA.json';

        if (!is_readable($file)) {
            return [];
        }

        $raw = (string) file_get_contents($file);
        $data = json_decode($raw, true);

        if (!is_array($data)) {
            return [];
        }

        $this->importTaxonomies((array) ($data['taxonomies'] ?? []));
        $this->importSite((array) ($data['site'] ?? []));

        foreach (self::SUPPORTED_TYPES as $postType) {
            if (!post_type_exists($postType)) {
                continue;
            }

            $records = (array) ($data[$postType] ?? []);

            foreach ($records as $record) {
                $this->importRecord($postType, (array) $record);
            }
        }

        return $this->log;
    }

    /**
     * @param array<string, mixed> $taxonomies
     */
    private function importTaxonomies(array $taxonomies): void
    {
        foreach ($taxonomies as $taxonomy => $terms) {
            if (!taxonomy_exists((string) $taxonomy)) {
                continue;
            }

            foreach ((array) $terms as $termName) {
                $termName = (string) $termName;

                if (term_exists($termName, (string) $taxonomy)) {
                    continue;
                }

                $created = wp_insert_term($termName, (string) $taxonomy);
                if (is_array($created) && !is_wp_error($created) && isset($created['term_id'])) {
                    Manifest::recordTerm((int) $created['term_id'], (string) $taxonomy);
                    $this->log[] = [
                        'type'   => 'term',
                        'action' => 'created',
                        'name'   => $taxonomy . ' / ' . $termName,
                    ];
                }
            }
        }
    }

    /**
     * @param array<string, mixed> $site
     */
    private function importSite(array $site): void
    {
        $settings = (array) get_option('pwt_settings', []);

        $mapping = [
            'company_name'    => $site['brand_name'] ?? '',
            'contact_phone'   => $site['contact_phone'] ?? '',
            'contact_email'   => $site['contact_email'] ?? '',
            'company_address' => $site['address'] ?? '',
        ];

        foreach ($mapping as $key => $value) {
            if (is_string($value) && $value !== '') {
                $settings[$key] = $value;
            }
        }

        if (isset($settings['contact_phone'])) {
            $digits = preg_replace('/\D+/', '', (string) $settings['contact_phone']) ?? '';
            $settings['whatsapp_number'] = $digits;
        }

        update_option('pwt_settings', $settings);
    }

    /**
     * @param array<string, mixed> $record
     */
    private function importRecord(string $postType, array $record): void
    {
        $title = trim((string) ($record['title'] ?? ''));

        if ($title === '') {
            return;
        }

        $existingId = $this->findByTitle($postType, $title);
        $action = $existingId > 0 ? 'updated' : 'created';

        $args = [
            'post_type'    => $postType,
            'post_title'   => $title,
            'post_excerpt' => (string) ($record['excerpt'] ?? ''),
            'post_content' => (string) ($record['content'] ?? ''),
            'post_status'  => (string) ($record['status'] ?? 'publish'),
        ];

        if ($existingId > 0) {
            $backup = $this->snapshotPost($existingId);
            $args['ID'] = $existingId;
            $postId = wp_update_post($args, true);
        } else {
            $postId = wp_insert_post($args, true);
        }

        if (is_wp_error($postId)) {
            return;
        }

        $postId = (int) $postId;

        update_post_meta($postId, '_pwtci_installed', '1');

        $this->importMeta($postId, (array) ($record['meta'] ?? []));
        $this->importTerms($postId, (array) ($record['terms'] ?? []));

        Manifest::recordPost($postId, $action, $action === 'updated' ? $backup : null);

        $this->log[] = [
            'type'   => $postType,
            'action' => $action,
            'name'   => $title,
            'id'     => $postId,
        ];
    }

    /**
     * @param array<string, mixed> $meta
     */
    private function importMeta(int $postId, array $meta): void
    {
        foreach ($meta as $key => $value) {
            $key = (string) $key;

            if ($key === '') {
                continue;
            }

            if (is_array($value) && $this->isReferenceList($value)) {
                $ids = $this->resolveReferenceList($value);
                if (!empty($ids)) {
                    update_post_meta($postId, $key, $ids);
                }
                continue;
            }

            if (is_array($value) && $this->isListOfRows($value)) {
                update_post_meta($postId, $key, $value);
                $this->writeRepeaterIndexed($postId, $key, $value);
                continue;
            }

            if (is_array($value)) {
                if ($this->isReference($value)) {
                    $refId = $this->resolveReferenceId($value);
                    if ($refId > 0) {
                        update_post_meta($postId, $key, (string) $refId);
                    }
                    continue;
                }

                update_post_meta($postId, $key, $value);
                continue;
            }

            update_post_meta($postId, $key, (string) $value);
        }
    }

    /**
     * Detect a list of post-object references, e.g.
     * [ { "pwt_resort": "Ken Vihar Jungle Lodge" }, { "pwt_resort": "Hinouta Riverside Stay" } ].
     *
     * @param array<int, mixed> $value
     */
    private function isReferenceList(array $value): bool
    {
        if ($value === []) {
            return false;
        }

        foreach ($value as $row) {
            if (!is_array($row) || !$this->isReference($row)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Resolve a list of post-object references to their post IDs.
     *
     * @param array<int, array<string, mixed>> $value
     *
     * @return int[]
     */
    private function resolveReferenceList(array $value): array
    {
        $ids = [];

        foreach ($value as $row) {
            $id = $this->resolveReferenceId($row);
            if ($id > 0) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    /**
     * Detect a post-object reference value: { "pwt_resort": "Ken Vihar Jungle Lodge" }.
     *
     * @param array<string, mixed> $value
     */
    private function isReference(array $value): bool
    {
        if (count($value) !== 1) {
            return false;
        }

        $postType = (string) array_key_first($value);

        return $postType !== '' && post_type_exists($postType) && is_string(reset($value));
    }

    /**
     * Resolve a post-object reference to its post ID (0 when the title is unknown).
     *
     * @param array<string, mixed> $value
     */
    private function resolveReferenceId(array $value): int
    {
        $postType = (string) array_key_first($value);
        $title = trim((string) reset($value));

        return $title === '' ? 0 : $this->findByTitle($postType, $title);
    }

    /**
     * @param array<int, mixed> $rows
     */
    private function writeRepeaterIndexed(int $postId, string $field, array $rows): void
    {
        $count = 0;

        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }

            foreach ($row as $subKey => $subValue) {
                update_post_meta(
                    $postId,
                    $field . '_' . $count . '_' . $subKey,
                    is_array($subValue) ? $subValue : (string) $subValue
                );
            }

            ++$count;
        }

        update_post_meta($postId, $field . '_count', (string) $count);
    }

    /**
     * @param array<string, mixed> $terms
     */
    private function importTerms(int $postId, array $terms): void
    {
        foreach ($terms as $taxonomy => $termNames) {
            if (!taxonomy_exists((string) $taxonomy)) {
                continue;
            }

            $termIds = [];

            foreach ((array) $termNames as $termName) {
                $termName = (string) $termName;
                $term = term_exists($termName, (string) $taxonomy);

                if (is_array($term) && isset($term['term_id'])) {
                    $termIds[] = (int) $term['term_id'];
                }
            }

            if (!empty($termIds)) {
                wp_set_object_terms($postId, $termIds, (string) $taxonomy);
            }
        }
    }

    private function findByTitle(string $postType, string $title): int
    {
        $query = new \WP_Query([
            'post_type'              => $postType,
            'post_status'            => ['publish', 'draft', 'pending', 'private'],
            'title'                  => $title,
            'posts_per_page'         => 1,
            'fields'                 => 'ids',
            'no_found_rows'          => true,
            'suppress_filters'       => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ]);

        return $query->have_posts() ? (int) $query->posts[0] : 0;
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshotPost(int $postId): array
    {
        $post = get_post($postId);

        if (!$post instanceof \WP_Post) {
            return [];
        }

        $terms = [];

        $taxonomies = get_object_taxonomies($post->post_type, 'names');
        foreach ($taxonomies as $taxonomy) {
            $termIds = wp_get_object_terms($postId, (string) $taxonomy, ['fields' => 'ids']);
            if (!is_wp_error($termIds) && !empty($termIds)) {
                $terms[$taxonomy] = array_map('intval', $termIds);
            }
        }

        return [
            'ID'           => $post->ID,
            'post_title'   => $post->post_title,
            'post_name'    => $post->post_name,
            'post_content' => $post->post_content,
            'post_excerpt' => $post->post_excerpt,
            'post_status'  => $post->post_status,
            'post_parent'  => (int) $post->post_parent,
            'post_type'    => $post->post_type,
            'thumbnail'    => (int) get_post_thumbnail_id($post->ID),
            'meta'         => get_post_meta($postId),
            'terms'        => $terms,
        ];
    }

    /**
     * @param array<int, mixed> $value
     */
    private function isListOfRows(array $value): bool
    {
        if ($value === []) {
            return true;
        }

        return isset($value[0]) && is_array($value[0]);
    }
}
