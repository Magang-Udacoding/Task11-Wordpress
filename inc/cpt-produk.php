<?php
/**
 * Custom Post Type: Produk (Katalog Sembako & Retail UKM)
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Register CPT Produk
 */
function ukm_toko_register_cpt_produk() {
    $labels = array(
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

    $args = array(
        'label'                 => __('Produk', 'ukm-toko-theme'),
        'description'           => __('Katalog produk retail dan sembako Toko Berkah', 'ukm-toko-theme'),
        'labels'                => $labels,
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

    register_post_type('produk', $args);
}
add_action('init', 'ukm_toko_register_cpt_produk', 0);

/**
 * 2. Custom Admin Columns for Produk
 */
function ukm_toko_produk_columns_def($columns) {
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
add_filter('manage_produk_posts_columns', 'ukm_toko_produk_columns_def');

function ukm_toko_produk_columns_render($column, $post_id) {
    switch ($column) {
        case 'foto_produk':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(45, 45), array('style' => 'border-radius:6px; object-fit:cover;'));
            } else {
                $img_url = function_exists('ukm_get_product_photo_url') ? ukm_get_product_photo_url($post_id) : '';
                if ($img_url) {
                    echo '<img src="' . esc_url($img_url) . '" style="width:45px; height:45px; border-radius:6px; object-fit:cover;" />';
                } else {
                    echo '<span style="display:inline-flex;align-items:center;justify-content:center;width:45px;height:45px;background:#f1f5f9;border-radius:6px;color:#64748b;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg></span>';
                }
            }
            break;
        case 'harga':
            $harga = get_post_meta($post_id, 'harga', true);
            $satuan = get_post_meta($post_id, 'satuan', true) ?: 'pcs';
            echo $harga ? '<strong>' . esc_html(function_exists('ukm_rupiah') ? ukm_rupiah($harga) : 'Rp ' . number_format((float)$harga,0,',','.')) . '</strong> <small>/' . esc_html($satuan) . '</small>' : '-';
            break;
        case 'stok':
            $stok = get_post_meta($post_id, 'stok', true);
            if ($stok !== '' && (int)$stok > 0) {
                echo '<span style="color:#16a34a; font-weight:600;">' . esc_html($stok) . ' ready</span>';
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
add_action('manage_produk_posts_custom_column', 'ukm_toko_produk_columns_render', 10, 2);

