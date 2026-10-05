<?php
/**
 * Archive Template for CPT Klien - Classic Facebook Friends Directory Style
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
?>

<div class="fb-3col-layout">
    <!-- Left Sidebar -->
    <aside class="fb-col-left">
        <div class="fb-left-card fb-profile-card">
            <div class="fb-profile-avatar-box">
                <span class="fb-profile-emoji">👥</span>
            </div>
            <div class="fb-profile-info">
                <h2 class="fb-profile-name">Jaringan Mitra Toko</h2>
                <span class="fb-profile-role">Komunitas Warung Binaan</span>
            </div>
        </div>

        <div class="fb-left-card fb-nav-card">
            <span class="fb-card-heading">PROGRAM KEMITRAAN</span>
            <ul class="fb-left-menu">
                <li class="active">
                    <a href="#daftar-mitra">
                        <span class="fb-menu-icon">🏪</span>
                        <span class="fb-menu-label">Daftar Warung Binaan</span>
                    </a>
                </li>
                <li>
                    <a href="#keuntungan-mitra">
                        <span class="fb-menu-icon">🎁</span>
                        <span class="fb-menu-label">Keuntungan Mitra</span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%2C%20saya%20ingin%20bergabung%20jadi%20Mitra%20Warung" target="_blank">
                        <span class="fb-menu-icon">🤝</span>
                        <span class="fb-menu-label">Daftar Jadi Mitra</span>
                        <span class="fb-menu-badge">Gratis</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Center Column: Friends List -->
    <section class="fb-col-center">
        <div class="fb-feed-filter-bar">
            <span class="fb-filter-title">Mitra Warung Kelontong, Restoran & Klien Grosir Resmi</span>
            <div class="fb-filter-links">
                <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%2C%20saya%20mau%20gabung%20mitra" target="_blank" class="fb-confirm-btn" style="text-decoration:none;">
                    + Gabung Jadi Mitra
                </a>
            </div>
        </div>

        <div class="fb-posts-stream" id="daftar-mitra">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                    $telepon = ukm_get_field('telepon');
                    $lokasi  = ukm_get_field('lokasi');
                    $testimoni = ukm_get_field('testimoni_klien') ?: get_the_excerpt();
                    $client_wa = preg_replace('/[^0-9]/', '', $telepon ?: $wa_clean);
                ?>
                    <article class="fb-post-card">
                        <div class="fb-post-header">
                            <div class="fb-post-avatar">
                                <span class="fb-avatar-box">🏪</span>
                            </div>
                            <div class="fb-post-header-meta">
                                <div class="fb-author-line">
                                    <strong class="fb-author-name"><?php the_title(); ?></strong>
                                    <span class="fb-tag-pill" style="margin-left:6px;">✓ Mitra Terverifikasi</span>
                                </div>
                                <div class="fb-post-time">Jaringan Mitra Resmi Toko Bahri · 🌍 Publik</div>
                            </div>
                        </div>

                        <div class="fb-post-body" style="font-size:12px;">
                            <?php if ($testimoni) : ?>
                                <div class="fb-comment-bubble" style="margin-bottom:10px; font-style:italic; background:#f9f9f9;">
                                    "<?php echo esc_html($testimoni); ?>"
                                </div>
                            <?php endif; ?>

                            <div style="color:#555; line-height:1.5;">
                                <?php if ($lokasi) : ?>
                                    <p>📍 <strong>Alamat Usaha:</strong> <?php echo esc_html($lokasi); ?></p>
                                <?php endif; ?>
                                <?php if ($telepon) : ?>
                                    <p>📞 <strong>No. Kontak:</strong> <?php echo esc_html($telepon); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="fb-post-actions-bar">
                            <button type="button" class="fb-action-btn fb-like-btn" data-liked="false" data-count="32">
                                <span class="fb-action-icon">👍</span>
                                <span class="fb-action-label">Suka Profil Mitra</span>
                            </button>
                            <a href="https://wa.me/<?php echo esc_attr($client_wa); ?>" target="_blank" class="fb-action-btn fb-action-wa">
                                💬 Hubungi Mitra
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="fb-empty-feed">Belum ada mitra terdaftar.</div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Right Sidebar -->
    <aside class="fb-col-right">
        <div class="fb-right-card" id="keuntungan-mitra">
            <div class="fb-right-card-header">
                <span class="fb-header-title">KEUNTUNGAN MITRA</span>
            </div>
            <ul style="font-size:11px; padding-left:16px; margin:4px 0; color:#555; line-height:1.6;">
                <li>Potongan harga grosir khusus.</li>
                <li>Gratis ongkir pengiriman same-day.</li>
                <li>Jaminan pasokan beras & minyak stabil.</li>
                <li>Sistem tempo pembayaran mingguan.</li>
            </ul>
        </div>
    </aside>
</div>

<?php
get_footer();
