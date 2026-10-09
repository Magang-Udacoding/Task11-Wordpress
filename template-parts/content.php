<?php
/**
 * Template Part: Blog Post Card (for archive/search)
 *
 * @package UKM_Toko_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="archive-post-thumb">
        <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
            <?php the_post_thumbnail( 'medium', array( 'loading' => 'lazy', 'alt' => get_the_title() ) ); ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="archive-post-body">
        <?php
        $post_cats = get_the_category();
        if ( $post_cats ) :
        ?>
        <span class="blog-cat-label"><?php echo esc_html( $post_cats[0]->name ); ?></span>
        <?php endif; ?>

        <h2 class="archive-post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <p class="archive-post-excerpt">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?>
        </p>

        <div class="archive-post-date">
            📅 <?php echo esc_html( get_the_date( 'j F Y' ) ); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="blog-read-more">
            <?php esc_html_e( 'Baca Selengkapnya', 'ukm-toko-theme' ); ?> &rarr;
        </a>
    </div>
</article>
