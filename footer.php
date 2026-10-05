<?php
/**
 * Footer Template - Classic Facebook (2008-2010) Style
 *
 * @package UKM_Toko_Theme
 */

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
?>
    </main><!-- #primary-content -->

    <!-- CLASSIC OLD FACEBOOK FOOTER -->
    <footer id="colophon" class="fb-classic-footer">
        <div class="fb-footer-inner">
            <!-- Language Bar -->
            <div class="fb-lang-bar">
                <a href="javascript:void(0);" class="fb-lang-active">Bahasa Indonesia</a> ·
                <a href="javascript:void(0);">English (US)</a> ·
                <a href="javascript:void(0);">Basa Jawa</a> ·
                <a href="javascript:void(0);">Basa Sunda</a> ·
                <a href="javascript:void(0);">Melayu</a> ·
                <a href="javascript:void(0);">Español</a> ·
                <a href="javascript:void(0);" class="fb-lang-more">+</a>
            </div>

            <!-- Footer Links -->
            <div class="fb-links-bar">
                <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a> ·
                <a href="<?php echo esc_url(home_url('/produk/')); ?>">Katalog Produk</a> ·
                <a href="<?php echo esc_url(home_url('/klien/')); ?>">Mitra Warung</a> ·
                <a href="<?php echo esc_url(home_url('/tentang/')); ?>">Tentang Toko</a> ·
                <a href="<?php echo esc_url(home_url('/kontak/')); ?>">Kontak</a> ·
                <a href="<?php echo esc_url(home_url('/checkout/')); ?>">Kasir & Pembayaran Sandbox</a> ·
                <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>" target="_blank">Chat Admin WA</a>
            </div>

            <!-- Copyright -->
            <div class="fb-copyright-line">
                <span>Toko UKM Sembako Bahri &copy; 2008 - <?php echo date('Y'); ?> &middot; Tema Klasik Facebook Jaman Dulu &middot; Pengiriman Bandung</span>
            </div>
        </div>
    </footer>

    <!-- CLASSIC FLOATING FACEBOOK CHAT DOCK (BOTTOM-RIGHT) -->
    <aside class="fb-docked-chat" id="fbDockedChat">
        <div class="fb-dock-header" id="fbDockToggle">
            <span class="fb-dock-status-dot online"></span>
            <span class="fb-dock-title">Obrolan (3)</span>
            <span class="fb-dock-minimize">_</span>
        </div>
        <div class="fb-dock-body" id="fbDockBody">
            <div class="fb-dock-info-note">
                Hubungi Admin atau Mitra Toko langsung:
            </div>
            <ul class="fb-dock-user-list">
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%20Toko%20Bahri" target="_blank" class="fb-dock-user">
                        <span class="fb-dock-avatar">🏪</span>
                        <div class="fb-dock-user-meta">
                            <strong>Admin Toko Bahri</strong>
                            <small class="fb-status-online">Online (WhatsApp)</small>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Bu%20RT" target="_blank" class="fb-dock-user">
                        <span class="fb-dock-avatar">👵</span>
                        <div class="fb-dock-user-meta">
                            <strong>Toko Sembako Bu RT</strong>
                            <small class="fb-status-online">Online</small>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Pak%20Slamet" target="_blank" class="fb-dock-user">
                        <span class="fb-dock-avatar">👨‍🍳</span>
                        <div class="fb-dock-user-meta">
                            <strong>Warung Makan Pak Slamet</strong>
                            <small class="fb-status-online">Online</small>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
