<?php
/**
 * Custom Taxonomy: kategori-produk
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Taxonomy kategori-produk for CPT Produk
 */
function ukm_toko_register_taxonomies() {
    $labels_tax = array(
        'name'                       => _x('Kategori Produk', 'Taxonomy General Name', 'ukm-toko-theme'),
        'singular_name'              => _x('Kategori Produk', 'Taxonomy Singular Name', 'ukm-toko-theme'),
        'menu_name'                  => __('Kategori', 'ukm-toko-theme'),
        'all_items'                  => __('Semua Kategori', 'ukm-toko-theme'),
        'parent_item'                => __('Induk Kategori', 'ukm-toko-theme'),
        'parent_item_colon'          => __('Induk Kategori:', 'ukm-toko-theme'),
        'new_item_name'              => __('Nama Kategori Baru', 'ukm-toko-theme'),
        'add_new_item'               => __('Tambah Kategori Baru', 'ukm-toko-theme'),
        'edit_item'                  => __('Edit Kategori', 'ukm-toko-theme'),
        'update_item'                => __('Perbarui Kategori', 'ukm-toko-theme'),
        'view_item'                  => __('Lihat Kategori', 'ukm-toko-theme'),
        'search_items'               => __('Cari Kategori', 'ukm-toko-theme'),
        'not_found'                  => __('Kategori tidak ditemukan', 'ukm-toko-theme'),
    );

    $args_tax = array(
        'labels'                     => $labels_tax,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'kategori-produk', 'with_front' => false, 'hierarchical' => true),
    );
    register_taxonomy('kategori-produk', array('produk'), $args_tax);
}
add_action('init', 'ukm_toko_register_taxonomies', 0);

/**
 * Seed Default Product Categories (Sembako, Minuman, Kebersihan, Snack)
 */
function ukm_toko_seed_default_categories() {
    $defaults = array(
        'Sembako'    => 'sembako',
        'Minuman'    => 'minuman',
        'Kebersihan' => 'kebersihan',
        'Snack'      => 'snack',
    );
    foreach ($defaults as $name => $slug) {
        if (!term_exists($slug, 'kategori-produk')) {
            wp_insert_term($name, 'kategori-produk', array('slug' => $slug));
        }
    }
}
add_action('init', 'ukm_toko_seed_default_categories', 1);

/**
 * Normalisasi dan terjemahkan nama kategori ke Bahasa Indonesia yang baku.
 */
function ukm_get_term_display_name( $name, $slug = '' ) {
    $dict = array(
        'accessoires'        => 'Aksesoris',
        'accessories'        => 'Aksesoris',
        'accessory'          => 'Aksesoris',
        'ordinateurs'        => 'Komputer & Laptop',
        'ordinateur'         => 'Komputer & Laptop',
        'computers'          => 'Komputer & Laptop',
        'montres-connectees' => 'Smartwatch',
        'montres connectees' => 'Smartwatch',
        'smartwatch'         => 'Smartwatch',
        'smartwatches'       => 'Smartwatch',
        'smartphones'        => 'Smartphone',
        'smartphone'         => 'Smartphone',
        'phones'             => 'Smartphone',
        'gaming'             => 'Gaming',
        'audio'              => 'Audio',
        'sembako'            => 'Sembako',
        'minuman'            => 'Minuman',
        'kebersihan'         => 'Kebersihan',
        'snack'              => 'Camilan & Snack',
        'uncategorized'      => 'Tanpa Kategori',
    );

    $s = strtolower( trim( (string)$slug ) );
    if ( ! empty( $s ) && isset( $dict[ $s ] ) ) {
        return $dict[ $s ];
    }

    $n = strtolower( trim( (string)$name ) );
    if ( ! empty( $n ) && isset( $dict[ $n ] ) ) {
        return $dict[ $n ];
    }

    // Penanganan kata parsial atau karakter encoding asing
    if ( stripos( $name, 'accessoire' ) !== false ) {
        return 'Aksesoris';
    }
    if ( stripos( $name, 'ordinateur' ) !== false ) {
        return 'Komputer & Laptop';
    }
    if ( stripos( $name, 'montre' ) !== false ) {
        return 'Smartwatch';
    }
    if ( stripos( $name, 'smartphone' ) !== false ) {
        return 'Smartphone';
    }

    return $name;
}

/**
 * Filter otomatis get_term agar objek kategori-produk selalu berbahasa Indonesia
 */
function ukm_translate_term_object( $term, $taxonomy = '' ) {
    if ( is_object( $term ) && ( empty( $taxonomy ) || $taxonomy === 'kategori-produk' ) ) {
        if ( isset( $term->taxonomy ) && $term->taxonomy === 'kategori-produk' ) {
            $term->name = ukm_get_term_display_name( $term->name, $term->slug );
        }
    }
    return $term;
}
add_filter( 'get_term', 'ukm_translate_term_object', 10, 2 );

/**
 * Filter judul arsip kategori agar selalu berbahasa Indonesia
 */
function ukm_translate_single_term_title( $title ) {
    return ukm_get_term_display_name( $title );
}
add_filter( 'single_term_title', 'ukm_translate_single_term_title' );

/**
 * Auto-sinkronisasi nama kategori di database ke Bahasa Indonesia
 */
function ukm_toko_sync_indonesian_category_names() {
    $map = array(
        'accessoires'        => 'Aksesoris',
        'accessories'        => 'Aksesoris',
        'ordinateurs'        => 'Komputer & Laptop',
        'computers'          => 'Komputer & Laptop',
        'montres-connectees' => 'Smartwatch',
        'smartphones'        => 'Smartphone',
        'snack'              => 'Camilan & Snack',
        'kebersihan'         => 'Kebersihan',
        'minuman'            => 'Minuman',
        'sembako'            => 'Sembako',
        'audio'              => 'Audio',
        'gaming'             => 'Gaming',
    );
    foreach ( $map as $slug => $indo_name ) {
        $term = get_term_by( 'slug', $slug, 'kategori-produk' );
        if ( $term && ! is_wp_error( $term ) && $term->name !== $indo_name ) {
            wp_update_term( $term->term_id, 'kategori-produk', array(
                'name' => $indo_name,
            ) );
        }
    }
}
add_action( 'init', 'ukm_toko_sync_indonesian_category_names', 2 );

