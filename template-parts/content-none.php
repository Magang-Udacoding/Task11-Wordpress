<?php
/**
 * Template Part: No Content Found
 *
 * @package UKM_Toko_Theme
 */
?>
<div class="not-found-box">
    <div class="not-found-icon" aria-hidden="true">📭</div>
    <h2 class="not-found-title"><?php esc_html_e( 'Konten Tidak Ditemukan', 'ukm-toko-theme' ); ?></h2>
    <p class="not-found-desc">
        <?php esc_html_e( 'Sepertinya tidak ada konten di sini. Coba telusuri atau kembali ke beranda.', 'ukm-toko-theme' ); ?>
    </p>
    <div class="not-found-actions">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ukm-btn ukm-btn-primary">
            <?php esc_html_e( 'Kembali ke Beranda', 'ukm-toko-theme' ); ?>
        </a>
    </div>
</div>
