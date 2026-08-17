<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Creates / updates pages and blog posts from parsed blueprint definitions.
 *
 * Key behaviours:
 *  - idempotent: looks up by slug before inserting so re-running never duplicates
 *  - home page (`path` == `/`) is assigned as the static front page
 *  - nested URLs (`/safaris/jungle-safari-core/`) get their parent page set
 *  - SEO title / meta description are stored as post meta (Yoast-compatible
 *    keys when available) and the excerpt carries the meta description
 */
final class PageImporter
{
    /**
     * @param array<int, array<string, mixed>> $pages
     * @return array<int, array{slug:string, type:string, action:string, id:int}>
     */
    public function import(array $pages): array
    {
        $result = [];
        $frontId = 0;
        $created = [];

        $pages = $this->sortForHierarchy($pages);

        foreach ($pages as $page) {
            $postType = $page['type'] === 'post' ? 'post' : 'page';
            $postName = (string) $page['slug'];

            $existing = get_page_by_path($page['slug'], OBJECT, $postType);

            if (!$existing) {
                $existing = $this->findByPostName($postName, $postType);
            }

            $parentId = $page['type'] === 'post' ? 0 : $this->resolveParent((string) $page['parent_path']);

            $args = [
                'post_type'      => $postType,
                'post_title'     => (string) $page['title'],
                'post_name'      => $postName,
                'post_status'    => 'publish',
                'post_parent'    => $parentId,
                'post_excerpt'   => (string) $page['meta_description'],
                'post_content'   => (string) $page['content'],
            ];

            if ($existing instanceof \WP_Post) {
                $backup = $this->snapshotPost($existing);
                $args['ID'] = $existing->ID;
                $postId = wp_update_post($args, true);
                $action = 'updated';
            } else {
                $args['comment_status'] = 'closed';
                $args['ping_status'] = 'closed';
                $postId = wp_insert_post($args, true);
                $action = 'created';
            }

            if (is_wp_error($postId)) {
                continue;
            }

            $postId = (int) $postId;
            $created[$postName] = $postId;

            update_post_meta($postId, '_pwtci_installed', '1');

            $this->applySeoMeta($postId, (string) $page['seo_title'], (string) $page['meta_description']);
            $this->applyFeaturedImage($postId, (string) $page['featured_image'], (int) $page['featured_image_id']);

            Manifest::recordPost($postId, $action, $action === 'updated' ? $backup : null);

            if ($page['path'] === '/') {
                $frontId = $postId;
            }

            $result[] = [
                'slug'   => $postName,
                'type'   => $postType,
                'action' => $action,
                'id'     => $postId,
            ];
        }

        if ($frontId > 0) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $frontId);
        }

        return $result;
    }

    /**
     * @param array<int, array<string, mixed>> $pages
     * @return array<int, array<string, mixed>>
     */
    private function sortForHierarchy(array $pages): array
    {
        usort($pages, static function (array $a, array $b): int {
            $depthA = substr_count((string) $a['path'], '/');
            $depthB = substr_count((string) $b['path'], '/');

            if ($depthA === $depthB) {
                return strcmp((string) $a['path'], (string) $b['path']);
            }

            return $depthA <=> $depthB;
        });

        return $pages;
    }

    private function resolveParent(string $parentPath): int
    {
        if ($parentPath === '' || $parentPath === '/') {
            return 0;
        }

        $slug = trim($parentPath, '/');
        $parent = get_page_by_path($slug, OBJECT, 'page');

        return $parent ? (int) $parent->ID : 0;
    }

    private function findByPostName(string $postName, string $postType): ?\WP_Post
    {
        $query = new \WP_Query([
            'post_type'              => $postType,
            'name'                   => $postName,
            'post_status'            => 'any',
            'posts_per_page'         => 1,
            'no_found_rows'          => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ]);

        return $query->have_posts() ? $query->posts[0] : null;
    }

    private function applySeoMeta(int $postId, string $seoTitle, string $metaDescription): void
    {
        if ($seoTitle !== '') {
            update_post_meta($postId, '_yoast_wpseo_title', $seoTitle);
            update_post_meta($postId, 'seo_title', $seoTitle);
        }

        if ($metaDescription !== '') {
            update_post_meta($postId, '_yoast_wpseo_metadesc', $metaDescription);
            update_post_meta($postId, 'meta_description', $metaDescription);
        }
    }

    private function applyFeaturedImage(int $postId, string $filename, int $id): void
    {
        if ($filename === '' && $id <= 0) {
            return;
        }

        $attachmentId = AttachmentResolver::resolve($filename, $id);

        if ($attachmentId > 0) {
            set_post_thumbnail($postId, $attachmentId);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function snapshotPost(\WP_Post $post): array
    {
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
            'meta'         => [
                '_yoast_wpseo_title'    => get_post_meta($post->ID, '_yoast_wpseo_title', true),
                '_yoast_wpseo_metadesc' => get_post_meta($post->ID, '_yoast_wpseo_metadesc', true),
                'seo_title'             => get_post_meta($post->ID, 'seo_title', true),
                'meta_description'      => get_post_meta($post->ID, 'meta_description', true),
            ],
        ];
    }
}
