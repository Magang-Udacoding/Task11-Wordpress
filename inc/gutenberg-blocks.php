<?php
/**
 * Custom Gutenberg Blocks Registration & Server-side Rendering
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Gutenberg Block Category
 */
function ukm_toko_block_categories($categories, $post) {
    return array_merge(
        array(
            array(
                'slug'  => 'ukm-toko-blocks',
                'title' => __('Blok UKM Toko', 'ukm-toko'),
                'icon'  => 'store',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'ukm_toko_block_categories', 10, 2);

/**
 * Register the 3 Custom Blocks
 */
function ukm_toko_register_blocks() {
    // 1. Block Hero Banner
    register_block_type('ukm-toko/hero-banner', array(
        'api_version'     => 2,
        'title'           => __('UKM Hero Banner', 'ukm-toko'),
        'description'     => __('Banner utama dengan judul, deskripsi, CTA WhatsApp/Belanja, dan background', 'ukm-toko'),
        'category'        => 'ukm-toko-blocks',
        'icon'            => 'cover-image',
        'attributes'      => array(
            'title'       => array('type' => 'string', 'default' => 'Sembako Segar & Hemat untuk Kebutuhan Sehari-hari'),
            'subtitle'    => array('type' => 'string', 'default' => 'Penyedia sembako terlengkap dengan harga grosir langsung ke rumah Anda.'),
            'buttonText'  => array('type' => 'string', 'default' => 'Lihat Katalog Produk'),
            'buttonUrl'   => array('type' => 'string', 'default' => '#katalog'),
            'waText'      => array('type' => 'string', 'default' => 'Pesan via WhatsApp'),
            'bgGradient'  => array('type' => 'string', 'default' => 'linear-gradient(135deg, #059669 0%, #0f172a 100%)'),
        ),
        'render_callback' => 'ukm_toko_render_hero_banner_block',
    ));

    // 2. Block Product Grid
    register_block_type('ukm-toko/product-grid', array(
        'api_version'     => 2,
        'title'           => __('UKM Product Grid', 'ukm-toko'),
        'description'     => __('Grid katalog produk responsif dengan filter dan badge harga/stok', 'ukm-toko'),
        'category'        => 'ukm-toko-blocks',
        'icon'            => 'grid-view',
        'attributes'      => array(
            'postsPerPage'=> array('type' => 'number', 'default' => 8),
            'columns'     => array('type' => 'number', 'default' => 4),
            'category'    => array('type' => 'string', 'default' => ''),
        ),
        'render_callback' => 'ukm_toko_render_product_grid_block',
    ));

    // 3. Block Testimonial Slider
    register_block_type('ukm-toko/testimonial-slider', array(
        'api_version'     => 2,
        'title'           => __('UKM Testimonial Slider', 'ukm-toko'),
        'description'     => __('Slider testimoni kepuasan pelanggan warung dan toko mitra', 'ukm-toko'),
        'category'        => 'ukm-toko-blocks',
        'icon'            => 'format-quote',
        'attributes'      => array(
            'title'       => array('type' => 'string', 'default' => 'Dipercaya Puluhan Warung & Keluarga'),
        ),
        'render_callback' => 'ukm_toko_render_testimonial_block',
    ));
}
add_action('init', 'ukm_toko_register_blocks');

/**
 * Render Callbacks for Gutenberg Blocks
 */
function ukm_toko_render_hero_banner_block($attributes) {
    $title      = !empty($attributes['title']) ? esc_html($attributes['title']) : 'Sembako Segar & Hemat';
    $subtitle   = !empty($attributes['subtitle']) ? esc_html($attributes['subtitle']) : 'Pilihan terbaik untuk rumah tangga & UMKM.';
    $btn_text   = !empty($attributes['buttonText']) ? esc_html($attributes['buttonText']) : 'Belanja Sekarang';
    $btn_url    = !empty($attributes['buttonUrl']) ? esc_url($attributes['buttonUrl']) : '#katalog';
    $wa_number  = get_theme_mod('ukm_wa_number', '6281234567890');
    $wa_url     = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $wa_number) . '?text=' . rawurlencode('Halo Admin Toko Bahri, saya ingin memesan sembako.');

    ob_start();
    ?>
    <section class="ukm-hero-banner" style="background: linear-gradient(135deg, #065f46 0%, #0f172a 100%); color:#fff; padding: 70px 20px; border-radius: var(--ukm-radius-lg); margin-bottom: 40px; position:relative; overflow:hidden;">
        <div style="max-width:800px; margin:0 auto; text-align:center;">
            <span class="ukm-badge" style="background:rgba(255,255,255,0.2); color:#fff; margin-bottom:15px;">🌟 TOKO SEMBAKO & RETAIL UKM TERPERCAYA</span>
            <h1 style="font-size: clamp(2rem, 4vw, 3.2rem); font-weight:800; line-height:1.2; margin-bottom:18px; letter-spacing:-0.02em;"><?php echo $title; ?></h1>
            <p style="font-size: 1.15rem; color:#d1fae5; margin-bottom:30px; line-height:1.6;"><?php echo $subtitle; ?></p>
            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                <a href="<?php echo $btn_url; ?>" class="ukm-btn ukm-btn-accent" style="padding:12px 28px; font-size:1.05rem;">
                    🛍️ <?php echo $btn_text; ?>
                </a>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="ukm-btn ukm-btn-wa" style="padding:12px 28px; font-size:1.05rem;">
                    💬 Pesan Cepat via WA
                </a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function ukm_toko_render_product_grid_block($attributes) {
    $count = !empty($attributes['postsPerPage']) ? intval($attributes['postsPerPage']) : 8;
    $query = new WP_Query(array(
        'post_type'      => 'produk',
        'posts_per_page' => $count,
        'post_status'    => 'publish',
    ));

    ob_start();
    if ($query->have_posts()) :
        echo '<div class="ukm-product-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap:24px; margin:30px 0;">';
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content', 'produk');
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p style="text-align:center; padding:30px; color:#64748b;">Belum ada produk yang dipublikasikan.</p>';
    endif;
    return ob_get_clean();
}

function ukm_toko_render_testimonial_block($attributes) {
    $title = !empty($attributes['title']) ? esc_html($attributes['title']) : 'Kata Pelanggan Setia';
    
    // Query CPT Klien
    $query = new WP_Query(array(
        'post_type'      => 'klien',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
    ));

    ob_start();
    ?>
    <section class="ukm-testimonial-section" style="padding: 40px 0;">
        <h2 style="text-align:center; font-size:1.8rem; font-weight:700; margin-bottom:25px;"><?php echo $title; ?></h2>
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
                $lokasi = ukm_get_field('lokasi');
                $testimoni = ukm_get_field('testimoni_klien') ?: get_the_excerpt();
            ?>
                <div style="background:#fff; border-radius:var(--ukm-radius); padding:24px; box-shadow:var(--ukm-shadow-sm); border:1px solid var(--ukm-gray-200);">
                    <div style="color:#f59e0b; margin-bottom:10px;">★★★★★</div>
                    <p style="font-style:italic; color:#334155; margin-bottom:15px; font-size:0.95rem;">"<?php echo esc_html($testimoni); ?>"</p>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:40px; height:40px; border-radius:50%; background:var(--ukm-primary-light); color:var(--ukm-primary-dark); display:flex; align-items:center; justify-content:center; font-weight:700;">
                            <?php echo strtoupper(substr(get_the_title(), 0, 1)); ?>
                        </div>
                        <div>
                            <strong style="display:block; font-size:0.95rem;"><?php the_title(); ?></strong>
                            <small style="color:#64748b;"><?php echo esc_html($lokasi ?: 'Mitra UKM'); ?></small>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); else : ?>
                <div style="background:#fff; padding:20px; border-radius:12px; border:1px solid #e2e8f0;">
                    <p>"Harga sembako sangat bersaing dan pengiriman selalu tepat waktu ke warung saya."</p>
                    <strong>Toko Sembako Bu RT</strong> - Bandung Barat
                </div>
                <div style="background:#fff; padding:20px; border-radius:12px; border:1px solid #e2e8f0;">
                    <p>"Beras dan minyak kualitas bagus, langganan tetap setiap minggu!"</p>
                    <strong>Warung Makan Pak Slamet</strong> - Cimahi
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
