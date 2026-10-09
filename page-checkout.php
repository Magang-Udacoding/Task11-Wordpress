<?php
/**
 * Template Name: Halaman Checkout & Pembayaran Retro
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
?>

<div class="retro-checkout-wrapper">
    <!-- Breadcrumb & Header -->
    <div class="checkout-breadcrumbs">
        <a href="<?php echo esc_url(home_url('/')); ?>">&larr; Beranda</a>
        <span class="bc-sep">/</span>
        <a href="<?php echo esc_url(home_url('/produk/')); ?>">Katalog Sembako</a>
        <span class="bc-sep">/</span>
        <span class="bc-current">Kasir & Pembayaran</span>
    </div>

    <div class="checkout-header-banner">
        <div class="checkout-badge-pill">KASIR TOKO BERKAH &bull; CHECKOUT</div>
        <h1 class="checkout-main-title">Selesaikan Pesanan Sembako Anda</h1>
        <p class="checkout-main-desc">
            Periksa kembali rincian produk sembako, lengkapi alamat pengantaran kurir toko, dan pilih metode pembayaran resmi.
        </p>
    </div>

    <!-- Retro Sandbox Notice Banner -->
    <div class="retro-sandbox-notice">
        <div class="sandbox-tag">MODE SIMULASI TRANSAKSI</div>
        <p>
            <strong>Simulasi Pembayaran Terintegrasi Toko Berkah:</strong> Anda dapat melakukan checkout pesanan sembako secara instan, memilih metode pembayaran (QRIS / Virtual Account BCA / Mandiri / COD), dan langsung menerima struk digital sah serta konfirmasi pemesanan ke WhatsApp Admin Toko.
        </p>
    </div>

    <!-- Main Checkout Grid -->
    <div class="retro-checkout-grid">
        <!-- LEFT COLUMN: Cart, Shipping, Payment -->
        <div class="checkout-left-col">
            
            <!-- Step 1: Cart Items -->
            <div class="retro-box-card" id="cardStepCart">
                <div class="retro-card-header">
                    <span class="retro-step-num">1</span>
                    <div>
                        <h2 class="retro-card-title">Daftar Barang Belanja (Keranjang Sembako)</h2>
                        <small>Periksa kuantitas dan harga produk yang dipesan</small>
                    </div>
                </div>
                <div class="retro-card-body">
                    <div id="checkoutCartItems">
                        <div class="cart-loading-state">
                            <span class="retro-spinner"></span>
                            <p>Memuat daftar belanjaan sembako Anda...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Shipping Details Form -->
            <div class="retro-box-card" id="cardStepShipping">
                <div class="retro-card-header">
                    <span class="retro-step-num">2</span>
                    <div>
                        <h2 class="retro-card-title">Alamat Pengiriman & Kontak Penerima</h2>
                        <small>Kurir lokal Toko Berkah mengantar langsung ke alamat rumah atau warung Anda</small>
                    </div>
                </div>
                <div class="retro-card-body">
                    <div class="shipping-info-alert">
                        <strong>Layanan Antar Kilat Kurir Toko (Same-Day)</strong>
                        <p>Pesanan sebelum jam 17:00 WIB langsung diantar hari ini juga untuk seluruh area Bandung & sekitarnya. Gratis ongkos kirim!</p>
                    </div>

                    <form id="checkoutShippingForm" class="retro-form" onsubmit="return false;">
                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="custName">Nama Lengkap Penerima <span class="req">*</span></label>
                                <input type="text" id="custName" class="retro-input" required placeholder="Contoh: Ibu Rina Melati" value="Budi Santoso" />
                            </div>
                            <div class="form-group">
                                <label for="custPhone">Nomor WhatsApp Aktif <span class="req">*</span></label>
                                <input type="tel" id="custPhone" class="retro-input" required placeholder="Contoh: 081234567890" value="081298765432" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="custAddress">Alamat Lengkap Pengiriman (Rumah / Kios / Warung) <span class="req">*</span></label>
                            <textarea id="custAddress" class="retro-textarea" rows="2" required placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan...">Jl. Anggrek No. 12, RT 03 / RW 05, Kel. Merdeka, Bandung</textarea>
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="custPatokan">Patokan Lokasi (Opsional):</label>
                                <input type="text" id="custPatokan" class="retro-input" placeholder="Contoh: Depan Pos Ronda RW 05 / Rumah Pagar Putih" value="Dekat Masjid Nurul Iman" />
                            </div>
                            <div class="form-group">
                                <label for="custNotes">Catatan Khusus untuk Kurir (Opsional):</label>
                                <input type="text" id="custNotes" class="retro-input" placeholder="Contoh: Tolong antar sebelum ashar" value="Tolong antar sebelum sore" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Step 3: Payment Method Selection -->
            <div class="retro-box-card" id="cardStepPayment">
                <div class="retro-card-header">
                    <span class="retro-step-num">3</span>
                    <div>
                        <h2 class="retro-card-title">Metode Pembayaran Resmi</h2>
                        <small>Pilih salah satu saluran pembayaran yang Anda inginkan</small>
                    </div>
                </div>
                <div class="retro-card-body">
                    <div class="payment-method-list">
                        <!-- QRIS -->
                        <label class="payment-radio-box selected">
                            <input type="radio" name="payMethod" value="qris" checked />
                            <div class="pay-method-info">
                                <div class="pay-method-title">
                                    <strong>QRIS Standar Nasional (Semua Bank / E-Wallet)</strong>
                                    <span class="pay-badge">[REKOMENDASI]</span>
                                </div>
                                <p>BCA, Mandiri, BRI, BNI, GoPay, OVO, DANA, ShopeePay, LinkAja.</p>
                            </div>
                        </label>

                        <!-- Virtual Account BCA -->
                        <label class="payment-radio-box">
                            <input type="radio" name="payMethod" value="va_bca" />
                            <div class="pay-method-info">
                                <div class="pay-method-title">
                                    <strong>Virtual Account BCA</strong>
                                    <span class="pay-badge">[OTOMATIS]</span>
                                </div>
                                <p>Nomor Virtual Account: <code>8801 2345 6789 001</code></p>
                            </div>
                        </label>

                        <!-- Virtual Account Mandiri -->
                        <label class="payment-radio-box">
                            <input type="radio" name="payMethod" value="va_mandiri" />
                            <div class="pay-method-info">
                                <div class="pay-method-title">
                                    <strong>Virtual Account Mandiri</strong>
                                    <span class="pay-badge">[OTOMATIS]</span>
                                </div>
                                <p>Kode Perusahaan: <code>8902</code> &bull; No VA: <code>8902 4432 1098 772</code></p>
                            </div>
                        </label>

                        <!-- COD -->
                        <label class="payment-radio-box">
                            <input type="radio" name="payMethod" value="cod" />
                            <div class="pay-method-info">
                                <div class="pay-method-title">
                                    <strong>Bayar di Tempat (COD Tunai ke Kurir)</strong>
                                    <span class="pay-badge">[TUNAI]</span>
                                </div>
                                <p>Bayar tunai kepada staf kurir setelah beras & sembako diperiksa di alamat Anda.</p>
                            </div>
                        </label>
                    </div>

                    <!-- Payment Visual Preview Box -->
                    <div class="payment-preview-container" id="paymentPreviewArea">
                        <div class="preview-qris-box">
                            <div class="preview-header">
                                <strong>KODE PEMBAYARAN QRIS NASIONAL</strong>
                                <span>NMID: ID1020261199toko-berkah</span>
                            </div>
                            <div class="qr-image-wrapper">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=toko-berkah-PAYMENT-SIMULATION" alt="QRIS Code" />
                            </div>
                            <p class="qr-caption">Silakan scan kode QR di atas menggunakan aplikasi m-Banking atau Dompet Digital pilihan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Order Summary -->
        <div class="checkout-right-col">
            <div class="retro-box-card summary-sticky-card">
                <div class="retro-card-header">
                    <span class="retro-step-num">&yen;</span>
                    <div>
                        <h2 class="retro-card-title">Ringkasan Pesanan</h2>
                        <small>Kalkulasi total belanja</small>
                    </div>
                </div>
                <div class="retro-card-body">
                    <div class="summary-row">
                        <span>Subtotal Belanja:</span>
                        <strong id="summarySubtotal">Rp 0</strong>
                    </div>

                    <div class="summary-row">
                        <span>Ongkos Kirim Kurir:</span>
                        <strong class="text-free-ship">GRATIS (Radius 5 KM)</strong>
                    </div>

                    <div class="summary-row">
                        <span>Biaya Administrasi:</span>
                        <strong>Rp 0</strong>
                    </div>

                    <div class="voucher-box">
                        <div class="voucher-input-wrap">
                            <input type="text" id="voucherInput" class="retro-input-sm" value="SEMBAKOHEMAT" placeholder="Kupon Promo" />
                            <button type="button" class="retro-btn-sm" onclick="alert('Kupon SEMBAKOHEMAT Aktif: Diskon Ongkir 100% Berhasil Digunakan!');">Gunakan</button>
                        </div>
                    </div>

                    <div class="summary-grand-total">
                        <div>
                            <span class="total-label">TOTAL AKHIR:</span>
                            <small>Termasuk PPN & Jaminan Segar</small>
                        </div>
                        <strong id="summaryGrandTotal" class="grand-amount">Rp 0</strong>
                    </div>

                    <!-- Submit CTA Button -->
                    <button type="button" class="btn-checkout-submit" id="btnExecutePay">
                        <span>BAYAR & SELESAIKAN PESANAN &rarr;</span>
                    </button>

                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>" id="btnDirectWaOrder" target="_blank" class="btn-checkout-wa-direct">
                        <span>Pesan Langsung via WhatsApp &rarr;</span>
                    </a>

                    <div class="trust-guarantee-list">
                        <div class="trust-item">&radic; 100% Produk Berkualitas Asli</div>
                        <div class="trust-item">&radic; Timbangan Digital Pas & Teruji</div>
                        <div class="trust-item">&radic; Pengiriman Cepat Same-Day Toko</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================= -->
<!-- MODAL STRUK BUKTI PEMBAYARAN DIGITAL                          -->
<!-- ============================================================= -->
<div class="retro-modal-overlay" id="checkoutSuccessModal" style="display:none;">
    <div class="retro-modal-dialog">
        <!-- Loading State -->
        <div id="modalLoadingState" class="modal-loading-box">
            <div class="retro-spinner-large"></div>
            <h3>Memproses Pembayaran Pesanan...</h3>
            <p>Menghubungkan ke sistem Toko Berkah & mencetak invoice digital</p>
        </div>

        <!-- Success Invoice State -->
        <div id="modalSuccessState" style="display:none;" class="modal-invoice-box">
            <div class="invoice-stamp-approved">LUNAS / TERKONFIRMASI</div>
            
            <div class="invoice-header">
                <h2>STRUK BUKTI PESANAN DIGITAL</h2>
                <div class="store-name">TOKO UKM SEMBAKO BAHRI</div>
                <small>Sentra Sembako Keluarga & Usaha Kuliner Bandung</small>
            </div>

            <div class="invoice-meta-table">
                <div class="inv-row">
                    <span class="inv-lbl">Nomor Invoice:</span>
                    <strong id="invNumber" class="inv-val">#TB-202610-0001</strong>
                </div>
                <div class="inv-row">
                    <span class="inv-lbl">Waktu Pemesanan:</span>
                    <span id="invTime" class="inv-val">-</span>
                </div>
                <div class="inv-row">
                    <span class="inv-lbl">Metode Bayar:</span>
                    <strong id="invMethod" class="inv-val">QRIS Standar Nasional</strong>
                </div>
                <div class="inv-row">
                    <span class="inv-lbl">Nama Penerima:</span>
                    <span id="invCust" class="inv-val">-</span>
                </div>
                <div class="inv-row">
                    <span class="inv-lbl">No. WhatsApp:</span>
                    <span id="invPhone" class="inv-val">-</span>
                </div>
                <div class="inv-row">
                    <span class="inv-lbl">Alamat Pengiriman:</span>
                    <span id="invAddress" class="inv-val">-</span>
                </div>
            </div>

            <!-- Itemized List Table -->
            <div class="invoice-items-wrapper">
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th style="text-align:center;">Qty</th>
                            <th style="text-align:right;">Harga</th>
                            <th style="text-align:right;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="invItemsTableBody">
                        <!-- Populated by JS -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align:right;"><strong>Ongkos Kirim Kurir:</strong></td>
                            <td style="text-align:right;"><strong>Rp 0 (GRATIS)</strong></td>
                        </tr>
                        <tr class="inv-grand-row">
                            <td colspan="3" style="text-align:right;"><strong>TOTAL TAGIHAN:</strong></td>
                            <td style="text-align:right;"><strong id="invGrandTotal">Rp 0</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Receipt Actions -->
            <div class="invoice-action-buttons">
                <a href="#" id="btnSendWaReceipt" target="_blank" class="retro-btn-invoice-wa">
                    Kirim Konfirmasi Struk ke WhatsApp Admin Toko &rarr;
                </a>
                <button type="button" class="retro-btn-invoice-print" onclick="window.print();">
                    Cetak / Simpan Struk
                </button>
                <button type="button" class="retro-btn-invoice-close" id="btnCloseModal">
                    Selesai & Belanja Lagi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================= -->
<!-- RETRO CHECKOUT STYLES (100% MONOCHROME HITAM PUTIH RETRO)      -->
<!-- ============================================================= -->
<style>
.retro-checkout-wrapper {
    max-width: 1220px;
    margin: 24px auto 80px auto;
    padding: 0 clamp(16px, 3.5vw, 32px);
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #000000;
}

/* Breadcrumbs */
.checkout-breadcrumbs {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 20px;
    padding: 8px 14px;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
}
.checkout-breadcrumbs a {
    color: #000000;
    text-decoration: underline;
}
.checkout-breadcrumbs .bc-sep {
    color: #000000;
}
.checkout-breadcrumbs .bc-current {
    color: #000000;
    background: #000000;
    color: #ffffff;
    padding: 2px 6px;
}

