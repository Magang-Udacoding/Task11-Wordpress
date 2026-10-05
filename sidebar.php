<?php
/**
 * The sidebar containing the main widget area and store quick info
 *
 * @package UKM_Toko_Theme
 */

if (!is_active_sidebar('shop-sidebar')) {
    // Render clean default sidebar widgets when none is configured
    ?>
    <aside id="secondary" class="widget-area ukm-sidebar" aria-label="<?php esc_attr_e('Sidebar Toko', 'ukm-toko-theme'); ?>">
        <div class="ukm-sidebar-card">
            <h3 class="ukm-sidebar-title"><?php esc_html_e('Kategori Sembako', 'ukm-toko-theme'); ?></h3>
            <ul class="ukm-sidebar-list">
                <?php
                $terms = get_terms(array(
                    'taxonomy'   => 'kategori-produk',
                    'hide_empty' => false,
                ));
                if (!empty($terms) && !is_wp_error($terms)) :
                    foreach ($terms as $term) :
                ?>
                    <li>
                        <a href="<?php echo esc_url(get_term_link($term)); ?>">
                            <span><?php echo esc_html($term->name); ?></span>
                            <span class="ukm-count-badge"><?php echo esc_html($term->count); ?></span>
                        </a>
                    </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>
        </div>

        <div class="ukm-sidebar-card ukm-sidebar-promo">
            <h3 class="ukm-sidebar-title"><?php esc_html_e('Pesan Antar Cepat', 'ukm-toko-theme'); ?></h3>
            <p><?php esc_html_e('Pesanan sebelum jam 17:00 WIB dikirim langsung hari ini ke alamat Anda!', 'ukm-toko-theme'); ?></p>
            <?php 
            $wa = get_theme_mod('ukm_wa_number', '6281234567890');
            $clean_wa = preg_replace('/[^0-9]/', '', $wa);
            ?>
            <a href="https://wa.me/<?php echo esc_attr($clean_wa); ?>?text=Halo%20Admin%20Toko%20Bahri%2C%20mau%20order%20sembako" target="_blank" rel="noopener noreferrer" class="ukm-btn ukm-btn-wa">
                💬 <?php esc_html_e('Chat WhatsApp Admin', 'ukm-toko-theme'); ?>
            </a>
        </div>
    </aside>
    <?php
    return;
}
?>

<aside id="secondary" class="widget-area ukm-sidebar" aria-label="<?php esc_attr_e('Sidebar Toko', 'ukm-toko-theme'); ?>">
    <?php dynamic_sidebar('shop-sidebar'); ?>
</aside>
