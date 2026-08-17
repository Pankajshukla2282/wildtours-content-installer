<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Resolves a featured image reference to an attachment ID.
 *
 * Prefers the WXR-imported attachment ID when provided, then falls back to a
 * lookup by file basename (matching _wp_attached_file) so content created on a
 * different environment still finds its image.
 */
final class AttachmentResolver
{
    public static function resolve(string $filename, int $id = 0): int
    {
        if ($id > 0) {
            $byId = self::byId($id);
            if ($byId > 0) {
                return $byId;
            }
        }

        $base = self::basename($filename);

        if ($base === '') {
            return 0;
        }

        $byName = self::byBasename($base);
        if ($byName > 0) {
            return $byName;
        }

        $byPostName = self::byPostName($base);
        if ($byPostName > 0) {
            return $byPostName;
        }

        return 0;
    }

    private static function byId(int $id): int
    {
        if (get_post_type($id) === 'attachment') {
            return $id;
        }

        return 0;
    }

    private static function byBasename(string $base): int
    {
        global $wpdb;

        $like = $wpdb->esc_like($base);

        $id = (int) $wpdb->get_var(
            $wpdb->prepare(
                "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s LIMIT 1",
                '%' . $like . '%'
            )
        );

        return $id;
    }

    private static function byPostName(string $base): int
    {
        $name = sanitize_title(pathinfo($base, PATHINFO_FILENAME));

        if ($name === '') {
            return 0;
        }

        $att = get_page_by_path($name, OBJECT, 'attachment');

        return $att ? (int) $att->ID : 0;
    }

    private static function basename(string $filename): string
    {
        $filename = str_replace('\\', '/', $filename);

        return strtolower((string) pathinfo($filename, PATHINFO_BASENAME));
    }
}
