<?php
/**
 * Advanced Custom Fields (ACF) Configuration & Fallbacks
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. ACF Options Page Setup
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Pengaturan Toko UKM', 'ukm-toko'),
        'menu_title'    => __('Info Toko UKM', 'ukm-toko'),
        'menu_slug'     => 'toko-general-settings',
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
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

/**
 * 3. Register ACF Fields Programmatically via PHP
 */
function ukm_toko_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Group 1: Fields Produk UKM (Harga, Stok, Specs Group, Repeater Varian, Galeri)
    acf_add_local_field_group(array(
        'key' => 'group_produk_details',
        'title' => __('Informasi Lengkap Produk', 'ukm-toko'),
        'fields' => array(
            array(
                'key' => 'field_produk_harga',
                'label' => __('Harga Produk (Rp)', 'ukm-toko'),
                'name' => 'harga',
                'type' => 'number',
                'instructions' => __('Masukkan nominal harga dalam Rupiah (misal: 75000)', 'ukm-toko'),
                'required' => 1,
                'min' => 0,
            ),
            array(
                'key' => 'field_produk_harga_coret',
                'label' => __('Harga Coret / Normal (Rp)', 'ukm-toko'),
                'name' => 'harga_coret',
                'type' => 'number',
                'instructions' => __('Opsional, untuk menampilkan diskon', 'ukm-toko'),
                'min' => 0,
            ),
            array(
                'key' => 'field_produk_stok',
                'label' => __('Jumlah Stok Tersedia', 'ukm-toko'),
                'name' => 'stok',
                'type' => 'number',
                'instructions' => __('Jumlah stok unit yang ada', 'ukm-toko'),
                'required' => 1,
                'default_value' => 50,
            ),
            array(
                'key' => 'field_produk_satuan',
                'label' => __('Satuan Produk', 'ukm-toko'),
                'name' => 'satuan',
                'type' => 'select',
                'choices' => array(
                    'kg' => 'Kilogram (Kg)',
                    'gram' => 'Gram (g)',
                    'liter' => 'Liter (L)',
                    'pcs' => 'Pcs / Buah',
                    'pack' => 'Pack / Bungkus',
                    'dus' => 'Dus / Karton',
                    'botol' => 'Botol',
                ),
                'default_value' => 'pcs',
            ),
            // Item 16: Group field untuk produk specs
            array(
                'key' => 'field_produk_specs_group',
                'label' => __('Spesifikasi Produk (Group Specs)', 'ukm-toko'),
                'name' => 'spesifikasi',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_spec_berat',
                        'label' => __('Berat Bersih', 'ukm-toko'),
                        'name' => 'berat_bersih',
                        'type' => 'text',
                        'default_value' => '5 kg',
                    ),
                    array(
                        'key' => 'field_spec_dimensi',
                        'label' => __('Dimensi Kemasan', 'ukm-toko'),
                        'name' => 'dimensi',
                        'type' => 'text',
                        'default_value' => '30 x 20 x 10 cm',
                    ),
                    array(
                        'key' => 'field_spec_produsen',
                        'label' => __('Produsen / Merk', 'ukm-toko'),
                        'name' => 'produsen',
                        'type' => 'text',
                        'default_value' => 'UKM Lokal Berdaya',
                    ),
                    array(
                        'key' => 'field_spec_kadaluarsa',
                        'label' => __('Masa Simpan / Kadaluarsa', 'ukm-toko'),
                        'name' => 'masa_kadaluarsa',
                        'type' => 'text',
                        'default_value' => '12 Bulan',
                    ),
                    array(
                        'key' => 'field_spec_izin',
                        'label' => __('Sertifikasi / Izin P-IRT / BPOM / Halal', 'ukm-toko'),
                        'name' => 'sertifikasi',
                        'type' => 'text',
                        'default_value' => 'Halal ID32110000 / P-IRT Ready',
                    ),
                ),
            ),
            // Item 17: Repeater field: Product variants (size/color)
            array(
                'key' => 'field_produk_variants_repeater',
                'label' => __('Varian Produk (Repeater Variants)', 'ukm-toko'),
                'name' => 'varian_produk',
                'type' => 'repeater',
                'instructions' => __('Tambahkan varian ukuran, aroma, atau kemasan', 'ukm-toko'),
                'layout' => 'table',
                'button_label' => __('+ Tambah Varian', 'ukm-toko'),
                'sub_fields' => array(
                    array(
                        'key' => 'field_var_nama',
                        'label' => __('Nama Varian', 'ukm-toko'),
                        'name' => 'nama_varian',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_var_harga',
                        'label' => __('Harga Varian (Rp)', 'ukm-toko'),
                        'name' => 'harga_varian',
                        'type' => 'number',
                    ),
                    array(
                        'key' => 'field_var_stok',
                        'label' => __('Stok Varian', 'ukm-toko'),
                        'name' => 'stok_varian',
                        'type' => 'number',
                        'default_value' => 10,
                    ),
                ),
            ),
            // Item 18: Gallery field: Multiple product images
            array(
                'key' => 'field_produk_galeri',
                'label' => __('Galeri Foto Produk (Multiple Images)', 'ukm-toko'),
                'name' => 'galeri_produk',
                'type' => 'gallery',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'insert' => 'append',
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
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Group 2: Fields CPT Klien / Mitra
    acf_add_local_field_group(array(
        'key' => 'group_klien_details',
        'title' => __('Informasi Mitra & Klien', 'ukm-toko'),
        'fields' => array(
            array(
                'key' => 'field_klien_instansi',
                'label' => __('Nama Usaha / Toko / Instansi', 'ukm-toko'),
                'name' => 'nama_instansi',
                'type' => 'text',
            ),
            array(
                'key' => 'field_klien_telepon',
                'label' => __('No. Telepon / WhatsApp', 'ukm-toko'),
                'name' => 'telepon',
                'type' => 'text',
            ),
            array(
                'key' => 'field_klien_email',
                'label' => __('Email Kontak', 'ukm-toko'),
                'name' => 'email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_klien_lokasi',
                'label' => __('Lokasi / Alamat Lengkap', 'ukm-toko'),
                'name' => 'lokasi',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_klien_testimoni',
                'label' => __('Kata Testimoni / Pengalaman Belanja', 'ukm-toko'),
                'name' => 'testimoni_klien',
                'type' => 'textarea',
                'rows' => 3,
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

    // Group 3: Options Page Fields (Store Info & Contact)
    acf_add_local_field_group(array(
        'key' => 'group_options_toko',
        'title' => __('Kontak & Profil Toko UKM', 'ukm-toko'),
        'fields' => array(
            array(
                'key' => 'field_opt_nama_toko',
                'label' => __('Nama Toko UKM', 'ukm-toko'),
                'name' => 'nama_toko',
                'type' => 'text',
                'default_value' => 'Toko UKM Sembako Bahri',
            ),
            array(
                'key' => 'field_opt_wa',
                'label' => __('Nomor WhatsApp Admin (Format 628xxx)', 'ukm-toko'),
                'name' => 'whatsapp_admin',
                'type' => 'text',
                'default_value' => '6281234567890',
            ),
            array(
                'key' => 'field_opt_alamat',
                'label' => __('Alamat Fisik Toko', 'ukm-toko'),
                'name' => 'alamat_toko',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Jl. Merdeka No. 45, Sentra Kuliner & Retail UKM, Kota Bandung',
            ),
            array(
                'key' => 'field_opt_jam',
                'label' => __('Jam Operasional', 'ukm-toko'),
                'name' => 'jam_operasional',
                'type' => 'text',
                'default_value' => 'Senin - Minggu: 07:00 - 21:00 WIB',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'toko-general-settings',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'ukm_toko_register_acf_fields');

/**
 * 4. Native WordPress Meta Box Fallback (When ACF plugin is not installed)
 */
function ukm_toko_register_native_meta_boxes() {
    add_meta_box(
        'ukm_toko_produk_meta',
        __('Data Detail Produk (Fallback Meta)', 'ukm-toko'),
        'ukm_toko_render_produk_meta_box',
        'produk',
        'normal',
        'high'
    );

    add_meta_box(
        'ukm_toko_klien_meta',
        __('Data Kontak Klien (Fallback Meta)', 'ukm-toko'),
        'ukm_toko_render_klien_meta_box',
        'klien',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ukm_toko_register_native_meta_boxes');

function ukm_toko_render_produk_meta_box($post) {
    wp_nonce_field('ukm_toko_save_meta', 'ukm_toko_meta_nonce');
    $harga = get_post_meta($post->ID, 'harga', true);
    $harga_coret = get_post_meta($post->ID, 'harga_coret', true);
    $stok = get_post_meta($post->ID, 'stok', true);
    $satuan = get_post_meta($post->ID, 'satuan', true) ?: 'pcs';
    $berat = get_post_meta($post->ID, 'berat_bersih', true) ?: '1 kg';
    $dimensi = get_post_meta($post->ID, 'dimensi', true) ?: '20x10x5 cm';
    $kadaluarsa = get_post_meta($post->ID, 'masa_kadaluarsa', true) ?: '12 Bulan';
    ?>
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; padding:10px 0;">
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Harga (Rp):</label>
            <input type="number" name="harga" value="<?php echo esc_attr($harga); ?>" style="width:100%;" placeholder="contoh: 75000">
        </div>
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Harga Coret (Rp):</label>
            <input type="number" name="harga_coret" value="<?php echo esc_attr($harga_coret); ?>" style="width:100%;" placeholder="contoh: 80000">
        </div>
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Stok Tersedia:</label>
            <input type="number" name="stok" value="<?php echo esc_attr($stok); ?>" style="width:100%;" placeholder="contoh: 50">
        </div>
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Satuan:</label>
            <input type="text" name="satuan" value="<?php echo esc_attr($satuan); ?>" style="width:100%;" placeholder="kg, liter, pcs">
        </div>
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Berat Bersih:</label>
            <input type="text" name="berat_bersih" value="<?php echo esc_attr($berat); ?>" style="width:100%;">
        </div>
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Masa Kadaluarsa:</label>
            <input type="text" name="masa_kadaluarsa" value="<?php echo esc_attr($kadaluarsa); ?>" style="width:100%;">
        </div>
    </div>
    <?php
}

function ukm_toko_render_klien_meta_box($post) {
    wp_nonce_field('ukm_toko_save_meta', 'ukm_toko_meta_nonce');
    $telepon = get_post_meta($post->ID, 'telepon', true);
    $email = get_post_meta($post->ID, 'email', true);
    $lokasi = get_post_meta($post->ID, 'lokasi', true);
    $testimoni = get_post_meta($post->ID, 'testimoni_klien', true);
    ?>
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; padding:10px 0;">
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Telepon / WhatsApp:</label>
            <input type="text" name="telepon" value="<?php echo esc_attr($telepon); ?>" style="width:100%;">
        </div>
        <div>
            <label style="font-weight:600; display:block; margin-bottom:4px;">Email:</label>
            <input type="email" name="email" value="<?php echo esc_attr($email); ?>" style="width:100%;">
        </div>
        <div style="grid-column: span 2;">
            <label style="font-weight:600; display:block; margin-bottom:4px;">Lokasi / Alamat:</label>
            <textarea name="lokasi" rows="2" style="width:100%;"><?php echo esc_textarea($lokasi); ?></textarea>
        </div>
        <div style="grid-column: span 2;">
            <label style="font-weight:600; display:block; margin-bottom:4px;">Testimoni:</label>
            <textarea name="testimoni_klien" rows="2" style="width:100%;"><?php echo esc_textarea($testimoni); ?></textarea>
        </div>
    </div>
    <?php
}

function ukm_toko_save_meta_box_data($post_id) {
    if (!isset($_POST['ukm_toko_meta_nonce']) || !wp_verify_nonce($_POST['ukm_toko_meta_nonce'], 'ukm_toko_save_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array('harga', 'harga_coret', 'stok', 'satuan', 'berat_bersih', 'dimensi', 'masa_kadaluarsa', 'telepon', 'email', 'lokasi', 'testimoni_klien');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'ukm_toko_save_meta_box_data');

/**
 * Universal helper to get product meta seamlessly (supports ACF & standard post_meta)
 */
function ukm_get_field($field_name, $post_id = false, $default = '') {
    if (!$post_id) $post_id = get_the_ID();
    
    // Check ACF get_field first if available
    if (function_exists('get_field')) {
        $val = get_field($field_name, $post_id);
        if (!empty($val)) return $val;
    }
    
    // Fallback to standard get_post_meta
    $val = get_post_meta($post_id, $field_name, true);
    if (!empty($val)) return $val;

    // Check options if requested
    if ($post_id === 'options' && function_exists('get_field')) {
        $opt = get_field($field_name, 'option');
        if (!empty($opt)) return $opt;
    }

    return $default;
}

