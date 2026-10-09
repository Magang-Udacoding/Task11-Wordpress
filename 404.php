<?php
/**
 * 404 Not Found Template — Toko Berkah
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="not-found-main">
    <div class="site-container">
        <div class="not-found-box">
            <div class="not-found-icon" aria-hidden="true">🔍</div>
            <h1 class="not-found-title"><?php esc_html_e( 'Halaman Tidak Ditemukan', 'ukm-toko-theme' ); ?></h1>
            <p class="not-found-desc">
                <?php esc_html_e( 'Maaf, halaman yang Anda cari tidak ada atau sudah dipindahkan. Silakan cari produk atau kembali ke beranda Toko Berkah.', 'ukm-toko-theme' ); ?>
            </p>

            <!-- Quick Search -->
            <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-header" style="margin-bottom:24px; max-width:380px; margin-inline:auto;">
                <span class="search-icon" aria-hidden="true">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </span>
                <input type="search" name="s"
                       placeholder="<?php esc_attr_e( 'Cari produk sembako…', 'ukm-toko-theme' ); ?>"
                       aria-label="<?php esc_attr_e( 'Cari produk', 'ukm-toko-theme' ); ?>">
                <input type="hidden" name="post_type" value="produk">
                <button type="submit" class="search-submit-btn"><?php esc_html_e( 'Cari', 'ukm-toko-theme' ); ?></button>
            </form>

            <div class="not-found-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ukm-btn ukm-btn-primary">
                    🏠 <?php esc_html_e( 'Kembali ke Beranda', 'ukm-toko-theme' ); ?>
                </a>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>" class="ukm-btn ukm-btn-outline" style="color:var(--dark); border-color:var(--slate-200);">
                    🛍️ <?php esc_html_e( 'Lihat Katalog', 'ukm-toko-theme' ); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
