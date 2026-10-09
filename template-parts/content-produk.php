<?php
/**
 * Template part for displaying product card — TechNova Modern Style
 * Matches screenshot card: discount badge, heart wishlist, rating, price, cart button
 *
 * @package UKM_Toko_Theme
 */

$post_id     = get_the_ID();
$harga       = get_post_meta( $post_id, 'harga', true );
$harga_coret = get_post_meta( $post_id, 'harga_coret', true );
$discount    = get_post_meta( $post_id, 'discount_percent', true );
$rating_num  = get_post_meta( $post_id, 'rating_score', true ) ?: 5;
$rating_cnt  = get_post_meta( $post_id, 'rating_count', true ) ?: 124;
$image_url   = ukm_get_product_photo_url( $post_id );

// Calculate discount percentage if not explicitly set
if ( empty( $discount ) && $harga_coret > $harga && $harga_coret > 0 ) {
    $discount = round( ( ( $harga_coret - $harga ) / $harga_coret ) * 100 );
}

// Fallback pricing if empty
if ( empty( $harga ) ) {
    $harga = 999;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'technova-product-card' ); ?>>

    <!-- Card Header: Discount Badge & Wishlist Heart -->
    <div class="prod-card-topbar">
        <?php if ( ! empty( $discount ) ) : ?>
        <span class="prod-discount-pill">-<?php echo esc_html( $discount ); ?>%</span>
        <?php else : ?>
        <span class="prod-discount-placeholder"></span>
        <?php endif; ?>

        <button type="button" class="prod-wishlist-btn" aria-label="<?php esc_attr_e( 'Tambah ke Favorit', 'ukm-toko-theme' ); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
            </svg>
        </button>
    </div>

    <!-- Product Image -->
    <a href="<?php the_permalink(); ?>" class="prod-card-image-wrap">
        <img src="<?php echo esc_url( $image_url ); ?>"
             alt="<?php the_title_attribute(); ?>"
             class="prod-card-img"
             loading="lazy" />
    </a>

    <!-- Product Details -->
    <div class="prod-card-details">
        <h3 class="prod-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <!-- Star Rating -->
        <div class="prod-card-rating">
            <div class="rating-stars-green" aria-label="<?php echo esc_attr( $rating_num ); ?> dari 5 bintang">
                ★★★★★
            </div>
            <span class="rating-reviews-count">(<?php echo esc_html( $rating_cnt ); ?>)</span>
        </div>

        <!-- Pricing Row -->
        <div class="prod-card-pricing">
            <span class="price-current"><?php echo technova_format_price( $harga ); ?></span>
            <?php if ( ! empty( $harga_coret ) && $harga_coret > $harga ) : ?>
            <span class="price-original"><?php echo technova_format_price( $harga_coret ); ?></span>
            <?php endif; ?>
        </div>

        <!-- Add to Cart CTA Button -->
        <button type="button" class="btn-technova-cart js-add-to-cart btn-quick-add"
                data-id="<?php the_ID(); ?>"
                data-name="<?php the_title_attribute(); ?>"
                data-title="<?php the_title_attribute(); ?>"
                data-price="<?php echo esc_attr( $harga ); ?>"
                data-thumb="<?php echo esc_url( $image_url ); ?>"
                data-satuan="<?php echo esc_attr( get_post_meta( $post_id, 'satuan', true ) ?: 'item' ); ?>">
            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                <line x1="3" y1="6" x2="21" y2="6"/>
                <path d="M16 10a4 4 0 0 1-8 0"/>
            </svg>
            <span><?php esc_html_e( 'Tambah ke Keranjang', 'ukm-toko-theme' ); ?></span>
        </button>
    </div>

</article>
