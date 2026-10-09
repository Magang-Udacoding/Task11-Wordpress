<?php
/**
 * Custom WooCommerce My Account Template
 *
 * @package UKM_Toko_Theme
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="site-container custom-woo-myaccount-container" style="padding-top: 36px; padding-bottom: 60px;">
    <h1 class="myaccount-heading-title" style="font-family: var(--font-heading, sans-serif); font-size: 32px; font-weight: 800; margin-bottom: 24px; color: #0f172a;">
        <?php esc_html_e( 'Akun Saya', 'ukm-toko-theme' ); ?>
    </h1>

    <div class="woocommerce-my-account-wrapper" style="display: grid; grid-template-columns: 260px 1fr; gap: 36px;">
        <nav class="woocommerce-MyAccount-navigation" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px;">
            <?php
            /**
             * My Account navigation.
             */
            do_action( 'woocommerce_account_navigation' );
            ?>
        </nav>

        <div class="woocommerce-MyAccount-content" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 28px;">
            <?php
                /**
                 * My Account content.
                 */
                do_action( 'woocommerce_account_content' );
            ?>
        </div>
    </div>
</div>
