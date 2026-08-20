<?php
/**
 * Plugin Name:       PWT Content Installer
 * Plugin URI:        https://www.pannawildtour.com
 * Description:       One-click installer that creates the Panna Wild Tour pages, safari/destination/package records, site settings and navigation menus from the bundled content package. Run it once from Settings → PWT Content Installer.
 * Version:           1.0.6
 * Author:            Panna Wild Tour
 * Author URI:        https://www.pannawildtour.com
 * Requires at least: 6.7
 * Requires PHP:      8.2
 * License:           GPL-2.0-or-later
 * Text Domain:       pwt-content-installer
 *
 * Depends on:        wildtours-plugin (CPTs + taxonomies), wildtours-base-theme (primary/footer nav locations).
 */

defined('ABSPATH') || exit;

define('PWTCI_VERSION', '1.0.6');
define('PWTCI_PLUGIN_FILE', __FILE__);
define('PWTCI_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PWTCI_CONTENT_DIR', PWTCI_PLUGIN_DIR . 'resources/content/');

require_once PWTCI_PLUGIN_DIR . 'app/AttachmentResolver.php';
require_once PWTCI_PLUGIN_DIR . 'app/BlueprintParser.php';
require_once PWTCI_PLUGIN_DIR . 'app/PageImporter.php';
require_once PWTCI_PLUGIN_DIR . 'app/SeedImporter.php';
require_once PWTCI_PLUGIN_DIR . 'app/DatabaseSeeder.php';
require_once PWTCI_PLUGIN_DIR . 'app/MenuBuilder.php';
require_once PWTCI_PLUGIN_DIR . 'app/Manifest.php';
require_once PWTCI_PLUGIN_DIR . 'app/Rollback.php';
require_once PWTCI_PLUGIN_DIR . 'app/ContentInstaller.php';
require_once PWTCI_PLUGIN_DIR . 'app/Admin/AdminPage.php';

register_activation_hook(__FILE__, static function (): void {
    update_option('pwtci_pending_run', '1');
});

add_action('admin_init', static function (): void {
    if (get_option('pwtci_pending_run') !== '1') {
        return;
    }

    delete_option('pwtci_pending_run');
    PWT\ContentInstaller\ContentInstaller::instance()->run();
});

add_action('admin_menu', static function (): void {
    (new PWT\ContentInstaller\Admin\AdminPage())->register();
});

add_action('admin_post_pwtci_run_installer', static function (): void {
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('Not allowed.', 'pwt-content-installer'));
    }
    check_admin_referer('pwtci_run_installer');

    PWT\ContentInstaller\ContentInstaller::instance()->run();

    wp_safe_redirect(admin_url('options-general.php?page=pwt-content-installer'));
    exit;
});

add_action('admin_post_pwtci_rollback', static function (): void {
    if (!current_user_can('manage_options')) {
        wp_die(esc_html__('Not allowed.', 'pwt-content-installer'));
    }
    check_admin_referer('pwtci_rollback');

    $result = (new PWT\ContentInstaller\Rollback())->run();
    set_transient('pwtci_rollback_result', $result, 60);

    wp_safe_redirect(admin_url('options-general.php?page=pwt-content-installer'));
    exit;
});
