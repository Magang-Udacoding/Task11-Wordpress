<?php
/**
 * Template Name: Halaman Kontak Toko - Retro Contact Us
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number  = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean   = preg_replace('/[^0-9]/', '', $wa_number);
$address    = get_theme_mod('ukm_store_address', 'Jl. Merdeka No. 45, Sentra UKM Kota Bandung, Jawa Barat');
$store_name = get_bloginfo('name') ?: 'Riper Mart';
$wa_url     = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode('Halo Admin ' . $store_name . ', saya ingin berkonsultasi seputar pesanan sembako.');
?>

<style>
/* ═══════════════════════════════════════════════════════════
   HALAMAN KONTAK TOKO — MODERN MONOCHROME RETRO COMMERCE
   ═══════════════════════════════════════════════════════════ */
.contact-page-main {
    padding: 36px 0 80px 0;
    background-color: #f8fafc;
}

/* Breadcrumbs */
.contact-page-main .retro-breadcrumbs {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 24px;
    padding: 6px 14px;
    border: 1.5px solid #000000;
    background: #ffffff;
    box-shadow: 2px 2px 0 #000000;
}
.contact-page-main .retro-breadcrumbs a {
    color: #000000;
    text-decoration: none;
}
.contact-page-main .retro-breadcrumbs a:hover {
    text-decoration: underline;
}
.contact-page-main .bc-sep {
    color: #71717a;
}
.contact-page-main .bc-current {
    color: #000000;
}

/* Hero Header Card */
.contact-hero-card {
    border: 2px solid #000000;
    box-shadow: 4px 4px 0px #000000;
    background: #ffffff;
    padding: clamp(24px, 4vw, 36px);
    margin-bottom: 32px;
}
.contact-badge-pill {
    margin-bottom: 12px;
}
.contact-badge-pill span {
    display: inline-block;
    border: 1px solid #000000;
    background: #000000;
    color: #ffffff;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.8px;
    padding: 4px 10px;
    text-transform: uppercase;
}
.contact-main-title {
    font-family: var(--font-serif, 'Times New Roman', serif);
    font-size: clamp(24px, 4vw, 36px);
    font-weight: 900;
    line-height: 1.25;
    margin: 0 0 12px 0;
    color: #000000;
}
.contact-main-subtitle {
    font-size: 15px;
    line-height: 1.6;
    color: #334155;
    max-width: 860px;
    margin: 0;
}

/* 2-Column Grid Layout */
.contact-grid-layout {
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 28px;
    align-items: start;
    margin-bottom: 48px;
}

/* Base Card Style */
.contact-page-main .retro-box-card {
    border: 2px solid #000000 !important;
    box-shadow: 4px 4px 0px #000000 !important;
    background: #ffffff !important;
    padding: clamp(20px, 3vw, 28px) !important;
    margin-bottom: 24px !important;
    box-sizing: border-box !important;
}

/* Card Header */
.contact-page-main .retro-card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 16px;
    border-bottom: 2px solid #000000;
    margin-bottom: 20px;
}
.contact-page-main .retro-card-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: #000000;
    color: #ffffff;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    flex-shrink: 0;
}
.contact-page-main .retro-card-header-text h2.retro-card-title {
    font-family: var(--font-serif, 'Times New Roman', serif);
    font-size: 20px;
    font-weight: 900;
    color: #000000;
    margin: 0 0 4px 0;
    line-height: 1.25;
}
.contact-page-main .retro-card-header-text small {
    display: block;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 11.5px;
    color: #52525b;
}

