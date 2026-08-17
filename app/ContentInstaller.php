<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Orchestrates a full content install:
 *  1. pages + blog posts from the markdown blueprints
 *  2. taxonomies + CPT records + site settings from 12-SEED-DATA.json
 *  3. primary navigation menu + header CTA
 *
 * Every step is idempotent, so the whole run can be repeated safely.
 */
final class ContentInstaller
{
    private static ?ContentInstaller $instance = null;

    public static function instance(): ContentInstaller
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return array<string, mixed>
     */
    public function run(): array
    {
        $start = microtime(true);
        $results = [];

        if (!Manifest::hasRun()) {
            Manifest::recordOptions([
                'pwt_settings'   => get_option('pwt_settings', null),
                'show_on_front'  => get_option('show_on_front', ''),
                'page_on_front'  => (int) get_option('page_on_front', 0),
                'page_for_posts' => (int) get_option('page_for_posts', 0),
            ]);
        }

        $results['pages'] = (new PageImporter())->import((new BlueprintParser())->parseAll());
        $results['seed'] = (new SeedImporter())->import();
        $results['menu'] = (new MenuBuilder())->apply();

        $results['summary'] = [
            'pages_created' => count(array_filter($results['pages'], static fn (array $p) => $p['action'] === 'created')),
            'pages_updated' => count(array_filter($results['pages'], static fn (array $p) => $p['action'] === 'updated')),
            'seed_records'  => count($results['seed']),
            'menu_items'    => count($results['menu']),
            'elapsed_ms'    => (int) round((microtime(true) - $start) * 1000),
        ];

        update_option('pwtci_last_run', [
            'timestamp' => current_time('mysql'),
            'summary'   => $results['summary'],
        ]);

        return $results;
    }
}