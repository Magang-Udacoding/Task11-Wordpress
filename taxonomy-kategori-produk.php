<?php
/**
 * Taxonomy Archive Template for kategori-produk (taxonomy-kategori-produk.php)
 * Clean, Responsive Product Grid by Category
 *
 * @package UKM_Toko_Theme
 */

get_header();

$current_term = get_queried_object();
$raw_term_name = $current_term && !empty($current_term->name) ? $current_term->name : __('Kategori Produk', 'ukm-toko-theme');
$term_name    = function_exists('ukm_get_term_display_name') && $current_term ? ukm_get_term_display_name($raw_term_name, $current_term->slug) : $raw_term_name;
$term_desc    = $current_term ? term_description() : '';
$term_slug    = $current_term ? $current_term->slug : '';
?>

<main id="primary-content" class="catalog-page-main taxonomy-kategori-main">
    <div class="site-container">
        
        <!-- Breadcrumbs Navigation -->
        <?php if (function_exists('ukm_toko_breadcrumbs')) : ?>
            <?php ukm_toko_breadcrumbs(); ?>
        <?php else : ?>
            <nav class="single-product-breadcrumbs" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
                <span class="bc-sep">/</span>
                <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>">Katalog Produk</a>
                <span class="bc-sep">/</span>
                <span class="bc-current"><?php echo esc_html($term_name); ?></span>
            </nav>
        <?php endif; ?>

        <!-- Category Header Banner -->
        <header class="catalog-header-banner">
            <div class="catalog-header-text">
                <span class="catalog-badge">KATEGORI PRODUK PILIHAN</span>
                <h1 class="catalog-main-heading">
                    <?php echo esc_html($term_name); ?>
                </h1>
                <?php if ($term_desc) : ?>
                    <div class="catalog-subtitle"><?php echo wp_kses_post($term_desc); ?></div>
                <?php else : ?>
                    <p class="catalog-subtitle">
                        Daftar produk <?php echo esc_html(strtolower($term_name)); ?> berkualitas terbaik dari toko kami. Dijamin asli, higienis, timbangan pas, dan siap diantar langsung.
                    </p>
                <?php endif; ?>
            </div>
        </header>

        <!-- Category Filter Pills Bar -->
        <div class="catalog-filter-bar">
            <div class="category-pills-scroll">
                <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>" class="cat-pill">
                    <span>Semua Produk</span>
                </a>
                <?php
                $all_cats = get_terms(array(
                    'taxonomy'   => 'kategori-produk',
                    'hide_empty' => false,
                ));
                if (!empty($all_cats) && !is_wp_error($all_cats)) :
                    foreach ($all_cats as $cat) :
                        $is_active = (isset($current_term->term_id) && $cat->term_id === $current_term->term_id) ? 'active' : '';
                        $cat_display_name = function_exists('ukm_get_term_display_name') ? ukm_get_term_display_name($cat->name, $cat->slug) : $cat->name;
                ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="cat-pill <?php echo esc_attr($is_active); ?>">
                        <span><?php echo esc_html($cat_display_name); ?> (<?php echo esc_html($cat->count); ?>)</span>
                    </a>
                <?php
                    endforeach;
                endif;
                ?>
            </div>

            <div class="catalog-filter-meta">
                <span class="catalog-count-info">Menampilkan <strong><?php echo (int)$wp_query->found_posts; ?></strong> item kategori <?php echo esc_html($term_name); ?></span>
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

    </div>
</main>

<?php
get_footer();

