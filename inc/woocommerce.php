<?php
/**
 * WooCommerce Customization & Integration
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. WooCommerce Theme Supports
 */
function ukm_toko_woocommerce_setup() {
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 350,
        'single_image_width'    => 600,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'max_rows'        => 6,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 4,
        ),
    ));
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'ukm_toko_woocommerce_setup');

/**
 * 2. Custom Currency Symbol Formatting for Indonesian Rupiah
 */
add_filter('woocommerce_currency_symbol', function($currency_symbol, $currency) {
    if ($currency === 'IDR') {
        return 'Rp ';
    }
    return $currency_symbol;
}, 10, 2);

/**
 * 3. Custom Cart Widget & AJAX Fragment Update for Floating Header Cart
 */
function ukm_toko_cart_link_fragment($fragments) {
    if (!function_exists('WC')) return $fragments;
    
    ob_start();
    ?>
    <a class="ukm-header-cart-link" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Lihat Keranjang Belanja', 'ukm-toko'); ?>">
        <span class="cart-icon">🛒</span>
        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
    </a>
    <?php
    $fragments['a.ukm-header-cart-link'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'ukm_toko_cart_link_fragment');

/**
 * 4. Custom Checkout Fields (RT/RW & Patokan Lokasi Rumah untuk Pengiriman UKM)
 */
function ukm_toko_custom_checkout_fields($fields) {
    $fields['billing']['billing_ukm_rt_rw'] = array(
        'label'       => __('Nomor RT / RW', 'ukm-toko'),
        'placeholder' => _x('Contoh: RT 03 / RW 07', 'placeholder', 'ukm-toko'),
        'required'    => false,
        'class'       => array('form-row-first'),
        'clear'       => true,
        'priority'    => 65,
    );
    $fields['billing']['billing_ukm_patokan'] = array(
        'label'       => __('Patokan Rumah / Warung', 'ukm-toko'),
        'placeholder' => _x('Contoh: Depan Masjid Al-Ikhlas / Pagar Hijau', 'placeholder', 'ukm-toko'),
        'required'    => false,
        'class'       => array('form-row-last'),
        'clear'       => true,
        'priority'    => 66,
    );
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'ukm_toko_custom_checkout_fields');

/**
 * Save custom fields to order meta
 */
add_action('woocommerce_checkout_update_order_meta', function($order_id) {
    if (!empty($_POST['billing_ukm_rt_rw'])) {
        update_post_meta($order_id, '_billing_ukm_rt_rw', sanitize_text_field($_POST['billing_ukm_rt_rw']));
    }
    if (!empty($_POST['billing_ukm_patokan'])) {
        update_post_meta($order_id, '_billing_ukm_patokan', sanitize_text_field($_POST['billing_ukm_patokan']));
    }
});

/**
 * Display custom fields in Admin Order Details
 */
add_action('woocommerce_admin_order_data_after_billing_address', function($order) {
    $rt_rw = get_post_meta($order->get_id(), '_billing_ukm_rt_rw', true);
    $patokan = get_post_meta($order->get_id(), '_billing_ukm_patokan', true);
    if ($rt_rw) echo '<p><strong>' . __('RT/RW:', 'ukm-toko') . '</strong> ' . esc_html($rt_rw) . '</p>';
    if ($patokan) echo '<p><strong>' . __('Patokan Pengiriman:', 'ukm-toko') . '</strong> ' . esc_html($patokan) . '</p>';
});

/**
 * 5. Custom My Account Fields (WhatsApp Contact for Instant Delivery Updates)
 */
function ukm_toko_add_my_account_fields() {
    $user_id = get_current_user_id();
    $wa_number = get_user_meta($user_id, 'ukm_wa_pelanggan', true);
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="ukm_wa_pelanggan"><?php _e('Nomor WhatsApp untuk Info Pengiriman (Aktif)', 'ukm-toko'); ?></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="ukm_wa_pelanggan" id="ukm_wa_pelanggan" value="<?php echo esc_attr($wa_number); ?>" placeholder="Contoh: 081234567890" />
    </p>
    <?php
}
add_action('woocommerce_edit_account_form', 'ukm_toko_add_my_account_fields');

add_action('woocommerce_save_account_details', function($user_id) {
    if (isset($_POST['ukm_wa_pelanggan'])) {
        update_user_meta($user_id, 'ukm_wa_pelanggan', sanitize_text_field($_POST['ukm_wa_pelanggan']));
    }
});