/* Header Banner */
.checkout-header-banner {
    border: 2px solid #000000;
    box-shadow: 4px 4px 0 #000000;
    background: #ffffff;
    padding: clamp(20px, 3.5vw, 32px);
    margin-bottom: 24px;
}
.checkout-badge-pill {
    display: inline-block;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
    padding: 4px 10px;
    margin-bottom: 12px;
    letter-spacing: 1px;
}
.checkout-main-title {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 900;
    line-height: 1.2;
    margin: 0 0 10px 0;
    color: #000000;
}
.checkout-main-desc {
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
    color: #000000;
}

/* Sandbox Notice Banner */
.retro-sandbox-notice {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #f4f4f5;
    padding: 16px 20px;
    margin-bottom: 28px;
}
.retro-sandbox-notice .sandbox-tag {
    display: inline-block;
    border: 1.5px solid #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
    padding: 2px 8px;
    margin-bottom: 8px;
}
.retro-sandbox-notice p {
    margin: 0;
    font-size: 13.5px;
    line-height: 1.55;
    color: #000000;
}

/* Main Grid */
.retro-checkout-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: clamp(20px, 3vw, 32px);
    align-items: start;
}

/* Box Cards */
.retro-box-card {
    border: 2px solid #000000;
    box-shadow: 4px 4px 0 #000000;
    background: #ffffff;
    margin-bottom: 24px;
    padding: clamp(20px, 3vw, 28px);
}
.retro-card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 16px;
    border-bottom: 2px solid #000000;
    margin-bottom: 20px;
}
.retro-step-num {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 18px;
    font-weight: 900;
    flex-shrink: 0;
}
.retro-card-title {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 20px;
    font-weight: 900;
    margin: 0;
    color: #000000;
}
.retro-card-header small {
    display: block;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    color: #333333;
    margin-top: 3px;
}

