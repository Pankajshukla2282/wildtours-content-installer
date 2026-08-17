<?php

declare(strict_types=1);

namespace PWT\ContentInstaller\Admin;

defined('ABSPATH') || exit;

/**
 * Admin page under Settings with a one-click "Run Installer" button and a
 * summary of the last run.
 */
final class AdminPage
{
    public function register(): void
    {
        add_options_page(
            __('PWT Content Installer', 'pwt-content-installer'),
            __('PWT Content Installer', 'pwt-content-installer'),
            'manage_options',
            'pwt-content-installer',
            [$this, 'render']
        );
    }

    public function render(): void
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        $lastRun = (array) get_option('pwtci_last_run', []);
        $rollbackResult = get_transient('pwtci_rollback_result');
        $hasRun = \PWT\ContentInstaller\Manifest::hasRun();

        $runUrl = wp_nonce_url(
            admin_url('admin-post.php?action=pwtci_run_installer'),
            'pwtci_run_installer'
        );

        $rollbackUrl = wp_nonce_url(
            admin_url('admin-post.php?action=pwtci_rollback'),
            'pwtci_rollback'
        );

        ?>
        <div class="wrap">
            <h1><?php echo esc_html__('PWT Content Installer', 'pwt-content-installer'); ?></h1>

            <p>
                <?php echo esc_html__(
                    'Creates the Panna Wild Tour pages, blog posts, safari/destination/package records, site settings and the primary navigation menu from the bundled content package. Safe to run again — existing content is updated, never duplicated.',
                    'pwt-content-installer'
                ); ?>
            </p>

            <p>
                <a class="button button-primary button-hero" href="<?php echo esc_url($runUrl); ?>">
                    <?php echo esc_html__('Run Installer', 'pwt-content-installer'); ?>
                </a>

                <?php if ($hasRun) : ?>
                    <a class="button button-secondary button-hero"
                       href="<?php echo esc_url($rollbackUrl); ?>"
                       onclick="return confirm('<?php echo esc_js(__('Remove all content added by this installer and restore the previous state?', 'pwt-content-installer')); ?>');"
                       style="margin-left:12px;color:#b32d2e;border-color:#b32d2e">
                        <?php echo esc_html__('Remove Installed Content', 'pwt-content-installer'); ?>
                    </a>
                <?php endif; ?>
            </p>

            <?php if (is_array($rollbackResult)) : ?>
                <div class="notice notice-success is-dismissible">
                    <p>
                        <strong><?php echo esc_html__('Installed content removed.', 'pwt-content-installer'); ?></strong>
                        <?php
                        echo esc_html(sprintf(
                            /* translators: %1$d deleted, %2$d restored, %3$d terms, %4$d menu */
                            __('%1$d posts deleted · %2$d posts restored · %3$d terms deleted · %4$d menu deleted · settings & theme restored.', 'pwt-content-installer'),
                            (int) ($rollbackResult['posts_deleted'] ?? 0),
                            (int) ($rollbackResult['posts_restored'] ?? 0),
                            (int) ($rollbackResult['terms_deleted'] ?? 0),
                            (int) ($rollbackResult['menu_deleted'] ?? 0)
                        )); ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if (!empty($lastRun['timestamp'])) : ?>
                <h2><?php echo esc_html__('Last run', 'pwt-content-installer'); ?></h2>
                <p>
                    <strong><?php echo esc_html($lastRun['timestamp']); ?></strong>
                </p>
                <table class="widefat striped" style="max-width:640px">
                    <tbody>
                        <?php foreach ((array) ($lastRun['summary'] ?? []) as $label => $value) : ?>
                            <tr>
                                <th><?php echo esc_html($label); ?></th>
                                <td><?php echo esc_html((string) $value); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <?php
    }
}