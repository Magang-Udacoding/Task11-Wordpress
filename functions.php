<?php
/**
 * UKM Toko Theme Functions and Definitions
 *
 * @package UKM_Toko_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('UKM_THEME_VERSION', time());
define('UKM_THEME_DIR', get_stylesheet_directory());
define('UKM_THEME_URI', get_stylesheet_directory_uri());

/**
 * 1. Theme Supports & Setup
 */
function ukm_toko_setup() {
    // Make theme available for translation (Requirement 39)
    load_theme_textdomain('ukm-toko-theme', UKM_THEME_DIR . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(600, 450, true);
    add_image_size('ukm-product-thumb', 400, 400, true);
    add_image_size('ukm-product-large', 800, 800, false);
    add_image_size('ukm-banner', 1200, 500, true);

    // Register Navigation Menus
    register_nav_menus(array(
        'primary-menu' => __('Menu Utama (Header)', 'ukm-toko-theme'),
        'mobile-menu'  => __('Menu Mobile', 'ukm-toko-theme'),
        'footer-menu'  => __('Menu Footer', 'ukm-toko-theme'),
    ));

    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Custom Logo Support
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Custom Background & Header (Requirement 11)
    add_theme_support('custom-background', array(
        'default-color' => 'f8fafc',
    ));
    add_theme_support('custom-header', array(
        'default-text-color' => '0f172a',
        'width'              => 1200,
        'height'             => 280,
        'flex-width'         => true,
        'flex-height'        => true,
    ));

    // Gutenberg wide alignment, block styles & responsive embeds
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');

    // WooCommerce support (Requirement 11, 30)
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'ukm_toko_setup');

/**
 * 2. Enqueue Scripts & Styles Properly
 */
function ukm_toko_scripts() {
    // Main Theme stylesheet
    wp_enqueue_style('ukm-toko-style', get_stylesheet_uri(), array(), UKM_THEME_VERSION);

    // Custom UI Stylesheet
    wp_enqueue_style('ukm-toko-main', UKM_THEME_URI . '/assets/css/main.css', array('ukm-toko-style'), UKM_THEME_VERSION);

    // Main Interactive JavaScript (Mobile Nav, Quick Buy, Image Switcher)
    wp_enqueue_script('ukm-toko-main-js', UKM_THEME_URI . '/assets/js/main.js', array(), UKM_THEME_VERSION, true);

    // Pass data to JavaScript
    wp_localize_script('ukm-toko-main-js', 'ukmData', array(
        'ajaxurl'   => admin_url('admin-ajax.php'),
        'waNumber'  => get_theme_mod('ukm_wa_number', '6281234567890'),
        'cartUrl'   => function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/checkout/'),
    ));

    // Threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'ukm_toko_scripts');

/**
 * 3. Register Sidebars and Widget Areas
 */
function ukm_toko_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Toko / Katalog', 'ukm-toko-theme'),
        'id'            => 'shop-sidebar',
        'description'   => __('Tambahkan widget filter kategori atau produk unggulan di sini.', 'ukm-toko-theme'),
        'before_widget' => '<div id="%1$s" class="ukm-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="ukm-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'ukm_toko_widgets_init');

/**
 * 4. Modular Theme Inclusions (Requirement 8)
 */
require_once UKM_THEME_DIR . '/inc/post-types.php';
require_once UKM_THEME_DIR . '/inc/taxonomies.php';
require_once UKM_THEME_DIR . '/inc/acf.php';
require_once UKM_THEME_DIR . '/inc/blocks.php';
require_once UKM_THEME_DIR . '/inc/customizer.php';
require_once UKM_THEME_DIR . '/inc/woocommerce.php';
require_once UKM_THEME_DIR . '/inc/performance.php';
require_once UKM_THEME_DIR . '/inc/seo.php';
require_once UKM_THEME_DIR . '/inc/security.php';

/**
 * Helper: Format Indonesian Currency (Rupiah)
 */
function ukm_rupiah($amount) {
    if (!is_numeric($amount)) return 'Rp 0';
    return 'Rp ' . number_format((float)$amount, 0, ',', '.');
}

/**
 * Helper: Get Product Image URL (uses WP post thumbnail or local product photos)
 */
function ukm_get_product_photo_url($post_id) {
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, 'medium_large');
    }
    $local_file = UKM_THEME_DIR . '/assets/images/products/' . $post_id . '.jpg';
    if (file_exists($local_file)) {
        return UKM_THEME_URI . '/assets/images/products/' . $post_id . '.jpg';
    }
    $mod_id = (($post_id - 201) % 22) + 201;
    $fallback_file = UKM_THEME_DIR . '/assets/images/products/' . $mod_id . '.jpg';
    if (file_exists($fallback_file)) {
        return UKM_THEME_URI . '/assets/images/products/' . $mod_id . '.jpg';
    }
    return UKM_THEME_URI . '/assets/images/products/201.jpg';
}