/* Cart Table in Checkout */
.checkout-cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 12px;
}
.checkout-cart-table th {
    border-bottom: 2px solid #000000;
    padding: 10px 8px;
    text-align: left;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 900;
    text-transform: uppercase;
}
.checkout-cart-table td {
    padding: 12px 8px;
    border-bottom: 1px dotted #000000;
    vertical-align: middle;
}
.checkout-cart-table tr:last-child td {
    border-bottom: none;
}
.cart-item-info {
    display: flex;
    align-items: center;
    gap: 12px;
}
.cart-item-thumb {
    width: 52px;
    height: 52px;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    object-fit: cover;
    flex-shrink: 0;
    filter: none !important;
    background: #ffffff;
}
.cart-item-title {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 15px;
    font-weight: 700;
    margin: 0 0 4px 0;
    line-height: 1.3;
}
.cart-item-unit {
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    color: #555555;
}
.cart-qty-ctrls {
    display: inline-flex;
    align-items: center;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
}
.btn-qty-chg {
    width: 28px;
    height: 28px;
    border: none;
    background: #ffffff;
    color: #000000;
    font-size: 14px;
    font-weight: 900;
    cursor: pointer;
}
.btn-qty-chg:hover {
    background: #000000;
    color: #ffffff;
}
.qty-num-val {
    width: 32px;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 900;
}
.btn-item-del {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
    color: #000000;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 8px;
    cursor: pointer;
}
.btn-item-del:hover {
    background: #000000;
    color: #ffffff;
}
.checkout-empty-cart {
    text-align: center;
    padding: 36px 16px;
    border: 2px dashed #000000;
    background: #fafafa;
}
.checkout-empty-cart p {
    margin: 6px 0;
}
.checkout-empty-cart .retro-btn-black {
    display: inline-block;
    margin-top: 14px;
}

