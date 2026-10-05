<?php
/**
 * Template Name: Halaman Tentang Toko (Classic Facebook About Page)
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
$wa_url    = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode('Halo Admin Toko Bahri, saya ingin bertanya seputar toko.');
?>

<div class="fb-3col-layout">
    <!-- Left Sidebar Profile -->
    <aside class="fb-col-left">
        <div class="fb-left-card fb-profile-card">
            <div class="fb-profile-avatar-box">
                <span class="fb-profile-emoji">🏪</span>
            </div>
            <div class="fb-profile-info">
                <h2 class="fb-profile-name">Toko Sembako Bahri</h2>
                <span class="fb-profile-role">Toko Sembako Resmi · Terverifikasi</span>
                <span class="fb-edit-profile-link">📍 Bandung, Jawa Barat</span>
            </div>
        </div>

        <div class="fb-left-card fb-nav-card">
            <span class="fb-card-heading">INFORMASI TOKO</span>
            <ul class="fb-left-menu">
                <li class="active">
                    <a href="#tentang-kami">
                        <span class="fb-menu-icon">📖</span>
                        <span class="fb-menu-label">Profil & Sejarah</span>
                    </a>
                </li>
                <li>
                    <a href="#visi-misi">
                        <span class="fb-menu-icon">🎯</span>
                        <span class="fb-menu-label">Visi & Misi</span>
                    </a>
                </li>
                <li>
                    <a href="#keunggulan">
                        <span class="fb-menu-icon">⭐</span>
                        <span class="fb-menu-label">Keunggulan Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/klien/')); ?>">
                        <span class="fb-menu-icon">👥</span>
                        <span class="fb-menu-label">Mitra Warung Binaan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/kontak/')); ?>">
                        <span class="fb-menu-icon">📞</span>
                        <span class="fb-menu-label">Hubungi Kami</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Center Column: Profile Info & Wall of History -->
    <section class="fb-col-center">
        <!-- Profile Wall Card -->
        <article class="fb-post-card" id="tentang-kami">
            <div class="fb-post-header">
                <div class="fb-post-avatar">
                    <span class="fb-avatar-box">🏪</span>
                </div>
                <div class="fb-post-header-meta">
                    <div class="fb-author-line">
                        <strong class="fb-author-name">Toko Sembako Bahri</strong>
                        <span class="fb-post-action-desc">memperbarui informasi tentang toko</span>
                    </div>
                    <div class="fb-post-time">Profil Toko Resmi · 🌍 Publik</div>
                </div>
            </div>

            <div class="fb-post-body" style="font-size:12px; line-height:1.7;">
                <h2 style="font-size:18px; color:#3b5998; margin-bottom:10px;">Tentang Toko UKM Sembako Bahri</h2>
                <p style="margin-bottom:12px;">
                    <strong>Toko UKM Sembako Bahri</strong> berawal dari usaha ritel keluarga yang didirikan di Bandung pada tahun 2018. Bermula dari sebuah warung kelontong sederhana, kini Toko Bahri telah berkembang menjadi pusat penyedia aneka kebutuhan sembako dan sembilan bahan pokok terpercaya untuk ribuan keluarga, rumah makan, warung kelontong mitra binaan, hingga katering lokal di wilayah Bandung dan sekitarnya.
                </p>
                <p style="margin-bottom:14px;">
                    Kami bermitra langsung dengan kelompok tani beras, pabrik penggilingan padi, dan distributor resmi produk sembako ternama nasional (seperti Bimoli, Sania, Gulaku, Segitiga Biru, Rinso, dan Lifebuoy) guna memastikan pasokan barang selalu segar, higienis, bergaransi resmi, serta memiliki harga grosir yang sangat bersaing.
                </p>

                <!-- Box Keunggulan -->
                <div style="background:#f2f2f2; border:1px solid #d8dfea; padding:12px; margin-bottom:16px;" id="keunggulan">
                    <h3 style="font-size:13px; color:#3b5998; margin-bottom:8px;">Komitmen Layanan Toko Bahri:</h3>
                    <ul style="padding-left:18px; margin:0;">
                        <li><strong>🌾 Kualitas Beras & Sembako Terpilih:</strong> Beras pulen murni tanpa pengawet atau pemutih kimiawi.</li>
                        <li><strong>🚚 Layanan Antar Cepat (Same-Day Delivery):</strong> Pesanan langsung diantar ke depan pintu rumah atau kios warung mitra.</li>
                        <li><strong>💳 Fleksibilitas Pembayaran:</strong> Menerima QRIS, Transfer Bank (BCA, Mandiri, BRI), serta Bayar di Tempat (COD).</li>
                        <li><strong>🤝 Kemitraan Warung:</strong> Program khusus harga grosir dan tempo pembayaran untuk pedagang warung kelontong kecil.</li>
                    </ul>
                </div>

                <!-- Visi Misi -->
                <div id="visi-misi" style="border-top:1px solid #e9ebee; padding-top:12px;">
                    <h3 style="font-size:14px; color:#3b5998; margin-bottom:6px;">Visi & Misi</h3>
                    <p><strong>Visi:</strong> Menjadi rantai pasok sembako ritel dan grosir UKM yang paling terpercaya, transparan, dan terdepan dalam digitalisasi UMKM Indonesia.</p>
                    <p><strong>Misi:</strong> Memberikan akses kebutuhan pokok murah dan berkualitas untuk masyarakat luas serta memberdayakan warung makan dan warung sembako lokal agar mandiri secara ekonomi.</p>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="fb-post-actions-bar">
                <button type="button" class="fb-action-btn fb-like-btn" data-liked="false" data-count="94">
                    <span class="fb-action-icon">👍</span>
                    <span class="fb-action-label">Suka Profil Toko</span>
                </button>
                <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="fb-action-btn">
                    <span class="fb-action-icon">🛍️</span>
                    <span class="fb-action-label">Belanja Produk</span>
                </a>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" class="fb-action-btn fb-action-wa">
                    <span class="fb-action-icon">💬</span>
                    <span class="fb-action-label">Tanya Admin WA</span>
                </a>
            </div>

            <div class="fb-post-feedback">
                <span class="fb-mini-like-icon">👍</span>
                <span class="fb-likes-text">
                    <strong>Bu RT</strong>, <strong>Pak Slamet</strong>, dan <strong>94 orang lainnya</strong> menyukai Toko Sembako Bahri.
                </span>
            </div>
        </article>
    </section>

    <!-- Right Column Sidebar -->
    <aside class="fb-col-right">
        <div class="fb-right-card">
            <div class="fb-right-card-header">
                <span class="fb-header-title">LEGALITAS & IZIN TOKO</span>
            </div>
            <div style="font-size:11px; line-height:1.5; color:#555;">
                <p><strong>Nomor Induk Berusaha (NIB):</strong> 912000832194</p>
                <p><strong>Izin Edar:</strong> P-IRT & Kementan RI</p>
                <p><strong>Sertifikasi Halal:</strong> BPJPH Kemenag</p>
                <p><strong>Status:</strong> Terdaftar Resmi di Dinas Koperasi & UKM Kota Bandung</p>
            </div>
        </div>

        <div class="fb-right-card fb-ads-card">
            <div class="fb-right-card-header">
                <span class="fb-header-title">PROMO TERBARU</span>
            </div>
            <div class="fb-ad-item">
                <div class="fb-ad-thumb">🌾</div>
                <div class="fb-ad-content">
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="fb-ad-title">Beras Rojolele 5kg Super</a>
                    <span class="fb-ad-url">tokobahri.urmin.my.id</span>
                    <p class="fb-ad-desc">Beli 2 karung gratis ongkir area sekitar toko! Mulai Rp 75.000.</p>
                </div>
            </div>
        </div>
    </aside>
</div>

<?php
get_footer();
