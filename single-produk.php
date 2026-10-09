<?php
/**
 * Single Template for CPT Produk - Ultra Modern E-Commerce Storefront
 *
 * @package UKM_Toko_Theme
 */

get_header();

$post_id     = get_the_ID();
$harga       = (int) ukm_get_field('harga', $post_id);
$harga_coret = (int) ukm_get_field('harga_coret', $post_id);
$stok        = ukm_get_field('stok', $post_id);
$satuan      = ukm_get_field('satuan', $post_id) ?: 'pcs';
$spesifikasi = ukm_get_field('spesifikasi', $post_id);
$varian      = ukm_get_field('varian_produk', $post_id);
$galeri      = ukm_get_field('galeri_produk', $post_id);
$wa_number   = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean    = preg_replace('/[^0-9]/', '', $wa_number);
$photo_url   = ukm_get_product_photo_url($post_id);

// Discount calculation
$diskon_percent = 0;
$hemat_nominal = 0;
if (!empty($harga_coret) && !empty($harga) && $harga_coret > $harga) {
    $diskon_percent = round((($harga_coret - $harga) / $harga_coret) * 100);
    $hemat_nominal = $harga_coret - $harga;
}

// Category info
$terms = get_the_terms($post_id, 'kategori-produk');
$cat_name = 'Sembako';
$cat_link = home_url('/produk/');
if ($terms && !is_wp_error($terms)) {
    $first_term = array_shift($terms);
    $cat_name = $first_term->name;
    $cat_link = get_term_link($first_term);
}

// WhatsApp direct order URL
$wa_msg = sprintf(
    "Halo Admin Riper Mart,\nSaya ingin memesan produk sembako berikut:\n• Produk: %s\n• Harga: %s / %s\n• Link: %s\n\nApakah stok masih ada dan bisa diantar hari ini?",
    get_the_title(),
    ukm_rupiah($harga),
    $satuan,
    get_permalink()
);
$wa_url = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode($wa_msg);
?>

