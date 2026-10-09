<?php
/**
 * Search Results Template — Toko Berkah
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="search-main">

    <div class="archive-page-header">
        <div class="site-container">
            <?php if ( function_exists( 'ukm_toko_breadcrumbs' ) ) ukm_toko_breadcrumbs(); ?>
            <h1 class="archive-page-title">
                <?php
                printf(
                    /* translators: %s search query */
                    esc_html__( 'Hasil pencarian: "%s"', 'ukm-toko-theme' ),
                    '<em>' . esc_html( get_search_query() ) . '</em>'
                );
                ?>
            </h1>
            <p class="archive-page-desc">
                <?php
                if ( have_posts() ) :
                    printf(
                        /* translators: 1: result count, 2: query */
                        esc_html__( 'Ditemukan %1$d hasil untuk "%2$s"', 'ukm-toko-theme' ),
                        (int) $wp_query->found_posts,
                        esc_html( get_search_query() )
                    );
                else :
                    printf(
                        /* translators: %s search query */
                        esc_html__( 'Tidak ada hasil untuk "%s"', 'ukm-toko-theme' ),
                        esc_html( get_search_query() )
                    );
                endif;
                ?>
            </p>
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

            <nav class="pagination" aria-label="<?php esc_attr_e( 'Navigasi hasil pencarian', 'ukm-toko-theme' ); ?>">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo; ' . esc_html__( 'Sebelumnya', 'ukm-toko-theme' ),
                    'next_text' => esc_html__( 'Berikutnya', 'ukm-toko-theme' ) . ' &raquo;',
                ) );
                ?>
            </nav>

        <?php else : ?>
            <div class="not-found-box">
                <div class="not-found-icon" aria-hidden="true">😕</div>
                <h2 class="not-found-title">
                    <?php printf( esc_html__( 'Tidak ada hasil untuk "%s"', 'ukm-toko-theme' ), esc_html( get_search_query() ) ); ?>
                </h2>
                <p class="not-found-desc">
                    <?php esc_html_e( 'Coba kata kunci lain atau telusuri seluruh katalog produk kami.', 'ukm-toko-theme' ); ?>
                </p>
                <div class="not-found-actions">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>" class="ukm-btn ukm-btn-primary">
                        🛍️ <?php esc_html_e( 'Lihat Semua Produk', 'ukm-toko-theme' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ukm-btn ukm-btn-outline" style="color:var(--dark); border-color:var(--slate-200);">
                        🏠 <?php esc_html_e( 'Kembali ke Beranda', 'ukm-toko-theme' ); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
