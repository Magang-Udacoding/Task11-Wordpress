<?php
/**
 * Front Page Template - Modern Black & White Social-Commerce Feed
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
$wa_url    = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode('Halo Admin Toko Bahri, saya ingin pesan sembako untuk diantar.');
?>

<div class="mono-layout-grid">
    <!-- ============================================================= -->
    <!-- 1. LEFT SIDEBAR (Profil Toko, Navigasi, Kategori)             -->
    <!-- ============================================================= -->
    <aside class="mono-col-left">
        <!-- Store Profile Card -->
        <div class="mono-side-card mono-profile-box">
            <div class="mono-profile-avatar">
                <span>TB</span>
            </div>
            <div class="mono-profile-meta">
                <h2 class="mono-profile-title">Toko Sembako Bahri</h2>
                <span class="mono-profile-tag">● Toko Sembako Resmi</span>
                <a href="<?php echo esc_url(home_url('/tentang/')); ?>" class="mono-profile-link">Lihat Profil Toko &rarr;</a>
            </div>
        </div>

        <!-- Left Menu -->
        <div class="mono-side-card">
            <span class="mono-card-title">NAVIGASI UTAMA</span>
            <ul class="mono-side-menu">
                <li class="active">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <span class="mono-menu-icon">📰</span>
                        <span class="mono-menu-text">Beranda Toko</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>">
                        <span class="mono-menu-icon">🛍️</span>
                        <span class="mono-menu-text">Katalog Sembako (22+)</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/klien/')); ?>">
                        <span class="mono-menu-icon">👥</span>
                        <span class="mono-menu-text">Mitra Warung Binaan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/tentang/')); ?>">
                        <span class="mono-menu-icon">📖</span>
                        <span class="mono-menu-text">Tentang Toko</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/kontak/')); ?>">
                        <span class="mono-menu-icon">📞</span>
                        <span class="mono-menu-text">Kontak & Lokasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/checkout/')); ?>">
                        <span class="mono-menu-icon">💳</span>
                        <span class="mono-menu-text">Kasir & Checkout</span>
                        <span class="mono-menu-badge">Demo</span>
                    </a>
                </li>
            </ul>

            <span class="mono-card-title" style="margin-top:16px;">KATEGORI PRODUK</span>
            <ul class="mono-side-menu">
                <li>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>?kategori=sembako">
                        <span class="mono-menu-icon">🌾</span>
                        <span class="mono-menu-text">Beras & Sembako Pokok</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>?kategori=minuman">
                        <span class="mono-menu-icon">🧃</span>
                        <span class="mono-menu-text">Minuman Segar & Kopi</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>?kategori=kebersihan">
                        <span class="mono-menu-icon">🧼</span>
                        <span class="mono-menu-text">Sabun & Kebersihan</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>?kategori=snack">
                        <span class="mono-menu-icon">🍪</span>
                        <span class="mono-menu-text">Camilan & Snack</span>
                    </a>
                </li>
            </ul>

            <div class="mono-side-info-box">
                <p><strong>📍 Lokasi:</strong> <?php echo esc_html(get_theme_mod('ukm_store_address', 'Jl. Merdeka No. 45, Bandung')); ?></p>
                <p><strong>🕒 Jam Buka:</strong> 07:00 - 21:00 WIB</p>
                <p><strong>🚚 Pengiriman:</strong> Diantar Hari Ini (Same-Day)</p>
            </div>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- 2. CENTER COLUMN: FEED OF PRODUCTS                            -->
    <!-- ============================================================= -->
    <section class="mono-col-center">
        <!-- Status Publisher Card -->
        <div class="mono-publisher-card">
            <div class="mono-publisher-tabs">
                <button type="button" class="mono-pub-tab active">
                    <span>✏️</span> Tulis Pesanan Sembako
                </button>
                <button type="button" class="mono-pub-tab">
                    <span>🛒</span> Titip Belanja Cepat
                </button>
            </div>

            <div class="mono-publisher-body">
                <div class="mono-publisher-avatar">TB</div>
                <textarea class="mono-publisher-textarea" id="fbStatusText" placeholder="Sedang butuh sembako apa hari ini? Tulis pesanan beras, minyak, telur, atau sabun Anda di sini..."></textarea>
            </div>

            <div class="mono-publisher-footer">
                <div class="mono-pub-meta">
                    <span class="mono-pub-pill">🌍 Publik</span>
                    <span class="mono-pub-hint">💬 Terhubung otomatis ke WhatsApp Toko</span>
                </div>
                <button type="button" class="mono-btn-primary mono-btn-sm" id="fbSendStatusBtn">
                    Pesan via WhatsApp &rarr;
                </button>
            </div>
        </div>

        <!-- MODERN HERO PROMO BANNER -->
        <div class="modern-hero-banner">
            <div class="hero-banner-content">
                <span class="hero-badge">🌟 DISTRIBUTOR RESMI SEMBAKO BANDUNG</span>
                <h2 class="hero-title">Kebutuhan Pokok Murah & Segar, Siap Diantar Langsung ke Rumah!</h2>
                <p class="hero-desc">Beras rojolele, minyak goreng, gula, dan sabun lengkap dengan harga grosir langsung dari gudang. Garansi barang asli & timbangan pas.</p>
                <div class="hero-usp-row">
                    <span class="hero-usp-item">🚀 <strong>Same-Day:</strong> 1-2 Jam Sampai</span>
                    <span class="hero-usp-item">🚚 <strong>Gratis Ongkir:</strong> Radius 5 KM</span>
                    <span class="hero-usp-item">💵 <strong>Bayar di Tempat:</strong> Bisa COD</span>
                </div>
            </div>
            <div class="hero-banner-actions">
                <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="hero-cta-btn">Belanja Katalog &rarr;</a>
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="hero-cta-sandbox">⚡ Coba Kasir Sandbox</a>
            </div>
        </div>

        <!-- CATEGORY CHIP PILLS -->
        <div class="modern-category-pills">
            <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="cat-chip-pill active">
                <span class="chip-icon">🛍️</span>
                <span>Semua Produk</span>
            </a>
            <a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>" class="cat-chip-pill">
                <span class="chip-icon">🌾</span>
                <span>Beras & Sembako</span>
            </a>
            <a href="<?php echo esc_url(home_url('/produk/?kategori=minuman')); ?>" class="cat-chip-pill">
                <span class="chip-icon">🧃</span>
                <span>Minuman & Kopi</span>
            </a>
            <a href="<?php echo esc_url(home_url('/produk/?kategori=kebersihan')); ?>" class="cat-chip-pill">
                <span class="chip-icon">🧼</span>
                <span>Sabun & Cuci</span>
            </a>
            <a href="<?php echo esc_url(home_url('/produk/?kategori=snack')); ?>" class="cat-chip-pill">
                <span class="chip-icon">🍪</span>
                <span>Camilan & Snack</span>
            </a>
        </div>

        <!-- Feed Filter Header -->
        <div class="mono-feed-header-bar">
            <div>
                <span class="mono-feed-title">Katalog Pos Produk Sembako Bahri</span>
            </div>
            <div class="mono-feed-header-links">
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="mono-feed-checkout-link">
                    ⚡ Buka Kasir Sandbox &rarr;
                </a>
            </div>
        </div>

        <!-- The Posts Stream -->
        <div class="mono-posts-stream">
            <?php
            $args_produk = array(
                'post_type'      => 'produk',
                'posts_per_page' => 15,
                'post_status'    => 'publish',
            );
            $produk_query = new WP_Query($args_produk);

            if ($produk_query->have_posts()) :
                while ($produk_query->have_posts()) : $produk_query->the_post();
                    get_template_part('template-parts/content', 'produk');
                endwhile;
                wp_reset_postdata();
            else :
                echo '<div class="mono-empty-card">Belum ada pos produk sembako.</div>';
            endif;
            ?>
        </div>

        <!-- Pagination / View All Card -->
        <div class="mono-more-card">
            <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="mono-btn-secondary" style="width:100%; text-align:center;">
                Lihat Seluruh 22+ Produk Sembako di Katalog Lengkap &rarr;
            </a>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 3. RIGHT SIDEBAR (Mitra, Iklan Sponsor, Chat Online)         -->
    <!-- ============================================================= -->
    <aside class="mono-col-right">
        <!-- Mitra Warung Requests Card -->
        <div class="mono-side-card">
            <div class="mono-side-card-header">
                <span class="mono-side-header-title">MITRA WARUNG BINAAN</span>
                <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="mono-side-header-link">Lihat Semua</a>
            </div>

            <!-- Mitra 1 -->
            <div class="mono-partner-item">
                <div class="mono-partner-avatar">👨‍🍳</div>
                <div class="mono-partner-info">
                    <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="mono-partner-name">Warung Makan Pak Slamet</a>
                    <span class="mono-partner-sub">Pelanggan Grosir Tetap</span>
                    <div class="mono-partner-actions">
                        <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Pak%20Slamet" target="_blank" class="mono-btn-xs-black">Hubungi</a>
                        <a href="javascript:void(0);" class="mono-btn-xs-outline fb-delete-btn">Tutup</a>
                    </div>
                </div>
            </div>

            <!-- Mitra 2 -->
            <div class="mono-partner-item">
                <div class="mono-partner-avatar">👵</div>
                <div class="mono-partner-info">
                    <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="mono-partner-name">Toko Sembako Bu RT</a>
                    <span class="mono-partner-sub">Mitra Kelontong Resmi</span>
                    <div class="mono-partner-actions">
                        <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Bu%20RT" target="_blank" class="mono-btn-xs-black">Hubungi</a>
                        <a href="javascript:void(0);" class="mono-btn-xs-outline fb-delete-btn">Tutup</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo Banner Card -->
        <div class="mono-side-card">
            <div class="mono-side-card-header">
                <span class="mono-side-header-title">PROMO SPESIAL</span>
            </div>
            <div class="mono-promo-side-item">
                <img src="<?php echo esc_url(UKM_THEME_URI . '/assets/images/products/201.jpg'); ?>" alt="Beras Rojolele" class="mono-promo-thumb" />
                <div class="mono-promo-details">
                    <strong class="mono-promo-title">Beras Rojolele 5kg Super</strong>
                    <span class="mono-promo-price">Rp 75.000</span>
                    <p class="mono-promo-desc">Langsung dari petani binaan, bebas pengawet.</p>
                </div>
            </div>
        </div>

        <!-- Active Contacts (Chat) -->
        <div class="mono-side-card">
            <div class="mono-side-card-header">
                <span class="mono-side-header-title">KONTAK ONLINE</span>
                <span class="mono-online-badge">● 3 Online</span>
            </div>
            <ul class="mono-contact-list">
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>" target="_blank" class="mono-contact-row">
                        <span class="mono-contact-avatar">🏪</span>
                        <span class="mono-contact-name">Admin Toko Bahri (CS)</span>
                        <span class="mono-dot online"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Bu%20RT" target="_blank" class="mono-contact-row">
                        <span class="mono-contact-avatar">👵</span>
                        <span class="mono-contact-name">Toko Sembako Bu RT</span>
                        <span class="mono-dot online"></span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Pak%20Slamet" target="_blank" class="mono-contact-row">
                        <span class="mono-contact-avatar">👨‍🍳</span>
                        <span class="mono-contact-name">Warung Makan Pak Slamet</span>
                        <span class="mono-dot online"></span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>

<?php
get_footer();
