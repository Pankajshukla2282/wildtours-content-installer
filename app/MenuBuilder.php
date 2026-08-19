<?php

declare(strict_types=1);

namespace PWT\ContentInstaller;

defined('ABSPATH') || exit;

/**
 * Applies the primary navigation menu from the nav tree (01-URL-MATRIX §C).
 *
 * Builds "Primary Navigation" (assigned to the theme 'primary' location),
 * including the two-column mega dropdown class on Experiences and the
 * Guides sub-menu pointing at blog posts. Also sets the header CTA theme mods.
 */
final class MenuBuilder
{
    private const MENU_NAME = 'Primary Navigation';

    private const LOCATION = 'primary';

    /**
     * Menu tree.
     *
     * @var array<int, array{label:string, slug:string, type?:string, children?: array<int, array{label:string, slug:string, type?:string}>}>
     */
    private const NAV_TREE = [
        ['label' => 'Home', 'slug' => 'home', 'type' => 'page'],
        [
            'label'    => 'Safaris',
            'slug'     => 'safaris',
            'type'     => 'page',
            'children' => [
                ['label' => 'Jungle Safari (Core)', 'slug' => 'jungle-safari-core', 'type' => 'page'],
                ['label' => 'Jungle Safari (Buffer)', 'slug' => 'jungle-safari-buffer', 'type' => 'page'],
                ['label' => 'Boating', 'slug' => 'boating', 'type' => 'page'],
            ],
        ],
        ['label' => 'Tour Packages', 'slug' => 'tour-packages', 'type' => 'page'],
        [
            'label'    => 'Safari Zones',
            'slug'     => 'zones',
            'type'     => 'page',
            'children' => [
                ['label' => 'Madla Gate', 'slug' => 'madla-gate', 'type' => 'page'],
                ['label' => 'Hinouta Gate', 'slug' => 'hinouta-gate', 'type' => 'page'],
                ['label' => 'Akola (Buffer) Gate', 'slug' => 'akola-buffer-gate', 'type' => 'page'],
            ],
        ],
        [
            'label'    => 'Stays',
            'slug'     => 'stays',
            'type'     => 'page',
            'children' => [
                ['label' => 'Home Stay', 'slug' => 'home-stay', 'type' => 'page'],
                ['label' => 'Hotel', 'slug' => 'hotel', 'type' => 'page'],
                ['label' => 'Resort', 'slug' => 'resort', 'type' => 'page'],
            ],
        ],
        [
            'label'    => 'Experiences',
            'slug'     => 'experiences',
            'type'     => 'page',
            'children' => [
                ['label' => 'Pandav Caves & Falls', 'slug' => 'pandav-caves-falls', 'type' => 'page'],
                ['label' => 'Khajuraho Western Temples', 'slug' => 'khajuraho-western-temples', 'type' => 'page'],
                ['label' => 'Raneh Waterfall', 'slug' => 'raneh-waterfall', 'type' => 'page'],
                ['label' => 'Ken Gharial Sanctuary', 'slug' => 'ken-gharial-sanctuary', 'type' => 'page'],
                ['label' => 'Panna Temples', 'slug' => 'panna-temples', 'type' => 'page'],
                ['label' => 'Kutni Dam', 'slug' => 'kutni-dam', 'type' => 'page'],
                ['label' => 'Ken Riverside Scenes', 'slug' => 'ken-riverside-scenes', 'type' => 'page'],
                ['label' => 'Walk with Pardhi', 'slug' => 'walk-with-pardhi', 'type' => 'page'],
                ['label' => 'Bird Watching', 'slug' => 'bird-watching', 'type' => 'page'],
            ],
        ],
        [
            'label'    => 'Guides',
            'slug'     => 'blog',
            'type'     => 'page',
            'children' => [
                ['label' => 'Best Time to Visit', 'slug' => 'best-time-to-visit-panna-national-park', 'type' => 'post'],
                ['label' => 'How to Reach Panna', 'slug' => 'how-to-reach-panna', 'type' => 'post'],
                ['label' => 'Safari Rules & Packing', 'slug' => 'panna-safari-rules-packing-list', 'type' => 'post'],
            ],
        ],
        ['label' => 'About', 'slug' => 'about-us', 'type' => 'page'],
        ['label' => 'Contact', 'slug' => 'contact-us', 'type' => 'page'],
    ];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function apply(): array
    {
        $log = [];

        $priorLocations = (array) get_theme_mod('nav_menu_locations', []);
        $priorMenuId = isset($priorLocations[self::LOCATION]) ? (int) $priorLocations[self::LOCATION] : 0;

        $menuExistedBefore = (bool) wp_get_nav_menu_object(self::MENU_NAME);

        $menuId = $this->menuId();
        if ($menuId <= 0) {
            return $log;
        }

        $menuCreated = !$menuExistedBefore;

        $this->clearMenu($menuId);

        $order = 0;

        foreach (self::NAV_TREE as $node) {
            $objectId = $this->objectIdForSlug($node['slug'], $node['type']);
            if ($objectId <= 0) {
                continue;
            }

            $itemId = $this->addItem(
                $menuId,
                $node['label'],
                $node['type'],
                $objectId,
                0,
                $node['slug'] === 'experiences' ? ['menu-mega'] : [],
                ++$order
            );

            if ($itemId <= 0) {
                continue;
            }

            $log[] = [
                'slug'   => $node['slug'],
                'label'  => $node['label'],
                'action' => 'added',
                'id'     => $itemId,
            ];

            foreach ($node['children'] ?? [] as $child) {
                $childObjectId = $this->objectIdForSlug($child['slug'], $child['type']);
                if ($childObjectId <= 0) {
                    continue;
                }

                $childId = $this->addItem(
                    $menuId,
                    $child['label'],
                    $child['type'],
                    $childObjectId,
                    $itemId,
                    [],
                    ++$order
                );

                if ($childId > 0) {
                    $log[] = [
                        'slug'   => $child['slug'],
                        'label'  => $child['label'],
                        'action' => 'added-child',
                        'id'     => $childId,
                    ];
                }
            }
        }

        $locations = (array) get_theme_mod('nav_menu_locations', []);
        $locations[self::LOCATION] = $menuId;
        set_theme_mod('nav_menu_locations', $locations);

        $this->applyTopbar();

        Manifest::recordMenu([
            'menu_id'           => $menuId,
            'menu_created'      => $menuCreated,
            'prior_locations'   => $priorLocations,
            'prior_menu_id'     => $priorMenuId,
            'menu_name'         => self::MENU_NAME,
        ]);

        Manifest::recordTheme([
            'header_cta_label' => get_theme_mod('header_cta_label', ''),
            'header_cta_url'   => get_theme_mod('header_cta_url', ''),
            'topbar_text'      => get_theme_mod('topbar_text', ''),
        ]);

        return $log;
    }

