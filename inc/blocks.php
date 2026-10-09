<?php
/**
 * Custom Gutenberg Blocks Registration & Server-Side Rendering
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Register Gutenberg Block Category
 */
function ukm_toko_register_block_categories($categories, $post) {
    return array_merge(
        array(
            array(
                'slug'  => 'ukm-toko-blocks',
                'title' => __('Blok UKM Toko', 'ukm-toko-theme'),
                'icon'  => 'store',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'ukm_toko_register_block_categories', 10, 2);

/**
 * 2. Register the 3 Custom Gutenberg Blocks (Requirement 27 & 28)
 */
function ukm_toko_register_all_blocks() {
    // Block 1 â€” Hero Banner
    register_block_type('ukm-toko/hero-banner', array(
        'api_version'     => 2,
        'title'           => __('Hero Banner UKM', 'ukm-toko-theme'),
        'description'     => __('Banner hero modern dengan Title, Subtitle, CTA Text, CTA URL, dan Background Image', 'ukm-toko-theme'),
        'category'        => 'ukm-toko-blocks',
        'icon'            => 'cover-image',
        'attributes'      => array(
            'title'       => array('type' => 'string', 'default' => 'Sembako Segar & Murah Langsung dari Gudang'),
            'subtitle'    => array('type' => 'string', 'default' => 'Beras pulen, minyak goreng, dan sembako lengkap siap antar same-day.'),
            'ctaText'     => array('type' => 'string', 'default' => 'Belanja Katalog Sekarang'),
            'ctaUrl'      => array('type' => 'string', 'default' => '/produk/'),
            'bgImage'     => array('type' => 'string', 'default' => ''),
        ),
        'render_callback' => 'ukm_toko_render_hero_banner_block',
    ));

    // Block 2 â€” Product Grid
    register_block_type('ukm-toko/product-grid', array(
        'api_version'     => 2,
        'title'           => __('Product Grid UKM', 'ukm-toko-theme'),
        'description'     => __('Grid produk responsif dengan pilihan kolom, jumlah produk, dan judul section', 'ukm-toko-theme'),
        'category'        => 'ukm-toko-blocks',
        'icon'            => 'grid-view',
        'attributes'      => array(
            'sectionTitle'    => array('type' => 'string', 'default' => 'Produk Sembako Pilihan'),
            'numberOfColumns' => array('type' => 'number', 'default' => 4),
            'productsPerPage' => array('type' => 'number', 'default' => 8),
            'selectedCategory'=> array('type' => 'string', 'default' => ''),
        ),
        'render_callback' => 'ukm_toko_render_product_grid_block',
    ));

    // Block 3 â€” Testimonial Slider
    register_block_type('ukm-toko/testimonial-slider', array(
        'api_version'     => 2,
        'title'           => __('Testimonial Slider UKM', 'ukm-toko-theme'),
        'description'     => __('Ulasan pelanggan & mitra warung dengan Nama, Foto, Testimoni, dan Rating bintang', 'ukm-toko-theme'),
        'category'        => 'ukm-toko-blocks',
        'icon'            => 'format-quote',
        'attributes'      => array(
            'customerName'    => array('type' => 'string', 'default' => 'Ibu RT Ratna (Toko Bu RT)'),
            'customerPhoto'   => array('type' => 'string', 'default' => ''),
            'testimonial'     => array('type' => 'string', 'default' => 'Alhamdulillah pasokan sembako untuk warung selalu tepat waktu, berasnya wangi pulen dan timbangan sangat pas!'),
            'rating'          => array('type' => 'number', 'default' => 5),
        ),
        'render_callback' => 'ukm_toko_render_testimonial_block',
    ));
}
add_action('init', 'ukm_toko_register_all_blocks');

/**
 * 3. Render Callbacks for Blocks
 */
function ukm_toko_render_hero_banner_block($attributes) {
    $title     = !empty($attributes['title']) ? esc_html($attributes['title']) : 'Sembako Segar & Murah';
    $subtitle  = !empty($attributes['subtitle']) ? esc_html($attributes['subtitle']) : 'Penyedia sembako lengkap siap antar.';
    $cta_text  = !empty($attributes['ctaText']) ? esc_html($attributes['ctaText']) : 'Belanja Sekarang';
    $cta_url   = !empty($attributes['ctaUrl']) ? esc_url($attributes['ctaUrl']) : home_url('/produk/');
    $bg_image  = !empty($attributes['bgImage']) ? esc_url($attributes['bgImage']) : '';
    $style     = $bg_image ? 'background: linear-gradient(rgba(15,23,42,0.85), rgba(15,23,42,0.85)), url(' . $bg_image . ') center/cover;' : 'background: linear-gradient(135deg, #09090b 0%, #1e293b 100%);';

    ob_start();
    ?>
    <section class="ukm-block-hero-banner" style="<?php echo esc_attr($style); ?> color:#fff; padding:60px 24px; border-radius:12px; margin:24px 0; text-align:center;">
        <div style="max-width:750px; margin:0 auto;">
            <span style="display:inline-block; background:rgba(255,255,255,0.15); color:#fff; font-size:12px; font-weight:700; padding:4px 12px; border-radius:999px; margin-bottom:14px; text-transform:uppercase; letter-spacing:0.05em;">UKM Toko Sembako Bahri</span>
            <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.8rem); font-weight:800; line-height:1.2; margin-bottom:14px;"><?php echo $title; ?></h2>
            <p style="font-size:1.1rem; color:#cbd5e1; margin-bottom:24px; line-height:1.6;"><?php echo $subtitle; ?></p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?php echo $cta_url; ?>" style="background:#fff; color:#09090b; padding:12px 28px; font-weight:700; border-radius:8px; text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                    <?php echo $cta_text; ?> &rarr;
                </a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function ukm_toko_render_product_grid_block($attributes) {
    $title   = !empty($attributes['sectionTitle']) ? esc_html($attributes['sectionTitle']) : 'Katalog Sembako';
    $columns = !empty($attributes['numberOfColumns']) ? intval($attributes['numberOfColumns']) : 4;
    $limit   = !empty($attributes['productsPerPage']) ? intval($attributes['productsPerPage']) : 8;

    $query_args = array(
        'post_type'      => 'produk',
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
    );
    if (!empty($attributes['selectedCategory'])) {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => 'kategori-produk',
                'field'    => 'slug',
                'terms'    => sanitize_text_field($attributes['selectedCategory']),
            ),
        );
    }
    $query = new WP_Query($query_args);

    ob_start();
    ?>
    <section class="ukm-block-product-grid" style="margin:30px 0;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; border-bottom:2px solid #e2e8f0; padding-bottom:12px;">
            <h3 style="font-size:1.4rem; font-weight:700; margin:0;"><?php echo $title; ?></h3>
            <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>" style="font-size:0.9rem; font-weight:600; color:#0f172a; text-decoration:none;">Lihat Semua &rarr;</a>
        </div>
        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:16px;">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('template-parts/content', 'produk');
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p style="grid-column:1/-1; color:#64748b;">Belum ada produk untuk ditampilkan.</p>';
            endif;
            ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

function ukm_toko_render_testimonial_block($attributes) {
    $name   = !empty($attributes['customerName']) ? esc_html($attributes['customerName']) : 'Pelanggan Setia';
    $quote  = !empty($attributes['testimonial']) ? esc_html($attributes['testimonial']) : 'Pelayanan cepat dan sembako berkualitas tinggi!';
    $rating = !empty($attributes['rating']) ? intval($attributes['rating']) : 5;
    $stars  = str_repeat('â­', max(1, min(5, $rating)));

    ob_start();
    ?>
    <div class="ukm-block-testimonial" style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:28px; margin:24px 0; box-shadow:0 2px 4px rgba(0,0,0,0.04);">
        <div style="font-size:18px; margin-bottom:10px;"><?php echo $stars; ?></div>
        <p style="font-size:1.05rem; font-style:italic; color:#334155; line-height:1.6; margin-bottom:16px;">"<?php echo $quote; ?>"</p>
        <div style="display:flex; align-items:center; gap:12px;">
            <div style="width:42px; height:42px; border-radius:50%; background:#0f172a; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:14px;">
                <?php echo esc_html(substr($name, 0, 2)); ?>
            </div>
            <div>
                <strong style="display:block; font-size:0.95rem; color:#0f172a;"><?php echo $name; ?></strong>
                <span style="font-size:0.8rem; color:#64748b;">Mitra Terverifikasi Toko Berkah</span>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * 4. Enqueue Block Editor Script
 */
function ukm_toko_block_editor_assets() {
    wp_enqueue_script(
        'ukm-toko-blocks-editor',
        get_stylesheet_directory_uri() . '/assets/js/blocks.js',
        array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components'),
        defined('UKM_THEME_VERSION') ? UKM_THEME_VERSION : '1.1.0',
        true
    );
}
add_action('enqueue_block_editor_assets', 'ukm_toko_block_editor_assets');

