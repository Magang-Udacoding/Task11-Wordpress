<?php
/**
 * General Archive Template — Toko Berkah (Posts/Blog)
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="archive-main">

    <div class="archive-page-header">
        <div class="site-container">
            <?php if ( function_exists( 'ukm_toko_breadcrumbs' ) ) ukm_toko_breadcrumbs(); ?>
            <h1 class="archive-page-title">
                <?php
                if ( is_category() ) {
                    echo esc_html( single_cat_title( '', false ) );
                } elseif ( is_tag() ) {
                    printf( esc_html__( 'Tag: %s', 'ukm-toko-theme' ), single_tag_title( '', false ) );
                } elseif ( is_author() ) {
                    printf( esc_html__( 'Artikel oleh: %s', 'ukm-toko-theme' ), get_the_author() );
                } elseif ( is_date() ) {
                    echo esc_html( get_the_date( 'F Y' ) );
                } else {
                    esc_html_e( 'Arsip Blog', 'ukm-toko-theme' );
                }
                ?>
            </h1>
            <?php
            $archive_desc = get_the_archive_description();
            if ( $archive_desc ) :
            ?>
            <p class="archive-page-desc"><?php echo wp_kses_post( $archive_desc ); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="site-container">
        <?php if ( have_posts() ) : ?>
            <div class="archive-posts-grid">
                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content' );
                endwhile;
                ?>
            </div>

            <nav class="pagination" aria-label="<?php esc_attr_e( 'Navigasi halaman blog', 'ukm-toko-theme' ); ?>">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo; ' . esc_html__( 'Sebelumnya', 'ukm-toko-theme' ),
                    'next_text' => esc_html__( 'Berikutnya', 'ukm-toko-theme' ) . ' &raquo;',
                ) );
                ?>
            </nav>

        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
    </div>

</main>

<?php
get_footer();
