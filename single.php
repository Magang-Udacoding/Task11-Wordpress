<?php
/**
 * Template for displaying all single blog posts
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<div class="ukm-container" style="padding-top:40px; padding-bottom:60px; max-width:880px;">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('ukm-single-article'); ?> style="background:#fff; border-radius:var(--ukm-radius); padding:40px; box-shadow:var(--ukm-shadow-sm); border:1px solid var(--ukm-gray-200);">
            <header style="margin-bottom:24px;">
                <div style="display:flex; gap:12px; font-size:0.875rem; color:#64748b; margin-bottom:12px;">
                    <span>📅 <?php echo get_the_date(); ?></span>
                    <span>✍️ Ditulis oleh <?php the_author(); ?></span>
                </div>
                <h1 style="font-size:2.4rem; font-weight:800; line-height:1.25; color:var(--ukm-dark);"><?php the_title(); ?></h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div style="margin-bottom:30px; border-radius:12px; overflow:hidden;">
                    <?php the_post_thumbnail('large', array('style' => 'width:100%; height:auto;')); ?>
                </div>
            <?php endif; ?>

            <div class="ukm-article-body" style="font-size:1.1rem; line-height:1.8; color:#334155;">
                <?php the_content(); ?>
            </div>

            <!-- Author Box -->
            <div style="margin-top:40px; padding-top:24px; border-top:1px solid var(--ukm-gray-200); display:flex; align-items:center; gap:16px;">
                <div style="width:50px; height:50px; border-radius:50%; background:var(--ukm-primary-light); color:var(--ukm-primary-dark); display:flex; align-items:center; justify-content:center; font-weight:700;">
                    <?php echo strtoupper(substr(get_the_author(), 0, 1)); ?>
                </div>
                <div>
                    <strong><?php the_author(); ?></strong>
                    <p style="margin:0; font-size:0.875rem; color:#64748b;">Tim Editorial Toko UKM Sembako</p>
                </div>
            </div>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
