<?php
/**
 * Advanced Custom Fields (ACF) Configuration, Flexible Content, Options Page & Native Fallback
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. ACF Options Page Setup (Requirement 26)
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Pengaturan Toko UKM (Store Settings)', 'ukm-toko-theme'),
        'menu_title'    => __('Store Settings', 'ukm-toko-theme'),
        'menu_slug'     => 'store-settings',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-store',
        'redirect'      => false,
        'position'      => 2
    ));
}

/**
 * 2. Save & Load Points for ACF Local JSON
 */
add_filter('acf/settings/save_json', function($path) {
    return get_template_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
});

/**
 * 3. Register ACF Fields Programmatically
 */
function ukm_toko_register_acf_definitions() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // A. Product Fields (Requirements 18, 19, 20, 21)
    acf_add_local_field_group(array(
        'key' => 'group_produk_details',
        'title' => __('Informasi Lengkap Produk UKM', 'ukm-toko-theme'),
        'fields' => array(
            array(
                'key' => 'field_produk_harga',
                'label' => __('Harga (Rp)', 'ukm-toko-theme'),
                'name' => 'harga',
                'type' => 'number',
                'required' => 1,
                'min' => 0,
            ),
            array(
                'key' => 'field_produk_stok',
                'label' => __('Stok Unit', 'ukm-toko-theme'),
                'name' => 'stok',
                'type' => 'number',
                'required' => 1,
                'default_value' => 50,
            ),
            array(
                'key' => 'field_produk_sku',
                'label' => __('SKU Produk', 'ukm-toko-theme'),
                'name' => 'sku',
                'type' => 'text',
                'default_value' => 'UKM-PRD-01',
            ),
            array(
                'key' => 'field_produk_berat',
                'label' => __('Berat (Gram/Kg)', 'ukm-toko-theme'),
                'name' => 'berat',
                'type' => 'number',
                'default_value' => 1000,
            ),
            array(
                'key' => 'field_produk_satuan',
                'label' => __('Satuan Produk', 'ukm-toko-theme'),
                'name' => 'satuan',
                'type' => 'select',
                'choices' => array(
                    'kg' => 'Kilogram (kg)',
                    'gram' => 'Gram (g)',
                    'liter' => 'Liter (L)',
                    'pcs' => 'Pcs / Buah',
                    'pack' => 'Pack / Bungkus',
                    'dus' => 'Dus / Karton',
                    'botol' => 'Botol',
                    'tube' => 'Tube',
                    'kaleng' => 'Kaleng',
                    'renteng' => 'Renteng',
                    'box' => 'Box',
                ),
                'default_value' => 'pcs',
            ),
            array(
                'key' => 'field_produk_brand',
                'label' => __('Brand / Merk', 'ukm-toko-theme'),
                'name' => 'brand',
                'type' => 'text',
                'default_value' => 'UKM Mitra Bahri',
            ),
            array(
                'key' => 'field_produk_deskripsi_singkat',
                'label' => __('Deskripsi Singkat', 'ukm-toko-theme'),
                'name' => 'deskripsi_singkat',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_produk_gambar_utama',
                'label' => __('Gambar Utama Produk', 'ukm-toko-theme'),
                'name' => 'gambar_utama',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_produk_galeri',
                'label' => __('Gallery Foto Produk (Gallery Field)', 'ukm-toko-theme'),
                'name' => 'gallery',
                'type' => 'gallery',
                'return_format' => 'array',
            ),
            // Requirement 19: ACF Product Group (Product Specifications)
            array(
                'key' => 'field_produk_spesifikasi_group',
                'label' => __('Product Specifications (Group)', 'ukm-toko-theme'),
                'name' => 'spesifikasi',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_spec_berat',
                        'label' => __('Berat', 'ukm-toko-theme'),
                        'name' => 'berat',
                        'type' => 'text',
                        'default_value' => '1 kg',
                    ),
                    array(
                        'key' => 'field_spec_dimensi',
                        'label' => __('Dimensi', 'ukm-toko-theme'),
                        'name' => 'dimensi',
                        'type' => 'text',
                        'default_value' => '25 x 15 x 10 cm',
                    ),
                    array(
                        'key' => 'field_spec_brand',
                        'label' => __('Brand', 'ukm-toko-theme'),
                        'name' => 'brand',
                        'type' => 'text',
                        'default_value' => 'Bahri Original',
                    ),
                    array(
                        'key' => 'field_spec_material',
                        'label' => __('Material', 'ukm-toko-theme'),
                        'name' => 'material',
                        'type' => 'text',
                        'default_value' => 'Bahan Baku Alami',
                    ),
                    array(
                        'key' => 'field_spec_asal_produk',
                        'label' => __('Asal Produk', 'ukm-toko-theme'),
                        'name' => 'asal_produk',
                        'type' => 'text',
                        'default_value' => 'Indonesia (Lokal UKM)',
                    ),
                ),
            ),
            // Requirement 20: Product Variants (Repeater)
            array(
                'key' => 'field_produk_variants_repeater',
                'label' => __('Product Variants (Repeater)', 'ukm-toko-theme'),
                'name' => 'variants',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => __('+ Tambah Varian', 'ukm-toko-theme'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_var_size',
                        'label' => __('Size / Ukuran', 'ukm-toko-theme'),
                        'name' => 'size',
                        'type' => 'text',
                        'default_value' => 'Reguler',
                    ),
                    array(
                        'key' => 'field_var_color',
                        'label' => __('Color / Varian', 'ukm-toko-theme'),
                        'name' => 'color',
                        'type' => 'text',
                        'default_value' => 'Original',
                    ),
                    array(
                        'key' => 'field_var_stock',
                        'label' => __('Stock', 'ukm-toko-theme'),
                        'name' => 'stock',
                        'type' => 'number',
                        'default_value' => 20,
                    ),
                    array(
                        'key' => 'field_var_price',
                        'label' => __('Price (Rp)', 'ukm-toko-theme'),
                        'name' => 'price',
                        'type' => 'number',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'produk',
                ),
            ),
        ),
    ));

    // B. CPT Klien Fields (Requirements 16, 48)
    acf_add_local_field_group(array(
        'key' => 'group_klien_details',
        'title' => __('Informasi Mitra Klien UKM', 'ukm-toko-theme'),
        'fields' => array(
            array(
                'key' => 'field_klien_nama',
                'label' => __('Nama Klien / Toko', 'ukm-toko-theme'),
                'name' => 'nama',
                'type' => 'text',
            ),
            array(
                'key' => 'field_klien_email',
                'label' => __('Email Klien', 'ukm-toko-theme'),
                'name' => 'email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_klien_telepon',
                'label' => __('Telepon / WA', 'ukm-toko-theme'),
                'name' => 'telepon',
                'type' => 'text',
            ),
            array(
                'key' => 'field_klien_lokasi',
                'label' => __('Lokasi / Alamat', 'ukm-toko-theme'),
                'name' => 'lokasi',
                'type' => 'text',
            ),
            array(
                'key' => 'field_klien_foto',
                'label' => __('Foto Klien / Usaha', 'ukm-toko-theme'),
                'name' => 'foto',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'klien',
                ),
            ),
        ),
    ));

    // C. ACF Options Page: Store Settings (Requirement 26)
    acf_add_local_field_group(array(
        'key' => 'group_store_settings',
        'title' => __('Store Settings', 'ukm-toko-theme'),
        'fields' => array(
            array(
                'key' => 'field_store_name',
                'label' => __('Store Name', 'ukm-toko-theme'),
                'name' => 'store_name',
                'type' => 'text',
                'default_value' => 'Toko UKM Sembako Bahri',
            ),
            array(
                'key' => 'field_store_logo',
                'label' => __('Logo Toko', 'ukm-toko-theme'),
                'name' => 'logo',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_store_address',
                'label' => __('Address', 'ukm-toko-theme'),
                'name' => 'address',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Jl. Merdeka No. 45, Bandung',
            ),
            array(
                'key' => 'field_store_email',
                'label' => __('Email Toko', 'ukm-toko-theme'),
                'name' => 'email',
                'type' => 'email',
                'default_value' => 'admin@tokobahri.urmin.my.id',
            ),
            array(
                'key' => 'field_store_phone',
                'label' => __('Phone', 'ukm-toko-theme'),
                'name' => 'phone',
                'type' => 'text',
                'default_value' => '022-87654321',
            ),
            array(
                'key' => 'field_store_whatsapp',
                'label' => __('WhatsApp', 'ukm-toko-theme'),
                'name' => 'whatsapp',
                'type' => 'text',
                'default_value' => '6281234567890',
            ),
            array(
                'key' => 'field_store_opening_hours',
                'label' => __('Opening Hours', 'ukm-toko-theme'),
                'name' => 'opening_hours',
                'type' => 'text',
                'default_value' => 'Senin - Minggu: 07:00 - 21:00 WIB',
            ),
            array(
                'key' => 'field_store_facebook',
                'label' => __('Facebook URL', 'ukm-toko-theme'),
                'name' => 'facebook',
                'type' => 'url',
                'default_value' => 'https://facebook.com/tokobahri',
            ),
            array(
                'key' => 'field_store_instagram',
                'label' => __('Instagram URL', 'ukm-toko-theme'),
                'name' => 'instagram',
                'type' => 'url',
                'default_value' => 'https://instagram.com/tokobahri',
            ),
            array(
                'key' => 'field_store_tiktok',
                'label' => __('TikTok URL', 'ukm-toko-theme'),
                'name' => 'tiktok',
                'type' => 'url',
                'default_value' => 'https://tiktok.com/@tokobahri',
            ),
            array(
                'key' => 'field_store_footer_text',
                'label' => __('Footer Text', 'ukm-toko-theme'),
                'name' => 'footer_text',
                'type' => 'text',
                'default_value' => '© ' . date('Y') . ' Toko UKM Sembako Bahri. Seluruh hak cipta dilindungi.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'store-settings',
                ),
            ),
        ),
    ));

    // D. ACF Flexible Content for Homepage (Requirement 25)
    acf_add_local_field_group(array(
        'key' => 'group_homepage_flexible',
        'title' => __('Homepage Flexible Sections', 'ukm-toko-theme'),
        'fields' => array(
            array(
                'key' => 'field_homepage_sections',
                'label' => __('Homepage Sections (Flexible Content)', 'ukm-toko-theme'),
                'name' => 'homepage_sections',
                'type' => 'flexible_content',
                'button_label' => __('+ Tambah Section Homepage', 'ukm-toko-theme'),
                'layouts' => array(
                    'layout_hero' => array(
                        'key' => 'layout_hero',
                        'name' => 'hero',
                        'label' => __('Hero Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_hero_title', 'label' => 'Headline', 'name' => 'title', 'type' => 'text'),
                            array('key' => 'f_hero_sub', 'label' => 'Subtitle', 'name' => 'subtitle', 'type' => 'textarea'),
                            array('key' => 'f_hero_cta', 'label' => 'CTA Text', 'name' => 'cta_text', 'type' => 'text'),
                            array('key' => 'f_hero_url', 'label' => 'CTA URL', 'name' => 'cta_url', 'type' => 'text'),
                            array('key' => 'f_hero_bg', 'label' => 'Background Image', 'name' => 'bg_image', 'type' => 'image'),
                        ),
                    ),
                    'layout_banner' => array(
                        'key' => 'layout_banner',
                        'name' => 'banner',
                        'label' => __('Banner Promo Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_ban_title', 'label' => 'Promo Title', 'name' => 'title', 'type' => 'text'),
                            array('key' => 'f_ban_desc', 'label' => 'Promo Description', 'name' => 'desc', 'type' => 'text'),
                            array('key' => 'f_ban_img', 'label' => 'Banner Image', 'name' => 'image', 'type' => 'image'),
                        ),
                    ),
                    'layout_products' => array(
                        'key' => 'layout_products',
                        'name' => 'products',
                        'label' => __('Featured Products Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_prod_title', 'label' => 'Section Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Produk Unggulan Sembako'),
                            array('key' => 'f_prod_limit', 'label' => 'Jumlah Produk', 'name' => 'limit', 'type' => 'number', 'default_value' => 8),
                        ),
                    ),
                    'layout_categories' => array(
                        'key' => 'layout_categories',
                        'name' => 'categories',
                        'label' => __('Product Categories Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_cat_title', 'label' => 'Section Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Pilihan Kategori Sembako'),
                        ),
                    ),
                    'layout_about' => array(
                        'key' => 'layout_about',
                        'name' => 'about',
                        'label' => __('About Store Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_abt_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Tentang Toko Bahri'),
                            array('key' => 'f_abt_content', 'label' => 'Content', 'name' => 'content', 'type' => 'wysiwyg'),
                        ),
                    ),
                    'layout_testimonials' => array(
                        'key' => 'layout_testimonials',
                        'name' => 'testimonials',
                        'label' => __('Testimonials Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_tst_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Dipercaya Pelanggan & Mitra Warung'),
                        ),
                    ),
                    'layout_blog' => array(
                        'key' => 'layout_blog',
                        'name' => 'blog',
                        'label' => __('Latest Blog Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_blg_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text', 'default_value' => 'Berita & Tips Terkini'),
                            array('key' => 'f_blg_limit', 'label' => 'Jumlah Artikel', 'name' => 'limit', 'type' => 'number', 'default_value' => 3),
                        ),
                    ),
                    'layout_cta' => array(
                        'key' => 'layout_cta',
                        'name' => 'cta',
                        'label' => __('Call to Action (CTA) Section', 'ukm-toko-theme'),
                        'display' => 'block',
                        'sub_fields' => array(
                            array('key' => 'f_cta_title', 'label' => 'CTA Headline', 'name' => 'title', 'type' => 'text', 'default_value' => 'Butuh Pasokan Sembako untuk Usaha atau Keluarga?'),
                            array('key' => 'f_cta_btn', 'label' => 'Button Text', 'name' => 'button_text', 'type' => 'text', 'default_value' => 'Hubungi via WhatsApp'),
                            array('key' => 'f_cta_url', 'label' => 'Button URL', 'name' => 'button_url', 'type' => 'text'),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'ukm_toko_register_acf_definitions');

/**
 * 4. Helper Function: ukm_get_field (Works with ACF or Post Meta)
 */
function ukm_get_field($field_name, $post_id = false, $default = '') {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    if (function_exists('get_field')) {
        $val = get_field($field_name, $post_id);
        if (!empty($val)) {
            return $val;
        }
    }
    $meta = get_post_meta($post_id, $field_name, true);
    if (!empty($meta)) {
        return $meta;
    }
    return $default;
}

/**
 * 5. Helper Function: ukm_get_option (Works with ACF Options or Theme Mods)
 */
function ukm_get_option($option_name, $default = '') {
    if (function_exists('get_field')) {
        $val = get_field($option_name, 'option');
        if (!empty($val)) {
            return $val;
        }
    }
    return get_theme_mod('ukm_' . $option_name, $default);
}
