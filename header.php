<?php
/**
 * Header Template - Modern Black & White Monochrome Social Commerce UI
 *
 * @package UKM_Toko_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class('mono-theme-body'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="mono-site-wrapper">
    <a class="skip-link screen-reader-text" href="#primary-content"><?php esc_html_e('Lewati ke konten utama', 'ukm-toko'); ?></a>

    <!-- 1. TOP NAV BAR (DEEP INK BLACK #09090b) -->
    <header id="masthead" class="mono-top-bar">
        <div class="mono-header-inner">
            <!-- Left: Brand Logo & Search -->
            <div class="mono-header-left">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mono-logo-link" title="Beranda Toko Bahri">
                    <span class="mono-logo-badge">TB</span>
                    <div class="mono-logo-text-group">
                        <span class="mono-brand-title">TOKO BAHRI</span>
                        <span class="mono-brand-sub">SEMBAKO & RETAIL</span>
                    </div>
                </a>

                <!-- Search Input -->
                <form role="search" method="get" class="mono-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="mono-search-input-wrap">
                        <input type="search" class="mono-search-input" placeholder="Cari beras, minyak, sabun..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
                        <input type="hidden" name="post_type" value="produk" />
                        <button type="submit" class="mono-search-btn" aria-label="Cari">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Middle: Social Action Badges -->
            <div class="mono-header-icons">
                <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="mono-icon-btn" title="Mitra Warung Binaan">
                    <span class="mono-icon-symbol">👥</span>
                    <span class="mono-badge-count">2</span>
                </a>
                <?php 
                $wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
                $wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
                ?>
                <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%20Toko%20Bahri" target="_blank" rel="noopener noreferrer" class="mono-icon-btn" title="Chat WhatsApp">
                    <span class="mono-icon-symbol">💬</span>
                    <span class="mono-badge-count">1</span>
                </a>
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="mono-icon-btn" title="Keranjang Belanja">
                    <span class="mono-icon-symbol">🛒</span>
                    <span class="mono-badge-count" id="headerCartCount">0</span>
                </a>
            </div>

            <!-- Right: User Avatar & Checkout Button -->
            <div class="mono-header-right">
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="mono-btn-checkout-top">
                    <span>Kasir Sandbox &rarr;</span>
                </a>
            </div>
        </div>
    </header>

    <!-- 2. CLEAN WHITE NAV TABS (Exact match to user's uploaded image with bold black indicator) -->
    <nav class="mono-sub-navbar" aria-label="Menu Halaman">
        <div class="mono-header-inner">
            <ul class="mono-nav-tabs">
                <li class="<?php echo is_front_page() ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="mono-tab-link">Beranda</a>
                </li>
                <li class="<?php echo (is_post_type_archive('produk') || is_singular('produk')) ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="mono-tab-link">Katalog Produk</a>
                </li>
                <li class="<?php echo (is_post_type_archive('klien') || is_singular('klien')) ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="mono-tab-link">Mitra Warung</a>
                </li>
                <li class="<?php echo is_page('tentang') ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/tentang/')); ?>" class="mono-tab-link">Tentang</a>
                </li>
                <li class="<?php echo is_page('kontak') ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(home_url('/kontak/')); ?>" class="mono-tab-link">Kontak</a>
                </li>
            </ul>

            <div class="mono-sub-nav-cart">
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="mono-cart-pill-link">
                    <span>🛒 Keranjang (<strong id="subCartCount">0</strong>)</span>
                    <span class="mono-cart-total-val" id="subCartTotal">Rp 0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Notice Ticker -->
    <div class="mono-ticker-bar">
        <div class="mono-header-inner">
            <span class="mono-ticker-badge">PENGUMUMAN</span>
            <span class="mono-ticker-text">🎉 Toko Sembako Bahri melayani pemesanan grosir & eceran langsung diantar. Uji fitur belanja & pembayaran di menu Kasir Sandbox!</span>
            <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="mono-ticker-btn">Coba Kasir Sandbox &rarr;</a>
        </div>
    </div>

    <!-- Main Content Canvas -->
    <main id="primary-content" class="mono-main-canvas">
