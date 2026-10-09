<?php
/**
 * Page Template — Toko Berkah
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="page-main">
    <div class="site-container">

        <?php if ( function_exists( 'ukm_toko_breadcrumbs' ) ) ukm_toko_breadcrumbs(); ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
                <header class="page-article-header">
                    <h1 class="page-article-title"><?php the_title(); ?></h1>
                </header>
                <div class="page-article-content entry-content">
                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Halaman:', 'ukm-toko-theme' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </article>
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
            ?>
        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();