/* Shipping Notice */
.shipping-info-alert {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #f4f4f5;
    padding: 12px 16px;
    margin-bottom: 20px;
    font-size: 13px;
    line-height: 1.5;
}
.shipping-info-alert strong {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 14px;
    display: block;
    margin-bottom: 4px;
}
.shipping-info-alert p {
    margin: 0;
}

/* Retro Form Elements */
.retro-form .form-group {
    margin-bottom: 16px;
}
.retro-form label {
    display: block;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 900;
    text-transform: uppercase;
    margin-bottom: 6px;
    color: #000000;
}
.retro-form label .req {
    color: #000000;
    font-weight: 900;
}
.retro-input,
.retro-textarea {
    width: 100%;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
    color: #000000;
    font-family: Verdana, sans-serif;
    font-size: 14px;
    padding: 10px 12px;
    border-radius: 0;
}
.retro-input:focus,
.retro-textarea:focus {
    outline: none;
    box-shadow: 3px 3px 0 #000000;
    background: #fafafa;
}
.form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

/* Payment Methods */
.payment-method-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 20px;
}
.payment-radio-box {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
    padding: 14px 16px;
    cursor: pointer;
    transition: all 0.1s ease;
}
.payment-radio-box:hover {
    box-shadow: 3px 3px 0 #000000;
    background: #fbfbfb;
}
.payment-radio-box.selected {
    border-width: 2.5px;
    box-shadow: 4px 4px 0 #000000;
    background: #f4f4f5;
}
.payment-radio-box input[type="radio"] {
    margin-top: 4px;
    accent-color: #000000;
    width: 18px;
    height: 18px;
    cursor: pointer;
}
.pay-method-info {
    flex: 1;
}
.pay-method-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 4px;
}
.pay-method-title strong {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 15px;
}
.pay-badge {
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
    border: 1px solid #000000;
    padding: 1px 6px;
    background: #000000;
    color: #ffffff;
}
.pay-method-info p {
    margin: 0;
    font-size: 12.5px;
    color: #333333;
    line-height: 1.4;
}

/* Payment Preview Box */
.payment-preview-container {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #ffffff;
    padding: 20px;
    text-align: center;
}
.preview-header {
    border-bottom: 1.5px solid #000000;
    padding-bottom: 8px;
    margin-bottom: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
}
.qr-image-wrapper {
    display: inline-block;
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    padding: 8px;
    background: #ffffff;
    margin-bottom: 12px;
}
.qr-image-wrapper img {
    display: block;
    width: 180px;
    height: 180px;
}
.qr-caption {
    font-size: 12.5px;
    margin: 0;
    color: #333333;
}

/* Sidebar Order Summary */
.summary-sticky-card {
    position: sticky;
    top: 24px;
}
.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px dotted #000000;
    font-size: 13.5px;
}
.summary-row strong {
    font-family: 'Courier New', Courier, monospace;
    font-size: 14px;
}
.text-free-ship {
    border: 1px solid #000000;
    background: #000000;
    color: #ffffff;
    padding: 2px 6px;
    font-size: 11px !important;
}

