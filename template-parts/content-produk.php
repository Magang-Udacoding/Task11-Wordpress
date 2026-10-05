<?php
/**
 * Template Part: Product Card - Social Commerce Feed Card (Monochrome Black & White)
 * With Real Product Photos & Shopping Cart Integration
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
    'Halo Admin Toko Bahri, saya tertarik memesan produk sembako: %s (Harga: %s / %s). Apakah stok masih ada dan bisa diantar?',
    get_the_title(),
    ukm_rupiah($harga),
    $satuan
);
$wa_url = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode($wa_msg);

// Primary Category
$terms = get_the_terms($post_id, 'kategori-produk');
$cat_name = 'Sembako';
$cat_link = home_url('/produk/');
if ($terms && !is_wp_error($terms)) {
    $first_term = array_shift($terms);
    $cat_name = $first_term->name;
    $cat_link = get_term_link($first_term);
}

// REAL PRODUCT PHOTO URL
$photo_url = ukm_get_product_photo_url($post_id);
$likes_seed = ($post_id * 7) % 65 + 15;
?>

<!-- MONOCHROME SOCIAL-COMMERCE POST CARD -->
<article id="post-<?php the_ID(); ?>" class="mono-post-card" data-product-id="<?php echo esc_attr($post_id); ?>" data-product-title="<?php echo esc_attr(get_the_title()); ?>" data-product-price="<?php echo esc_attr($harga); ?>" data-product-satuan="<?php echo esc_attr($satuan); ?>" data-product-thumb="<?php echo esc_url($photo_url); ?>">
    
    <!-- 1. Post Header: Avatar, Author, Category -->
    <div class="mono-post-header">
        <div class="mono-post-avatar">
            <span class="mono-avatar-text">TB</span>
        </div>
        <div class="mono-post-header-meta">
            <div class="mono-author-line">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mono-author-name">Toko Sembako Bahri</a>
                <span class="mono-post-action-desc">menambahkan produk baru ke <a href="<?php echo esc_url($cat_link); ?>" class="mono-cat-link"><?php echo esc_html($cat_name); ?></a></span>
            </div>
            <div class="mono-post-time">
                <span>Baru saja</span> &middot; <span>🌍 Publik</span>
            </div>
        </div>
        <span class="mono-post-dots">•••</span>
    </div>

    <!-- 2. Post Media: High-Quality Product Image with Discount Badge -->
    <div class="mono-post-media">
        <?php if ($diskon_percent > 0) : ?>
            <span class="mono-badge-discount">-<?php echo $diskon_percent; ?>% HEMAT</span>
        <?php endif; ?>
        
        <a href="<?php the_permalink(); ?>" class="mono-media-link" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo esc_url($photo_url); ?>" alt="<?php the_title_attribute(); ?>" class="mono-product-photo" loading="lazy" />
        </a>
    </div>

    <!-- 3. Post Body: Product Information -->
    <div class="mono-post-body">
        <div class="mono-product-tags-row">
            <span class="mono-tag-pill"><?php echo esc_html($cat_name); ?></span>
            <span class="mono-tag-pill">Satuan: <?php echo esc_html($satuan); ?></span>
            <?php if ($stok !== '' && (int)$stok > 0) : ?>
                <span class="mono-stock-pill in-stock">● Stok: <?php echo esc_html($stok); ?> tersedia</span>
            <?php else : ?>
                <span class="mono-stock-pill out-of-stock">○ Stok Habis</span>
            <?php endif; ?>
        </div>

        <h3 class="mono-product-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <!-- Price Row -->
        <div class="mono-price-row">
            <span class="mono-current-price"><?php echo ukm_rupiah($harga); ?></span>
            <?php if (!empty($harga_coret) && $harga_coret > $harga) : ?>
                <del class="mono-old-price"><?php echo ukm_rupiah($harga_coret); ?></del>
            <?php endif; ?>
        </div>

        <p class="mono-product-desc">
            <?php echo wp_strip_all_tags(get_the_excerpt() ?: get_the_content()); ?>
        </p>
    </div>

    <!-- 4. Action Buttons Bar: Like, Add to Cart, Direct Checkout, WhatsApp -->
    <div class="mono-post-actions-bar">
        <button type="button" class="mono-action-btn fb-like-btn" data-liked="false" data-count="<?php echo esc_attr($likes_seed); ?>">
            <span class="mono-action-icon">👍</span>
            <span class="fb-action-label">Suka</span>
        </button>

        <button type="button" class="mono-action-btn fb-comment-trigger-btn">
            <span class="mono-action-icon">💬</span>
            <span>Komentar</span>
        </button>

        <!-- Add to Cart -->
        <button type="button" class="mono-action-btn mono-btn-cart fb-btn-add-cart">
            <span class="mono-action-icon">🛒</span>
            <span>+ Keranjang</span>
        </button>

        <!-- Direct Sandbox Checkout -->
        <button type="button" class="mono-action-btn mono-btn-direct-buy fb-btn-direct-checkout">
            <span class="mono-action-icon">⚡</span>
            <span>Beli Sekarang</span>
        </button>

        <!-- WhatsApp Direct -->
        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="mono-action-btn mono-btn-wa" title="Pesan langsung lewat WhatsApp">
            <span>💬 WA</span>
        </a>
    </div>

    <!-- 5. Social Feedback: Who Liked This -->
    <div class="mono-post-feedback">
        <span class="mono-mini-like-icon">👍</span>
        <span class="mono-likes-text">
            <strong>Warung Pak Slamet</strong>, <strong>Bu RT</strong>, dan <span class="fb-like-counter"><?php echo $likes_seed; ?></span> orang lainnya menyukai produk ini.
        </span>
    </div>

    <!-- 6. Comments Section -->
    <div class="mono-comments-area">
        <div class="mono-comment-item">
            <div class="mono-comment-avatar">👵</div>
            <div class="mono-comment-bubble">
                <a href="<?php echo esc_url(home_url('/klien/')); ?>" class="mono-commenter-name">Toko Sembako Bu RT</a>
                <span class="mono-comment-text">Produk sembako ini selalu ready dan dikirim tepat waktu ke warung kami. Sangat recommended! 👍</span>
                <div class="mono-comment-footer">
                    <span>15 menit yang lalu</span> &middot; <a href="javascript:void(0);" class="mono-comment-like">Suka</a> &middot; <span>👍 4</span>
                </div>
            </div>
        </div>

        <div class="mono-write-comment">
            <div class="mono-comment-avatar">👤</div>
            <div class="mono-comment-input-wrap">
                <input type="text" class="mono-comment-input fb-comment-input" placeholder="Tulis komentar atau tanya ketersediaan stok..." />
                <button type="button" class="mono-comment-send-btn">Kirim</button>
            </div>
        </div>
    </div>
</article>
