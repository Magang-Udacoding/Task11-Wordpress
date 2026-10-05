<?php
/**
 * Template Name: Halaman Checkout & Pembayaran Sandbox
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
?>

<!-- Modern Checkout Wrapper -->
<div class="modern-checkout-wrapper">
    <!-- Breadcrumb & Stepper Header -->
    <div class="modern-checkout-header">
        <div class="checkout-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Beranda
            </a>
            <span class="bc-sep">/</span>
            <a href="<?php echo esc_url(home_url('/produk/')); ?>">Katalog Sembako</a>
            <span class="bc-sep">/</span>
            <span class="bc-current">Kasir & Pembayaran</span>
        </div>

        <div class="checkout-title-bar">
            <div>
                <span class="checkout-badge-pill">
                    <span class="pill-dot"></span>
                    E-Commerce Kasir Digital
                </span>
                <h1 class="checkout-page-title">Selesaikan Pesanan Anda</h1>
                <p class="checkout-page-subtitle">Periksa keranjang belanja sembako, lengkapi alamat pengiriman, dan lakukan simulasi pembayaran instan.</p>
            </div>
            
            <!-- Modern Stepper -->
            <div class="checkout-stepper-container">
                <div class="stepper-item step-completed">
                    <div class="stepper-circle">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <span class="stepper-text">Keranjang</span>
                </div>
                <div class="stepper-line active"></div>
                <div class="stepper-item step-active">
                    <div class="stepper-circle">2</div>
                    <span class="stepper-text">Pengiriman</span>
                </div>
                <div class="stepper-line active"></div>
                <div class="stepper-item step-active">
                    <div class="stepper-circle">3</div>
                    <span class="stepper-text">Pembayaran</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Sandbox Notice Banner -->
    <div class="fb-sandbox-banner">
        <div class="sandbox-banner-icon-wrap">
            <span class="sandbox-icon">🧪</span>
        </div>
        <div class="sandbox-banner-content">
            <div class="sandbox-banner-heading">
                <span class="fb-sandbox-badge">MODE SANDBOX TESTING</span>
                <strong>Simulasi Pembayaran Terintegrasi Toko Bahri</strong>
            </div>
            <p>Halaman ini terhubung dengan gateway simulasi pengujian. Anda dapat menguji checkout barang sembako, memilih QRIS / VA / COD, dan mencetak struk digital tanpa memotong saldo nyata.</p>
        </div>
    </div>

    <!-- Main Checkout Grid -->
    <div class="fb-checkout-grid">
        <!-- LEFT COLUMN: Cart, Shipping, Payment -->
        <div class="fb-checkout-main">
            <!-- Step 1: Cart Items Card -->
            <div class="fb-checkout-card">
                <div class="fb-checkout-card-header">
                    <div class="step-badge-wrap">
                        <span class="fb-step-num">1</span>
                    </div>
                    <div class="card-header-titles">
                        <h3>Daftar Barang Belanja (Keranjang Sembako)</h3>
                        <p>Pastikan jumlah dan varian produk sembako sudah sesuai kebutuhan Anda</p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="btn-add-more-link" title="Tambah barang lagi">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Tambah Barang
                    </a>
                </div>
                <div class="fb-checkout-card-body">
                    <div id="checkoutCartItems">
                        <!-- Rendered dynamically by JS -->
                        <div class="fb-cart-loading">
                            <div class="fb-mini-spinner"></div>
                            <span>Memuat daftar belanjaan sembako Anda...</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Shipping Details Form -->
            <div class="fb-checkout-card">
                <div class="fb-checkout-card-header">
                    <div class="step-badge-wrap">
                        <span class="fb-step-num">2</span>
                    </div>
                    <div class="card-header-titles">
                        <h3>Data Alamat & Kontak Pengiriman</h3>
                        <p>Kurir lokal Toko Bahri akan langsung mengantar ke lokasi rumah atau warung Anda</p>
                    </div>
                </div>
                <div class="fb-checkout-card-body">
                    <!-- Delivery Feature Tag -->
                    <div class="delivery-highlight-badge">
                        <span class="dh-icon">🛵</span>
                        <div>
                            <strong>Pengiriman Cepat Kurir Toko (Same-Day Delivery)</strong>
                            <p>Estimasi 1-2 jam sampai untuk area Kota Bandung dan sekitarnya · Bebas Ongkos Kirim</p>
                        </div>
                    </div>

                    <form id="checkoutForm" onsubmit="return false;" class="modern-shipping-form">
                        <div class="fb-form-row">
                            <div class="fb-form-group">
                                <label for="custName">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    Nama Lengkap Penerima <span class="required">*</span>
                                </label>
                                <input type="text" id="custName" class="fb-input" required placeholder="Contoh: Ibu Rina Melati" value="Budi Santoso" />
                            </div>
                            <div class="fb-form-group">
                                <label for="custPhone">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    Nomor WhatsApp Aktif <span class="required">*</span>
                                </label>
                                <input type="tel" id="custPhone" class="fb-input" required placeholder="Contoh: 081234567890" value="081298765432" />
                            </div>
                        </div>

                        <div class="fb-form-group">
                            <label for="custAddress">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                Alamat Lengkap Rumah / Warung / Toko <span class="required">*</span>
                            </label>
                            <textarea id="custAddress" class="fb-input" rows="2" required placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan...">Jl. Anggrek No. 12, RT 03 / RW 05, Kel. Merdeka, Bandung</textarea>
                        </div>

                        <div class="fb-form-row">
                            <div class="fb-form-group">
                                <label for="custPatokan">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                                    Patokan Lokasi (Memudahkan Kurir):
                                </label>
                                <input type="text" id="custPatokan" class="fb-input" placeholder="Contoh: Depan Pos Ronda RW 05 / Rumah Pagar Putih" value="Dekat Masjid Nurul Iman" />
                            </div>
                            <div class="fb-form-group">
                                <label for="custNotes">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    Catatan Tambahan untuk Kurir:
                                </label>
                                <input type="text" id="custNotes" class="fb-input" placeholder="Contoh: Tolong antar sebelum ashar" value="Tolong antar sebelum ashar" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Step 3: Payment Method Selection (Sandbox Dummy) -->
            <div class="fb-checkout-card">
                <div class="fb-checkout-card-header">
                    <div class="step-badge-wrap">
                        <span class="fb-step-num">3</span>
                    </div>
                    <div class="card-header-titles">
                        <h3>Pilih Metode Pembayaran (Sandbox Gateway)</h3>
                        <p>Simulasi transaksi instan aman dengan QRIS Nasional, Virtual Account Bank, atau COD</p>
                    </div>
                </div>
                <div class="fb-checkout-card-body">
                    <div class="fb-payment-options">
                        <!-- Option 1: QRIS -->
                        <label class="fb-payment-option selected">
                            <div class="radio-pill-wrap">
                                <input type="radio" name="payment_method" value="qris" checked />
                                <span class="custom-radio"></span>
                            </div>
                            <div class="fb-payment-meta">
                                <div class="payment-title-row">
                                    <span class="fb-pay-title">📱 QRIS Instan Standar Nasional</span>
                                    <span class="payment-tag tag-emerald">Paling Praktis</span>
                                </div>
                                <span class="fb-pay-desc">Mendukung GoPay, OVO, DANA, ShopeePay, LinkAja, BCA Mobile & Semua M-Banking.</span>
                            </div>
                            <div class="payment-brand-badges">
                                <span class="badge-mini">BCA</span>
                                <span class="badge-mini">GOPAY</span>
                                <span class="badge-mini">DANA</span>
                            </div>
                        </label>

                        <!-- Option 2: Virtual Account BCA -->
                        <label class="fb-payment-option">
                            <div class="radio-pill-wrap">
                                <input type="radio" name="payment_method" value="va_bca" />
                                <span class="custom-radio"></span>
                            </div>
                            <div class="fb-payment-meta">
                                <div class="payment-title-row">
                                    <span class="fb-pay-title">🏦 Virtual Account BCA (Sandbox)</span>
                                    <span class="payment-tag tag-blue">Verifikasi 5 Detik</span>
                                </div>
                                <span class="fb-pay-desc">Nomor Akun Virtual Otomatis: <code class="modern-va-code">8801 2345 6789 001</code></span>
                            </div>
                            <div class="payment-brand-badges">
                                <span class="badge-mini bca-blue">BCA VA</span>
                            </div>
                        </label>

                        <!-- Option 3: Virtual Account Mandiri -->
                        <label class="fb-payment-option">
                            <div class="radio-pill-wrap">
                                <input type="radio" name="payment_method" value="va_mandiri" />
                                <span class="custom-radio"></span>
                            </div>
                            <div class="fb-payment-meta">
                                <div class="payment-title-row">
                                    <span class="fb-pay-title">🏛️ Virtual Account Mandiri (Sandbox)</span>
                                    <span class="payment-tag tag-navy">Otomatis Lunas</span>
                                </div>
                                <span class="fb-pay-desc">Nomor Perusahaan: <code>8902</code> · Nomor VA: <code class="modern-va-code">8902 4432 1098 772</code></span>
                            </div>
                            <div class="payment-brand-badges">
                                <span class="badge-mini mandiri-gold">MANDIRI</span>
                            </div>
                        </label>

                        <!-- Option 4: COD -->
                        <label class="fb-payment-option">
                            <div class="radio-pill-wrap">
                                <input type="radio" name="payment_method" value="cod" />
                                <span class="custom-radio"></span>
                            </div>
                            <div class="fb-payment-meta">
                                <div class="payment-title-row">
                                    <span class="fb-pay-title">💵 Bayar di Tempat (COD Tunai)</span>
                                    <span class="payment-tag tag-amber">Tanpa Transfer</span>
                                </div>
                                <span class="fb-pay-desc">Bayar tunai langsung ke kurir Toko Bahri setelah sembako Anda periksa di tempat.</span>
                            </div>
                            <div class="payment-brand-badges">
                                <span class="badge-mini cod-green">COD</span>
                            </div>
                        </label>
                    </div>

                    <!-- Payment Visual Preview Box -->
                    <div class="fb-payment-preview-box" id="paymentPreviewBox">
                        <div class="fb-qris-demo">
                            <div class="fb-qris-header">
                                <div class="qris-brand-logo">
                                    <span class="qris-bold">QRIS</span>
                                    <span class="qris-sub">Standar Pembayaran Nasional</span>
                                </div>
                                <div class="qris-nmid-pill">NMID: ID1020261199TOKOBAHRI</div>
                            </div>
                            <div class="fb-qris-code">
                                <div class="qr-scanner-frame">
                                    <span class="corner c-tl"></span>
                                    <span class="corner c-tr"></span>
                                    <span class="corner c-bl"></span>
                                    <span class="corner c-br"></span>
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=TOKOBAHRI-SANDBOX-PAYMENT-SIMULATION" alt="QRIS Sandbox Demo" />
                                </div>
                            </div>
                            <div class="fb-qris-footer">
                                <div class="pulse-indicator-row">
                                    <span class="pulse-green-dot"></span>
                                    <strong>Menunggu Pembayaran Scanner QRIS...</strong>
                                </div>
                                <p>Simulasi QR Code Sandbox Aktif · Tanpa Biaya Admin Tambahan (Rp 0)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Order Summary Sticky Card -->
        <div class="fb-checkout-sidebar">
            <div class="fb-summary-card">
                <div class="fb-summary-header">
                    <div class="summary-header-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                    </div>
                    <div>
                        <h4>Ringkasan Pesanan</h4>
                        <span class="summary-subtitle">Perhitungan otomatis & transparan</span>
                    </div>
                </div>
                <div class="fb-summary-body">
                    <div class="fb-summary-line">
                        <span>Total Belanja Barang:</span>
                        <strong id="summarySubtotal" class="summary-val-black">Rp 0</strong>
                    </div>

                    <div class="fb-summary-line">
                        <span>Ongkos Kirim Kurir Toko:</span>
                        <span class="badge-free-shipping">GRATIS (Radius 5 KM)</span>
                    </div>

                    <div class="fb-summary-line">
                        <span>Biaya Layanan Gateway:</span>
                        <strong class="text-emerald">Rp 0 (Sandbox Promo)</strong>
                    </div>

                    <!-- Voucher Promo Code Simulation -->
                    <div class="voucher-box-wrap">
                        <div class="voucher-input-group">
                            <input type="text" id="voucherCode" placeholder="Kode Promo: SEMBAKOHEMAT" value="SEMBAKOHEMAT" />
                            <button type="button" id="btnApplyVoucher" onclick="alert('Kupon SEMBAKOHEMAT Terverifikasi! Diskon Ongkir 100% Aktif.');">Pakai</button>
                        </div>
                    </div>

                    <div class="fb-summary-total">
                        <div class="total-text-wrap">
                            <span class="total-label">Total Pembayaran:</span>
                            <small class="total-tax-note">Termasuk PPN & Jaminan Produk Segar</small>
                        </div>
                        <strong id="summaryGrandTotal" class="summary-grand-amount">Rp 0</strong>
                    </div>

                    <!-- Pay Now CTA Button -->
                    <button type="button" class="fb-btn-pay-now" id="btnExecuteSandboxPay">
                        <span class="btn-pay-icon">💳</span>
                        <span>Bayar Sekarang (Sandbox)</span>
                        <span class="btn-pay-arrow">&rarr;</span>
                    </button>

                    <!-- Trust & Guarantees -->
                    <div class="checkout-trust-badges">
                        <div class="trust-badge-item">
                            <span class="tb-icon">🛡️</span>
                            <span>Enkripsi 256-Bit Sandbox Aman</span>
                        </div>
                        <div class="trust-badge-item">
                            <span class="tb-icon">⚡</span>
                            <span>Konfirmasi WhatsApp Otomatis</span>
                        </div>
                        <div class="trust-badge-item">
                            <span class="tb-icon">📦</span>
                            <span>Garansi Kualitas Sembako 100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================= -->
<!-- MODAL SIMULASI PEMBAYARAN SANDBOX SUKSES                       -->
<!-- ============================================================= -->
<div class="fb-modal-overlay" id="sandboxSuccessModal" style="display:none;">
    <div class="fb-modal-content">
        <!-- Processing / Spinner State -->
        <div id="modalLoadingState" class="modal-loading-box">
            <div class="modern-spinner-ring"></div>
            <h3>Memproses Pembayaran Sandbox...</h3>
            <p>Menghubungkan ke Gateway Toko Bahri & mencetak invoice digital</p>
        </div>

        <!-- Success Invoice State -->
        <div id="modalSuccessState" style="display:none;" class="modal-success-box">
            <div class="success-top-celebrate">
                <div class="success-check-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <h3>Pembayaran Berhasil!</h3>
                <p class="success-subtitle">Transaksi simulasi sandbox telah disetujui (Status: LUNAS)</p>
            </div>
            
            <div class="fb-receipt-box">
                <div class="fb-receipt-header">
                    <div class="receipt-store-logo">🏪 TOKO UKM SEMBAKO BAHRI</div>
                    <small>Struk Bukti Pembayaran Digital Sah (Sandbox)</small>
                </div>

                <div class="fb-receipt-table">
                    <div class="fb-r-row">
                        <span class="r-label">No. Invoice:</span>
                        <strong id="invNumber" class="r-val highlight-inv">#TB-202610-8841</strong>
                    </div>
                    <div class="fb-r-row">
                        <span class="r-label">Waktu Transaksi:</span>
                        <span id="invTime" class="r-val">-</span>
                    </div>
                    <div class="fb-r-row">
                        <span class="r-label">Metode Bayar:</span>
                        <strong id="invMethod" class="r-val text-emerald">QRIS Instan (Sandbox)</strong>
                    </div>
                    <div class="fb-r-row">
                        <span class="r-label">Nama Penerima:</span>
                        <span id="invCust" class="r-val">-</span>
                    </div>
                    <div class="fb-r-row">
                        <span class="r-label">Alamat Kirim:</span>
                        <span id="invAddress" class="r-val">-</span>
                    </div>
                    <div class="fb-r-row total-highlight">
                        <span class="r-label">Total Dibayar:</span>
                        <strong id="invTotal" class="r-val total-amount">Rp 0</strong>
                    </div>
                </div>

                <div class="fb-r-items-summary" id="invItemsList">
                    <!-- Items rendered dynamically by JS -->
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="fb-receipt-actions">
                <a href="#" id="btnSendWaReceipt" target="_blank" class="fb-btn-wa-receipt">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.301-.15-1.78-.879-2.056-.98-.276-.1-.476-.15-.676.15-.2.301-.776.98-.952 1.18-.176.2-.351.226-.652.075-.301-.15-1.272-.469-2.424-1.496-.895-.799-1.5-1.787-1.676-2.088-.176-.301-.019-.464.132-.614.136-.135.301-.351.452-.527.15-.176.2-.301.301-.501.1-.2.05-.376-.025-.526-.075-.15-.676-1.63-.927-2.235-.244-.589-.493-.509-.676-.518-.175-.01-.376-.01-.577-.01-.2 0-.527.075-.802.376s-1.053 1.028-1.053 2.508 1.078 2.909 1.229 3.11c.15.2 2.122 3.24 5.141 4.544.718.31 1.279.496 1.716.635.721.23 1.378.197 1.897.12.578-.087 1.78-.727 2.03-1.43.25-.702.25-1.304.175-1.43-.075-.125-.276-.201-.577-.351zM12.04 2C6.516 2 2.023 6.49 2.023 12.012c0 1.942.555 3.76 1.517 5.308L2 22l4.825-1.498a9.96 9.96 0 0 0 5.215 1.464c5.523 0 10.016-4.49 10.016-10.012A10.016 10.016 0 0 0 12.04 2z"/></svg>
                    <span>Kirim Bukti ke WhatsApp Admin Toko</span>
                </a>
                <button type="button" class="fb-btn-print" onclick="window.print();">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                    <span>Cetak Struk</span>
                </button>
                <button type="button" class="fb-btn-done" id="btnCloseModal">
                    Selesai & Belanja Lagi &rarr;
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================= -->
<!-- SCOPED MODERN CHECKOUT STYLES                                 -->
<!-- ============================================================= -->
<style>
/* Modern Container & Variables */
.modern-checkout-wrapper {
    max-width: 1140px;
    margin: 28px auto 80px auto;
    padding: 0 20px;
    font-family: var(--ukm-font-sans, 'Inter', system-ui, -apple-system, sans-serif);
    color: #1e293b;
}