/* Voucher */
.voucher-box {
    margin: 16px 0;
    padding: 12px;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #f4f4f5;
}
.voucher-input-wrap {
    display: flex;
    gap: 6px;
}
.retro-input-sm {
    flex: 1;
    border: 1.5px solid #000000;
    padding: 6px 8px;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}
.retro-btn-sm {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 900;
    padding: 6px 12px;
    cursor: pointer;
}
.retro-btn-sm:hover {
    background: #ffffff;
    color: #000000;
}

/* Grand Total */
.summary-grand-total {
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
    padding: 16px 0;
    margin: 16px 0 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}
.total-label {
    display: block;
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 16px;
    font-weight: 900;
}
.summary-grand-total small {
    display: block;
    font-size: 11px;
    color: #555555;
    margin-top: 2px;
}
.grand-amount {
    font-family: 'Courier New', Courier, monospace;
    font-size: 24px;
    font-weight: 900;
}

/* CTA Buttons */
.btn-checkout-submit {
    display: block;
    width: 100%;
    border: 2px solid #000000;
    box-shadow: 4px 4px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 16px;
    font-weight: 900;
    padding: 14px;
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
    transition: all 0.1s ease;
}
.btn-checkout-submit:hover {
    transform: translate(-2px, -2px);
    box-shadow: 6px 6px 0 #000000;
}
.btn-checkout-submit:active {
    transform: translate(2px, 2px);
    box-shadow: 2px 2px 0 #000000;
}

.btn-checkout-wa-direct {
    display: block;
    width: 100%;
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #ffffff;
    color: #000000;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 900;
    padding: 11px;
    text-align: center;
    text-decoration: none;
    box-sizing: border-box;
    margin-bottom: 20px;
    transition: all 0.1s ease;
}
.btn-checkout-wa-direct:hover {
    background: #000000;
    color: #ffffff;
}

.trust-guarantee-list {
    border-top: 1px dotted #000000;
    padding-top: 14px;
    font-size: 12px;
    line-height: 1.8;
}
.trust-item {
    font-family: 'Courier New', Courier, monospace;
    font-weight: 700;
}

/* Modal Struk */
.retro-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    box-sizing: border-box;
}
.retro-modal-dialog {
    background: #ffffff;
    border: 3px solid #000000;
    box-shadow: 8px 8px 0 #000000;
    max-width: 600px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    padding: clamp(20px, 4vw, 36px);
    box-sizing: border-box;
    position: relative;
}
.modal-loading-box {
    text-align: center;
    padding: 40px 10px;
}
.retro-spinner-large {
    width: 48px;
    height: 48px;
    border: 4px solid #000000;
    border-top-color: transparent;
    border-radius: 50%;
    margin: 0 auto 20px auto;
    animation: spin 0.8s linear infinite;
}
@keyframes spin {
    to { transform: rotate(360deg); }
}

.invoice-stamp-approved {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 900;
    display: inline-block;
    padding: 4px 10px;
    margin-bottom: 16px;
    letter-spacing: 1px;
}
.invoice-header {
    border-bottom: 2px solid #000000;
    padding-bottom: 16px;
    margin-bottom: 20px;
}
.invoice-header h2 {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 24px;
    margin: 0 0 4px 0;
}
.invoice-header .store-name {
    font-family: 'Courier New', Courier, monospace;
    font-size: 14px;
    font-weight: 900;
}
.invoice-meta-table {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #fafafa;
    padding: 12px 16px;
    margin-bottom: 20px;
    font-size: 13px;
}
.inv-row {
    display: flex;
    justify-content: space-between;
    padding: 4px 0;
    border-bottom: 1px dotted #ccc;
}
.inv-row:last-child {
    border-bottom: none;
}
.inv-lbl {
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
}
.inv-val {
    font-weight: 700;
}

.invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 24px;
    font-size: 13px;
}
.invoice-table th {
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
    padding: 8px 6px;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
}
.invoice-table td {
    padding: 8px 6px;
    border-bottom: 1px dotted #000000;
}
.inv-grand-row td {
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
    font-size: 15px;
}

