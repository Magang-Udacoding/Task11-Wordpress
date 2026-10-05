<?php
/**
 * Modern E-Commerce Footer Template - Clean, Professional & Contemporary
 *
 * @package UKM_Toko_Theme
 */

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
$address   = get_theme_mod('ukm_store_address', 'Jl. Merdeka No. 45, Sentra UKM Kota Bandung, Jawa Barat');
$footer_txt= get_theme_mod('ukm_footer_text', '© ' . date('Y') . ' Toko UKM Sembako Bahri. Seluruh hak cipta dilindungi.');
?>

    <!-- MODERN FOOTER SECTION -->
    <footer id="colophon" class="site-modern-footer">
        <div class="site-container">
            <div class="footer-top-grid">
                
                <!-- Col 1: Store Brand & About -->
                <div class="footer-col footer-col-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-brand-link">
                        <div class="footer-brand-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </div>
                        <span class="footer-brand-title">TOKO BAHRI</span>
                    </a>
                    <p class="footer-about-text">
                        Pusat retail dan distributor sembako resmi berkualitas untuk kebutuhan dapur rumah tangga, warung kelontong binaan, dan katering. Jaminan timbangan pas, barang asli, dan siap antar same-day.
                    </p>
                    <div class="footer-social-links">
                        <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>" target="_blank" rel="noopener noreferrer" class="social-circle wa" title="WhatsApp">
                            💬
                        </a>
                        <a href="<?php echo esc_url(get_theme_mod('ukm_social_facebook', 'https://facebook.com/tokobahri')); ?>" target="_blank" rel="noopener noreferrer" class="social-circle fb" title="Facebook">
                            f
                        </a>
                        <a href="<?php echo esc_url(get_theme_mod('ukm_social_instagram', 'https://instagram.com/tokobahri')); ?>" target="_blank" rel="noopener noreferrer" class="social-circle ig" title="Instagram">
                            📸
                        </a>
                        <a href="<?php echo esc_url(get_theme_mod('ukm_social_tiktok', 'https://tiktok.com/@tokobahri')); ?>" target="_blank" rel="noopener noreferrer" class="social-circle tt" title="TikTok">
                            🎵
                        </a>
                    </div>
                </div>

                <!-- Col 2: Kategori Sembako -->
                <div class="footer-col">
                    <h3 class="footer-heading">Kategori Produk</h3>
                    <ul class="footer-menu-list">
                        <li><a href="<?php echo esc_url(home_url('/produk/?kategori=sembako')); ?>">🌾 Beras & Sembako Pokok</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk/?kategori=minuman')); ?>">🧃 Minuman Segar & Kopi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk/?kategori=kebersihan')); ?>">🧼 Sabun & Deterjen</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk/?kategori=snack')); ?>">🍪 Camilan & Snack</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk/')); ?>">📦 Seluruh 22+ Produk Sembako</a></li>
                    </ul>
                </div>

                <!-- Col 3: Layanan & Informasi -->
                <div class="footer-col">
                    <h3 class="footer-heading">Layanan & Mitra</h3>
                    <ul class="footer-menu-list">
                        <li><a href="<?php echo esc_url(home_url('/klien/')); ?>">👥 Mitra Warung Binaan</a></li>
                        <li><a href="<?php echo esc_url(home_url('/tentang-kami/')); ?>">📖 Profil & Sejarah Toko</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">📰 Blog Tips Belanja Sembako</a></li>
                        <li><a href="<?php echo esc_url(home_url('/checkout/')); ?>">⚡ Kasir & Pembayaran Sandbox</a></li>
                        <li><a href="<?php echo esc_url(home_url('/kontak/')); ?>">📞 Hubungi Admin & Lokasi</a></li>
                    </ul>
                </div>

                <!-- Col 4: Lokasi & Pembayaran -->
                <div class="footer-col">
                    <h3 class="footer-heading">Gudang & Jam Buka</h3>
                    <div class="footer-contact-item">
                        <span class="f-icon">📍</span>
                        <span><?php echo esc_html($address); ?></span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="f-icon">🕒</span>
                        <span>Buka Setiap Hari: 07:00 - 21:00 WIB</span>
                    </div>
                    <div class="footer-contact-item">
                        <span class="f-icon">🚚</span>
                        <span>Pengiriman: Diantar Same-Day se-Bandung</span>
                    </div>

                    <div class="footer-payment-box">
                        <span class="payment-title">Metode Pembayaran Resmi:</span>
                        <div class="payment-badges">
                            <span class="pay-badge">QRIS</span>
                            <span class="pay-badge">BCA</span>
                            <span class="pay-badge">Mandiri</span>
                            <span class="pay-badge">COD / Tunai</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Line -->
            <div class="footer-bottom-bar">
                <p class="copyright-text"><?php echo esc_html($footer_txt); ?> &bull; Dibuat untuk Digitalisasi UKM Sembako Indonesia.</p>
                <div class="footer-secure-tag">
                    <span>🔒 Transaksi Aman 100% &bull; SSL Encrypted</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- MODERN FLOATING WHATSAPP BUTTON (Bottom Right with Pulse Effect) -->
    <aside class="floating-wa-container">
        <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>?text=Halo%20Admin%20Toko%20Bahri%2C%20mau%20order%20sembako" target="_blank" rel="noopener noreferrer" class="floating-wa-btn" title="Chat Admin Toko Bahri via WhatsApp">
            <div class="wa-btn-pulse"></div>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-1.127-.061-.271-.088-.61-.205-1.045-.395-1.841-.806-3.037-2.673-3.129-2.796-.092-.124-.744-.991-.744-1.89s.471-1.341.638-1.523c.168-.182.366-.228.489-.228.123 0 .245.001.353.006.113.006.264-.043.413.315.153.367.52 1.27.565 1.363.046.092.077.2.015.323-.061.124-.092.2-.184.308-.092.108-.194.241-.277.324-.092.092-.188.192-.081.376.108.183.479.79 1.026 1.278.704.628 1.298.822 1.482.914.184.092.292.077.4-.046.108-.124.46-1.339.583-.454.123-.114.246-.092.414-.03.168.061 1.069.504 1.253.596.184.092.306.138.352.215.046.077.046.445-.098.85z"/>
            </svg>
            <span class="floating-wa-label">Pesan Sembako via WA</span>
        </a>
    </aside>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
