<?php
/**
 * Custom Post Type: Klien (Mitra Warung Kelontong, Warmindo & Katering)
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Register CPT Klien
 */
function ukm_toko_register_cpt_klien() {
    $labels = array(
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

    $args = array(
        'label'                 => __('Klien', 'ukm-toko-theme'),
        'description'           => __('Daftar mitra warung kelontong, rumah makan, katering, dan pelanggan grosir binaan Toko Berkah', 'ukm-toko-theme'),
        'labels'                => $labels,
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

    register_post_type('klien', $args);
}
add_action('init', 'ukm_toko_register_cpt_klien', 0);

/**
 * 2. Custom Admin Columns for Klien
 */
function ukm_toko_klien_columns_def($columns) {
    $new_columns = array();
    foreach ($columns as $key => $title) {
        if ($key === 'date') {
            $new_columns['pic_nama']  = __('Narahubung (PIC)', 'ukm-toko-theme');
            $new_columns['telepon']   = __('WhatsApp / Telepon', 'ukm-toko-theme');
            $new_columns['email']     = __('Email', 'ukm-toko-theme');
            $new_columns['lokasi']    = __('Lokasi / Alamat', 'ukm-toko-theme');
        }
        $new_columns[$key] = $title;
    }
    return $new_columns;
}
add_filter('manage_klien_posts_columns', 'ukm_toko_klien_columns_def');

function ukm_toko_klien_columns_render($column, $post_id) {
    switch ($column) {
        case 'pic_nama':
            $nama = get_post_meta($post_id, 'nama', true);
            echo $nama ? '<strong>' . esc_html($nama) . '</strong>' : '-';
            break;
        case 'telepon':
            $telp = get_post_meta($post_id, 'telepon', true);
            if ($telp) {
                $clean = preg_replace('/[^0-9]/', '', $telp);
                echo '<a href="https://wa.me/' . esc_attr($clean) . '" target="_blank">' . esc_html($telp) . '</a>';
            } else {
                echo '-';
            }
            break;
        case 'email':
            $email = get_post_meta($post_id, 'email', true);
            echo $email ? '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>' : '-';
            break;
        case 'lokasi':
            $lokasi = get_post_meta($post_id, 'lokasi', true);
            echo $lokasi ? esc_html($lokasi) : '-';
            break;
    }
}
add_action('manage_klien_posts_custom_column', 'ukm_toko_klien_columns_render', 10, 2);

