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

<div class="single-related-section">
    <div class="section-header-row">
        <div>
            <span class="section-subtitle">REKOMENDASI KATEGORI SERUPA</span>
            <h2 class="section-title">Produk Terkait yang Mungkin Anda Butuhkan</h2>
        </div>
        <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="view-all-link">Lihat Semua Produk &rarr;</a>
    </div>

    <div class="modern-product-grid">
        <?php
        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
                get_template_part('template-parts/content', 'produk');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="empty-state-text">Belum ada produk terkait lainnya dalam kategori ini.</p>';
        endif;
        ?>
    </div>
</div>

