<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Records everything the installer created or modified so a rollback can
 * remove exactly the same contents and restore the pre-install state.
 *
 * The manifest is stored in the pwtci_manifest option:
 *   - posts:   postId => ['action' => created|updated, 'backup' => ...|null]
 *   - terms:   termId => taxonomy (only terms the installer created)
 *   - menu:    created menu id + prior nav_menu_locations
 *   - theme:   prior header CTA theme mods
 *   - options: prior pwt_settings + reading options
 */
final class Manifest
{
    private const OPTION = 'pwtci_manifest';

    /**
     * @return array<string, mixed>
     */
    public static function get(): array
    {
        $manifest = (array) get_option(self::OPTION, []);

        $manifest['posts'] ??= [];
        $manifest['terms'] ??= [];
        $manifest['menu'] ??= null;
        $manifest['theme'] ??= null;
        $manifest['options'] ??= null;
        $manifest['created_posts'] ??= [];

        return $manifest;
    }

    /**
     * @param array<string, mixed> $manifest
     */
    public static function save(array $manifest): void
    {
        update_option(self::OPTION, $manifest, false);
    }

    public static function clear(): void
    {
        delete_option(self::OPTION);
    }

    public static function hasRun(): bool
    {
        return (bool) get_option(self::OPTION, false);
    }

    /**
     * Record a post that was created or updated (with its pre-install backup).
     *
     * @param array<string, mixed>|null $backup
     */
    public static function recordPost(int $postId, string $action, ?array $backup = null): void
    {
        $manifest = self::get();

        $manifest['posts'][$postId] = [
            'action' => $action,
            'backup' => $backup,
        ];

        if ($action === 'created') {
            $manifest['created_posts'][] = $postId;
            $manifest['created_posts'] = array_values(array_unique($manifest['created_posts']));
        }

        self::save($manifest);
    }

    public static function recordTerm(int $termId, string $taxonomy): void
    {
        $manifest = self::get();
        $manifest['terms'][$termId] = $taxonomy;
        self::save($manifest);
    }

    /**
     * @param array<string, mixed> $menuState
     */
    public static function recordMenu(array $menuState): void
    {
        $manifest = self::get();
        $manifest['menu'] = $menuState;
        self::save($manifest);
    }

    /**
     * @param array<string, mixed> $themeState
     */
    public static function recordTheme(array $themeState): void
    {
        $manifest = self::get();
        $manifest['theme'] = $themeState;
        self::save($manifest);
    }

    /**
     * @param array<string, mixed> $optionState
     */
    public static function recordOptions(array $optionState): void
    {
        $manifest = self::get();
        $manifest['options'] = $optionState;
        self::save($manifest);
    }
}