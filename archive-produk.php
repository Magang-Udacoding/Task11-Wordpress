<?php
/**
 * Archive Template for CPT Produk - Classic Facebook Marketplace / Catalog Style
 *
 * @package UKM_Toko_Theme
 */

get_header();

$current_cat = get_query_var('kategori-produk');
$wa_number   = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean    = preg_replace('/[^0-9]/', '', $wa_number);
?>

<div class="fb-3col-layout">
    <!-- Left Sidebar: Categories & Filter -->
    <aside class="fb-col-left">
        <div class="fb-left-card fb-profile-card">
            <div class="fb-profile-avatar-box">
                <span class="fb-profile-emoji">🏪</span>
            </div>
            <div class="fb-profile-info">
                <h2 class="fb-profile-name">Katalog Sembako</h2>
                <span class="fb-profile-role">22+ Produk Sedia Diantar</span>
            </div>
        </div>

        <div class="fb-left-card fb-nav-card">
            <span class="fb-card-heading">FILTER KATEGORI</span>
            <ul class="fb-left-menu">
                <li class="<?php echo !is_tax('kategori-produk') ? 'active' : ''; ?>">
                    <a href="<?php echo esc_url(get_post_type_archive_link('produk')); ?>">
                        <span class="fb-menu-icon">📦</span>
                        <span class="fb-menu-label">Semua Produk (22)</span>
                    </a>
                </li>
                <?php
                $cats = get_terms(array(
                    'taxonomy'   => 'kategori-produk',
                    'hide_empty' => false,
                ));
                $icons = array(
                    'sembako'   => '🌾',
                    'minuman'   => '🧃',
                    'kebersihan'=> '🧼',
                    'snack'     => '🍪',
                );
                if (!empty($cats) && !is_wp_error($cats)) :
                    foreach ($cats as $cat) :
                        $is_active = is_tax('kategori-produk', $cat->term_id) ? 'active' : '';
                        $ico = isset($icons[$cat->slug]) ? $icons[$cat->slug] : '🏷️';
                ?>
                    <li class="<?php echo esc_attr($is_active); ?>">
                        <a href="<?php echo esc_url(get_term_link($cat)); ?>">
                            <span class="fb-menu-icon"><?php echo $ico; ?></span>
                            <span class="fb-menu-label"><?php echo esc_html($cat->name); ?></span>
                            <span class="fb-menu-badge"><?php echo $cat->count; ?></span>
                        </a>
                    </li>
                <?php
                    endforeach;
                endif;
                ?>
            </ul>

            <!-- Quick Checkout Link -->
            <div style="margin-top:14px; border-top:1px solid #d8dfea; padding-top:10px;">
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="fb-confirm-btn" style="display:block; text-align:center; padding:6px;">
                    🛒 Lihat Keranjang & Checkout
                </a>
            </div>
        </div>
    </aside>

    <!-- Center Column: Products Stream -->
    <section class="fb-col-center">
        <!-- Feed Filter Bar -->
        <div class="fb-feed-filter-bar">
            <div>
                <span class="fb-filter-title">
                    <?php
                    if (is_tax('kategori-produk')) {
                        single_term_title('Kategori: ');
                    } else {
                        echo 'Semua Katalog Produk Sembako Bahri';
                    }
                    ?>
                </span>
            </div>
            <div class="fb-filter-links">
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="fb-filter-link" style="color:#108a38; font-weight:bold;">
                    ⚡ Checkout Sandbox Mode
                </a>
            </div>
        </div>

        <!-- The Posts Stream -->
        <div class="fb-posts-stream">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'produk'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="fb-empty-feed">
                    Tidak ada produk ditemukan dalam kategori ini.
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Right Sidebar -->
    <aside class="fb-col-right">
        <!-- Ringkasan Keranjang Belanja Widget -->
        <div class="fb-right-card">
            <div class="fb-right-card-header">
                <span class="fb-header-title">KERANJANG BELANJA</span>
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="fb-see-all-link">Checkout</a>
            </div>
            <div style="font-size:11px; color:#555; padding:4px 0;">
                <p>Barang di keranjang: <strong id="sidebarCartCount">0</strong> item</p>
                <p style="margin-top:2px;">Total sementara: <strong id="sidebarCartTotal" style="color:#108a38;">Rp 0</strong></p>
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="fb-confirm-btn" style="display:block; text-align:center; margin-top:8px;">
                    Proses ke Kasir Sandbox &rarr;
                </a>
            </div>
        </div>

        <div class="fb-right-card fb-ads-card">
            <div class="fb-right-card-header">
                <span class="fb-header-title">SPONSOR & PROMO</span>
            </div>
            <div class="fb-ad-item">
                <div class="fb-ad-thumb">🌾</div>
                <div class="fb-ad-content">
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="fb-ad-title">Beras Pandan Wangi 5kg</a>
                    <span class="fb-ad-url">tokobahri.urmin.my.id</span>
                    <p class="fb-ad-desc">Beras wangi alami langsung dari petani binaan, stok melimpah.</p>
                </div>
            </div>
        </div>
    </aside>
</div>

<?php
get_footer();
