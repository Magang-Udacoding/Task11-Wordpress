<?php
/**
 * Template part for displaying standard blog posts
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ukm-post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="ukm-post-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large', array('loading' => 'lazy')); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="ukm-post-body">
        <div class="ukm-post-meta">
            <span class="ukm-post-date">📅 <?php echo get_the_date(); ?></span>
            <span class="ukm-post-author">✍️ <?php the_author(); ?></span>
        </div>

        <h2 class="ukm-post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="ukm-post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="ukm-read-more">
            Baca Selengkapnya &rarr;
        </a>
    </div>
</article>
