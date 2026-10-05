<?php
/**
 * Modern E-Commerce Header Template - Fresh, Clean & Contemporary
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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class('modern-ecommerce-body'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">
    <a class="skip-link screen-reader-text" href="#primary-content"><?php esc_html_e('Lewati ke konten utama', 'ukm-toko-theme'); ?></a>

    <!-- 1. TOP ANNOUNCEMENT BAR -->
    <div class="top-announcement-bar">
        <div class="site-container announcement-flex">
            <div class="announcement-left">
                <span class="announcement-badge">PROMO</span>
                <span class="announcement-text">🚚 Gratis Ongkir untuk Pesanan Sembako di atas Rp 50.000 • Garansi Timbangan Pas!</span>
            </div>
            <div class="announcement-right">
                <span class="announcement-info">🕒 Buka: 07:00 - 21:00 WIB</span>
                <span class="announcement-divider">|</span>
                <?php 
                $wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
                $wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
                ?>
                <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>" target="_blank" rel="noopener noreferrer" class="announcement-wa">
                    <span class="dot-live"></span> CS WhatsApp: +<?php echo esc_html($wa_clean); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- 2. MAIN HEADER (Sticky & Sleek) -->
    <header id="masthead" class="site-main-header">
        <div class="site-container header-inner-flex">
            <!-- Brand Logo -->
            <div class="header-brand-wrap">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-logo-link" title="Beranda Toko Bahri">
                    <div class="brand-icon-box">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </div>
                    <div class="brand-text-col">
                        <span class="brand-title">TOKO BAHRI</span>
                        <span class="brand-tagline">Grosir & Retail Sembako</span>
                    </div>
                </a>
            </div>

            <!-- Central Search Bar with Category Select -->
            <div class="header-search-wrap">
                <form role="search" method="get" class="modern-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-input-shell">
                        <span class="search-icon-left">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </span>
                        <input type="search" class="search-field-input" placeholder="Cari beras pulen, minyak goreng, gula, tepung, sabun..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
                        <input type="hidden" name="post_type" value="produk" />
                        <button type="submit" class="search-submit-btn">Cari</button>
                    </div>
                </form>
                <div class="search-quick-tags">
                    <span class="quick-tag-label">Populer:</span>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>" class="quick-tag">🌾 Beras 5kg</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>" class="quick-tag">Minyak Bimoli</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=kebersihan')); ?>" class="quick-tag">Sunlight</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=minuman')); ?>" class="quick-tag">Kopi Kapal Api</a>
                </div>
            </div>

            <!-- Right Quick Action Badges -->
            <div class="header-actions-wrap">
                <!-- Mitra Warung -->
                <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="header-action-btn" title="Mitra Warung Binaan">
                    <div class="action-icon-circle">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <div class="action-btn-text">
                        <small>Mitra Binaan</small>
                        <strong>5+ Warung</strong>
                    </div>
                </a>

                <!-- WhatsApp Quick Order -->
                <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%20Toko%20Bahri%2C%20saya%20ingin%20pesan%20sembako" target="_blank" rel="noopener noreferrer" class="header-action-btn wa-pill-btn" title="Order via WhatsApp">
                    <div class="action-icon-circle wa-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.127-.061-.271-.088-.61-.205-1.045-.395-1.841-.806-3.037-2.673-3.129-2.796-.092-.124-.744-.991-.744-1.89s.471-1.341.638-1.523c.168-.182.366-.228.489-.228.123 0 .245.001.353.006.113.006.264-.043.413.315.153.367.52 1.27.565 1.363.046.092.077.2.015.323-.061.124-.092.2-.184.308-.092.108-.194.241-.277.324-.092.092-.188.192-.081.376.108.183.479.79 1.026 1.278.704.628 1.298.822 1.482.914.184.092.292.077.4-.046.108-.124.46-1.339.583-.454.123-.114.246-.092.414-.03.168.061 1.069.504 1.253.596.184.092.306.138.352.215.046.077.046.445-.098.85z"/>
                        </svg>
                    </div>
                    <div class="action-btn-text">
                        <small>Chat Admin</small>
                        <strong>Order WA</strong>
                    </div>
                </a>

                <!-- Cart Button -->
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="header-cart-pill" id="modernHeaderCart" title="Lihat Keranjang">
                    <div class="cart-pill-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="cart-pill-count" id="headerCartCount">0</span>
                    </div>
                    <div class="cart-pill-info">
                        <span class="cart-pill-title">Keranjang</span>
                        <strong class="cart-pill-total" id="headerCartTotal">Rp 0</strong>
                    </div>
                </a>
            </div>
        </div>

        <!-- 3. SUB NAVBAR (Modern Category Tabs & Navigation Links) -->
        <nav class="site-sub-navbar" aria-label="Menu Utama">
            <div class="site-container sub-nav-flex">
                <!-- All Categories Dropdown Trigger -->
                <div class="category-menu-trigger">
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="cat-trigger-btn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                        <span>SEMUA KATEGORI</span>
                    </a>
                </div>

                <!-- Nav Links -->
                <ul class="main-navigation-menu">
                    <li class="<?php echo is_front_page() ? 'current-menu-item' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
                    </li>
                    <li class="<?php echo (is_post_type_archive('produk') || is_singular('produk')) ? 'current-menu-item' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/produk/')); ?>">Katalog Produk</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>">🌾 Beras & Pokok</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/produk/?kategori=minuman')); ?>">🧃 Minuman</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/produk/?kategori=kebersihan')); ?>">🧼 Sabun & Cuci</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/produk/?kategori=snack')); ?>">🍪 Camilan</a>
                    </li>
                    <li class="<?php echo is_post_type_archive('klien') ? 'current-menu-item' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/klien/')); ?>">Mitra Warung</a>
                    </li>
                    <li class="<?php echo (is_home() || is_singular('post')) ? 'current-menu-item' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog Tips</a>
                    </li>
                    <li class="<?php echo is_page('tentang-kami') ? 'current-menu-item' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>">Tentang Kami</a>
                    </li>
                    <li class="<?php echo is_page('kontak') ? 'current-menu-item' : ''; ?>">
                        <a href="<?php echo esc_url(home_url('/kontak/')); ?>">Kontak</a>
                    </li>
                </ul>

                <!-- Right Quick Checkout Link -->
                <div class="sub-nav-right">
                    <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="quick-checkout-link">
                        <span>⚡ Kasir Sandbox &rarr;</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>
