<?php
/**
 * UKM Toko Theme Functions and Definitions — Toko Berkah
 *
 * @package UKM_Toko_Theme
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ─── Constants ───────────────────────────────────────────────────────────────
define( 'UKM_THEME_VERSION', '1.1.4' );
define( 'UKM_THEME_DIR',     get_stylesheet_directory() );
define( 'UKM_THEME_URI',     get_stylesheet_directory_uri() );

// ─── 1. Theme Setup ──────────────────────────────────────────────────────────
function ukm_toko_setup() {
    load_theme_textdomain( 'ukm-toko-theme', UKM_THEME_DIR . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    // Image sizes
    set_post_thumbnail_size( 600, 450, true );
    add_image_size( 'ukm-product-thumb', 400, 400, true );
    add_image_size( 'ukm-product-large', 800, 800, false );
    add_image_size( 'ukm-banner',       1200, 500, true );

    // Navigation menus
    register_nav_menus( array(
        'primary-menu' => __( 'Menu Utama (Header)', 'ukm-toko-theme' ),
        'footer-menu'  => __( 'Menu Footer', 'ukm-toko-theme' ),
    ) );

    // HTML5 output
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ) );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'f8fafc',
    ) );

    // Gutenberg / block editor
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );

    // WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ukm_toko_setup' );

// ─── 2. Enqueue Styles & Scripts ─────────────────────────────────────────────
function ukm_toko_scripts() {
    // Base theme stylesheet (contains theme header)
    wp_enqueue_style(
        'ukm-toko-style',
        get_stylesheet_uri(),
        array(),
        UKM_THEME_VERSION
    );

    // Google Fonts: Plus Jakarta Sans + Outfit
    wp_enqueue_style(
        'ukm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap',
        array(),
        null
    );

    // Main UI stylesheet
    wp_enqueue_style(
        'ukm-toko-main',
        UKM_THEME_URI . '/assets/css/main.css',
        array( 'ukm-toko-style' ),
        UKM_THEME_VERSION
    );

    // Monochrome Black & White Theme Stylesheet
    wp_enqueue_style(
        'ukm-toko-monochrome',
        UKM_THEME_URI . '/assets/css/monochrome.css',
        array( 'ukm-toko-main' ),
        UKM_THEME_VERSION
    );

    // Main JS (mobile nav, cart, gallery switcher)
    wp_enqueue_script(
        'ukm-toko-main-js',
        UKM_THEME_URI . '/assets/js/main.js',
        array(),
        UKM_THEME_VERSION,
        true
    );

    // Localise JS data
    $wa_number = get_theme_mod( 'ukm_wa_number', '6281234567890' );
    wp_localize_script( 'ukm-toko-main-js', 'ukmData', array(
        'ajaxurl'  => admin_url( 'admin-ajax.php' ),
        'waNumber' => preg_replace( '/[^0-9]/', '', $wa_number ),
        'cartUrl'  => function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/checkout/' ),
        'siteUrl'  => home_url( '/' ),
        'nonce'    => wp_create_nonce( 'ukm_cart_nonce' ),
    ) );

    // Comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ukm_toko_scripts' );

// ─── 3. Widget Areas ─────────────────────────────────────────────────────────
function ukm_toko_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Toko / Katalog', 'ukm-toko-theme' ),
        'id'            => 'shop-sidebar',
        'description'   => __( 'Widget filter kategori atau info toko.', 'ukm-toko-theme' ),
        'before_widget' => '<div id="%1$s" class="ukm-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="ukm-widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'ukm-toko-theme' ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Widget untuk footer toko.', 'ukm-toko-theme' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'ukm_toko_widgets_init' );

// ─── 4. Modular Includes ──────────────────────────────────────────────────────
require_once UKM_THEME_DIR . '/inc/post-types.php';   // CPT loader (cpt-produk + cpt-klien)
require_once UKM_THEME_DIR . '/inc/taxonomies.php';
require_once UKM_THEME_DIR . '/inc/acf.php';
require_once UKM_THEME_DIR . '/inc/blocks.php';
require_once UKM_THEME_DIR . '/inc/customizer.php';
require_once UKM_THEME_DIR . '/inc/woocommerce.php';
require_once UKM_THEME_DIR . '/inc/performance.php';
require_once UKM_THEME_DIR . '/inc/seo.php';
require_once UKM_THEME_DIR . '/inc/security.php';

// ─── 5. Helper Functions ──────────────────────────────────────────────────────
/**
 * Format Indonesian Rupiah currency.
 *
 * @param int|float $amount Nominal.
 * @return string Formatted string.
 */
function ukm_rupiah( $amount ) {
    if ( ! is_numeric( $amount ) ) {
        return 'Rp 0';
    }
    return 'Rp ' . number_format( (float) $amount, 0, ',', '.' );
}

/**
 * Format price in Indonesian Rupiah (Rp).
 */
function technova_format_price( $amount ) {
    if ( ! is_numeric( $amount ) ) {
        return 'Rp 0';
    }
    return ukm_rupiah( (float) $amount );
}

/**
 * Get product photo URL (supports TechNova tech gadgets and local fallback).
 *
 * @param int $post_id Post ID.
 * @return string Image URL.
 */
