<?php
/**
 * Custom WooCommerce Single Product Template
 * Matches modern sleek design system
 *
 * @package UKM_Toko_Theme
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="site-container woocommerce-custom-wrap" style="padding-top: 36px; padding-bottom: 60px;">
    <?php
    /**
     * woocommerce_before_main_content hook.
     */
    do_action( 'woocommerce_before_main_content' );
    ?>

    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>

        <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'ukm-single-product-layout', $product ); ?>>
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             */
            do_action( 'woocommerce_before_single_product_summary' );
            ?>

            <div class="summary entry-summary">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>

            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             */
            do_action( 'woocommerce_after_single_product_summary' );
            ?>
        </div>

    <?php endwhile; ?>

    <?php
    /**
     * woocommerce_after_main_content hook.
     */
    do_action( 'woocommerce_after_main_content' );
    ?>
</div>

<?php
get_footer( 'shop' );