/* Header & Breadcrumbs */
.modern-checkout-header {
    margin-bottom: 24px;
}
.checkout-breadcrumbs {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #64748b;
    margin-bottom: 14px;
}
.checkout-breadcrumbs a {
    color: #64748b;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: color 0.2s;
}
.checkout-breadcrumbs a:hover {
    color: #10b981;
}
.checkout-breadcrumbs .bc-sep {
    color: #cbd5e1;
}
.checkout-breadcrumbs .bc-current {
    color: #0f172a;
    font-weight: 600;
}

.checkout-title-bar {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
    flex-wrap: wrap;
    padding-bottom: 20px;
    border-bottom: 1px solid #e2e8f0;
}
.checkout-badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #ecfdf5;
    color: #059669;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 9999px;
    margin-bottom: 8px;
    border: 1px solid #a7f3d0;
}
.pill-dot {
    width: 6px;
    height: 6px;
    background: #10b981;
    border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
}
.checkout-page-title {
    font-size: 28px;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 6px 0;
    letter-spacing: -0.5px;
}
.checkout-page-subtitle {
    font-size: 14px;
    color: #64748b;
    margin: 0;
}

/* Stepper */
.checkout-stepper-container {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #ffffff;
    padding: 10px 18px;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.03);
}
.stepper-item {
    display: flex;
    align-items: center;
    gap: 8px;
}
.stepper-circle {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 800;
    background: #f1f5f9;
    color: #64748b;
    transition: all 0.3s;
}
.stepper-text {
    font-size: 12px;
    font-weight: 700;
    color: #64748b;
}
.stepper-item.step-completed .stepper-circle {
    background: #10b981;
    color: #ffffff;
}
.stepper-item.step-completed .stepper-text {
    color: #059669;
}
.stepper-item.step-active .stepper-circle {
    background: #0f172a;
    color: #ffffff;
    box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.15);
}
.stepper-item.step-active .stepper-text {
    color: #0f172a;
}
.stepper-line {
    width: 24px;
    height: 2px;
    background: #e2e8f0;
}
.stepper-line.active {
    background: #10b981;
}