.invoice-action-buttons {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.retro-btn-invoice-wa {
    display: block;
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 15px;
    font-weight: 900;
    padding: 12px;
    text-align: center;
    text-decoration: none;
}
.retro-btn-invoice-wa:hover {
    background: #ffffff;
    color: #000000;
}
.retro-btn-invoice-print {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
    color: #000000;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 700;
    padding: 10px;
    cursor: pointer;
}
.retro-btn-invoice-print:hover {
    background: #f0f0f0;
}
.retro-btn-invoice-close {
    border: none;
    background: transparent;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 700;
    text-decoration: underline;
    cursor: pointer;
    padding: 8px;
    color: #000000;
}

/* Generic Retro Buttons */
.retro-btn-black {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 900;
    padding: 8px 16px;
    text-decoration: none;
    cursor: pointer;
}
.retro-btn-black:hover {
    background: #ffffff;
    color: #000000;
}

/* Responsive Breakpoints */
@media (max-width: 900px) {
    .retro-checkout-grid {
        grid-template-columns: 1fr;
    }
    .form-row-2 {
        grid-template-columns: 1fr;
    }
    .summary-sticky-card {
        position: static;
    }
}
</style>

<!-- ============================================================= -->
<!-- CLIENT-SIDE CHECKOUT LOGIC SCRIPT                             -->
<!-- ============================================================= -->
<script>
(function () {
    var waAdminNumber = '<?php echo esc_js($wa_clean); ?>';

    function formatRupiah(num) {
        return 'Rp ' + Number(num || 0).toLocaleString('id-ID');
    }

    function renderCheckoutCart() {
        var cartContainer = document.getElementById('checkoutCartItems');
        if (!cartContainer) return;

        var items = window.ukmCart ? window.ukmCart.load() : [];

        if (!items || items.length === 0) {
            cartContainer.innerHTML = [
                '<div class="checkout-empty-cart">',
                '  <p><strong>Keranjang Belanja Sembako Anda Masih Kosong!</strong></p>',
                '  <p>Pilih produk beras, minyak, gula, atau bumbu dari katalog kami untuk memulai pesanan.</p>',
                '  <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="retro-btn-black">',
                '    &larr; Lihat Katalog Produk Sekarang',
                '  </a>',
                '</div>'
            ].join('');

            updateSummary(0);
            return;
        }

        var html = '<table class="checkout-cart-table">';
        html += '<thead><tr>';
        html += '<th>Produk Sembako</th>';
        html += '<th style="text-align:center;">Jumlah</th>';
        html += '<th style="text-align:right;">Subtotal</th>';
        html += '<th style="text-align:center;">Aksi</th>';
        html += '</tr></thead><tbody>';

        var total = 0;

        items.forEach(function (item) {
            var price = parseFloat(item.price) || 0;
            var qty = parseInt(item.qty, 10) || 1;
            var lineTotal = price * qty;
            total += lineTotal;

            var thumbHtml = item.thumb ? '<img src="' + item.thumb + '" alt="' + item.title + '" class="cart-item-thumb">' : '';

            html += '<tr data-id="' + item.id + '">';
            html += '<td>';
            html += '  <div class="cart-item-info">';
            html += '    ' + thumbHtml;
            html += '    <div>';
            html += '      <h4 class="cart-item-title">' + item.title + '</h4>';
            html += '      <span class="cart-item-unit">Harga: ' + formatRupiah(price) + ' / ' + (item.satuan || 'item') + '</span>';
            html += '    </div>';
            html += '  </div>';
            html += '</td>';
            html += '<td style="text-align:center;">';
            html += '  <div class="cart-qty-ctrls">';
            html += '    <button type="button" class="btn-qty-chg js-qty-minus" data-id="' + item.id + '">-</button>';
            html += '    <span class="qty-num-val">' + qty + '</span>';
            html += '    <button type="button" class="btn-qty-chg js-qty-plus" data-id="' + item.id + '">+</button>';
            html += '  </div>';
            html += '</td>';
            html += '<td style="text-align:right; font-family: Courier New, monospace; font-weight: 900;">';
            html += formatRupiah(lineTotal);
            html += '</td>';
            html += '<td style="text-align:center;">';
            html += '  <button type="button" class="btn-item-del js-item-del" data-id="' + item.id + '">Hapus</button>';
            html += '</td>';
            html += '</tr>';
        });

        html += '</tbody></table>';

        cartContainer.innerHTML = html;
        updateSummary(total);
    }

    function updateSummary(total) {
        var subtotalEl = document.getElementById('summarySubtotal');
        var grandEl = document.getElementById('summaryGrandTotal');
        if (subtotalEl) subtotalEl.textContent = formatRupiah(total);
        if (grandEl) grandEl.textContent = formatRupiah(total);
    }

    // Handle Quantity and Remove clicks
    document.addEventListener('click', function (e) {
        if (!window.ukmCart) return;

        var plusBtn = e.target.closest('.js-qty-plus');
        if (plusBtn) {
            e.preventDefault();
            var id = plusBtn.dataset.id;
            var items = window.ukmCart.load();
            var item = items.find(function (i) { return String(i.id) === String(id); });
            if (item) {
                window.ukmCart.updateQty(id, (item.qty || 1) + 1);
                renderCheckoutCart();
            }
            return;
        }

        var minusBtn = e.target.closest('.js-qty-minus');
        if (minusBtn) {
            e.preventDefault();
            var id = minusBtn.dataset.id;
            var items = window.ukmCart.load();
            var item = items.find(function (i) { return String(i.id) === String(id); });
            if (item) {
                var curQty = item.qty || 1;
                if (curQty > 1) {
                    window.ukmCart.updateQty(id, curQty - 1);
                } else {
                    if (confirm('Hapus ' + item.title + ' dari keranjang?')) {
                        window.ukmCart.removeItem(id);
                    }
                }
                renderCheckoutCart();
            }
            return;
        }

        var delBtn = e.target.closest('.js-item-del');
        if (delBtn) {
            e.preventDefault();
            var id = delBtn.dataset.id;
            if (confirm('Hapus produk ini dari daftar belanja?')) {
                window.ukmCart.removeItem(id);
                renderCheckoutCart();
            }
            return;
        }
    });

    // Payment Preview updates
    var payRadios = document.querySelectorAll('input[name="payMethod"]');
    var payPreviewArea = document.getElementById('paymentPreviewArea');

    function updatePaymentPreview(method) {
        if (!payPreviewArea) return;

        // update class on parent label
        document.querySelectorAll('.payment-radio-box').forEach(function (box) {
            var rad = box.querySelector('input[type="radio"]');
            if (rad && rad.value === method) {
                box.classList.add('selected');
            } else {
                box.classList.remove('selected');
            }
        });

        if (method === 'qris') {
            payPreviewArea.innerHTML = [
                '<div class="preview-qris-box">',
                '  <div class="preview-header">',
                '    <strong>KODE PEMBAYARAN QRIS NASIONAL</strong>',
                '    <span>NMID: ID1020261199toko-berkah</span>',
                '  </div>',
                '  <div class="qr-image-wrapper">',
                '    <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=toko-berkah-PAYMENT-SIMULATION" alt="QRIS Code" />',
                '  </div>',
                '  <p class="qr-caption">Silakan scan kode QR di atas menggunakan aplikasi m-Banking atau Dompet Digital pilihan Anda.</p>',
                '</div>'
            ].join('');
        } else if (method === 'va_bca') {
            payPreviewArea.innerHTML = [
                '<div style="text-align:left;">',
                '  <div class="preview-header">',
                '    <strong>VIRTUAL ACCOUNT BANK BCA</strong>',
                '    <span>Verifikasi Instan 24 Jam</span>',
                '  </div>',
                '  <p style="margin: 8px 0; font-size: 13px;">Nomor Rekening Virtual Account Anda:</p>',
                '  <div style="background: #f4f4f5; border: 2px solid #000; padding: 12px; font-family: Courier New, monospace; font-size: 18px; font-weight: 900; letter-spacing: 2px; margin-bottom: 10px;">',
                '    8801 2345 6789 001',
                '  </div>',
                '  <p style="font-size: 12px; margin: 0; color: #555;">Masukkan nomor VA di atas via BCA Mobile / KlikBCA / ATM BCA. Pembayaran otomatis diverifikasi.</p>',
                '</div>'
            ].join('');
        } else if (method === 'va_mandiri') {
            payPreviewArea.innerHTML = [
                '<div style="text-align:left;">',
                '  <div class="preview-header">',
                '    <strong>VIRTUAL ACCOUNT BANK MANDIRI</strong>',
                '    <span>Verifikasi Instan 24 Jam</span>',
                '  </div>',
                '  <p style="margin: 8px 0; font-size: 13px;">Kode Institusi & Nomor VA:</p>',
                '  <div style="background: #f4f4f5; border: 2px solid #000; padding: 12px; font-family: Courier New, monospace; font-size: 18px; font-weight: 900; letter-spacing: 2px; margin-bottom: 10px;">',
                '    8902 4432 1098 772',
                '  </div>',
                '  <p style="font-size: 12px; margin: 0; color: #555;">Bayar via Livin by Mandiri atau ATM Mandiri (Menu Bayar/Beli &gt; Multi Payment).</p>',
                '</div>'
            ].join('');
        } else if (method === 'cod') {
            payPreviewArea.innerHTML = [
                '<div style="text-align:left;">',
                '  <div class="preview-header">',
                '    <strong>BAYAR DI TEMPAT (CASH ON DELIVERY)</strong>',
                '    <span>Kurir Mandiri Toko Berkah</span>',
                '  </div>',
                '  <p style="font-size: 13.5px; line-height: 1.6; margin: 8px 0;">',
                '    Pesanan akan disiapkan oleh staf gudang dan langsung diantar ke alamat Anda. Silakan siapkan uang pas saat kurir tiba di lokasi.',
                '  </p>',
                '</div>'
            ].join('');
        }
    }

    payRadios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            updatePaymentPreview(this.value);
        });
    });

    // Execute Payment Checkout
    var btnExecutePay = document.getElementById('btnExecutePay');
    var modalOverlay = document.getElementById('checkoutSuccessModal');
    var modalLoading = document.getElementById('modalLoadingState');
    var modalSuccess = document.getElementById('modalSuccessState');
    var btnCloseModal = document.getElementById('btnCloseModal');

    if (btnExecutePay) {
        btnExecutePay.addEventListener('click', function () {
            var items = window.ukmCart ? window.ukmCart.load() : [];
            if (!items || items.length === 0) {
                alert('Keranjang belanja Anda masih kosong! Silakan pilih produk terlebih dahulu.');
                window.location.href = '<?php echo esc_url(home_url('/produk/')); ?>';
                return;
            }

            var custName = document.getElementById('custName')?.value.trim();
            var custPhone = document.getElementById('custPhone')?.value.trim();
            var custAddress = document.getElementById('custAddress')?.value.trim();

            if (!custName) {
                alert('Silakan isi Nama Lengkap Penerima.');
                document.getElementById('custName')?.focus();
                return;
            }
            if (!custPhone) {
                alert('Silakan isi Nomor WhatsApp Aktif.');
                document.getElementById('custPhone')?.focus();
                return;
            }
            if (!custAddress) {
                alert('Silakan isi Alamat Lengkap Pengiriman.');
                document.getElementById('custAddress')?.focus();
                return;
            }

            // Open Modal in Loading State
            modalOverlay.style.display = 'flex';
            modalLoading.style.display = 'block';
            modalSuccess.style.display = 'none';

            // Selected method label
            var selectedRadio = document.querySelector('input[name="payMethod"]:checked');
            var methodVal = selectedRadio ? selectedRadio.value : 'qris';
            var methodLabels = {
                'qris': 'QRIS Standar Nasional',
                'va_bca': 'Virtual Account BCA',
                'va_mandiri': 'Virtual Account Mandiri',
                'cod': 'Bayar di Tempat (COD Tunai)'
            };
            var methodName = methodLabels[methodVal] || 'QRIS Instan';

            // Generate Invoice details
            var now = new Date();
            var invoiceNum = '#TB-' + now.getFullYear() + ('0' + (now.getMonth() + 1)).slice(-2) + '-' + Math.floor(1000 + Math.random() * 9000);
            var timeFormatted = now.toLocaleDateString('id-ID', {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                hour: '2-digit', minute: '2-digit'
            }) + ' WIB';

            var totalAmount = window.ukmCart.getSubtotal();

            // Populate invoice details
            document.getElementById('invNumber').textContent = invoiceNum;
            document.getElementById('invTime').textContent = timeFormatted;
            document.getElementById('invMethod').textContent = methodName;
            document.getElementById('invCust').textContent = custName;
            document.getElementById('invPhone').textContent = custPhone;
            document.getElementById('invAddress').textContent = custAddress;
            document.getElementById('invGrandTotal').textContent = formatRupiah(totalAmount);

            // Populate invoice items table
            var tbody = document.getElementById('invItemsTableBody');
            var tbodyHtml = '';
            var waItemLines = [];

            items.forEach(function (item) {
                var p = parseFloat(item.price) || 0;
                var q = parseInt(item.qty, 10) || 1;
                var sub = p * q;
                tbodyHtml += '<tr>';
                tbodyHtml += '<td><strong>' + item.title + '</strong></td>';
                tbodyHtml += '<td style="text-align:center;">' + q + '</td>';
                tbodyHtml += '<td style="text-align:right;">' + formatRupiah(p) + '</td>';
                tbodyHtml += '<td style="text-align:right;">' + formatRupiah(sub) + '</td>';
                tbodyHtml += '</tr>';

                waItemLines.push('- ' + item.title + ' (' + q + 'x) = ' + formatRupiah(sub));
            });
            tbody.innerHTML = tbodyHtml;

            // Generate WhatsApp confirmation message link
            var waMessage = [
                '*KONFIRMASI PESANAN SEMBAKO (TOKO BERKAH)*',
                '------------------------------------------',
                '*No. Invoice:* ' + invoiceNum,
                '*Waktu:* ' + timeFormatted,
                '*Metode Bayar:* ' + methodName,
                '',
                '*DATA PENERIMA:*',
                'Nama: ' + custName,
                'WhatsApp: ' + custPhone,
                'Alamat: ' + custAddress,
                '',
                '*RINCIAN BELANJA:*',
                waItemLines.join('\n'),
                '',
                '*TOTAL AKHIR:* ' + formatRupiah(totalAmount) + ' (Gratis Ongkir)',
                '------------------------------------------',
                'Halo Admin Toko Berkah, saya sudah menyelesaikan pesanan di web. Mohon segera diproses dan diantar ya. Terima kasih!'
            ].join('\n');

            var btnWaReceipt = document.getElementById('btnSendWaReceipt');
            if (btnWaReceipt) {
                btnWaReceipt.href = 'https://wa.me/' + waAdminNumber + '?text=' + encodeURIComponent(waMessage);
            }

            // Simulate 600ms network verification
            setTimeout(function () {
                modalLoading.style.display = 'none';
                modalSuccess.style.display = 'block';

                // Clear cart from local storage
                window.ukmCart.clearCart();
            }, 600);
        });
    }

    if (btnCloseModal) {
        btnCloseModal.addEventListener('click', function () {
            modalOverlay.style.display = 'none';
            window.location.href = '<?php echo esc_url(home_url('/produk/')); ?>';
        });
    }

    // Direct WhatsApp Button link sync
    var btnDirectWaOrder = document.getElementById('btnDirectWaOrder');
    if (btnDirectWaOrder) {
        btnDirectWaOrder.addEventListener('click', function (e) {
            var items = window.ukmCart ? window.ukmCart.load() : [];
            var lines = [];
            items.forEach(function (i) {
                lines.push('- ' + i.title + ' (' + i.qty + 'x)');
            });
            var msg = 'Halo Admin Toko Berkah, saya ingin memesan sembako:\n' + (lines.join('\n') || '- Beras / Sembako') + '\n\nMohon info total dan jadwal kirim ya.';
            btnDirectWaOrder.href = 'https://wa.me/' + waAdminNumber + '?text=' + encodeURIComponent(msg);
        });
    }

    // Initialize on DOM load
    document.addEventListener('DOMContentLoaded', function () {
        renderCheckoutCart();
    });

    window.addEventListener('ukmCartUpdated', function () {
        renderCheckoutCart();
    });
})();
</script>

<?php
get_footer();
