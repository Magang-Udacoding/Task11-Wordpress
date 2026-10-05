<?php
/**
 * Modern Front Page Template - Ultra-Modern E-Commerce Storefront
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
$wa_url    = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode('Halo Admin Toko Bahri, saya ingin pesan sembako untuk diantar ke rumah/warung.');
?>

<main id="primary-content" class="modern-home-main">

    <!-- ============================================================= -->
    <!-- 1. MODERN HERO BANNER SECTION                                 -->
    <!-- ============================================================= -->
    <section class="modern-hero-section">
        <div class="site-container hero-grid-layout">
            <!-- Left: Value Prop & CTA -->
            <div class="hero-text-col">
                <div class="hero-badge-pill">
                    <span class="badge-icon">🌿</span>
                    <span>PUSAT SEMBAKO & RETAIL GROSIR RESMI</span>
                </div>
                <h1 class="hero-main-title">
                    Kebutuhan Sembako Rumah & Usaha Warung, <span class="text-gradient">Segar & Hemat.</span>
                </h1>
                <p class="hero-subtitle">
                    Beras rojolele pulen, minyak goreng, gula, telur, dan sabun lengkap langsung dari gudang. Dijamin timbangan pas, harga grosir jujur, dan siap diantar same-day ke alamat Anda.
                </p>

                <div class="hero-cta-group">
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="btn-primary-hero">
                        <span>🛍️ Belanja Katalog Lengkap</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-wa-hero">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.127-.061-.271-.088-.61-.205-1.045-.395-1.841-.806-3.037-2.673-3.129-2.796-.092-.124-.744-.991-.744-1.89s.471-1.341.638-1.523c.168-.182.366-.228.489-.228.123 0 .245.001.353.006.113.006.264-.043.413.315.153.367.52 1.27.565 1.363.046.092.077.2.015.323-.061.124-.092.2-.184.308-.092.108-.194.241-.277.324-.092.092-.188.192-.081.376.108.183.479.79 1.026 1.278.704.628 1.298.822 1.482.914.184.092.292.077.4-.046.108-.124.46-1.339.583-.454.123-.114.246-.092.414-.03.168.061 1.069.504 1.253.596.184.092.306.138.352.215.046.077.046.445-.098.85z"/>
                        </svg>
                        <span>Pesan via WhatsApp</span>
                    </a>
                </div>

                <!-- Trust Micro Badges -->
                <div class="hero-trust-bar">
                    <div class="trust-item">
                        <span class="trust-icon">⚡</span>
                        <div class="trust-desc">
                            <strong>Diantar Hari Ini</strong>
                            <small>Order sebelum jam 17:00</small>
                        </div>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">⚖️</span>
                        <div class="trust-desc">
                            <strong>Timbangan Presisi</strong>
                            <small>Garansi timbangan pas</small>
                        </div>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">🏷️</span>
                        <div class="trust-desc">
                            <strong>Harga Grosir</strong>
                            <small>Hemat untuk warung & rumah</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Highlighted Promo Showcase Card -->
            <div class="hero-card-col">
                <div class="hero-featured-card">
                    <div class="featured-badge-ribbon">⭐ PRODUK TERLARIS</div>
                    <div class="featured-img-wrap">
                        <img src="<?php echo esc_url(UKM_THEME_URI . '/assets/images/products/201.jpg'); ?>" alt="Beras Premium Rojolele 5kg" class="featured-card-img" />
                    </div>
                    <div class="featured-card-body">
                        <div class="featured-card-cat">🌾 Beras & Sembako Pokok</div>
                        <h3 class="featured-card-title">Beras Premium Rojolele 5kg Super Pulen</h3>
                        <p class="featured-card-desc">Beras putih bersih alami tanpa pemutih kimia. Pulen, wangi, dan awet seharian tidak mudah basi.</p>
                        
                        <div class="featured-price-row">
                            <div class="price-stack">
                                <span class="current-price">Rp 75.000</span>
                                <span class="old-price">Rp 85.000</span>
                            </div>
                            <span class="save-tag">Hemat Rp 10.000</span>
                        </div>

                        <div class="featured-action-row">
                            <button type="button" class="btn-card-cart btn-quick-add" data-id="201" data-title="Beras Premium Rojolele 5kg" data-price="75000" data-thumb="<?php echo esc_url(UKM_THEME_URI . '/assets/images/products/201.jpg'); ?>">
                                🛒 Tambah ke Keranjang
                            </button>
                            <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="btn-card-checkout">
                                Kasir &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 2. CATEGORY PILLS / CARDS                                     -->
    <!-- ============================================================= -->
    <section class="section-categories">
        <div class="site-container">
            <div class="section-header-row">
                <div>
                    <span class="section-subtitle">KATEGORI PILIHAN</span>
                    <h2 class="section-title">Kebutuhan Sembako Lengkap</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="view-all-link">Lihat Semua Kategori &rarr;</a>
            </div>

            <div class="category-cards-grid">
                <a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>" class="cat-box cat-sembako">
                    <div class="cat-icon-circle">🌾</div>
                    <div class="cat-info">
                        <h3>Beras & Sembako</h3>
                        <p>Beras, minyak, gula, tepung, telur</p>
                        <span class="cat-count">8+ Produk Ready</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/produk/?kategori=minuman')); ?>" class="cat-box cat-minuman">
                    <div class="cat-icon-circle">🧃</div>
                    <div class="cat-info">
                        <h3>Minuman & Susu</h3>
                        <p>Teh celup, kopi, susu, sirup manis</p>
                        <span class="cat-count">4+ Produk Ready</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/produk/?kategori=kebersihan')); ?>" class="cat-box cat-kebersihan">
                    <div class="cat-icon-circle">🧼</div>
                    <div class="cat-info">
                        <h3>Sabun & Cuci</h3>
                        <p>Deterjen, sabun cuci piring, karbol</p>
                        <span class="cat-count">5+ Produk Ready</span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/produk/?kategori=snack')); ?>" class="cat-box cat-snack">
                    <div class="cat-icon-circle">🍪</div>
                    <div class="cat-info">
                        <h3>Camilan & Snack</h3>
                        <p>Biskuit, keripik gurih, wafer, kacang</p>
                        <span class="cat-count">4+ Produk Ready</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 3. FEATURED PRODUCTS GRID (Katalog 22+ Produk Sembako)         -->
    <!-- ============================================================= -->
    <section class="section-featured-products" id="katalog-produk">
        <div class="site-container">
            <div class="section-header-row">
                <div>
                    <span class="section-subtitle">KATALOG PILIHAN HARI INI</span>
                    <h2 class="section-title">Produk Sembako Siap Diantar</h2>
                </div>
                
                <!-- Quick Filter Tabs -->
                <div class="product-filter-tabs">
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="filter-tab active">Semua (22)</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>" class="filter-tab">Beras & Sembako</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=minuman')); ?>" class="filter-tab">Minuman</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=kebersihan')); ?>" class="filter-tab">Kebersihan</a>
                    <a href="<?php echo esc_url(home_url('/produk/?kategori=snack')); ?>" class="filter-tab">Snack</a>
                </div>
            </div>

            <div class="modern-product-grid">
                <?php
                $args_products = array(
                    'post_type'      => 'produk',
                    'posts_per_page' => 12,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $query_products = new WP_Query($args_products);

                if ($query_products->have_posts()) :
                    while ($query_products->have_posts()) : $query_products->the_post();
                        get_template_part('template-parts/content', 'produk');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="empty-state-text">Belum ada produk untuk ditampilkan.</p>';
                endif;
                ?>
            </div>

            <div class="catalog-more-center">
                <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="btn-view-catalog">
                    <span>Lihat Seluruh 22+ Produk di Katalog Lengkap &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 4. MITRA WARUNG & KLIEN BINAAN (Social Proof / B2B)            -->
    <!-- ============================================================= -->
    <section class="section-mitra">
        <div class="site-container">
            <div class="section-header-row">
                <div>
                    <span class="section-subtitle">JARINGAN MITRA BINAAN</span>
                    <h2 class="section-title">Dipercaya Puluhan Warung & Usaha Kuliner</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="view-all-link">Semua Mitra &rarr;</a>
            </div>

            <div class="mitra-cards-grid">
                <?php
                $args_clients = array(
                    'post_type'      => 'klien',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish',
                );
                $query_clients = new WP_Query($args_clients);

                if ($query_clients->have_posts()) :
                    while ($query_clients->have_posts()) : $query_clients->the_post();
                        $nama_pic = get_post_meta(get_the_ID(), 'nama', true);
                        $telepon  = get_post_meta(get_the_ID(), 'telepon', true);
                        $lokasi   = get_post_meta(get_the_ID(), 'lokasi', true);
                        $clean_tel= preg_replace('/[^0-9]/', '', $telepon);
                ?>
                    <div class="mitra-card">
                        <div class="mitra-card-top">
                            <div class="mitra-avatar-box">🏪</div>
                            <div class="mitra-meta">
                                <h3 class="mitra-title"><?php the_title(); ?></h3>
                                <span class="mitra-badge-verified">✓ Mitra Terverifikasi</span>
                            </div>
                        </div>
                        <p class="mitra-quote">
                            "<?php echo esc_html(wp_trim_words(get_the_content(), 18)); ?>"
                        </p>
                        <div class="mitra-footer">
                            <span class="mitra-location">📍 <?php echo esc_html($lokasi ?: 'Kota Bandung'); ?></span>
                            <?php if ($clean_tel) : ?>
                                <a href="https://wa.me/<?php echo esc_attr($clean_tel); ?>" target="_blank" rel="noopener noreferrer" class="mitra-contact-btn">
                                    Hubungi WA &rarr;
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 5. KEUNGGULAN TOKO BAHRI (Value Proposition)                  -->
    <!-- ============================================================= -->
    <section class="section-features">
        <div class="site-container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon-wrap icon-green">🚀</div>
                    <h3>Pengiriman Cepat Same-Day</h3>
                    <p>Pesan sebelum pukul 17:00 WIB, sembako langsung dikirim hari ini menggunakan armada toko sendiri.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrap icon-amber">💰</div>
                    <h3>Harga Grosir Terjangkau</h3>
                    <p>Dapatkan harga hemat grosir langsung dari distributor resmi tanpa minimal pembelian partai besar.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrap icon-blue">⚖️</div>
                    <h3>Timbangan Pas & Kualitas Asli</h3>
                    <p>Garansi timbangan digital akurat dan produk terdaftar BPOM / P-IRT resmi serta bersertifikasi Halal.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon-wrap icon-purple">💳</div>
                    <h3>Pembayaran Fleksibel</h3>
                    <p>Mendukung metode bayar tunai (COD), QRIS instan, maupun transfer bank tanpa biaya tambahan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 6. BLOG TIPS & BERITA TERKINI                                 -->
    <!-- ============================================================= -->
    <section class="section-blog">
        <div class="site-container">
            <div class="section-header-row">
                <div>
                    <span class="section-subtitle">EDUKASI & ARTIKEL</span>
                    <h2 class="section-title">Tips Dapur, Belanja & Usaha Warung</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="view-all-link">Lihat Semua Artikel &rarr;</a>
            </div>

            <div class="blog-cards-grid">
                <?php
                $args_blog = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                );
                $query_blog = new WP_Query($args_blog);

                if ($query_blog->have_posts()) :
                    while ($query_blog->have_posts()) : $query_blog->the_post();
                ?>
                    <article class="modern-blog-card">
                        <div class="blog-card-meta">
                            <span class="blog-cat-badge">
                                <?php
                                $categories = get_the_category();
                                echo !empty($categories) ? esc_html($categories[0]->name) : 'Tips Belanja';
                                ?>
                            </span>
                            <span class="blog-date">📅 <?php echo get_the_date('j M Y'); ?></span>
                        </div>
                        <h3 class="blog-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="blog-card-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="blog-read-more">Baca Selengkapnya &rarr;</a>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- ============================================================= -->
    <!-- 7. CALL TO ACTION BANNER                                      -->
    <!-- ============================================================= -->
    <section class="section-cta-banner">
        <div class="site-container">
            <div class="cta-banner-box">
                <div class="cta-content">
                    <span class="cta-tag">PASOKAN SEMBAKO RUTIN</span>
                    <h2>Butuh Pasokan Sembako Cepat untuk Warung atau Keluarga?</h2>
                    <p>Konsultasikan kebutuhan beras karungan, dus minyak, atau sabun grosir langsung dengan admin Toko Bahri via WhatsApp.</p>
                </div>
                <div class="cta-btn-wrap">
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-cta-large">
                        <span>💬 Chat WhatsApp Sekarang</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