/* Modern Sandbox Banner */
.fb-sandbox-banner {
    background: linear-gradient(135deg, #f0fdf4 0%, #e0f2fe 100%);
    border: 1px solid #bbf7d0;
    border-radius: 16px;
    padding: 16px 20px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 4px 20px -2px rgba(16, 185, 129, 0.08);
}
.sandbox-banner-icon-wrap {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
.sandbox-banner-content {
    flex: 1;
}
.sandbox-banner-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 4px;
    flex-wrap: wrap;
}
.fb-sandbox-badge {
    background: #059669;
    color: #ffffff;
    font-size: 10px;
    font-weight: 800;
    padding: 3px 8px;
    border-radius: 6px;
    letter-spacing: 0.5px;
}
.sandbox-banner-heading strong {
    font-size: 14px;
    color: #0f172a;
    font-weight: 700;
}
.sandbox-banner-content p {
    margin: 0;
    font-size: 12.5px;
    color: #475569;
    line-height: 1.5;
}

/* Grid Layout */
.fb-checkout-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 28px;
    align-items: start;
}
.fb-checkout-main {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* Modern Card */
.fb-checkout-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}
.fb-checkout-card-header {
    padding: 18px 24px;
    background: #ffffff;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 14px;
}
.step-badge-wrap {
    flex-shrink: 0;
}
.fb-step-num {
    width: 32px;
    height: 32px;
    border-radius: 10px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #ffffff;
    font-weight: 800;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(16, 185, 129, 0.25);
}
.card-header-titles {
    flex: 1;
}
.card-header-titles h3 {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 3px 0;
}
.card-header-titles p {
    font-size: 12px;
    color: #64748b;
    margin: 0;
}
.btn-add-more-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 700;
    color: #059669;
    background: #ecfdf5;
    padding: 6px 12px;
    border-radius: 8px;
    text-decoration: none;
    border: 1px solid #a7f3d0;
    transition: all 0.2s;
}
.btn-add-more-link:hover {
    background: #10b981;
    color: #ffffff;
}
.fb-checkout-card-body {
    padding: 24px;
}