/* Form Styles */
.retro-form .form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 16px;
}
.retro-form .form-group {
    margin-bottom: 16px;
}
.retro-form label {
    display: block;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    color: #000000;
    margin-bottom: 6px;
}
.retro-form label .req {
    color: #dc2626;
    margin-left: 2px;
}
.retro-form .retro-input,
.retro-form .retro-textarea {
    width: 100%;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0px #000000;
    background: #ffffff;
    color: #000000;
    font-family: inherit;
    font-size: 13.5px;
    padding: 10px 14px;
    border-radius: 0;
    box-sizing: border-box;
    transition: all 0.15s ease;
}
.retro-form .retro-input:focus,
.retro-form .retro-textarea:focus {
    outline: none;
    background: #fafafa;
    box-shadow: 3px 3px 0px #000000;
    transform: translate(-1px, -1px);
}
.retro-form .retro-textarea {
    resize: vertical;
    min-height: 110px;
    line-height: 1.5;
}

/* Button CTA */
.btn-retro-submit {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #000000;
    color: #ffffff;
    border: 2px solid #000000;
    box-shadow: 3px 3px 0px #000000;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 13px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    padding: 14px 20px;
    cursor: pointer;
    border-radius: 0;
    transition: all 0.15s ease;
    margin-top: 8px;
}
.btn-retro-submit:hover {
    background: #27272a;
    transform: translate(2px, 2px);
    box-shadow: 1px 1px 0px #000000;
}

/* WhatsApp Card Elements */
.whatsapp-status-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #f0fdf4;
    border: 1px solid #16a34a;
    color: #15803d;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 11px;
    font-weight: 800;
    padding: 4px 10px;
    margin-bottom: 14px;
    text-transform: uppercase;
}
.whatsapp-status-pill .live-dot {
    width: 8px;
    height: 8px;
    background: #22c55e;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 0 6px #22c55e;
}
.whatsapp-desc {
    font-size: 14px;
    line-height: 1.6;
    color: #334155;
    margin: 0 0 18px 0;
}
.btn-retro-wa {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    background: #000000;
    color: #ffffff;
    border: 2px solid #000000;
    box-shadow: 3px 3px 0px #000000;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 12.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 18px;
    text-decoration: none;
    box-sizing: border-box;
    transition: all 0.15s ease;
}
.btn-retro-wa:hover {
    background: #15803d;
    border-color: #15803d;
    color: #ffffff;
    transform: translate(2px, 2px);
    box-shadow: 1px 1px 0px #000000;
}

