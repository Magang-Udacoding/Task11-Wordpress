<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package UKM_Toko_Theme
 */
?>

<section class="no-results not-found" style="text-align:center; padding:50px 20px; background:#fff; border:1px solid #e2e8f0; border-radius:12px; margin:20px 0;">
    <div style="font-size:48px; margin-bottom:16px;">🔍</div>
    <header class="page-header">
        <h2 class="page-title" style="font-size:1.6rem; font-weight:700; color:#0f172a; margin-bottom:10px;">
            <?php esc_html_e('Tidak Ditemukan', 'ukm-toko-theme'); ?>
        </h2>
    </header>

    <div class="page-content" style="max-width:500px; margin:0 auto; color:#64748b;">
        <?php if (is_search()) : ?>
            <p style="margin-bottom:20px;"><?php esc_html_e('Maaf, tidak ada produk atau artikel yang sesuai dengan kata kunci pencarian Anda. Silakan coba kata kunci lain.', 'ukm-toko-theme'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p style="margin-bottom:20px;"><?php esc_html_e('Tampaknya konten yang Anda cari belum tersedia. Silakan telusuri katalog produk kami.', 'ukm-toko-theme'); ?></p>
            <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>" class="ukm-btn" style="background:#059669; color:#fff; padding:10px 20px; text-decoration:none; border-radius:6px; font-weight:600; display:inline-block;">
                <?php esc_html_e('Lihat Semua Produk &rarr;', 'ukm-toko-theme'); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
