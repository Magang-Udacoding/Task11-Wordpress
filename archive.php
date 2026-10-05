<?php
/**
 * The template for displaying archive pages (Blog & General Archives)
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="ukm-main-site-content">
    <div class="ukm-container" style="max-width:1200px; margin:30px auto; padding:0 20px;">
        <?php if (function_exists('ukm_toko_breadcrumbs')) ukm_toko_breadcrumbs(); ?>

        <header class="ukm-archive-header" style="margin-bottom:30px; border-bottom:1px solid #e2e8f0; padding-bottom:16px;">
            <?php
            the_archive_title('<h1 class="ukm-page-title" style="font-size:2rem; font-weight:800; color:#0f172a;">', '</h1>');
            the_archive_description('<div class="ukm-archive-description" style="color:#64748b; margin-top:8px;">', '</div>');
            ?>
        </header>

        <div style="display:grid; grid-template-columns: 2fr 1fr; gap:30px;">
            <div class="ukm-posts-stream">
                <?php if (have_posts()) : ?>
                    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap:24px;">
                        <?php
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', get_post_type());
                        endwhile;
                        ?>
                    </div>

                    <div class="ukm-pagination" style="margin-top:30px;">
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

            <div class="ukm-sidebar-column">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
