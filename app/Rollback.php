<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Removes exactly the contents the installer added and restores the
 * pre-install state from the manifest.
 *
 *   - posts the installer created      -> permanently deleted
 *   - posts the installer updated      -> restored from snapshot
 *   - terms the installer created      -> deleted (if no other content uses them)
 *   - menu the installer created       -> deleted; prior location restored
 *   - header CTA + topbar theme mods   -> restored to prior values
 *   - pwt_settings + reading options   -> restored to prior values
 */
final class Rollback
{
    /**
     * @return array<string, mixed>
     */
    public function run(): array
    {
        $log = [
            'posts_deleted'  => 0,
            'posts_restored' => 0,
            'terms_deleted'  => 0,
            'menu_deleted'   => 0,
            'theme_restored' => 0,
            'options_restored' => 0,
        ];

        $manifest = Manifest::get();

        $this->restorePosts((array) ($manifest['posts'] ?? []), $log);
        $this->restoreTerms((array) ($manifest['terms'] ?? []), $log);
        $this->restoreMenu($manifest['menu'] ?? null, $log);
        $this->restoreTheme($manifest['theme'] ?? null, $log);
        $this->restoreOptions($manifest['options'] ?? null, $log);
        $this->cleanupStamped((array) ($manifest['posts'] ?? []), $log);

        Manifest::clear();

        return $log;
    }

    /**
     * @param array<int, array<string, mixed>> $posts
     * @param array<string, int> $log
     */
    private function restorePosts(array $posts, array &$log): void
    {
        foreach ($posts as $postId => $info) {
            $postId = (int) $postId;

            if (!get_post($postId)) {
                continue;
            }

            $action = (string) ($info['action'] ?? 'created');

            if ($action === 'created') {
                wp_delete_post($postId, true);
                ++$log['posts_deleted'];
                continue;
            }

            $backup = (array) ($info['backup'] ?? []);
            if ($this->restorePost($postId, $backup)) {
                ++$log['posts_restored'];
            }
        }
    }

    /**
     * @param array<string, mixed> $backup
     */
    private function restorePost(int $postId, array $backup): bool
    {
        $args = [];

        foreach (['post_title', 'post_name', 'post_content', 'post_excerpt', 'post_status', 'post_parent', 'post_type'] as $field) {
            if (array_key_exists($field, $backup)) {
                $args[$field] = $backup[$field];
            }
        }

        if (empty($args)) {
            return false;
        }

        $args['ID'] = $postId;
        $updated = wp_update_post($args, true);

        if (is_wp_error($updated)) {
            return false;
        }

        $this->restoreThumbnail($postId, (int) ($backup['thumbnail'] ?? 0));

        $meta = (array) ($backup['meta'] ?? []);
        foreach ($meta as $key => $value) {
            if ($value === '' || $value === null || $value === []) {
                delete_post_meta($postId, (string) $key);
            } else {
                update_post_meta($postId, (string) $key, $value);
            }
        }

        $terms = (array) ($backup['terms'] ?? []);
        foreach ($terms as $taxonomy => $termIds) {
            if (taxonomy_exists((string) $taxonomy)) {
                wp_set_object_terms($postId, array_map('intval', (array) $termIds), (string) $taxonomy);
            }
        }

        return true;
    }

    private function restoreThumbnail(int $postId, int $thumbnailId): void
    {
        if ($thumbnailId > 0 && wp_attachment_is_image($thumbnailId)) {
            set_post_thumbnail($postId, $thumbnailId);
        } else {
            delete_post_thumbnail($postId);
        }
    }

    /**
     * Remove any leftover posts stamped with _pwtci_installed that were not
     * already handled via the manifest (e.g. content created by an earlier
     * installer version that predates the manifest).
     *
     * @param array<int, array<string, mixed>> $manifestPosts
     * @param array<string, int> $log
     */
    private function cleanupStamped(array $manifestPosts, array &$log): void
    {
        $handled = array_map('intval', array_keys($manifestPosts));

        $query = new \WP_Query([
            'post_type'              => 'any',
            'post_status'            => 'any',
            'posts_per_page'         => -1,
            'fields'                 => 'ids',
            'no_found_rows'          => true,
            'meta_key'               => '_pwtci_installed',
            'suppress_filters'       => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        ]);

        foreach ($query->posts as $stampedId) {
            $stampedId = (int) $stampedId;

            if (in_array($stampedId, $handled, true)) {
                continue;
            }

            if (!get_post($stampedId)) {
                continue;
            }

            wp_delete_post($stampedId, true);
            ++$log['posts_deleted'];
        }
    }

    /**
     * @param array<int, string> $terms
     * @param array<string, int> $log
     */
    private function restoreTerms(array $terms, array &$log): void
    {
        foreach ($terms as $termId => $taxonomy) {
            $termId = (int) $termId;
            $taxonomy = (string) $taxonomy;

            if (!taxonomy_exists($taxonomy)) {
                continue;
            }

            $term = get_term($termId, $taxonomy);
            if (!$term instanceof \WP_Term || is_wp_error($term)) {
                continue;
            }

            $count = (int) $term->count;
            if ($count > 0) {
                continue;
            }

            $deleted = wp_delete_term($termId, $taxonomy);
            if (!is_wp_error($deleted) && $deleted) {
                ++$log['terms_deleted'];
            }
        }
    }

    /**
     * @param array<string, mixed>|null $menuState
     * @param array<string, int> $log
     */
    private function restoreMenu(?array $menuState, array &$log): void
    {
        if (!is_array($menuState)) {
            return;
        }

        $menuId = (int) ($menuState['menu_id'] ?? 0);

        $locations = (array) get_theme_mod('nav_menu_locations', []);

        if (isset($locations['primary']) && (int) $locations['primary'] === $menuId) {
            $priorLocations = (array) ($menuState['prior_locations'] ?? []);

            if (isset($priorLocations['primary']) && (int) $priorLocations['primary'] !== $menuId) {
                $locations['primary'] = (int) $priorLocations['primary'];
            } else {
                unset($locations['primary']);
            }

            set_theme_mod('nav_menu_locations', $locations);
        }

        $menuCreated = (bool) ($menuState['menu_created'] ?? false);
        if ($menuCreated && $menuId > 0) {
            $deleted = wp_delete_nav_menu($menuId);
            if ($deleted && !is_wp_error($deleted)) {
                ++$log['menu_deleted'];
            }
        }
    }

    /**
     * @param array<string, mixed>|null $themeState
     * @param array<string, int> $log
     */
    private function restoreTheme(?array $themeState, array &$log): void
    {
        if (!is_array($themeState)) {
            return;
        }

        foreach ($themeState as $mod => $value) {
            $mod = (string) $mod;
            $value = (string) $value;

            if ($value === '') {
                remove_theme_mod($mod);
            } else {
                set_theme_mod($mod, $value);
            }

            ++$log['theme_restored'];
        }
    }

    /**
     * @param array<string, mixed>|null $optionState
     * @param array<string, int> $log
     */
    private function restoreOptions(?array $optionState, array &$log): void
    {
        if (!is_array($optionState)) {
            return;
        }

        foreach ($optionState as $name => $value) {
            $name = (string) $name;

            if ($value === null || $value === '') {
                delete_option($name);
            } else {
                update_option($name, $value);
            }

            ++$log['options_restored'];
        }
    }
}