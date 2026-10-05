<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package UKM_Toko_Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ukm-page-article'); ?>>
    <header class="entry-header" style="margin-bottom:24px;">
        <?php the_title('<h1 class="entry-title" style="font-size:2.2rem; font-weight:800; color:#0f172a; margin-bottom:12px;">', '</h1>'); ?>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail" style="margin-bottom:24px; border-radius:12px; overflow:hidden;">
            <?php the_post_thumbnail('large', array('style' => 'width:100%; height:auto; display:block;')); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content" style="font-size:1.05rem; line-height:1.75; color:#334155;">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Halaman:', 'ukm-toko-theme'),
            'after'  => '</div>',
        ));
        ?>
    </div>
</article>
