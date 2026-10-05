<?php
/**
 * Modern E-Commerce Product Card Template Part
 * Clean, Contemporary, High-Converting UI
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

$post_id     = get_the_ID();
$harga       = (int) ukm_get_field('harga', $post_id);
$harga_coret = (int) ukm_get_field('harga_coret', $post_id);
$stok        = ukm_get_field('stok', $post_id);
$satuan      = ukm_get_field('satuan', $post_id) ?: 'pcs';
$wa_number   = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean    = preg_replace('/[^0-9]/', '', $wa_number);

// Calculate discount
$diskon_percent = 0;
if (!empty($harga_coret) && !empty($harga) && $harga_coret > $harga) {
    $diskon_percent = round((($harga_coret - $harga) / $harga_coret) * 100);
}

// WhatsApp direct order URL
$wa_msg = sprintf(
    'Halo Admin Toko Bahri, saya tertarik memesan sembako: %s (Harga: %s / %s). Apakah stok masih ada dan bisa diantar?',
    get_the_title(),
    ukm_rupiah($harga),
    $satuan
);
$wa_url = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode($wa_msg);

// Primary Category
$terms = get_the_terms($post_id, 'kategori-produk');
$cat_name = 'Sembako';
$cat_slug = 'sembako';
if ($terms && !is_wp_error($terms)) {
    $first_term = array_shift($terms);
    $cat_name = $first_term->name;
    $cat_slug = $first_term->slug;
}

$photo_url = ukm_get_product_photo_url($post_id);
?>

<div class="product-item-card" data-product-id="<?php echo esc_attr($post_id); ?>" data-product-title="<?php echo esc_attr(get_the_title()); ?>" data-product-price="<?php echo esc_attr($harga); ?>" data-product-satuan="<?php echo esc_attr($satuan); ?>" data-product-thumb="<?php echo esc_url($photo_url); ?>">
    
    <!-- Image Box with Badges -->
    <div class="product-card-thumb-wrap">
        <?php if ($diskon_percent > 0) : ?>
            <span class="product-badge-discount">-<?php echo $diskon_percent; ?>%</span>
        <?php endif; ?>

        <?php if ($stok !== '' && (int)$stok <= 10 && (int)$stok > 0) : ?>
            <span class="product-badge-lowstock">Sisa <?php echo esc_html($stok); ?></span>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="product-img-link" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo esc_url($photo_url); ?>" alt="<?php the_title_attribute(); ?>" class="product-card-img" loading="lazy" />
        </a>

        <!-- Quick View / Direct Link Floating Button -->
        <a href="<?php the_permalink(); ?>" class="product-floating-view" title="Lihat Detail Produk">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </a>
    </div>

    <!-- Product Card Details -->
    <div class="product-card-info">
        <div class="product-cat-row">
            <span class="product-cat-tag"><?php echo esc_html($cat_name); ?></span>
            <span class="product-rating-stars">★★★★★ <small>(4.9)</small></span>
        </div>

        <h3 class="product-title-heading">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <div class="product-unit-info">
            <span>Kemasan: <strong><?php echo esc_html($satuan); ?></strong></span>
            <?php if ($stok !== '' && (int)$stok > 0) : ?>
                <span class="stock-ready-badge">● Stok Tersedia</span>
            <?php else : ?>
                <span class="stock-empty-badge">○ Stok Habis</span>
            <?php endif; ?>
        </div>

        <!-- Price Area -->
        <div class="product-card-pricing">
            <div class="price-container">
                <span class="main-price"><?php echo ukm_rupiah($harga); ?></span>
                <?php if ($diskon_percent > 0) : ?>
                    <span class="strike-price"><?php echo ukm_rupiah($harga_coret); ?></span>
                <?php endif; ?>
            </div>
            <span class="price-satuan-label">/ <?php echo esc_html($satuan); ?></span>
        </div>

        <!-- Action Buttons -->
        <div class="product-card-actions">
            <button type="button" class="btn-add-cart btn-quick-add" data-id="<?php echo esc_attr($post_id); ?>" data-title="<?php echo esc_attr(get_the_title()); ?>" data-price="<?php echo esc_attr($harga); ?>" data-thumb="<?php echo esc_url($photo_url); ?>" data-satuan="<?php echo esc_attr($satuan); ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span>+ Keranjang</span>
            </button>

            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-quick-wa" title="Pesan langsung via WhatsApp">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.127-.061-.271-.088-.61-.205-1.045-.395-1.841-.806-3.037-2.673-3.129-2.796-.092-.124-.744-.991-.744-1.89s.471-1.341.638-1.523c.168-.182.366-.228.489-.228.123 0 .245.001.353.006.113.006.264-.043.413.315.153.367.52 1.27.565 1.363.046.092.077.2.015.323-.061.124-.092.2-.184.308-.092.108-.194.241-.277.324-.092.092-.188.192-.081.376.108.183.479.79 1.026 1.278.704.628 1.298.822 1.482.914.184.092.292.077.4-.046.108-.124.46-1.339.583-.454.123-.114.246-.092.414-.03.168.061 1.069.504 1.253.596.184.092.306.138.352.215.046.077.046.445-.098.85z"/></svg>
            </a>
        </div>
    </div>
</div>
