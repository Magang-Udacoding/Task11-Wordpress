<?php
/**
 * Custom WooCommerce Archive Product Template (Shop & Categories)
 *
 * @package UKM_Toko_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<main id="primary-content" class="catalog-page-main woocommerce-archive-main">
    <div class="site-container" style="padding-top: 36px; padding-bottom: 60px;">

        <?php
        /**
         * Hook: woocommerce_before_main_content.
         */
        do_action( 'woocommerce_before_main_content' );
        ?>

        <header class="woocommerce-products-header catalog-header-banner" style="margin-bottom: 32px;">
            <div class="catalog-header-text">
                <span class="catalog-badge"><?php esc_html_e( 'KATALOG RESMI', 'ukm-toko-theme' ); ?></span>
                <h1 class="woocommerce-products-header__title page-title catalog-main-heading">
                    <?php woocommerce_page_title(); ?>
                </h1>
                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 */
                do_action( 'woocommerce_archive_description' );
                ?>
            </div>
        </header>

        <?php if ( woocommerce_product_loop() ) : ?>

            <div class="woocommerce-notices-wrapper">
                <?php
                /**
                 * Hook: woocommerce_before_shop_loop.
                 */
                do_action( 'woocommerce_before_shop_loop' );
                ?>
            </div>

            <?php woocommerce_product_loop_start(); ?>

            <?php if ( wc_get_loop_prop( 'total' ) ) : ?>
                <?php while ( have_posts() ) : ?>
                    <?php the_post(); ?>
                    <?php
                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                    ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php
            /**
             * Hook: woocommerce_after_shop_loop.
             */
            do_action( 'woocommerce_after_shop_loop' );
            ?>

        <?php else : ?>

            <?php
            /**
             * Hook: woocommerce_no_products_found.
             */
            do_action( 'woocommerce_no_products_found' );
            ?>

        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_after_main_content.
         */
        do_action( 'woocommerce_after_main_content' );
        ?>

    </div>
</main>

<?php
get_footer( 'shop' );
