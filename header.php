<?php
/**
 * Header Template — TechNova Modern E-Commerce
 *
 * @package UKM_Toko_Theme
 */

$store_name = get_theme_mod( 'ukm_store_brand_name', 'Riper Mart' );
$store_tagline = get_theme_mod( 'ukm_store_brand_tagline', 'Toko Sembako & Kebutuhan Harian Terlengkap' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'technova-body' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">
    <a class="skip-link screen-reader-text" href="#primary-content">
        <?php esc_html_e( 'Lompat ke konten utama', 'ukm-toko-theme' ); ?>
    </a>

    <!-- ═══════════════ RETRO BULLETIN BAR (WEB JAMAN DULU) ═══════════════ -->
    <div class="retro-bulletin-bar">
        <div class="site-container retro-bulletin-inner">
            <span class="retro-bulletin-tag">[INFORMASI RESMI]</span>
            <span class="retro-bulletin-text">&#9658; RIPER MART &mdash; PUSAT GROSIR &amp; SEMBAKO TERPERCAYA &bull; BUKA SETIAP HARI &bull; SIAP ANTAR KE RUMAH &bull; TELP/WA: 0812-3456-7890</span>
            <span class="retro-bulletin-date"><?php echo date_i18n( 'd/m/Y' ); ?></span>
        </div>
    </div>

    <!-- ═══════════════ MAIN HEADER ═══════════════ -->
    <header id="masthead" class="site-header-technova">
        <div class="site-container header-technova-inner">

            <!-- Brand Logo -->
            <div class="header-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-link" title="<?php echo esc_attr( $store_name ); ?>">
                    <div class="brand-icon-technova" aria-hidden="true">
                        <!-- Modern shopping bag icon -->
                        <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
                            <path d="M7 10H25L23.5 27H8.5L7 10Z" stroke="#000000" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12V7.5C12 5.567 13.7909 4 16 4C18.2091 4 20 5.567 20 7.5V12" stroke="#000000" stroke-width="2.2" stroke-linecap="round"/>
                            <path d="M12 15C13 16.5 14.5 17.5 16 17.5C17.5 17.5 19 16.5 20 15" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <span class="brand-name-technova"><?php echo esc_html( $store_name ); ?></span>
                </a>
            </div>

            <!-- Center Navigation Menu -->
            <nav id="site-navigation" class="header-nav-technova" style="display:flex !important; align-items:center !important; flex-shrink:0 !important;" aria-label="<?php esc_attr_e( 'Menu Utama', 'ukm-toko-theme' ); ?>">
                <ul class="nav-menu-technova" style="display:flex !important; flex-direction:row !important; flex-wrap:nowrap !important; align-items:center !important; white-space:nowrap !important; gap:8px !important; margin:0 !important; padding:0 !important; list-style:none !important;">
                    <li class="menu-item <?php echo is_front_page() ? 'active' : ''; ?>" style="flex:0 0 auto !important; flex-shrink:0 !important; white-space:nowrap !important;">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="white-space:nowrap !important; display:inline-flex !important; align-items:center !important; justify-content:center !important; height:38px !important; line-height:38px !important; padding:0 14px !important; box-sizing:border-box !important;">
                            <?php esc_html_e( 'Beranda', 'ukm-toko-theme' ); ?>
                        </a>
                    </li>
                    <li class="menu-item <?php echo is_post_type_archive( 'produk' ) ? 'active' : ''; ?>" style="flex:0 0 auto !important; flex-shrink:0 !important; white-space:nowrap !important;">
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>" style="white-space:nowrap !important; display:inline-flex !important; align-items:center !important; justify-content:center !important; height:38px !important; line-height:38px !important; padding:0 14px !important; box-sizing:border-box !important;">
                            <span>Katalog&nbsp;Produk</span>
                        </a>
                    </li>
                    <li class="menu-item has-dropdown" style="flex:0 0 auto !important; flex-shrink:0 !important; white-space:nowrap !important;">
                        <a href="<?php echo esc_url( home_url( '/#categories' ) ); ?>" style="white-space:nowrap !important; display:inline-flex !important; align-items:center !important; justify-content:center !important; height:38px !important; line-height:38px !important; padding:0 14px !important; box-sizing:border-box !important;">
                            <span><?php esc_html_e( 'Kategori', 'ukm-toko-theme' ); ?></span>
                            <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                        </a>
                        <ul class="sub-menu-technova" style="width:100% !important; min-width:100% !important; max-width:100% !important; box-sizing:border-box !important; padding:4px !important; display:none; flex-direction:column !important; gap:4px !important; margin:2px 0 0 0 !important;">
                            <li style="width:100% !important; display:block !important;"><a href="<?php echo esc_url( home_url( '/kategori-produk/sembako/' ) ); ?>" style="width:100% !important; display:flex !important; align-items:center !important; justify-content:center !important; text-align:center !important; height:32px !important; line-height:32px !important; padding:0 6px !important; font-size:11px !important; box-sizing:border-box !important;"><?php esc_html_e( 'Sembako', 'ukm-toko-theme' ); ?></a></li>
                            <li style="width:100% !important; display:block !important;"><a href="<?php echo esc_url( home_url( '/kategori-produk/minuman/' ) ); ?>" style="width:100% !important; display:flex !important; align-items:center !important; justify-content:center !important; text-align:center !important; height:32px !important; line-height:32px !important; padding:0 6px !important; font-size:11px !important; box-sizing:border-box !important;"><?php esc_html_e( 'Minuman', 'ukm-toko-theme' ); ?></a></li>
                            <li style="width:100% !important; display:block !important;"><a href="<?php echo esc_url( home_url( '/kategori-produk/kebersihan/' ) ); ?>" style="width:100% !important; display:flex !important; align-items:center !important; justify-content:center !important; text-align:center !important; height:32px !important; line-height:32px !important; padding:0 6px !important; font-size:11px !important; box-sizing:border-box !important;"><?php esc_html_e( 'Kebersihan', 'ukm-toko-theme' ); ?></a></li>
                            <li style="width:100% !important; display:block !important;"><a href="<?php echo esc_url( home_url( '/kategori-produk/snack/' ) ); ?>" style="width:100% !important; display:flex !important; align-items:center !important; justify-content:center !important; text-align:center !important; height:32px !important; line-height:32px !important; padding:0 6px !important; font-size:11px !important; box-sizing:border-box !important;"><?php esc_html_e( 'Snack', 'ukm-toko-theme' ); ?></a></li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo is_page( 'tentang' ) || is_page( 'tentang-kami' ) ? 'active' : ''; ?>" style="flex:0 0 auto !important; flex-shrink:0 !important; white-space:nowrap !important;">
                        <a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>" style="white-space:nowrap !important; display:inline-flex !important; align-items:center !important; justify-content:center !important; height:38px !important; line-height:38px !important; padding:0 14px !important; box-sizing:border-box !important;">
                            <span>Tentang&nbsp;Kami</span>
                        </a>
                    </li>
                    <li class="menu-item <?php echo is_page( 'kontak' ) ? 'active' : ''; ?>" style="flex:0 0 auto !important; flex-shrink:0 !important; white-space:nowrap !important;">
                        <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>" style="white-space:nowrap !important; display:inline-flex !important; align-items:center !important; justify-content:center !important; height:38px !important; line-height:38px !important; padding:0 14px !important; box-sizing:border-box !important;">
                            <?php esc_html_e( 'Kontak', 'ukm-toko-theme' ); ?>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Right: Search Pill + User Icon + Cart Icon -->
            <div class="header-right-technova">
                <!-- Search Pill -->
                <div class="search-pill-wrapper" role="search">
                    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-pill">
                        <span class="search-pill-icon" aria-hidden="true">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.2">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                        </span>
                        <input type="search" name="s" class="search-pill-input"
                               placeholder="<?php esc_attr_e( 'Cari produk sembako...', 'ukm-toko-theme' ); ?>"
                               value="<?php echo get_search_query(); ?>"
                               autocomplete="off" />
                        <input type="hidden" name="post_type" value="produk">
                    </form>
                </div>

                <!-- User Profile Icon -->
                <a href="<?php echo esc_url( home_url( '/my-account/' ) ); ?>" class="header-icon-btn" aria-label="<?php esc_attr_e( 'Akun Saya', 'ukm-toko-theme' ); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </a>

                <!-- Cart Icon with Badge Count -->
                <a href="<?php echo esc_url( home_url( '/keranjang/' ) ); ?>" class="header-cart-btn" aria-label="<?php esc_attr_e( 'Keranjang Belanja', 'ukm-toko-theme' ); ?>">
                    <div class="cart-icon-box">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                            <line x1="3" y1="6" x2="21" y2="6"/>
                            <path d="M16 10a4 4 0 0 1-8 0"/>
                        </svg>
                        <span class="cart-badge-count" id="header-cart-count">0</span>
                    </div>
                </a>

                <!-- Mobile Hamburger Toggle -->
                <button type="button" class="technova-hamburger" id="nav-toggle" aria-label="<?php esc_attr_e( 'Buka menu', 'ukm-toko-theme' ); ?>">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer Menu -->
        <div class="mobile-drawer-technova" id="mobile-menu">
            <div class="mobile-drawer-inner">
                <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form-pill mobile-search">
                    <span class="search-pill-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </span>
                    <input type="search" name="s" class="search-pill-input" placeholder="<?php esc_attr_e( 'Cari produk sembako...', 'ukm-toko-theme' ); ?>">
                    <input type="hidden" name="post_type" value="produk">
                </form>
                <ul class="mobile-nav-list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Beranda', 'ukm-toko-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>"><?php esc_html_e( 'Katalog Produk', 'ukm-toko-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#categories' ) ); ?>"><?php esc_html_e( 'Kategori', 'ukm-toko-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>"><?php esc_html_e( 'Tentang Kami', 'ukm-toko-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"><?php esc_html_e( 'Kontak', 'ukm-toko-theme' ); ?></a></li>
                </ul>
            </div>
        </div>
    </header>