/* Cart Table Modern */
.fb-cart-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 13px;
}
.fb-cart-table th {
    background: #f8fafc;
    color: #475569;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 0.5px;
    padding: 12px 14px;
    border-bottom: 1px solid #e2e8f0;
}
.fb-cart-table th:first-child { border-radius: 8px 0 0 8px; }
.fb-cart-table th:last-child { border-radius: 0 8px 8px 0; text-align: center; }
.fb-cart-table td {
    padding: 14px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}
.fb-cart-table tbody tr:hover td {
    background: #fafafa;
}
.fb-cart-table tbody tr:last-child td {
    border-bottom: none;
}
.fb-cart-thumb {
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
    border: 1px solid #a7f3d0;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}
.fb-qty-control {
    display: inline-flex;
    align-items: center;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    background: #ffffff;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.03);
}
.fb-qty-btn {
    background: #f8fafc;
    border: none;
    width: 28px;
    height: 28px;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    color: #334155;
    transition: background 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
}
.fb-qty-btn:hover {
    background: #e2e8f0;
    color: #0f172a;
}
.fb-qty-val {
    min-width: 32px;
    text-align: center;
    font-weight: 700;
    font-size: 13px;
    color: #0f172a;
}
.fb-cart-remove-btn {
    color: #ef4444;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 8px;
    border-radius: 6px;
    transition: all 0.2s;
}
.fb-cart-remove-btn:hover {
    background: #fef2f2;
    color: #dc2626;
}

/* Shipping Form */
.delivery-highlight-badge {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-left: 4px solid #10b981;
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.dh-icon {
    font-size: 24px;
}
.delivery-highlight-badge strong {
    font-size: 13px;
    color: #0f172a;
    display: block;
}
.delivery-highlight-badge p {
    font-size: 12px;
    color: #64748b;
    margin: 2px 0 0 0;
}

.modern-shipping-form .fb-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 16px;
}
.modern-shipping-form .fb-form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
}
.modern-shipping-form label {
    font-size: 12.5px;
    font-weight: 700;
    color: #334155;
    display: flex;
    align-items: center;
    gap: 6px;
}
.modern-shipping-form label svg {
    color: #10b981;
}
.modern-shipping-form .required {
    color: #ef4444;
}
.modern-shipping-form .fb-input {
    width: 100%;
    padding: 11px 14px;
    font-size: 13.5px;
    color: #0f172a;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    outline: none;
    transition: all 0.2s;
    font-family: inherit;
    box-sizing: border-box;
}
.modern-shipping-form .fb-input:focus {
    background: #ffffff;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
}

