<?php
/**
 * Custom Post Types: Produk & Klien
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register CPT Produk & CPT Klien
 */
function ukm_toko_register_post_types() {
    // 1. CPT PRODUK (Products)
    $labels_produk = array(
        'name'                  => _x('Produk UKM', 'Post Type General Name', 'ukm-toko-theme'),
        'singular_name'         => _x('Produk', 'Post Type Singular Name', 'ukm-toko-theme'),
        'menu_name'             => __('Katalog Produk', 'ukm-toko-theme'),
        'name_admin_bar'        => __('Produk', 'ukm-toko-theme'),
        'archives'              => __('Arsip Produk', 'ukm-toko-theme'),
        'attributes'            => __('Atribut Produk', 'ukm-toko-theme'),
        'parent_item_colon'     => __('Induk Produk:', 'ukm-toko-theme'),
        'all_items'             => __('Semua Produk', 'ukm-toko-theme'),
        'add_new_item'          => __('Tambah Produk Baru', 'ukm-toko-theme'),
        'add_new'               => __('Tambah Baru', 'ukm-toko-theme'),
        'new_item'              => __('Produk Baru', 'ukm-toko-theme'),
        'edit_item'             => __('Edit Produk', 'ukm-toko-theme'),
        'update_item'           => __('Perbarui Produk', 'ukm-toko-theme'),
        'view_item'             => __('Lihat Produk', 'ukm-toko-theme'),
        'view_items'            => __('Lihat Produk-Produk', 'ukm-toko-theme'),
        'search_items'          => __('Cari Produk', 'ukm-toko-theme'),
        'not_found'             => __('Produk tidak ditemukan', 'ukm-toko-theme'),
        'not_found_in_trash'    => __('Tidak ada produk di kotak sampah', 'ukm-toko-theme'),
        'featured_image'        => __('Foto Produk', 'ukm-toko-theme'),
        'set_featured_image'    => __('Atur Foto Produk', 'ukm-toko-theme'),
        'remove_featured_image' => __('Hapus Foto Produk', 'ukm-toko-theme'),
        'use_featured_image'    => __('Gunakan Foto Ini', 'ukm-toko-theme'),
    );

    $args_produk = array(
        'label'                 => __('Produk', 'ukm-toko-theme'),
        'description'           => __('Katalog produk retail dan sembako UKM', 'ukm-toko-theme'),
        'labels'                => $labels_produk,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'taxonomies'            => array('kategori-produk'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-cart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'produk',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'produk', 'with_front' => false),
    );
    register_post_type('produk', $args_produk);

    // 2. CPT KLIEN (Clients / Mitra UKM)
    $labels_klien = array(
        'name'                  => _x('Klien & Mitra', 'Post Type General Name', 'ukm-toko-theme'),
        'singular_name'         => _x('Klien', 'Post Type Singular Name', 'ukm-toko-theme'),
        'menu_name'             => __('Mitra & Klien', 'ukm-toko-theme'),
        'name_admin_bar'        => __('Klien', 'ukm-toko-theme'),
        'all_items'             => __('Semua Klien', 'ukm-toko-theme'),
        'add_new_item'          => __('Tambah Klien Baru', 'ukm-toko-theme'),
        'add_new'               => __('Tambah Klien', 'ukm-toko-theme'),
        'edit_item'             => __('Edit Klien', 'ukm-toko-theme'),
        'view_item'             => __('Lihat Klien', 'ukm-toko-theme'),
        'search_items'          => __('Cari Klien', 'ukm-toko-theme'),
        'not_found'             => __('Klien tidak ditemukan', 'ukm-toko-theme'),
    );

    $args_klien = array(
        'label'                 => __('Klien', 'ukm-toko-theme'),
        'description'           => __('Daftar mitra toko sembako, warung makan, dan pelanggan grosir', 'ukm-toko-theme'),
        'labels'                => $labels_klien,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-businessperson',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'klien',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'klien', 'with_front' => false),
    );
    register_post_type('klien', $args_klien);
}
add_action('init', 'ukm_toko_register_post_types', 0);

/**
 * Custom Admin Columns for Produk
 */
function ukm_toko_produk_custom_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $title) {
        if ($key === 'date') {
            $new_columns['foto_produk'] = __('Foto', 'ukm-toko-theme');
            $new_columns['harga']       = __('Harga', 'ukm-toko-theme');
            $new_columns['stok']        = __('Stok', 'ukm-toko-theme');
            $new_columns['kategori']    = __('Kategori', 'ukm-toko-theme');
        }
        $new_columns[$key] = $title;
    }
    return $new_columns;
}
add_filter('manage_produk_posts_columns', 'ukm_toko_produk_custom_columns');

function ukm_toko_produk_custom_column_data($column, $post_id) {
    switch ($column) {
        case 'foto_produk':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(45, 45), array('style' => 'border-radius:6px; object-fit:cover;'));
            } else {
                echo '<span style="font-size:24px;">📦</span>';
            }
            break;
        case 'harga':
            $harga = get_post_meta($post_id, 'harga', true);
            $satuan = get_post_meta($post_id, 'satuan', true) ?: 'pcs';
            echo $harga ? '<strong>' . esc_html(ukm_rupiah($harga)) . '</strong> <small>/' . esc_html($satuan) . '</small>' : '-';
            break;
        case 'stok':
            $stok = get_post_meta($post_id, 'stok', true);
            if ($stok > 0) {
                echo '<span style="color:#059669; font-weight:600;">' . esc_html($stok) . ' ready</span>';
            } else {
                echo '<span style="color:#dc2626; font-weight:600;">Habis</span>';
            }
            break;
        case 'kategori':
            $terms = get_the_term_list($post_id, 'kategori-produk', '', ', ', '');
            echo $terms ?: '-';
            break;
    }
}
add_action('manage_produk_posts_custom_column', 'ukm_toko_produk_custom_column_data', 10, 2);
