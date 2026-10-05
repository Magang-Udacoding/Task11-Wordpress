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
