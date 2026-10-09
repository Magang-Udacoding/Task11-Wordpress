<?php
/**
 * Main Template File (Fallback Blog Loop)
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<div class="ukm-archive-header">
    <div class="ukm-container">
        <h1 class="ukm-archive-title">
            <?php
            if (is_home() && !is_front_page()) {
                single_post_title();
            } else {
                echo 'Artikel & Berita Toko Sembako';
            }
            ?>
        </h1>
        <p class="ukm-archive-desc">Tips memilih sembako berkualitas, resep masakan rumahan, dan kabar terbaru dari toko kami.</p>
    </div>
</div>

<div class="ukm-container" style="padding-top:40px; padding-bottom:60px;">
    <?php if (have_posts()) : ?>
        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap:24px;">
            <?php
            while (have_posts()) : the_post();
                get_template_part('template-parts/content');
            endwhile;
            ?>
        </div>

        <div style="margin-top:40px; text-align:center;">
            <?php
            the_posts_pagination(array(
                'prev_text' => __('&larr; Sebelumnya', 'ukm-toko'),
                'next_text' => __('Selanjutnya &rarr;', 'ukm-toko'),
            ));
            ?>
        </div>
    <?php else : ?>
        <p style="text-align:center; padding:40px; color:#64748b;">Belum ada artikel yang diterbitkan.</p>
    <?php endif; ?>
</div>

<?php
get_footer();

