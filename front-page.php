<?php
/**
 * Homepage Template (front-page.php) — Riper Mart Storefront
 * Matches exact layout from reference mockup:
 * Hero Banner, Categories, Best Sellers, Promo Banner, Value Props, Footer
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="technova-main-content">

    <!-- ═══════════════════════════════════════════════════════
         1. HERO BANNER SECTION
         ═══════════════════════════════════════════════════════ -->
    <section class="technova-hero-section" aria-label="<?php esc_attr_e( 'Banner Utama', 'ukm-toko-theme' ); ?>">
        <div class="site-container">
            <div class="technova-hero-card">

                <!-- Hero Content Row -->
                <div class="hero-card-grid">

                    <!-- Left: Copy & Value Props -->
                    <div class="hero-copy-col">
                        <div class="hero-pill-badge">
                            <span class="badge-sparkle">✦</span>
                            <span><?php esc_html_e( 'Produk Unggulan & Segar', 'ukm-toko-theme' ); ?></span>
                        </div>

                        <h1 class="hero-technova-title">
                            <?php esc_html_e( 'Kebutuhan Harian & Sembako', 'ukm-toko-theme' ); ?><br>
                            <span class="hero-title-highlight"><?php esc_html_e( 'Pasti Lengkap & Hemat', 'ukm-toko-theme' ); ?></span>
                        </h1>

                        <p class="hero-technova-desc">
                            <?php esc_html_e( 'Penuhi kebutuhan beras pulen, minyak goreng kemasan, gula pasir, minuman segar, dan perlengkapan harian keluarga Anda dengan harga terbaik langsung dari toko kami.', 'ukm-toko-theme' ); ?>
                        </p>

                        <div class="hero-cta-wrap">
                            <a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>" class="btn-technova-primary">
                                <span><?php esc_html_e( 'Belanja Katalog Sekarang', 'ukm-toko-theme' ); ?></span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                            </a>
                        </div>

                        <!-- 3 Trust Icons -->
                        <div class="hero-trust-row">
                            <div class="hero-trust-item">
                                <div class="trust-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2">
                                        <rect x="1" y="3" width="15" height="13" rx="1"/>
                                        <polygon points="16 8 20 8 23 11 23 16 16 16 8"/>
                                        <circle cx="5.5" cy="18.5" r="2.5"/>
                                        <circle cx="18.5" cy="18.5" r="2.5"/>
                                    </svg>
                                </div>
                                <div class="trust-text-box">
                                    <strong><?php esc_html_e( 'Pengiriman Cepat', 'ukm-toko-theme' ); ?></strong>
                                    <span><?php esc_html_e( 'Siap Antar ke Rumah', 'ukm-toko-theme' ); ?></span>
                                </div>
                            </div>

                            <div class="hero-trust-item">
                                <div class="trust-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                        <polyline points="9 11 12 14 22 4"/>
                                    </svg>
                                </div>
                                <div class="trust-text-box">
                                    <strong><?php esc_html_e( 'Pembayaran Aman', 'ukm-toko-theme' ); ?></strong>
                                    <span><?php esc_html_e( 'COD & Transfer Bank', 'ukm-toko-theme' ); ?></span>
                                </div>
                            </div>

                            <div class="hero-trust-item">
                                <div class="trust-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2">
                                        <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                                        <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                                    </svg>
                                </div>
                                <div class="trust-text-box">
                                    <strong><?php esc_html_e( 'Layanan Ramah', 'ukm-toko-theme' ); ?></strong>
                                    <span><?php esc_html_e( 'Setiap Hari Siap Melayani', 'ukm-toko-theme' ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Product Collage Image -->
                    <div class="hero-image-col">
                        <div class="hero-image-container">
                            <img src="<?php echo esc_url( UKM_THEME_URI . '/assets/images/technova/hero-technova.jpg' ); ?>"
                                 alt="<?php esc_attr_e( 'Koleksi Produk Sembako Riper Mart', 'ukm-toko-theme' ); ?>"
                                 class="hero-mockup-img"
                                 loading="eager" />
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════
         2. CATEGORIES SECTION (Jelajahi Berdasarkan Kategori)
         ═══════════════════════════════════════════════════════ -->
    <section class="technova-categories-section" id="categories">
        <div class="site-container">

            <div class="section-title-row">
                <div class="section-title-left">
                    <span class="section-tag-sub"><?php esc_html_e( '— KATEGORI PILIHAN', 'ukm-toko-theme' ); ?></span>
                    <h2 class="section-main-heading"><?php esc_html_e( 'Jelajahi Berdasarkan Kategori', 'ukm-toko-theme' ); ?></h2>
                </div>
                <div class="section-title-right">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>" class="link-see-all">
                        <?php esc_html_e( 'Lihat Semua Produk', 'ukm-toko-theme' ); ?> &rarr;
                    </a>
                </div>
            </div>

            <!-- 6 Category Cards Grid -->
            <div class="technova-categories-grid">
                <?php
                $category_items = array(
                    array(
                        'name'  => __( 'Sembako', 'ukm-toko-theme' ),
                        'slug'  => 'sembako',
                        'image' => file_exists( UKM_THEME_DIR . '/assets/images/products/201.jpg' ) ? UKM_THEME_URI . '/assets/images/products/201.jpg' : UKM_THEME_URI . '/assets/images/technova/prod-iphone15.jpg',
                    ),
                    array(
                        'name'  => __( 'Minuman', 'ukm-toko-theme' ),
                        'slug'  => 'minuman',
                        'image' => file_exists( UKM_THEME_DIR . '/assets/images/products/211.jpg' ) ? UKM_THEME_URI . '/assets/images/products/211.jpg' : UKM_THEME_URI . '/assets/images/technova/cat-audio.jpg',
                    ),
                    array(
                        'name'  => __( 'Kebersihan', 'ukm-toko-theme' ),
                        'slug'  => 'kebersihan',
                        'image' => file_exists( UKM_THEME_DIR . '/assets/images/products/215.jpg' ) ? UKM_THEME_URI . '/assets/images/products/215.jpg' : UKM_THEME_URI . '/assets/images/technova/prod-macbook.jpg',
                    ),
                    array(
                        'name'  => __( 'Snack & Biskuit', 'ukm-toko-theme' ),
                        'slug'  => 'snack',
                        'image' => file_exists( UKM_THEME_DIR . '/assets/images/products/222.jpg' ) ? UKM_THEME_URI . '/assets/images/products/222.jpg' : UKM_THEME_URI . '/assets/images/technova/cat-gaming.jpg',
                    ),
                    array(
                        'name'  => __( 'Minyak & Bumbu', 'ukm-toko-theme' ),
                        'slug'  => 'sembako',
                        'image' => file_exists( UKM_THEME_DIR . '/assets/images/products/205.jpg' ) ? UKM_THEME_URI . '/assets/images/products/205.jpg' : UKM_THEME_URI . '/assets/images/technova/prod-galaxywatch.jpg',
                    ),
                    array(
                        'name'  => __( 'Kebutuhan Dapur', 'ukm-toko-theme' ),
                        'slug'  => 'kebersihan',
                        'image' => file_exists( UKM_THEME_DIR . '/assets/images/products/216.jpg' ) ? UKM_THEME_URI . '/assets/images/products/216.jpg' : UKM_THEME_URI . '/assets/images/technova/cat-accessoires.jpg',
                    ),
                );

                foreach ( $category_items as $cat ) :
                    $term = get_term_by( 'slug', $cat['slug'], 'kategori-produk' );
                    $cat_url = $term ? get_term_link( $term ) : home_url( '/kategori-produk/' . $cat['slug'] . '/' );
                    $card_name = function_exists('ukm_get_term_display_name') ? ukm_get_term_display_name( $cat['name'], $cat['slug'] ) : $cat['name'];
                ?>
                <a href="<?php echo esc_url( $cat_url ); ?>" class="technova-cat-card">
                    <div class="cat-card-thumb-box">
                        <img src="<?php echo esc_url( $cat['image'] ); ?>"
                             alt="<?php echo esc_attr( $card_name ); ?>"
                             loading="lazy" />
                    </div>
                    <span class="cat-card-name"><?php echo esc_html( $card_name ); ?></span>
                </a>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════
         3. BEST SELLERS / FEATURED PRODUCTS (Produk Terlaris)
         ═══════════════════════════════════════════════════════ -->
    <section class="technova-bestsellers-section" id="bestsellers">
        <div class="site-container">

            <div class="section-title-row">
                <div class="section-title-left">
                    <span class="section-tag-sub"><?php esc_html_e( '— PRODUK PILIHAN', 'ukm-toko-theme' ); ?></span>
                    <h2 class="section-main-heading"><?php esc_html_e( 'Produk Terlaris & Paling Dicari', 'ukm-toko-theme' ); ?></h2>
                </div>
                <div class="section-title-right">
                    <div class="slider-nav-arrows">
                        <button type="button" class="slider-btn-round" aria-label="<?php esc_attr_e( 'Sebelumnya', 'ukm-toko-theme' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
                        </button>
                        <button type="button" class="slider-btn-round" aria-label="<?php esc_attr_e( 'Berikutnya', 'ukm-toko-theme' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 4 Products Grid -->
            <div class="technova-products-grid">
                <?php
                $bestseller_query = new WP_Query( array(
                    'post_type'      => 'produk',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish',
                ) );

                if ( $bestseller_query->have_posts() ) :
                    while ( $bestseller_query->have_posts() ) :
                        $bestseller_query->the_post();
                        get_template_part( 'template-parts/content', 'produk' );
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>' . esc_html__( 'Belum ada produk yang tersedia.', 'ukm-toko-theme' ) . '</p>';
                endif;
                ?>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════
         4. SPECIAL OFFER PROMO BANNER (Penawaran Spesial)
         ═══════════════════════════════════════════════════════ -->
    <section class="technova-promo-section">
        <div class="site-container">
            <div class="technova-promo-card">
                <div class="promo-card-grid">

                    <!-- Left: Promo Text -->
                    <div class="promo-text-col">
                        <div class="promo-pill-badge">
                            <span><?php esc_html_e( 'Penawaran Spesial', 'ukm-toko-theme' ); ?></span>
                        </div>

                        <h2 class="promo-headline">
                            <?php esc_html_e( 'Hemat Belanja Mingguan', 'ukm-toko-theme' ); ?><br>
                            <span class="promo-sub-headline"><?php esc_html_e( 'Dapatkan Diskon Sembako & Paket Hemat', 'ukm-toko-theme' ); ?></span>
                        </h2>

                        <p class="promo-desc">
                            <?php esc_html_e( 'Belanja kebutuhan pokok keluarga lebih hemat dengan paket sembako lengkap dan harga grosir termurah di toko kami!', 'ukm-toko-theme' ); ?>
                        </p>

                        <div class="promo-cta-box">
                            <a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>" class="btn-promo-outline">
                                <span><?php esc_html_e( 'Lihat Promo Sekarang', 'ukm-toko-theme' ); ?></span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Right: Promo Image -->
                    <div class="promo-image-col">
                        <img src="<?php echo esc_url( UKM_THEME_URI . '/assets/images/technova/promo-banner.jpg' ); ?>"
                             alt="<?php esc_attr_e( 'Promo Hemat Sembako', 'ukm-toko-theme' ); ?>"
                             class="promo-banner-img"
                             loading="lazy" />
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════
         5. VALUE PROPOSITION BAR (4 Keunggulan Toko)
         ═══════════════════════════════════════════════════════ -->
    <section class="technova-value-props-section">
        <div class="site-container">
            <div class="technova-values-grid">

                <div class="value-item">
                    <div class="value-icon-circle">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2.2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <polyline points="9 11 12 14 22 4"/>
                        </svg>
                    </div>
                    <div class="value-text">
                        <h4><?php esc_html_e( '100% Produk Asli', 'ukm-toko-theme' ); ?></h4>
                        <p><?php esc_html_e( 'Kualitas terjamin & baru', 'ukm-toko-theme' ); ?></p>
                    </div>
                </div>

                <div class="value-item">
                    <div class="value-icon-circle">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2.2">
                            <rect x="1" y="3" width="15" height="13" rx="1"/>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 8"/>
                            <circle cx="5.5" cy="18.5" r="2.5"/>
                            <circle cx="18.5" cy="18.5" r="2.5"/>
                        </svg>
                    </div>
                    <div class="value-text">
                        <h4><?php esc_html_e( 'Pengiriman Cepat', 'ukm-toko-theme' ); ?></h4>
                        <p><?php esc_html_e( 'Bisa antar langsung ke rumah', 'ukm-toko-theme' ); ?></p>
                    </div>
                </div>

                <div class="value-item">
                    <div class="value-icon-circle">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2.2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </div>
                    <div class="value-text">
                        <h4><?php esc_html_e( 'Pembayaran Mudah', 'ukm-toko-theme' ); ?></h4>
                        <p><?php esc_html_e( 'Bisa COD & Transfer Bank', 'ukm-toko-theme' ); ?></p>
                    </div>
                </div>

                <div class="value-item">
                    <div class="value-icon-circle">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2.2">
                            <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                            <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                        </svg>
                    </div>
                    <div class="value-text">
                        <h4><?php esc_html_e( 'Layanan Ramah', 'ukm-toko-theme' ); ?></h4>
                        <p><?php esc_html_e( 'Siap melayani pesanan Anda', 'ukm-toko-theme' ); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
