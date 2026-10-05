<?php
/**
 * Template part for displaying related products using the same kategori-produk
 *
 * @package UKM_Toko_Theme
 */

$current_id = get_the_ID();
$terms = get_the_terms($current_id, 'kategori-produk');
$term_ids = array();

if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        $term_ids[] = $term->term_id;
    }
}

$related_args = array(
    'post_type'      => 'produk',
    'posts_per_page' => 4,
    'post__not_in'   => array($current_id),
    'post_status'    => 'publish',
);

if (!empty($term_ids)) {
    $related_args['tax_query'] = array(
        array(
            'taxonomy' => 'kategori-produk',
            'field'    => 'term_id',
            'terms'    => $term_ids,
        ),
    );
}

$related_query = new WP_Query($related_args);
?>

<div class="ukm-related-products-section" style="margin-top:50px; border-top:2px solid #e2e8f0; padding-top:36px;">
    <div class="ukm-section-header" style="margin-bottom:24px;">
        <span class="ukm-section-sub" style="font-size:12px; font-weight:700; color:#059669; text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:4px;">REKOMENDASI KATEGORI SERUPA</span>
        <h2 class="ukm-section-title" style="font-size:1.6rem; font-weight:800; color:#0f172a; margin:0;">Produk Terkait yang Mungkin Anda Butuhkan</h2>
    </div>

    <div class="ukm-product-grid" style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:18px;">
        <?php
        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
                get_template_part('template-parts/content', 'produk');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p style="color:#64748b; font-size:0.95rem;">Belum ada produk terkait dalam kategori ini.</p>';
        endif;
        ?>
    </div>
</div>
