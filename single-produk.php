<?php
/**
 * Single Template for CPT Produk
 *
 * @package UKM_Toko_Theme
 */

get_header();

$post_id     = get_the_ID();
$harga       = ukm_get_field('harga', $post_id);
$harga_coret = ukm_get_field('harga_coret', $post_id);
$stok        = ukm_get_field('stok', $post_id);
$satuan      = ukm_get_field('satuan', $post_id) ?: 'pcs';
$spesifikasi = ukm_get_field('spesifikasi', $post_id);
$varian      = ukm_get_field('varian_produk', $post_id);
$galeri      = ukm_get_field('galeri_produk', $post_id);
$wa_number   = get_theme_mod('ukm_wa_number', '6281234567890');

// Discount calculation
$diskon_percent = 0;
if (!empty($harga_coret) && !empty($harga) && $harga_coret > $harga) {
    $diskon_percent = round((($harga_coret - $harga) / $harga_coret) * 100);
}

// Pre-fill WhatsApp message
$wa_msg = sprintf(
    "Halo Admin Toko UKM Bahri,\nSaya berminat memesan:\n• Produk: %s\n• Harga: %s / %s\n• Link: %s\n\nApakah stok masih tersedia dan bisa dikirim hari ini?",
    get_the_title(),
    ukm_rupiah($harga),
    $satuan,
    get_permalink()
);
$wa_url = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $wa_number) . '?text=' . rawurlencode($wa_msg);
?>

<div class="ukm-single-product-page">
    <div class="ukm-container">
        <div class="ukm-single-product-grid">
            <!-- Col 1: Product Gallery (Main Image + Thumbnails) -->
            <div class="ukm-single-gallery-col">
                <div class="ukm-main-image-wrapper">
                    <?php if ($diskon_percent > 0) : ?>
                        <span class="ukm-badge-discount-lg">Diskon <?php echo $diskon_percent; ?>%</span>
                    <?php endif; ?>

                    <?php if (has_post_thumbnail()) : ?>
                        <img id="ukmMainProductImage" src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'large')); ?>" alt="<?php the_title_attribute(); ?>" loading="eager" />
                    <?php else : ?>
                        <div class="ukm-thumb-placeholder large"><span>📦</span></div>
                    <?php endif; ?>
                </div>

                <!-- Gallery Repeater / Multiple Images (Item 18) -->
                <?php if (!empty($galeri) && is_array($galeri)) : ?>
                    <div class="ukm-gallery-thumbnails">
                        <?php if (has_post_thumbnail()) : ?>
                            <button type="button" class="gallery-thumb-btn active" data-src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'large')); ?>">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'thumbnail')); ?>" alt="Thumbnail Utama" />
                            </button>
                        <?php endif; ?>
                        <?php foreach ($galeri as $img) : 
                            $thumb_url = is_array($img) ? $img['sizes']['thumbnail'] : $img;
                            $large_url = is_array($img) ? $img['sizes']['large'] : $img;
                        ?>
                            <button type="button" class="gallery-thumb-btn" data-src="<?php echo esc_url($large_url); ?>">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="Thumbnail Produk" />
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Col 2: Product Information & Purchase Actions -->
            <div class="ukm-single-info-col">
                <!-- Taxonomy Breadcrumbs Tag -->
                <div class="ukm-product-tax-list">
                    <?php
                    $terms = get_the_terms($post_id, 'kategori-produk');
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<a href="' . esc_url(get_term_link($term)) . '" class="ukm-badge ukm-badge-primary">' . esc_html($term->name) . '</a> ';
                        }
                    }
                    ?>
                </div>

                <h1 class="ukm-single-title"><?php the_title(); ?></h1>

                <!-- Price Box -->
                <div class="ukm-single-price-box">
                    <span class="ukm-single-current-price"><?php echo ukm_rupiah($harga); ?></span>
                    <span class="ukm-single-satuan">/ <?php echo esc_html($satuan); ?></span>
                    <?php if (!empty($harga_coret) && $harga_coret > $harga) : ?>
                        <span class="ukm-single-old-price"><?php echo ukm_rupiah($harga_coret); ?></span>
                    <?php endif; ?>
                </div>

                <!-- Stock & SKU Status -->
                <div class="ukm-single-stock-row">
                    <?php if ($stok !== '' && (int)$stok > 0) : ?>
                        <span class="ukm-stock-badge in-stock">✓ Stok Tersedia (<?php echo esc_html($stok); ?> <?php echo esc_html($satuan); ?>)</span>
                    <?php else : ?>
                        <span class="ukm-stock-badge out-of-stock">✕ Stok Habis</span>
                    <?php endif; ?>
                    <span class="ukm-sku-badge">SKU: UKM-<?php echo esc_html($post_id); ?></span>
                </div>

                <!-- Product Variants Repeater (Item 17) -->
                <?php if (!empty($varian) && is_array($varian)) : ?>
                    <div class="ukm-variants-box">
                        <label class="ukm-variants-label">Pilihan Varian / Ukuran Lainnya:</label>
                        <div class="ukm-variants-options">
                            <?php foreach ($varian as $v) : 
                                $v_nama = !empty($v['nama_varian']) ? $v['nama_varian'] : 'Standar';
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

                <!-- Order Action Buttons -->
                <div class="ukm-single-actions">
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="ukm-btn ukm-btn-wa ukm-btn-lg" style="flex:1;">
                        💬 Pesan Langsung via WhatsApp
                    </a>

                    <?php if (class_exists('WooCommerce')) : ?>
                        <button type="button" class="ukm-btn ukm-btn-primary ukm-btn-lg" onclick="alert('Produk ditambahkan ke keranjang!');">
                            🛒 Tambah ke Keranjang
                        </button>
                    <?php endif; ?>
                </div>

                <!-- Quick Guarantee Checklist -->
                <div class="ukm-quick-trust-list">
                    <div class="trust-row"><span>✓</span> 100% Produk Original & Bersegel</div>
                    <div class="trust-row"><span>✓</span> Bisa COD / Bayar Ditempat saat Diantar</div>
                    <div class="trust-row"><span>✓</span> Melayani Pembelian Eceran Maupun Grosir Warung</div>
                </div>
            </div>
        </div>

        <!-- Product Specs Group (Item 16) & Detailed Description -->
        <div class="ukm-single-tabs-section">
            <h2 class="ukm-tabs-heading">Detail & Spesifikasi Produk</h2>
            
            <div class="ukm-specs-card">
                <table class="ukm-specs-table">
                    <tbody>
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
                                <tr><th>Sertifikasi</th><td><?php echo esc_html($spesifikasi['sertifikasi']); ?></td></tr>
                            <?php endif; ?>
                        <?php else : ?>
                            <tr><th>Kondisi</th><td>Baru, Segel Pabrik</td></tr>
                            <tr><th>Penyimpanan</th><td>Simpan di tempat kering dan sejuk terhindar dari sinar matahari langsung</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="ukm-desc-content" style="margin-top:24px;">
                    <h3>Deskripsi Produk</h3>
                    <?php 
                    if (get_the_content()) {
                        the_content();
                    } else {
                        echo '<p>Produk sembako kualitas pilihan terpercaya untuk menunjang kebutuhan dapur harian keluarga dan usaha warung Anda. Selalu higienis dan terstandar.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Requirement 24: Related Products Component -->
        <?php get_template_part('template-parts/related-products'); ?>
    </div>
</div>

<?php
get_footer();
