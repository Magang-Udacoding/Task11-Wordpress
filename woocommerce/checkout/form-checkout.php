<?php
/**
 * Custom WooCommerce Checkout Form Template
 *
 * @package UKM_Toko_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'Anda harus masuk log untuk menyelesaikan pembelian.', 'woocommerce' ) ) );
    return;
}
?>

<div class="site-container custom-woo-checkout-container" style="padding-top: 36px; padding-bottom: 60px;">
    <h1 class="checkout-heading-title" style="font-family: var(--font-heading, sans-serif); font-size: 32px; font-weight: 800; margin-bottom: 24px; color: #0f172a;">
        <?php esc_html_e( 'Checkout Pesanan', 'ukm-toko-theme' ); ?>
    </h1>

    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 40px;">

        <?php if ( $checkout->get_checkout_fields() ) : ?>

            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div class="col2-set" id="customer_details">
                <div class="col-1">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>

                <div class="col-2">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                </div>
            </div>

            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

        <?php endif; ?>

        <div class="checkout-order-review-col" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 20px; padding: 28px;">
            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

            <h3 id="order_review_heading" style="font-size: 20px; font-weight: 700; margin-bottom: 18px; color: #0f172a;">
                <?php esc_html_e( 'Rincian Pesanan Anda', 'woocommerce' ); ?>
            </h3>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        </div>

    </form>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
