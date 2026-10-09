<?php
/**
 * Blog Posts Index Template (home.php)
 * Clean, Professional & Responsive Blog Layout
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="blog-index-main">
    <div class="site-container">
        
        <!-- Breadcrumbs Navigation -->
        <?php if (function_exists('ukm_toko_breadcrumbs')) ukm_toko_breadcrumbs(); ?>

        <!-- Blog Header Banner -->
        <header class="catalog-header-banner">
            <div class="catalog-header-text">
                <span class="catalog-badge">ARTIKEL & TIPS TOKO BERKAH</span>
                <h1 class="catalog-main-heading">Tips Belanja, Resep & Seputar Usaha Warung</h1>
                <p class="catalog-subtitle">
                    Panduan praktis memilih beras bermutu, tips mengelola persediaan sembako rumah tangga, resep masakan hemat, serta kiat wirausaha warung kelontong.
                </p>
            </div>
        </header>

        <!-- Blog Grid + Sidebar Layout -->
        <div class="blog-layout-grid">
            <div class="blog-posts-column">
                <?php if (have_posts()) : ?>
                    <div class="blog-cards-grid">
                        <?php
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content');
                        endwhile;
                        ?>
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
                <?php else : ?>
                    <?php get_template_part('template-parts/content', 'none'); ?>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar-column">
                <?php get_sidebar(); ?>
            </aside>
        </div>

    </div>
</main>

<?php
get_footer();

