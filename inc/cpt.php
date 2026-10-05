<?php
/**
 * Custom Post Types & Taxonomies
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register CPT Produk & Klien, plus Custom Taxonomy
 */
function ukm_toko_register_cpts() {
    // 1. CPT PRODUK (Products)
    $labels_produk = array(
        'name'                  => _x('Produk UKM', 'Post Type General Name', 'ukm-toko'),
        'singular_name'         => _x('Produk', 'Post Type Singular Name', 'ukm-toko'),
        'menu_name'             => __('Katalog Produk', 'ukm-toko'),
        'name_admin_bar'        => __('Produk', 'ukm-toko'),
        'archives'              => __('Arsip Produk', 'ukm-toko'),
        'attributes'            => __('Atribut Produk', 'ukm-toko'),
        'parent_item_colon'     => __('Induk Produk:', 'ukm-toko'),
        'all_items'             => __('Semua Produk', 'ukm-toko'),
        'add_new_item'          => __('Tambah Produk Baru', 'ukm-toko'),
        'add_new'               => __('Tambah Baru', 'ukm-toko'),
        'new_item'              => __('Produk Baru', 'ukm-toko'),
        'edit_item'             => __('Edit Produk', 'ukm-toko'),
        'update_item'           => __('Perbarui Produk', 'ukm-toko'),
        'view_item'             => __('Lihat Produk', 'ukm-toko'),
        'view_items'            => __('Lihat Produk-Produk', 'ukm-toko'),
        'search_items'          => __('Cari Produk', 'ukm-toko'),
        'not_found'             => __('Produk tidak ditemukan', 'ukm-toko'),
        'not_found_in_trash'    => __('Tidak ada produk di kotak sampah', 'ukm-toko'),
        'featured_image'        => __('Foto Produk', 'ukm-toko'),
        'set_featured_image'    => __('Atur Foto Produk', 'ukm-toko'),
        'remove_featured_image' => __('Hapus Foto Produk', 'ukm-toko'),
        'use_featured_image'    => __('Gunakan Foto Ini', 'ukm-toko'),
    );

    $args_produk = array(
        'label'                 => __('Produk', 'ukm-toko'),
        'description'           => __('Katalog produk retail dan sembako UKM', 'ukm-toko'),
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

    // 2. CUSTOM TAXONOMY "kategori-produk"
    $labels_tax = array(
        'name'                       => _x('Kategori Produk', 'Taxonomy General Name', 'ukm-toko'),
        'singular_name'              => _x('Kategori Produk', 'Taxonomy Singular Name', 'ukm-toko'),
        'menu_name'                  => __('Kategori', 'ukm-toko'),
        'all_items'                  => __('Semua Kategori', 'ukm-toko'),
        'parent_item'                => __('Induk Kategori', 'ukm-toko'),
        'parent_item_colon'          => __('Induk Kategori:', 'ukm-toko'),
        'new_item_name'              => __('Nama Kategori Baru', 'ukm-toko'),
        'add_new_item'               => __('Tambah Kategori Baru', 'ukm-toko'),
        'edit_item'                  => __('Edit Kategori', 'ukm-toko'),
        'update_item'                => __('Perbarui Kategori', 'ukm-toko'),
        'view_item'                  => __('Lihat Kategori', 'ukm-toko'),
        'search_items'               => __('Cari Kategori', 'ukm-toko'),
        'not_found'                  => __('Kategori tidak ditemukan', 'ukm-toko'),
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

    // 3. CPT KLIEN (Clients / Mitre UKM)
    $labels_klien = array(
        'name'                  => _x('Klien & Mitra', 'Post Type General Name', 'ukm-toko'),
        'singular_name'         => _x('Klien', 'Post Type Singular Name', 'ukm-toko'),
        'menu_name'             => __('Mitra & Klien', 'ukm-toko'),
        'name_admin_bar'        => __('Klien', 'ukm-toko'),
        'all_items'             => __('Semua Klien', 'ukm-toko'),
        'add_new_item'          => __('Tambah Klien Baru', 'ukm-toko'),
        'add_new'               => __('Tambah Klien', 'ukm-toko'),
        'edit_item'             => __('Edit Klien', 'ukm-toko'),
        'view_item'             => __('Lihat Klien', 'ukm-toko'),
        'search_items'          => __('Cari Klien', 'ukm-toko'),
        'not_found'             => __('Klien tidak ditemukan', 'ukm-toko'),
    );

    $args_klien = array(
        'label'                 => __('Klien', 'ukm-toko'),
        'description'           => __('Daftar mitra toko sembako, warung makan, dan pelanggan grosir', 'ukm-toko'),
        'labels'                => $labels_klien,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
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
add_action('init', 'ukm_toko_register_cpts', 0);

/**
 * Custom Admin Columns for Produk
 */
function ukm_toko_produk_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumb'] = __('Foto', 'ukm-toko');
    $new_columns['title'] = __('Nama Produk', 'ukm-toko');
    $new_columns['taxonomy-kategori-produk'] = __('Kategori', 'ukm-toko');
    $new_columns['harga'] = __('Harga (Rp)', 'ukm-toko');
    $new_columns['stok'] = __('Stok', 'ukm-toko');
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_produk_posts_columns', 'ukm_toko_produk_columns');

function ukm_toko_produk_custom_column($column, $post_id) {
    switch ($column) {
        case 'thumb':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50), array('style' => 'border-radius:6px; object-fit:cover;'));
            } else {
                echo '<span style="color:#94a3b8; font-size:11px;">Tidak ada</span>';
            }
            break;
        case 'harga':
            $harga = get_post_meta($post_id, 'harga', true);
            if (!$harga && function_exists('get_field')) {
                $harga = get_field('harga', $post_id);
            }
            echo $harga ? 'Rp ' . number_format((float)$harga, 0, ',', '.') : '-';
            break;
        case 'stok':
            $stok = get_post_meta($post_id, 'stok', true);
            if (!$stok && function_exists('get_field')) {
                $stok = get_field('stok', $post_id);
            }
            if ($stok === '' || $stok === null) {
                echo '<span style="color:#94a3b8;">-</span>';
            } elseif ((int)$stok > 5) {
                echo '<span style="background:#dcfce7; color:#15803d; padding:2px 8px; border-radius:12px; font-weight:600; font-size:12px;">' . esc_html($stok) . ' Tersedia</span>';
            } elseif ((int)$stok > 0) {
                echo '<span style="background:#fef3c7; color:#b45309; padding:2px 8px; border-radius:12px; font-weight:600; font-size:12px;">' . esc_html($stok) . ' Kritis</span>';
            } else {
                echo '<span style="background:#fee2e2; color:#b91c1c; padding:2px 8px; border-radius:12px; font-weight:600; font-size:12px;">Habis</span>';
            }
            break;
    }
}
add_action('manage_produk_posts_custom_column', 'ukm_toko_produk_custom_column', 10, 2);

/**
 * Custom Admin Columns for Klien
 */
function ukm_toko_klien_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = __('Nama Klien / Mitra', 'ukm-toko');
    $new_columns['telepon'] = __('No. Telepon / WhatsApp', 'ukm-toko');
    $new_columns['email'] = __('Email', 'ukm-toko');
    $new_columns['lokasi'] = __('Lokasi / Alamat', 'ukm-toko');
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_klien_posts_columns', 'ukm_toko_klien_columns');

function ukm_toko_klien_custom_column($column, $post_id) {
    switch ($column) {
        case 'telepon':
            $tel = get_post_meta($post_id, 'telepon', true);
            if (!$tel && function_exists('get_field')) $tel = get_field('telepon', $post_id);
            echo $tel ? esc_html($tel) : '-';
            break;
        case 'email':
            $email = get_post_meta($post_id, 'email', true);
            if (!$email && function_exists('get_field')) $email = get_field('email', $post_id);
            echo $email ? '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>' : '-';
            break;
        case 'lokasi':
            $lokasi = get_post_meta($post_id, 'lokasi', true);
            if (!$lokasi && function_exists('get_field')) $lokasi = get_field('lokasi', $post_id);
            echo $lokasi ? esc_html($lokasi) : '-';
            break;
    }
}
add_action('manage_klien_posts_custom_column', 'ukm_toko_klien_custom_column', 10, 2);