function ukm_get_product_photo_url( $post_id ) {
    // 1. Featured image in WP
    if ( has_post_thumbnail( $post_id ) ) {
        return get_the_post_thumbnail_url( $post_id, 'ukm-product-thumb' );
    }

    // 2. TechNova gadget image meta
    $meta_img = get_post_meta( $post_id, 'technova_image', true );
    if ( ! empty( $meta_img ) ) {
        $tech_path = UKM_THEME_DIR . '/assets/images/technova/' . $meta_img;
        if ( file_exists( $tech_path ) ) {
            return UKM_THEME_URI . '/assets/images/technova/' . $meta_img;
        }
    }

    // 3. Check by post slug
    $slug = get_post_field( 'post_name', $post_id );
    $slug_map = array(
        'iphone-15-pro'           => 'prod-iphone15.jpg',
        'macbook-air-m2'          => 'prod-macbook.jpg',
        'airpods-pro'             => 'prod-airpods.jpg',
        'samsung-galaxy-watch-6'  => 'prod-galaxywatch.jpg',
    );
    if ( isset( $slug_map[ $slug ] ) ) {
        $path = UKM_THEME_DIR . '/assets/images/technova/' . $slug_map[ $slug ];
        if ( file_exists( $path ) ) {
            return UKM_THEME_URI . '/assets/images/technova/' . $slug_map[ $slug ];
        }
    }

    // 4. Try exact ID match first (201–222)
    $local_file = UKM_THEME_DIR . '/assets/images/products/' . $post_id . '.jpg';
    if ( file_exists( $local_file ) ) {
        return UKM_THEME_URI . '/assets/images/products/' . $post_id . '.jpg';
    }

    // 5. Wrap around fallback
    $mod_id       = ( ( (int)$post_id - 201 ) % 22 ) + 201;
    $fallback_file = UKM_THEME_DIR . '/assets/images/products/' . $mod_id . '.jpg';
    if ( file_exists( $fallback_file ) ) {
        return UKM_THEME_URI . '/assets/images/products/' . $mod_id . '.jpg';
    }
    return UKM_THEME_URI . '/assets/images/technova/prod-iphone15.jpg';
}

/**
 * Breadcrumb helper (simple, SEO-friendly).
 */
if ( ! function_exists( 'ukm_toko_breadcrumbs' ) ) :
function ukm_toko_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }
    echo '<nav class="ukm-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'ukm-toko-theme' ) . '">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Beranda', 'ukm-toko-theme' ) . '</a>';
    echo '<span class="bc-sep" aria-hidden="true">/</span>';

    if ( is_singular( 'produk' ) ) {
        $terms = get_the_terms( get_the_ID(), 'kategori-produk' );
        echo '<a href="' . esc_url( get_post_type_archive_link( 'produk' ) ) . '">' . esc_html__( 'Katalog', 'ukm-toko-theme' ) . '</a>';
        echo '<span class="bc-sep" aria-hidden="true">/</span>';
        if ( $terms && ! is_wp_error( $terms ) ) {
            $t = array_shift( $terms );
            echo '<a href="' . esc_url( get_term_link( $t ) ) . '">' . esc_html( $t->name ) . '</a>';
            echo '<span class="bc-sep" aria-hidden="true">/</span>';
        }
        echo '<span class="bc-current" aria-current="page">' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_post_type_archive( 'produk' ) ) {
        echo '<span class="bc-current" aria-current="page">' . esc_html__( 'Katalog Produk', 'ukm-toko-theme' ) . '</span>';
    } elseif ( is_tax( 'kategori-produk' ) ) {
        echo '<a href="' . esc_url( get_post_type_archive_link( 'produk' ) ) . '">' . esc_html__( 'Katalog', 'ukm-toko-theme' ) . '</a>';
        echo '<span class="bc-sep" aria-hidden="true">/</span>';
        echo '<span class="bc-current" aria-current="page">' . esc_html( single_term_title( '', false ) ) . '</span>';
    } elseif ( is_singular() ) {
        echo '<span class="bc-current" aria-current="page">' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_archive() ) {
        echo '<span class="bc-current" aria-current="page">' . esc_html( get_the_archive_title() ) . '</span>';
    } elseif ( is_search() ) {
        echo '<span class="bc-current" aria-current="page">' . sprintf( esc_html__( 'Hasil pencarian: %s', 'ukm-toko-theme' ), get_search_query() ) . '</span>';
    } elseif ( is_404() ) {
        echo '<span class="bc-current" aria-current="page">404</span>';
    }

    echo '</nav>';
}
endif;

// ─── 6. Comments Template Fallback ───────────────────────────────────────────
if ( ! function_exists( 'ukm_toko_comment_callback' ) ) {
    function ukm_toko_comment_callback( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'ukm-comment-item' ); ?>>
            <article class="comment-body">
                <div class="comment-author">
                    <?php echo get_avatar( $comment, 40 ); ?>
                    <cite><?php comment_author_link(); ?></cite>
                    <time datetime="<?php comment_date( 'c' ); ?>"><?php comment_date( 'j M Y' ); ?></time>
                </div>
                <div class="comment-text"><?php comment_text(); ?></div>
                <div class="comment-reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </article>
        <?php
    }
}
