<?php
/**
 * Modern Product Archive Template (Katalog Sembako)
 * Clean, Contemporary, Fast Grid Catalog
 *
 * @package UKM_Toko_Theme
 */

get_header();

$current_cat = get_query_var('kategori-produk');
$wa_number   = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean    = preg_replace('/[^0-9]/', '', $wa_number);
?>

<main id="primary-content" class="catalog-page-main">
    <div class="site-container">
        
        <!-- Breadcrumbs -->
        <?php if (function_exists('ukm_toko_breadcrumbs')) ukm_toko_breadcrumbs(); ?>

        <!-- Catalog Header Banner -->
        <header class="catalog-header-banner">
            <div class="catalog-header-text">
                <span class="catalog-badge">KATALOG RESMI TOKO BAHRI</span>
                <h1 class="catalog-main-heading">
                    <?php
                    if (is_tax('kategori-produk')) {
                        single_term_title('Kategori: ');
                    } else {
                        echo 'Katalog Sembako & Kebutuhan Pokok';
                    }
                    ?>
                </h1>
                <p class="catalog-subtitle">
                    Pilihan terlengkap beras pulen, minyak goreng kemasan, gula, bumbu dapur, dan sabun dengan harga grosir langsung dari gudang.
                </p>
            </div>
        </header>

        <!-- Modern Category Pills Filter Bar -->
        <div class="catalog-filter-bar">
            <div class="category-pills-scroll">
                <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>" class="cat-pill <?php echo !is_tax('kategori-produk') ? 'active' : ''; ?>">
                    <span>📦 Semua Produk (22)</span>
                </a>
                <?php
                $cats = get_terms(array(
                    'taxonomy'   => 'kategori-produk',
                    'hide_empty' => false,
                ));
                $icons = array(
                    'sembako'   => '🌾',
                    'minuman'   => '🧃',
                    'kebersihan'=> '🧼',
                    'snack'     => '🍪',
                );
                if (!empty($cats) && !is_wp_error($cats)) :
                    foreach ($cats as $cat) :
                        $is_active = is_tax('kategori-produk', $cat->term_id) ? 'active' : '';
                        $ico = isset($icons[$cat->slug]) ? $icons[$cat->slug] : '🏷️';
                ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="cat-pill <?php echo esc_attr($is_active); ?>">
                        <span><?php echo $ico; ?> <?php echo esc_html($cat->name); ?> (<?php echo esc_html($cat->count); ?>)</span>
                    </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>

            <div class="catalog-filter-meta">
                <span class="catalog-count-info">Menampilkan <strong><?php echo (int)$wp_query->found_posts; ?></strong> item pilihan</span>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="modern-product-grid catalog-grid">
            <?php if (have_posts()) : ?>
                <?php
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'produk');
                endwhile;
                ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="catalog-pagination-wrap">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Sebelumnya', 'ukm-toko-theme'),
                'next_text' => __('Selanjutnya &raquo;', 'ukm-toko-theme'),
            ));
            ?>
        </div>

        <!-- Bottom Assistance Box -->
        <div class="catalog-help-box">
            <div class="help-box-content">
                <div class="help-icon">💬</div>
                <div>
                    <h3>Tidak Menemukan Merk / Barang yang Anda Cari?</h3>
                    <p>Toko Bahri menyediakan ratusan barang sembako grosir lainnya di gudang fisik. Tanyakan langsung ke admin WhatsApp!</p>
                </div>
            </div>
            <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%20Toko%20Bahri%2C%20apakah%20ada%20stok%20produk%20khusus%20lainnya%3F" target="_blank" rel="noopener noreferrer" class="help-btn-wa">
                Hubungi Admin Toko &rarr;
            </a>
        </div>

    </div>
</main>

<?php
get_footer();