<main id="primary-content" class="single-product-main">
    <div class="site-container">
        
        <!-- Breadcrumbs Navigation -->
        <nav class="single-product-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
            <span class="bc-sep">/</span>
            <a href="<?php echo esc_url(home_url('/produk/')); ?>">Katalog Sembako</a>
            <span class="bc-sep">/</span>
            <a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($cat_name); ?></a>
            <span class="bc-sep">/</span>
            <span class="bc-current"><?php the_title(); ?></span>
        </nav>

        <div class="single-product-layout">
            
            <!-- LEFT COLUMN: Image Showcase & Gallery -->
            <div class="single-gallery-column">
                <div class="single-main-image-card">
                    <?php if ($diskon_percent > 0) : ?>
                        <span class="single-discount-badge">-<?php echo $diskon_percent; ?>% HEMAT</span>
                    <?php endif; ?>

                    <?php if ($stok !== '' && (int)$stok <= 10 && (int)$stok > 0) : ?>
                        <span class="single-stock-alert">Sisa <?php echo esc_html($stok); ?> <?php echo esc_html($satuan); ?></span>
                    <?php endif; ?>

                    <div class="single-image-frame">
                        <img id="ukmMainProductImage" src="<?php echo esc_url($photo_url); ?>" alt="<?php the_title_attribute(); ?>" />
                    </div>
                </div>

                <!-- Gallery Thumbnails (if available) -->
                <?php if (!empty($galeri) && is_array($galeri)) : ?>
                    <div class="single-gallery-thumbs">
                        <button type="button" class="gallery-thumb-btn active" data-src="<?php echo esc_url($photo_url); ?>">
                            <img src="<?php echo esc_url($photo_url); ?>" alt="<?php the_title_attribute(); ?>" />
                        </button>
                        <?php foreach ($galeri as $img) : 
                            $thumb_src = is_array($img) ? $img['sizes']['thumbnail'] : $img;
                            $large_src = is_array($img) ? $img['sizes']['large'] : $img;
                        ?>
                            <button type="button" class="gallery-thumb-btn" data-src="<?php echo esc_url($large_src); ?>">
                                <img src="<?php echo esc_url($thumb_src); ?>" alt="Foto Tambahan" />
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Guarantees Bar Under Image -->
                <div class="single-trust-features">
                    <div class="trust-pill-item">
                        <div class="t-text">
                            <strong>100% Produk Asli</strong>
                            <small>Segel pabrik & bersertifikasi</small>
                        </div>
                    </div>
                    <div class="trust-pill-item">
                        <div class="t-text">
                            <strong>Garansi Timbangan Pas</strong>
                            <small>Timbangan presisi & terjamin</small>
                        </div>
                    </div>
                    <div class="trust-pill-item">
                        <div class="t-text">
                            <strong>Pengiriman Cepat</strong>
                            <small>Siap antar ke alamat Anda</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Details, Pricing, Variants & Purchase -->
            <div class="single-details-column">
                
                <div class="single-meta-row">
                    <a href="<?php echo esc_url($cat_link); ?>" class="single-cat-badge">
                        <?php echo esc_html($cat_name); ?>
                    </a>
                    <span class="single-rating-badge">
                        ★★★★★ <strong>4.9</strong> <small>(Ulasan Pelanggan)</small>
                    </span>
                </div>

                <h1 class="single-product-title"><?php the_title(); ?></h1>

                <div class="single-sku-stock-row">
                    <span class="single-sku">Kode SKU: <strong>UKM-<?php echo esc_html($post_id); ?></strong></span>
                    <span class="sku-divider">•</span>
                    <?php if ($stok !== '' && (int)$stok > 0) : ?>
                        <span class="stock-status-tag ready">
                            <span class="status-indicator"></span> Stok Tersedia (<?php echo esc_html($stok); ?> <?php echo esc_html($satuan); ?>)
                        </span>
                    <?php else : ?>
                        <span class="stock-status-tag empty">
                            <span class="status-indicator"></span> Stok Sedang Habis
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Price Box -->
                <div class="single-pricing-card">
                    <div class="price-main-stack">
                        <span class="price-current-value"><?php echo ukm_rupiah($harga); ?></span>
                        <span class="price-unit-tag">/ <?php echo esc_html($satuan); ?></span>
                        <?php if ($diskon_percent > 0) : ?>
                            <span class="price-old-value"><?php echo ukm_rupiah($harga_coret); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ($hemat_nominal > 0) : ?>
                        <div class="price-savings-note">
                            Anda hemat <strong><?php echo ukm_rupiah($hemat_nominal); ?></strong> (<?php echo $diskon_percent; ?>%) dari harga normal toko!
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Variants Selector (if any) -->
                <?php if (!empty($varian) && is_array($varian)) : ?>
                    <div class="single-variants-section">
                        <label class="section-label">Pilihan Ukuran / Varian:</label>
                        <div class="variant-chips-wrap">
                            <button type="button" class="ukm-variant-pill active">
                                <strong>Kemasan Utama</strong>
                                <span>(<?php echo esc_html($satuan); ?>)</span>
                            </button>
                            <?php foreach ($varian as $v) : 
                                $v_nama = !empty($v['nama_varian']) ? $v['nama_varian'] : 'Pilihan Lain';
                                $v_harga = !empty($v['harga_varian']) ? ukm_rupiah($v['harga_varian']) : '';
                            ?>
                                <button type="button" class="ukm-variant-pill">
                                    <strong><?php echo esc_html($v_nama); ?></strong>
                                    <?php if ($v_harga) : ?><span>(<?php echo esc_html($v_harga); ?>)</span><?php endif; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Action Buttons Group -->
                <div class="single-purchase-actions">
                    <button type="button" class="btn-single-cart btn-quick-add" data-id="<?php echo esc_attr($post_id); ?>" data-title="<?php echo esc_attr(get_the_title()); ?>" data-price="<?php echo esc_attr($harga); ?>" data-satuan="<?php echo esc_attr($satuan); ?>" data-thumb="<?php echo esc_url($photo_url); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        <span>+ Tambah ke Keranjang</span>
                    </button>

                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-single-wa">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.127-.061-.271-.088-.61-.205-1.045-.395-1.841-.806-3.037-2.673-3.129-2.796-.092-.124-.744-.991-.744-1.89s.471-1.341.638-1.523c.168-.182.366-.228.489-.228.123 0 .245.001.353.006.113.006.264-.043.413.315.153.367.52 1.27.565 1.363.046.092.077.2.015.323-.061.124-.092.2-.184.308-.092.108-.194.241-.277.324-.092.092-.188.192-.081.376.108.183.479.79 1.026 1.278.704.628 1.298.822 1.482.914.184.092.292.077.4-.046.108-.124.46-1.339.583-.454.123-.114.246-.092.414-.03.168.061 1.069.504 1.253.596.184.092.306.138.352.215.046.077.046.445-.098.85z"/>
                        </svg>
                        <span>Pesan WhatsApp</span>
                    </a>

                    <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="btn-single-checkout">
                        <span>Kasir &rarr;</span>
                    </a>
                </div>

                <!-- Fast Delivery Highlight Box -->
                <div class="delivery-highlight-box">
                    <div class="delivery-text">
                        <strong>Layanan Pengiriman Riper Mart</strong>
                        <p>Pesan sebelum pukul 17:00 WIB, sembako diantar hari ini juga langsung ke pintu rumah Anda atau warung kelontong mitra.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- SPECIFICATIONS & DESCRIPTION TABBED CARD -->
        <div class="product-specs-section">
            <div class="specs-card-container">
                <div class="specs-header-tab">
                    <h2>Spesifikasi & Informasi Produk</h2>
                </div>

                <div class="specs-table-wrapper">
                    <table class="modern-specs-table">
                        <tbody>
                            <tr>
                                <th>Nama Produk</th>
                                <td><strong><?php the_title(); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?php echo esc_html($cat_name); ?></td>
                            </tr>
                            <tr>
                                <th>Satuan Kemasan</th>
                                <td><?php echo esc_html(strtoupper($satuan)); ?></td>
                            </tr>
                            <?php if (!empty($spesifikasi) && is_array($spesifikasi)) : ?>
                                <?php if (!empty($spesifikasi['berat_bersih'])) : ?>
                                    <tr><th>Berat Bersih</th><td><?php echo esc_html($spesifikasi['berat_bersih']); ?></td></tr>
                                <?php endif; ?>
                                <?php if (!empty($spesifikasi['dimensi'])) : ?>
                                    <tr><th>Dimensi Kemasan</th><td><?php echo esc_html($spesifikasi['dimensi']); ?></td></tr>
                                <?php endif; ?>
                                <?php if (!empty($spesifikasi['produsen'])) : ?>
                                    <tr><th>Produsen / Merk</th><td><?php echo esc_html($spesifikasi['produsen']); ?></td></tr>
                                <?php endif; ?>
                                <?php if (!empty($spesifikasi['masa_kadaluarsa'])) : ?>
                                    <tr><th>Masa Kadaluarsa</th><td><?php echo esc_html($spesifikasi['masa_kadaluarsa']); ?></td></tr>
                                <?php endif; ?>
                                <?php if (!empty($spesifikasi['sertifikasi'])) : ?>
                                    <tr><th>Sertifikasi Resmi</th><td><span class="cert-pill">✓ <?php echo esc_html($spesifikasi['sertifikasi']); ?></span></td></tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Product Full Description -->
                <div class="single-description-box">
                    <h3>Deskripsi Produk Lengkap</h3>
                    <div class="description-content entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- RELATED PRODUCTS SECTION -->
        <div class="single-related-section">
            <div class="section-title-wrap">
                <span class="section-tag-sub">— REKOMENDASI TERKAIT</span>
                <h2>Produk Serupa Lainnya</h2>
            </div>

            <div class="modern-product-grid">
                <?php
                $related_query = new WP_Query(array(
                    'post_type'      => 'produk',
                    'posts_per_page' => 4,
                    'post__not_in'   => array($post_id),
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'kategori-produk',
                            'field'    => 'slug',
                            'terms'    => !empty($first_term) ? $first_term->slug : 'sembako',
                        ),
                    ),
                ));

                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post();
                        get_template_part('template-parts/content', 'produk');
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="color:#64748b; padding:20px;">Belum ada produk terkait lainnya.</p>';
                endif;
                ?>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();