    private function menuId(): int
    {
        $existing = wp_get_nav_menu_object(self::MENU_NAME);

        if ($existing instanceof \WP_Term) {
            return (int) $existing->term_id;
        }

        $created = wp_create_nav_menu(self::MENU_NAME);

        return is_wp_error($created) ? 0 : (int) $created;
    }

    private function clearMenu(int $menuId): void
    {
        $items = wp_get_nav_menu_items($menuId);

        if (is_array($items)) {
            foreach ($items as $item) {
                wp_delete_post((int) $item->ID, true);
            }
        }
    }

    /**
     * @param string[] $classes
     */
    private function addItem(int $menuId, string $label, string $type, int $objectId, int $parentId, array $classes, int $position): int
    {
        $itemId = wp_update_nav_menu_item($menuId, 0, [
            'menu-item-title'     => $label,
            'menu-item-object'    => $type,
            'menu-item-object-id' => $objectId,
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish',
            'menu-item-parent-id' => $parentId,
            'menu-item-position'  => $position,
            'menu-item-classes'   => implode(' ', $classes),
        ]);

        return is_wp_error($itemId) || !is_numeric($itemId) ? 0 : (int) $itemId;
    }

    private function objectIdForSlug(string $slug, string $type): int
    {
        if ($slug === 'home') {
            return (int) get_option('page_on_front', 0);
        }

        if ($type === 'post') {
            $post = get_page_by_path($slug, OBJECT, 'post');
            return $post instanceof \WP_Post ? (int) $post->ID : 0;
        }

        $page = get_page_by_path($slug, OBJECT, 'page');

        return $page instanceof \WP_Post ? (int) $page->ID : 0;
    }

    private function applyTopbar(): void
    {
        $ctaLabel = (string) get_theme_mod('header_cta_label', '');
        if ($ctaLabel === '') {
            set_theme_mod('header_cta_label', 'Book Safari Assistance');
        }

        $ctaUrl = (string) get_theme_mod('header_cta_url', '');
        if ($ctaUrl === '') {
            set_theme_mod('header_cta_url', '/contact-us/');
        }
    }
}