<?php
/**
 * Template for displaying all standard pages
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<div class="ukm-container" style="padding-top:40px; padding-bottom:60px;">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('ukm-page-card'); ?> style="background:#fff; border-radius:var(--ukm-radius); padding:40px; box-shadow:var(--ukm-shadow-sm); border:1px solid var(--ukm-gray-200);">
            <header class="ukm-page-header" style="margin-bottom:24px; border-bottom:1px solid var(--ukm-gray-200); padding-bottom:16px;">
                <h1 style="font-size:2.2rem; font-weight:800; color:var(--ukm-gray-800);"><?php the_title(); ?></h1>
            </header>

            <div class="ukm-page-content" style="line-height:1.8; color:var(--ukm-gray-600); font-size:1.05rem;">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Halaman:', 'ukm-toko'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
