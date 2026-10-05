<?php
/**
 * 404 Error Page Template
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<div class="ukm-container" style="padding: 80px 20px; text-align: center; max-width: 680px;">
    <div style="font-size: 5rem; line-height: 1; margin-bottom: 20px;">🛒💨</div>
    <span class="ukm-badge ukm-badge-accent" style="margin-bottom: 15px;">KODE ERROR 404</span>
    <h1 style="font-size: 2.5rem; font-weight: 800; color: var(--ukm-dark); margin-bottom: 16px;">
        Waduh! Halaman Tidak Ditemukan
    </h1>
    <p style="font-size: 1.1rem; color: #64748b; margin-bottom: 30px;">
        Halaman produk atau artikel yang Anda cari mungkin sudah dipindahkan, dihapus, atau stok sembako sedang kami perbarui.
    </p>

    <!-- Search form -->
    <div style="max-width: 450px; margin: 0 auto 30px;">
        <form role="search" method="get" class="ukm-search-form" action="<?php echo esc_url(home_url('/')); ?>" style="display:flex;">
            <input type="search" class="ukm-search-input" placeholder="Cari sembako lain (misal: beras, minyak)..." value="<?php echo get_search_query(); ?>" name="s" style="flex:1; padding:12px 16px; border:1px solid #cbd5e1; border-radius:8px 0 0 8px;" />
            <button type="submit" class="ukm-btn ukm-btn-primary" style="border-radius:0 8px 8px 0;">Cari</button>
        </form>
    </div>

    <div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="ukm-btn ukm-btn-outline" style="margin-right: 10px;">
            &larr; Kembali ke Beranda
        </a>
        <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>" class="ukm-btn ukm-btn-primary">
            Lihat Katalog Sembako
        </a>
    </div>
</div>

<?php
get_footer();