/* Payment Options */
.fb-payment-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}
.fb-payment-option {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    background: #ffffff;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}
.fb-payment-option:hover {
    border-color: #cbd5e1;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.fb-payment-option.selected {
    border-color: #10b981;
    background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
    box-shadow: 0 4px 16px rgba(16, 185, 129, 0.12);
}
.radio-pill-wrap input[type="radio"] {
    display: none;
}
.custom-radio {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid #cbd5e1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.2s;
}
.fb-payment-option.selected .custom-radio {
    border-color: #10b981;
    background: #10b981;
}
.fb-payment-option.selected .custom-radio::after {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #ffffff;
}
.fb-payment-meta {
    flex: 1;
}
.payment-title-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 3px;
    flex-wrap: wrap;
}
.fb-pay-title {
    font-size: 14px;
    font-weight: 700;
    color: #0f172a;
}
.payment-tag {
    font-size: 10px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.tag-emerald { background: #ecfdf5; color: #059669; }
.tag-blue { background: #eff6ff; color: #2563eb; }
.tag-navy { background: #f1f5f9; color: #0f172a; }
.tag-amber { background: #fffbeb; color: #d97706; }

.fb-pay-desc {
    font-size: 12px;
    color: #64748b;
    display: block;
    line-height: 1.4;
}
.modern-va-code {
    background: #f1f5f9;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 700;
    color: #0f172a;
}
.payment-brand-badges {
    display: flex;
    gap: 4px;
}
.badge-mini {
    font-size: 10px;
    font-weight: 800;
    background: #f1f5f9;
    color: #475569;
    padding: 3px 6px;
    border-radius: 4px;
}
.bca-blue { background: #eff6ff; color: #1d4ed8; }
.mandiri-gold { background: #fefce8; color: #a16207; }
.cod-green { background: #f0fdf4; color: #15803d; }

/* Payment Preview Box */
.fb-payment-preview-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 22px;
    margin-top: 16px;
}
.fb-qris-demo {
    text-align: center;
}
.fb-qris-header {
    margin-bottom: 16px;
}
.qris-brand-logo {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.qris-bold {
    font-size: 20px;
    font-weight: 900;
    letter-spacing: 2px;
    color: #0f172a;
}
.qris-sub {
    font-size: 10px;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.qris-nmid-pill {
    display: inline-block;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 6px;
    margin-top: 6px;
}
.fb-qris-code {
    display: flex;
    justify-content: center;
    margin: 10px 0;
}
.qr-scanner-frame {
    position: relative;
    padding: 12px;
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    display: inline-block;
}
.qr-scanner-frame img {
    display: block;
    max-width: 170px;
    height: auto;
    border-radius: 6px;
}
.corner {
    position: absolute;
    width: 14px;
    height: 14px;
    border-color: #10b981;
    border-style: solid;
}
.c-tl { top: 6px; left: 6px; border-width: 3px 0 0 3px; border-top-left-radius: 6px; }
.c-tr { top: 6px; right: 6px; border-width: 3px 3px 0 0; border-top-right-radius: 6px; }
.c-bl { bottom: 6px; left: 6px; border-width: 0 0 3px 3px; border-bottom-left-radius: 6px; }
.c-br { bottom: 6px; right: 6px; border-width: 0 3px 3px 0; border-bottom-right-radius: 6px; }

.fb-qris-footer {
    margin-top: 14px;
}
.pulse-indicator-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 12px;
    color: #0f172a;
}
.pulse-green-dot {
    width: 8px;
    height: 8px;
    background: #10b981;
    border-radius: 50%;
    animation: pulseGlow 1.5s infinite;
}
@keyframes pulseGlow {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}
.fb-qris-footer p {
    font-size: 11.5px;
    color: #64748b;
    margin: 4px 0 0 0;
}

/* Sidebar Order Summary Sticky */
.fb-checkout-sidebar {
    position: sticky;
    top: 90px;
}
.fb-summary-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.08);
    overflow: hidden;
}
.fb-summary-header {
    padding: 18px 22px;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    gap: 12px;
}
.summary-header-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #34d399;
}
.fb-summary-header h4 {
    margin: 0;
    font-size: 16px;
    font-weight: 800;
}
.summary-subtitle {
    font-size: 11px;
    color: #94a3b8;
}
.fb-summary-body {
    padding: 22px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.fb-summary-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
    color: #475569;
}
.summary-val-black {
    color: #0f172a;
    font-weight: 700;
}
.badge-free-shipping {
    background: #ecfdf5;
    color: #059669;
    font-weight: 800;
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 6px;
    border: 1px solid #a7f3d0;
}
.text-emerald {
    color: #059669;
    font-weight: 700;
}

/* Voucher Box */
.voucher-box-wrap {
    margin: 4px 0;
}
.voucher-input-group {
    display: flex;
    gap: 6px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 4px;
    border-radius: 10px;
}
.voucher-input-group input {
    flex: 1;
    border: none;
    background: transparent;
    padding: 6px 10px;
    font-size: 12px;
    font-weight: 600;
    color: #0f172a;
    outline: none;
}
.voucher-input-group button {
    background: #0f172a;
    color: #ffffff;
    border: none;
    padding: 6px 14px;
    font-size: 11px;
    font-weight: 700;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.2s;
}
.voucher-input-group button:hover {
    background: #10b981;
}

/* Total Section */
.fb-summary-total {
    margin-top: 6px;
    padding-top: 16px;
    border-top: 1.5px dashed #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
.total-label {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #0f172a;
}
.total-tax-note {
    font-size: 11px;
    color: #94a3b8;
}
.summary-grand-amount {
    font-size: 22px;
    font-weight: 900;
    color: #059669;
    letter-spacing: -0.5px;
}

/* Pay CTA Button */
.fb-btn-pay-now {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #ffffff;
    border: none;
    padding: 15px 20px;
    border-radius: 14px;
    font-size: 15px;
    font-weight: 800;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    box-shadow: 0 8px 24px -4px rgba(16, 185, 129, 0.4);
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}
.fb-btn-pay-now:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 28px -4px rgba(16, 185, 129, 0.5);
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
}
.btn-pay-icon { font-size: 18px; }
.btn-pay-arrow { font-size: 16px; transition: transform 0.2s; }
.fb-btn-pay-now:hover .btn-pay-arrow {
    transform: translateX(4px);
}

/* Trust Badges */
.checkout-trust-badges {
    margin-top: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
}
.trust-badge-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11.5px;
    color: #64748b;
}
.trust-badge-item .tb-icon {
    font-size: 14px;
}

/* Modal Popup */
.fb-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(15, 23, 42, 0.7);
    backdrop-filter: blur(8px);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    box-sizing: border-box;
}
.fb-modal-content {
    background: #ffffff;
    max-width: 520px;
    width: 100%;
    border-radius: 24px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    padding: 30px;
    box-sizing: border-box;
    max-height: 90vh;
    overflow-y: auto;
    animation: modalScaleIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes modalScaleIn {
    from { opacity: 0; transform: scale(0.92) translateY(10px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}

.modern-spinner-ring {
    width: 48px;
    height: 48px;
    border: 4px solid #e2e8f0;
    border-top-color: #10b981;
    border-radius: 50%;
    margin: 0 auto 16px auto;
    animation: spinRing 0.9s linear infinite;
}
@keyframes spinRing {
    to { transform: rotate(360deg); }
}
.modal-loading-box {
    text-align: center;
    padding: 40px 10px;
}
.modal-loading-box h3 {
    font-size: 18px;
    color: #0f172a;
    margin: 0 0 6px 0;
}
.modal-loading-box p {
    font-size: 13px;
    color: #64748b;
    margin: 0;
}

/* Success Invoice State */
.success-top-celebrate {
    text-align: center;
    margin-bottom: 20px;
}
.success-check-icon {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: #ecfdf5;
    color: #059669;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px auto;
    box-shadow: 0 0 0 8px rgba(16, 185, 129, 0.15);
}
.success-top-celebrate h3 {
    font-size: 22px;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 4px 0;
}
.success-subtitle {
    font-size: 13px;
    color: #64748b;
    margin: 0;
}

.fb-receipt-box {
    background: #f8fafc;
    border: 1.5px dashed #cbd5e1;
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 22px;
    position: relative;
}
.fb-receipt-header {
    text-align: center;
    padding-bottom: 14px;
    margin-bottom: 14px;
    border-bottom: 1px solid #e2e8f0;
}
.receipt-store-logo {
    font-size: 15px;
    font-weight: 800;
    color: #0f172a;
}
.fb-receipt-header small {
    font-size: 11px;
    color: #64748b;
}

.fb-receipt-table {
    display: flex;
    flex-direction: column;
    gap: 8px;
    font-size: 12.5px;
}
.fb-r-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.r-label {
    color: #64748b;
}
.r-val {
    color: #0f172a;
    text-align: right;
}
.highlight-inv {
    font-family: monospace;
    font-size: 13px;
    background: #e2e8f0;
    padding: 2px 6px;
    border-radius: 4px;
}
.total-highlight {
    padding-top: 10px;
    margin-top: 4px;
    border-top: 1.5px solid #e2e8f0;
}
.total-amount {
    font-size: 16px;
    font-weight: 900;
    color: #059669;
}
.fb-r-items-summary {
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px dashed #e2e8f0;
    font-size: 12px;
}

/* Receipt Actions */
.fb-receipt-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.fb-btn-wa-receipt {
    background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    color: #ffffff;
    text-decoration: none;
    font-weight: 800;
    font-size: 14px;
    padding: 13px 18px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3);
    transition: all 0.2s;
}
.fb-btn-wa-receipt:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(37, 211, 102, 0.4);
}
.fb-btn-print {
    background: #ffffff;
    color: #334155;
    border: 1.5px solid #cbd5e1;
    font-weight: 700;
    font-size: 13px;
    padding: 11px 18px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.2s;
}
.fb-btn-print:hover {
    background: #f1f5f9;
    border-color: #94a3b8;
}
.fb-btn-done {
    background: transparent;
    color: #64748b;
    border: none;
    font-weight: 700;
    font-size: 13px;
    padding: 8px;
    cursor: pointer;
    transition: color 0.2s;
}
.fb-btn-done:hover {
    color: #0f172a;
}

/* Responsive */
@media (max-width: 900px) {
    .fb-checkout-grid {
        grid-template-columns: 1fr;
    }
    .checkout-title-bar {
        flex-direction: column;
        align-items: flex-start;
    }
    .checkout-stepper-container {
        width: 100%;
        justify-content: space-between;
        box-sizing: border-box;
    }
    .modern-shipping-form .fb-form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
get_footer();
