<?php
/**
 * Footer Template — TechNova Modern Style
 * Matches screenshot footer: wave curve, dark forest green, brand, links, social, newsletter
 *
 * @package UKM_Toko_Theme
 */

$store_name = get_theme_mod( 'ukm_store_brand_name', 'Riper Mart' );
$store_tagline = get_theme_mod( 'ukm_store_brand_tagline', 'Toko Sembako & Kebutuhan Harian Terlengkap' );
?>

    <!-- ═══════════════ SITE FOOTER TECHNOVA ═══════════════ -->
    <footer id="colophon" class="site-footer-technova" itemscope itemtype="https://schema.org/WPFooter">

        <!-- Classic Retro Double Rule Divider -->
        <div class="footer-retro-rule" aria-hidden="true"></div>

        <div class="footer-main-technova">
            <div class="site-container footer-technova-grid">

                <!-- Col 1: Brand Info -->
                <div class="footer-col footer-col-brand">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-brand-technova">
                        <div class="footer-brand-icon" aria-hidden="true">
                            <svg width="26" height="26" viewBox="0 0 32 32" fill="none">
                                <path d="M7 10H25L23.5 27H8.5L7 10Z" stroke="#ffffff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 12V7.5C12 5.567 13.7909 4 16 4C18.2091 4 20 5.567 20 7.5V12" stroke="#ffffff" stroke-width="2.2" stroke-linecap="round"/>
                                <path d="M12 15C13 16.5 14.5 17.5 16 17.5C17.5 17.5 19 16.5 20 15" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="footer-brand-title"><?php echo esc_html( $store_name ); ?></span>
                    </a>
                    <p class="footer-brand-tagline">
                        <?php echo esc_html( $store_tagline ); ?>
                    </p>
                </div>

                <!-- Col 2: Tautan Penting -->
                <div class="footer-col footer-col-links">
                    <h4 class="footer-heading"><?php esc_html_e( 'Tautan Penting', 'ukm-toko-theme' ); ?></h4>
                    <ul class="footer-links-list">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Beranda', 'ukm-toko-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'produk' ) ); ?>"><?php esc_html_e( 'Katalog Produk', 'ukm-toko-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/tentang-kami/' ) ); ?>"><?php esc_html_e( 'Tentang Kami', 'ukm-toko-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>"><?php esc_html_e( 'Kontak', 'ukm-toko-theme' ); ?></a></li>
                    </ul>
                </div>

                <!-- Col 3: Ikuti Kami (Social Media) -->
                <div class="footer-col footer-col-social">
                    <h4 class="footer-heading"><?php esc_html_e( 'Ikuti Kami', 'ukm-toko-theme' ); ?></h4>
                    <div class="footer-social-circles">
                        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </a>
                        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="YouTube">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#09090b"/>
                            </svg>
                        </a>
                        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" class="social-circle-btn" aria-label="TikTok">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5v3a8 8 0 0 1-5-1.7V16a7 7 0 1 1-7-7c.7 0 1.4.1 2 .3V9z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Col 4: Newsletter -->
                <div class="footer-col footer-col-newsletter">
                    <h4 class="footer-heading"><?php esc_html_e( 'Berlangganan Promo', 'ukm-toko-theme' ); ?></h4>
                    <p class="newsletter-sub">
                        <?php esc_html_e( 'Dapatkan info produk terbaru dan diskon hemat langsung ke email Anda.', 'ukm-toko-theme' ); ?>
                    </p>
                    <form class="technova-newsletter-form" onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan!');">
                        <div class="newsletter-input-box">
                            <input type="email" placeholder="<?php esc_attr_e( 'Alamat email Anda...', 'ukm-toko-theme' ); ?>" required class="newsletter-input" />
                            <button type="submit" class="newsletter-submit-btn" aria-label="<?php esc_attr_e( 'Berlangganan', 'ukm-toko-theme' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <line x1="22" y1="2" x2="11" y2="13"/>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Bottom Copyright & Legal Links -->
            <div class="site-container footer-bottom-technova">
                <div class="footer-copyright">
                    &copy; <?php echo date( 'Y' ); ?> <?php echo esc_html( $store_name ); ?>. <?php esc_html_e( 'Semua hak dilindungi undang-undang.', 'ukm-toko-theme' ); ?>
                </div>
                <div class="footer-legal-links">
                    <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Syarat & Ketentuan', 'ukm-toko-theme' ); ?></a>
                    <span class="legal-sep">|</span>
                    <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Kebijakan Privasi', 'ukm-toko-theme' ); ?></a>
                </div>
            </div>
        </div>

    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
