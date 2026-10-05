<?php
/**
 * Technical SEO, JSON-LD Schema, Open Graph & Breadcrumbs
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Open Graph & Twitter Card Meta Tags
 */
function ukm_toko_seo_meta_tags() {
    // If Yoast SEO or RankMath is active, let them handle meta tags
    if (defined('WPSEO_VERSION') || class_exists('RankMath')) {
        return;
    }

    global $post;
    $site_name = get_bloginfo('name');
    $title     = wp_get_document_title();
    $desc      = get_bloginfo('description');
    $url       = home_url(add_query_arg(array(), $GLOBALS['wp']->request));
    $image     = '';

    if (is_singular() && is_a($post, 'WP_Post')) {
        $desc = wp_strip_all_tags($post->post_excerpt ?: wp_trim_words($post->post_content, 25));
        if (has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
            if ($img_src) $image = $img_src[0];
        }
    }

    echo "\n<!-- UKM Toko Technical SEO -->\n";
    echo '<meta name="description" content="' . esc_attr($desc) . '" />' . "\n";
    echo '<meta property="og:type" content="' . (is_singular('produk') ? 'product' : 'website') . '" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '" />' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '" />' . "\n";
    if ($image) {
        echo '<meta property="og:image" content="' . esc_url($image) . '" />' . "\n";
        echo '<meta name="twitter:image" content="' . esc_url($image) . '" />' . "\n";
    }
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($desc) . '" />' . "\n";
    
    // Item 44: hreflang multilingual ready
    $locale = get_locale();
    echo '<link rel="alternate" href="' . esc_url($url) . '" hreflang="' . esc_attr(substr($locale, 0, 2)) . '" />' . "\n";
    echo '<link rel="alternate" href="' . esc_url($url) . '" hreflang="x-default" />' . "\n";
}
add_action('wp_head', 'ukm_toko_seo_meta_tags', 5);

/**
 * 2. Schema Markup JSON-LD (Organization, LocalBusiness, and Product)
 */
function ukm_toko_schema_jsonld() {
    $site_name = get_bloginfo('name');
    $site_url  = home_url('/');
    $store_wa  = get_theme_mod('ukm_wa_number', '6281234567890');
    $address   = get_theme_mod('ukm_store_address', 'Jl. Merdeka No. 45, Bandung');

    // Schema 1: LocalBusiness & GroceryStore
    $schema_org = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'GroceryStore',
        'name'            => $site_name,
        'url'             => $site_url,
        'telephone'       => '+' . preg_replace('/[^0-9]/', '', $store_wa),
        'priceRange'      => 'Rp 5.000 - Rp 250.000',
        'address'         => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => $address,
            'addressCountry'  => 'ID',
        ),
        'openingHours'    => 'Mo-Su 07:00-21:00',
        'currenciesAccepted' => 'IDR',
        'paymentAccepted' => 'Cash, QRIS, Transfer Bank, WhatsApp Order',
    );

    echo "\n<script type=\"application/ld+json\">\n";
    echo wp_json_encode($schema_org, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";

    // Schema 2: Product (on single produk)
    if (is_singular('produk')) {
        global $post;
        $harga = ukm_get_field('harga', $post->ID);
        $stok  = ukm_get_field('stok', $post->ID, 10);
        $img_url = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'full') : '';
        $desc = wp_strip_all_tags($post->post_excerpt ?: wp_trim_words($post->post_content, 20));

        $schema_product = array(
            '@context'    => 'https://schema.org/',
            '@type'       => 'Product',
            'name'        => get_the_title(),
            'description' => $desc,
            'image'       => $img_url ? array($img_url) : array(),
            'sku'         => 'UKM-PRD-' . $post->ID,
            'offers'      => array(
                '@type'           => 'Offer',
                'url'             => get_permalink($post->ID),
                'priceCurrency'   => 'IDR',
                'price'           => $harga ? (float)$harga : 10000,
                'priceValidUntil' => date('Y-12-31'),
                'availability'    => ($stok > 0) ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                'itemCondition'   => 'https://schema.org/NewCondition',
            ),
            'aggregateRating' => array(
                '@type'       => 'AggregateRating',
                'ratingValue' => '4.9',
                'reviewCount' => '38',
            ),
        );

        echo "\n<script type=\"application/ld+json\">\n";
        echo wp_json_encode($schema_product, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        echo "\n</script>\n";
    }
}
add_action('wp_head', 'ukm_toko_schema_jsonld', 6);

/**
 * 3. Breadcrumb NavXT & Accessible Native Fallback
 */
function ukm_toko_breadcrumbs() {
    if (is_front_page()) return;

    echo '<nav class="ukm-breadcrumbs" aria-label="Breadcrumb" style="padding:12px 0; font-size:0.875rem; color:#64748b;">';
    echo '<div class="ukm-container" style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">';

    if (function_exists('bcn_display')) {
        bcn_display();
    } else {
        echo '<a href="' . home_url('/') . '" style="color:#10b981; font-weight:600;">Beranda</a>';
        echo '<span style="color:#cbd5e1;">/</span>';

        if (is_singular('produk')) {
            echo '<a href="' . get_post_type_archive_link('produk') . '" style="color:#10b981;">Katalog Produk</a>';
            echo '<span style="color:#cbd5e1;">/</span>';
            echo '<span style="color:#1e293b; font-weight:600;">' . get_the_title() . '</span>';
        } elseif (is_post_type_archive('produk')) {
            echo '<span style="color:#1e293b; font-weight:600;">Katalog Produk</span>';
        } elseif (is_tax('kategori-produk')) {
            echo '<a href="' . get_post_type_archive_link('produk') . '" style="color:#10b981;">Katalog</a>';
            echo '<span style="color:#cbd5e1;">/</span>';
            echo '<span style="color:#1e293b; font-weight:600;">' . single_term_title('', false) . '</span>';
        } elseif (is_page()) {
            echo '<span style="color:#1e293b; font-weight:600;">' . get_the_title() . '</span>';
        } elseif (is_single()) {
            echo '<a href="' . get_permalink(get_option('page_for_posts')) . '" style="color:#10b981;">Blog</a>';
            echo '<span style="color:#cbd5e1;">/</span>';
            echo '<span style="color:#1e293b; font-weight:600;">' . get_the_title() . '</span>';
        } else {
            echo '<span style="color:#1e293b; font-weight:600;">Arsip</span>';
        }
    }

    echo '</div></nav>';
}
