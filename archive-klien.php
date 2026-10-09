<?php
/**
 * Archive Template for CPT Klien - Modern Mitra Warung & Klien Directory
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
?>

<main id="primary-content" class="mitra-page-main">
    <div class="site-container">
        
        <!-- Header Banner -->
        <div class="mitra-header-banner">
            <div class="banner-badge">ðŸ¤ PROGRAM KEMITRAAN RESMI</div>
            <h1 class="banner-title">Jaringan Mitra Warung & Klien Grosir</h1>
            <p class="banner-subtitle">
                Toko Berkah membina puluhan warung kelontong, usaha kuliner, dan katering di seluruh wilayah Bandung dengan pasokan sembako terjamin, timbangan presisi, dan harga grosir termurah.
            </p>
            <div class="banner-cta-row">
                <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%20Toko%20Bahri%2C%20saya%20tertarik%20mendaftar%20jadi%20Mitra%20Warung%20Binaan" target="_blank" rel="noopener noreferrer" class="btn-join-mitra">
                    <span>+ Daftar Jadi Mitra Warung</span>
                </a>
                <span class="join-free-tag">âœ“ Pendaftaran 100% Gratis & Langsung Aktif</span>
            </div>
        </div>

        <!-- Benefits Row -->
        <div class="mitra-benefits-grid">
            <div class="benefit-item-card">
                <span class="b-icon">ðŸ’°</span>
                <h4>Harga Grosir Khusus</h4>
                <p>Harga pasokan lebih murah dari pasar retail tanpa minimal order partai besar.</p>
            </div>
            <div class="benefit-item-card">
                <span class="b-icon">ðŸšš</span>
                <h4>Gratis Ongkir Same-Day</h4>
                <p>Armada pengiriman langsung ke depan kios toko Anda setiap pagi dan sore.</p>
            </div>
            <div class="benefit-item-card">
                <span class="b-icon">ðŸŒ¾</span>
                <h4>Stok Stabil & Asli</h4>
                <p>Jaminan pasokan beras dan minyak stabil saat terjadi kelangkaan pasar nasional.</p>
            </div>
            <div class="benefit-item-card">
                <span class="b-icon">ðŸ’³</span>
                <h4>Tempo Pembayaran</h4>
                <p>Fasilitas pembayaran tempo mingguan untuk mitra warung berstatus terverifikasi.</p>
            </div>
        </div>

        <!-- Directory Title & Counter -->
        <div class="section-header-row" style="margin-top: 40px;">
            <div>
                <span class="section-subtitle">DAFTAR KLIEN & WARUNG BINAAN</span>
                <h2 class="section-title">Mitra Resmi Toko Sembako Bahri</h2>
            </div>
            <span class="mitra-counter-badge">Terdaftar Aktif di Bandung</span>
        </div>

        <!-- Mitra Cards Stream Grid -->
        <div class="mitra-directory-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                    $telepon   = ukm_get_field('telepon');
                    $lokasi    = ukm_get_field('lokasi');
                    $testimoni = ukm_get_field('testimoni_klien') ?: get_the_excerpt();
                    $client_wa = preg_replace('/[^0-9]/', '', $telepon ?: $wa_clean);
                ?>
                    <article class="mitra-profile-card">
                        <div class="profile-card-top">
                            <div class="profile-avatar-circle">
                                <span>ðŸª</span>
                            </div>
                            <div class="profile-titles">
                                <h3 class="profile-name"><?php the_title(); ?></h3>
                                <div class="profile-verified-chip">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                    <span>Mitra Terverifikasi</span>
                                </div>
                            </div>
                        </div>

                        <?php if ($testimoni) : ?>
                            <blockquote class="profile-quote">
                                "<?php echo esc_html($testimoni); ?>"
                            </blockquote>
                        <?php endif; ?>

                        <div class="profile-info-list">
                            <?php if ($lokasi) : ?>
                                <div class="info-row">
                                    <span class="row-icon">ðŸ“</span>
                                    <span><?php echo esc_html($lokasi); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($telepon) : ?>
                                <div class="info-row">
                                    <span class="row-icon">ðŸ“ž</span>
                                    <span><?php echo esc_html($telepon); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="profile-card-actions">
                            <a href="https://wa.me/<?php echo esc_attr($client_wa); ?>?text=Halo%20Mitra%20Toko%20Bahri" target="_blank" rel="noopener noreferrer" class="btn-profile-wa">
                                ðŸ’¬ Hubungi Mitra
                            </a>
                            <span class="profile-status-dot-wrap">
                                <span class="dot-online"></span> Aktif
                            </span>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="empty-state-card">
                    <p>Belum ada mitra yang ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php
get_footer();