/* Store Details Rows (Clean Card Format) */
.store-details-grid {
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.store-detail-item {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0px #000000;
    background: #fafafa;
    padding: 12px 14px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}
.store-detail-icon {
    width: 28px;
    height: 28px;
    background: #000000;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 2px;
}
.store-detail-content h4 {
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 11px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #000000;
    margin: 0 0 4px 0;
}
.store-detail-content p {
    font-size: 13px;
    line-height: 1.5;
    color: #334155;
    margin: 0;
}

/* FAQ Section */
.contact-faq-section {
    margin-top: 40px;
}
.faq-header-card {
    border: 2px solid #000000;
    box-shadow: 4px 4px 0px #000000;
    background: #ffffff;
    padding: 20px 24px;
    margin-bottom: 24px;
}
.faq-header-card .faq-badge {
    display: inline-block;
    border: 1px solid #000000;
    background: #000000;
    color: #ffffff;
    font-family: var(--font-mono, 'Courier New', monospace);
    font-size: 11px;
    font-weight: 800;
    padding: 3px 8px;
    margin-bottom: 8px;
    text-transform: uppercase;
}
.faq-section-title {
    font-family: var(--font-serif, 'Times New Roman', serif);
    font-size: 22px;
    font-weight: 900;
    margin: 0;
    color: #000000;
}
.faq-cards-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
.faq-card-box {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0px #000000;
    background: #ffffff;
    padding: 20px 22px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.faq-card-box h4 {
    font-family: var(--font-serif, 'Times New Roman', serif);
    font-size: 16px;
    font-weight: 800;
    margin: 0;
    color: #000000;
    line-height: 1.4;
    border-bottom: 1.5px solid #e4e4e7;
    padding-bottom: 8px;
}
.faq-card-box p {
    font-size: 13.5px;
    line-height: 1.6;
    color: #475569;
    margin: 0;
}

@media (max-width: 900px) {
    .contact-grid-layout {
        grid-template-columns: 1fr;
    }
    .retro-form .form-row-2 {
        grid-template-columns: 1fr;
    }
    .faq-cards-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<main id="primary-content" class="contact-page-main">
    <div class="site-container">

        <!-- Breadcrumbs -->
        <div class="retro-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">&larr; Beranda</a>
            <span class="bc-sep">/</span>
            <span class="bc-current">Kontak Toko</span>
        </div>

        <!-- Hero Header -->
        <div class="contact-hero-card">
            <div class="contact-badge-pill">
                <span>[LAYANAN KONSUMEN &amp; KEMITRAAN WARUNG]</span>
            </div>
            <h1 class="contact-main-title">Pusat Layanan Pelanggan <?php echo esc_html($store_name); ?></h1>
            <p class="contact-main-subtitle">
                Ada pertanyaan seputar ketersediaan stok sembako, harga grosir karungan, pengiriman same-day kurir toko, atau pendaftaran kemitraan warung? Kami siap melayani Anda dengan cepat, akurat, dan transparan.
            </p>
        </div>

        <!-- 2-Column Contact Layout -->
        <div class="contact-grid-layout">
            
            <!-- LEFT: Contact Form Card -->
            <div class="contact-form-column">
                <div class="retro-box-card">
                    <div class="retro-card-header">
                        <span class="retro-card-icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </span>
                        <div class="retro-card-header-text">
                            <h2 class="retro-card-title">Kirim Pesan / Permintaan Pasokan</h2>
                            <small>Isi formulir di bawah ini, admin toko akan segera merespons</small>
                        </div>
                    </div>

                    <form class="retro-form" id="tokoContactForm" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah diterima oleh Admin <?php echo esc_js($store_name); ?>. Staf kami akan segera menghubungi nomor WhatsApp Anda.'); this.reset();">
                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="cName">Nama Lengkap <span class="req">*</span></label>
                                <input type="text" id="cName" class="retro-input" required placeholder="Contoh: Ibu Rina / Pak Budi" />
                            </div>
                            <div class="form-group">
                                <label for="cPhone">Nomor WhatsApp / HP <span class="req">*</span></label>
                                <input type="tel" id="cPhone" class="retro-input" required placeholder="Contoh: 081234567890" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cTopic">Tujuan Keperluan <span class="req">*</span></label>
                            <select id="cTopic" class="retro-input" style="height:44px;">
                                <option value="retail">Pemesanan Sembako Rumah Tangga (Eceran)</option>
                                <option value="grosir">Pemesanan Grosir / Usaha Kuliner &amp; Restoran</option>
                                <option value="mitra">Pendaftaran Program Kemitraan Warung Binaan</option>
                                <option value="konfirmasi">Konfirmasi Pembayaran &amp; Cek Status Pengiriman</option>
                                <option value="lainnya">Pertanyaan Umum / Kerjasama Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cMessage">Rincian Kebutuhan Sembako atau Pertanyaan <span class="req">*</span></label>
                            <textarea id="cMessage" class="retro-textarea" rows="4" required placeholder="Tuliskan daftar pesanan sembako atau pertanyaan Anda di sini..."></textarea>
                        </div>

                        <button type="submit" class="btn-retro-submit">
                            <span>Kirim Pesan ke Admin</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- RIGHT: Direct Contact Info & Store Details -->
            <div class="contact-info-column">
                
                <!-- Quick WhatsApp Card -->
                <div class="retro-box-card">
                    <div class="retro-card-header">
                        <span class="retro-card-icon" style="background:#15803d; border-color:#15803d;" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </span>
                        <div class="retro-card-header-text">
                            <h2 class="retro-card-title">Respon Kilat via WhatsApp</h2>
                            <small>Chat langsung dengan customer service kami</small>
                        </div>
                    </div>
                    <div class="retro-card-body">
                        <div class="whatsapp-status-pill">
                            <span class="live-dot"></span>
                            <span>ONLINE &mdash; SIAP MELAYANI HARI INI</span>
                        </div>
                        <p class="whatsapp-desc">
                            Dapatkan konfirmasi stok beras hari ini, penawaran harga grosir karungan, dan koordinasi jam pengiriman pesanan secara instan.
                        </p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-retro-wa">
                            <span>Chat WhatsApp: +<?php echo esc_html($wa_clean); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Store Warehouse Card -->
                <div class="retro-box-card">
                    <div class="retro-card-header">
                        <span class="retro-card-icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </span>
                        <div class="retro-card-header-text">
                            <h2 class="retro-card-title">Gudang &amp; Titik Distribusi</h2>
                            <small>Lokasi operasional <?php echo esc_html($store_name); ?></small>
                        </div>
                    </div>
                    
                    <div class="store-details-grid">
                        <div class="store-detail-item">
                            <span class="store-detail-icon" aria-hidden="true">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </span>
                            <div class="store-detail-content">
                                <h4>Alamat Gudang</h4>
                                <p><?php echo esc_html($address); ?></p>
                            </div>
                        </div>

                        <div class="store-detail-item">
                            <span class="store-detail-icon" aria-hidden="true">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </span>
                            <div class="store-detail-content">
                                <h4>Jam Operasional</h4>
                                <p>Senin &ndash; Minggu: 07:00 &ndash; 21:00 WIB (Buka setiap hari melayani pengiriman).</p>
                            </div>
                        </div>

                        <div class="store-detail-item">
                            <span class="store-detail-icon" aria-hidden="true">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <rect x="1" y="3" width="15" height="13"></rect>
                                    <polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon>
                                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                </svg>
                            </span>
                            <div class="store-detail-content">
                                <h4>Jangkauan Kurir</h4>
                                <p>Seluruh Kota Bandung, Cimahi, Kab. Bandung &amp; Bandung Barat (Same-Day Delivery).</p>
                            </div>
                        </div>

                        <div class="store-detail-item">
                            <span class="store-detail-icon" aria-hidden="true">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </span>
                            <div class="store-detail-content">
                                <h4>Metode Pembayaran</h4>
                                <p>QRIS Semua Bank &amp; E-Wallet, Transfer BCA / Mandiri, serta COD (Bayar di Tempat).</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- FAQ Section -->
        <div class="contact-faq-section">
            <div class="faq-header-card">
                <span class="faq-badge">[TANYA JAWAB RESMI]</span>
                <h2 class="faq-section-title">Pertanyaan yang Sering Diajukan (FAQ)</h2>
            </div>

            <div class="faq-cards-grid">
                <div class="faq-card-box">
                    <h4>Berapa minimal pembelian sembako di <?php echo esc_html($store_name); ?>?</h4>
                    <p>Tidak ada batas minimal pembelian! Anda dapat memesan 1 bungkus gula kristal atau 1 botol minyak goreng sekalipun. Untuk fasilitas gratis ongkos kirim, berlaku dengan belanja minimal Rp 50.000.</p>
                </div>
                <div class="faq-card-box">
                    <h4>Kapan pesanan saya diantar ke alamat?</h4>
                    <p>Pesanan yang diverifikasi sebelum pukul 17:00 WIB diantar di hari yang sama (Same-Day Delivery). Pesanan setelah jam 17:00 dijadwalkan pada pengiriman pertama esok pagi.</p>
                </div>
                <div class="faq-card-box">
                    <h4>Bagaimana cara mendaftar jadi Mitra Warung Binaan?</h4>
                    <p>Pendaftaran mitra warung 100% gratis. Cukup hubungi admin via WhatsApp dengan melampirkan foto kios warung Anda, tim kami akan mengaktifkan daftar harga khusus grosir.</p>
                </div>
                <div class="faq-card-box">
                    <h4>Apakah kualitas timbangan dijamin akurat?</h4>
                    <p>Pasti! Kami menggunakan timbangan digital tersertifikasi berkala. Jika saat diterima berat beras atau gula berkurang, kami ganti selisihnya seketika tanpa biaya tambahan.</p>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();
