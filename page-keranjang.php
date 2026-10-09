<?php
/**
 * Template Name: Halaman Keranjang Belanja Retro Polished
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
?>

<div class="retro-cart-wrapper">
    <!-- Breadcrumbs -->
    <div class="cart-breadcrumbs">
        <a href="<?php echo esc_url(home_url('/')); ?>">&larr; Beranda</a>
        <span class="bc-sep">/</span>
        <a href="<?php echo esc_url(home_url('/produk/')); ?>">Katalog Sembako</a>
        <span class="bc-sep">/</span>
        <span class="bc-current">Keranjang Belanja</span>
    </div>

    <!-- Title Banner -->
    <div class="cart-header-banner">
        <div class="cart-badge-pill">KERANJANG BELANJA RESMI &bull; TOKO BERKAH</div>
        <h1 class="cart-main-title">Daftar Belanjaan Sembako Anda</h1>
        <p class="cart-main-desc">
            Periksa rincian sembako pilihan Anda, sesuaikan jumlah kebutuhan, dan lanjutkan ke kasir untuk proses pengiriman instan same-day kurir toko.
        </p>
    </div>

    <!-- Cart Layout Grid -->
    <div class="retro-cart-grid">
        <!-- LEFT: Items Table / Mobile Cards -->
        <div class="cart-items-column">
            <div class="retro-box-card">
                <div class="retro-card-header">
                    <div class="retro-step-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                    </div>
                    <div class="card-header-text">
                        <h2 class="retro-card-title">Daftar Produk di Keranjang</h2>
                        <span class="retro-card-subtitle">Kuantitas dan subtotal harga terhitung otomatis secara transparan</span>
                    </div>
                </div>

                <div class="retro-card-body">
                    <div id="fullCartContent">
                        <div class="cart-loading-state">
                            <div class="retro-spinner-box"></div>
                            <p>Memuat daftar belanjaan sembako...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Bar -->
            <div class="cart-actions-bar">
                <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="retro-btn-action">
                    &larr; Lanjut Belanja Produk Lain
                </a>
                <button type="button" class="retro-btn-action btn-danger-action" id="btnClearFullCart">
                    Kosongkan Keranjang
                </button>
            </div>
        </div>

        <!-- RIGHT: Summary Box -->
        <div class="cart-summary-column">
            <div class="retro-box-card summary-sticky-card">
                <div class="retro-card-header">
                    <div class="retro-step-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <rect x="2" y="4" width="20" height="16" rx="0"></rect>
                            <line x1="2" y1="10" x2="22" y2="10"></line>
                        </svg>
                    </div>
                    <div class="card-header-text">
                        <h2 class="retro-card-title">Ringkasan Belanja</h2>
                        <span class="retro-card-subtitle">Total sementara pesanan Anda</span>
                    </div>
                </div>

                <div class="retro-card-body">
                    <div class="summary-line-item">
                        <span class="line-label">Subtotal Belanja:</span>
                        <strong id="cartSubtotalVal" class="line-value">Rp 0</strong>
                    </div>

                    <div class="summary-line-item">
                        <span class="line-label">Ongkos Kirim Kurir:</span>
                        <span class="badge-free-shipping">GRATIS (Radius 5 KM)</span>
                    </div>

                    <div class="summary-line-item">
                        <span class="line-label">Biaya Penanganan:</span>
                        <strong class="line-value text-free">Rp 0 (Sandbox Promo)</strong>
                    </div>

                    <!-- Voucher Promo Code -->
                    <div class="cart-voucher-box">
                        <span class="voucher-label">Kupon Hemat Sembako:</span>
                        <div class="voucher-input-group">
                            <input type="text" id="voucherCartInput" class="input-voucher-code" value="SEMBAKOHEMAT" placeholder="Kupon Promo" />
                            <button type="button" class="btn-apply-voucher" onclick="alert('Kupon SEMBAKOHEMAT Aktif: Diskon Ongkir 100% Berhasil Digunakan!');">Pakai</button>
                        </div>
                    </div>

                    <!-- Grand Total Box -->
                    <div class="summary-grand-total-box">
                        <div class="grand-total-text">
                            <span class="grand-label">TOTAL AKHIR:</span>
                            <small class="grand-note">Termasuk PPN & Jaminan Segar</small>
                        </div>
                        <strong id="cartGrandTotalVal" class="grand-amount-display">Rp 0</strong>
                    </div>

                    <!-- Checkout CTA Button -->
                    <a href="<?php echo esc_url(home_url('/checkout/')); ?>" class="btn-cart-checkout-cta" id="btnProceedCheckout">
                        <span>LANJUT KE KASIR & PEMBAYARAN &rarr;</span>
                    </a>

                    <!-- Trust Guarantees -->
                    <div class="cart-trust-guarantees">
                        <div class="trust-guarantee-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>100% Produk Berkualitas & Asli</span>
                        </div>
                        <div class="trust-guarantee-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Timbangan Digital Pas & Teruji</span>
                        </div>
                        <div class="trust-guarantee-row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span>Antar Kilat Same-Day Kurir Toko</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* ==========================================================================
   POLISHED RETRO SHOPPING CART STYLES
   ========================================================================== */
.retro-cart-wrapper {
    max-width: 1220px;
    margin: 28px auto 80px auto;
    padding: 0 clamp(16px, 3.5vw, 32px);
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #000000;
}

/* Breadcrumbs */
.cart-breadcrumbs {
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
.cart-breadcrumbs a {
    color: #000000;
    text-decoration: underline;
}
.cart-breadcrumbs .bc-sep {
    color: #000000;
}
.cart-breadcrumbs .bc-current {
    background: #000000;
    color: #ffffff;
    padding: 2px 6px;
}

/* Header Banner */
.cart-header-banner {
    border: 2px solid #000000;
    box-shadow: 4px 4px 0 #000000;
    background: #ffffff;
    padding: clamp(24px, 3.5vw, 36px);
    margin-bottom: 28px;
}
.cart-badge-pill {
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
.cart-main-title {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 900;
    line-height: 1.2;
    margin: 0 0 10px 0;
    color: #000000;
}
.cart-main-desc {
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
    color: #000000;
}

/* Grid Layout */
.retro-cart-grid {
    display: grid;
    grid-template-columns: 1fr 390px;
    gap: clamp(20px, 3vw, 32px);
    align-items: start;
}

/* Box Cards */
.retro-box-card {
    border: 2px solid #000000;
    box-shadow: 4px 4px 0 #000000;
    background: #ffffff;
    padding: clamp(20px, 3vw, 28px);
    margin-bottom: 24px;
    box-sizing: border-box;
}

.retro-card-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 18px;
    border-bottom: 2px solid #000000;
    margin-bottom: 20px;
}
.retro-step-badge {
    width: 38px;
    height: 38px;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #000000;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.card-header-text {
    flex: 1;
}
.retro-card-title {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 21px;
    font-weight: 900;
    margin: 0 0 2px 0;
    color: #000000;
}
.retro-card-subtitle {
    display: block;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    color: #333333;
    line-height: 1.4;
}

/* Desktop Cart Table */
.retro-cart-table-wrap {
    width: 100%;
    overflow-x: auto;
}
.retro-cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 14px;
}
.retro-cart-table th {
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
    padding: 12px 10px;
    text-align: left;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 900;
    text-transform: uppercase;
    background: #f4f4f5;
    color: #000000;
}
.retro-cart-table td {
    padding: 16px 10px;
    border-bottom: 1px dotted #000000;
    vertical-align: middle;
}
.retro-cart-table tr:last-child td {
    border-bottom: none;
}

.cart-item-info {
    display: flex;
    align-items: center;
    gap: 14px;
}
.cart-item-thumb {
    width: 68px;
    height: 68px;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    object-fit: contain;
    flex-shrink: 0;
    background: #ffffff;
    padding: 4px;
    filter: none !important;
    -webkit-filter: none !important;
}
.cart-item-title {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 4px 0;
    line-height: 1.35;
    color: #000000;
}
.cart-item-unit {
    display: inline-block;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 700;
    border: 1px solid #000000;
    background: #f4f4f5;
    padding: 1px 6px;
    color: #000000;
}

/* Quantity Controller Group */
.cart-qty-ctrls {
    display: inline-flex;
    align-items: center;
    border: 2px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
}
.btn-qty-chg {
    width: 32px;
    height: 32px;
    border: none;
    background: #ffffff;
    color: #000000;
    font-size: 16px;
    font-weight: 900;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.1s ease;
}
.btn-qty-chg:hover {
    background: #000000;
    color: #ffffff;
}
.qty-num-val {
    width: 36px;
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
    font-size: 14px;
    font-weight: 900;
    color: #000000;
}

/* Delete Button */
.btn-item-del {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #ffffff;
    color: #000000;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
    padding: 6px 10px;
    cursor: pointer;
    text-transform: uppercase;
    transition: all 0.1s ease;
}
.btn-item-del:hover {
    background: #000000;
    color: #ffffff;
}

/* Mobile Item Cards */
.cart-mobile-list {
    display: none;
    flex-direction: column;
    gap: 16px;
}
.cart-mobile-item-card {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #ffffff;
    padding: 16px;
}
.mobile-item-top {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px dotted #000000;
}
.mobile-item-top .cart-item-thumb {
    width: 60px;
    height: 60px;
}
.mobile-item-meta {
    flex: 1;
}
.mobile-item-meta h4 {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 15px;
    font-weight: 700;
    margin: 0 0 4px 0;
}
.mobile-item-meta .item-price {
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 700;
}
.mobile-item-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
}
.mobile-item-bottom .subtotal-tag {
    font-family: 'Courier New', Courier, monospace;
    font-size: 14px;
    font-weight: 900;
}

/* Actions Bar */
.cart-actions-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    margin-top: 18px;
    flex-wrap: wrap;
}
.retro-btn-action {
    border: 2px solid #000000;
    box-shadow: 3px 3px 0 #000000;
    background: #ffffff;
    color: #000000;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 900;
    padding: 10px 18px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.1s ease;
    display: inline-block;
}
.retro-btn-action:hover {
    background: #000000;
    color: #ffffff;
}
.btn-danger-action:hover {
    background: #000000;
    color: #ffffff;
}

/* Right Summary Card */
.summary-sticky-card {
    position: sticky;
    top: 24px;
}
.summary-line-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px dotted #000000;
    font-size: 14px;
}
.summary-line-item .line-label {
    color: #000000;
}
.summary-line-item .line-value {
    font-family: 'Courier New', Courier, monospace;
    font-size: 15px;
    color: #000000;
}
.badge-free-shipping {
    border: 1px solid #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
    padding: 2px 6px;
}
.text-free {
    font-size: 13px !important;
}

/* Voucher */
.cart-voucher-box {
    margin: 16px 0;
    padding: 14px;
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #f4f4f5;
}
.voucher-label {
    display: block;
    font-family: 'Courier New', Courier, monospace;
    font-size: 11px;
    font-weight: 900;
    text-transform: uppercase;
    margin-bottom: 6px;
    color: #000000;
}
.voucher-input-group {
    display: flex;
    gap: 6px;
}
.input-voucher-code {
    flex: 1;
    border: 1.5px solid #000000;
    padding: 8px 10px;
    font-family: 'Courier New', Courier, monospace;
    font-size: 13px;
    font-weight: 900;
    text-transform: uppercase;
    background: #ffffff;
    color: #000000;
}
.input-voucher-code:focus {
    outline: none;
    box-shadow: 2px 2px 0 #000000;
}
.btn-apply-voucher {
    border: 1.5px solid #000000;
    box-shadow: 2px 2px 0 #000000;
    background: #000000;
    color: #ffffff;
    font-family: 'Courier New', Courier, monospace;
    font-size: 12px;
    font-weight: 900;
    padding: 8px 14px;
    cursor: pointer;
    transition: all 0.1s ease;
}
.btn-apply-voucher:hover {
    background: #ffffff;
    color: #000000;
}

/* Grand Total Box */
.summary-grand-total-box {
    border-top: 2px solid #000000;
    border-bottom: 2px solid #000000;
    padding: 16px 0;
    margin: 18px 0 22px 0;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}
.grand-label {
    display: block;
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 16px;
    font-weight: 900;
    color: #000000;
}
.grand-note {
    display: block;
    font-size: 11px;
    color: #555555;
    margin-top: 2px;
}
.grand-amount-display {
    font-family: 'Courier New', Courier, monospace;
    font-size: 24px;
    font-weight: 900;
    color: #000000;
}

/* Proceed CTA Button */
.btn-cart-checkout-cta {
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
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    box-sizing: border-box;
    margin-bottom: 20px;
    letter-spacing: 0.5px;
    transition: all 0.1s ease;
}
.btn-cart-checkout-cta:hover {
    background: #ffffff;
    color: #000000;
    transform: translate(-2px, -2px);
    box-shadow: 6px 6px 0 #000000;
}
.btn-cart-checkout-cta:active {
    transform: translate(2px, 2px);
    box-shadow: 2px 2px 0 #000000;
}

/* Trust Guarantees */
.cart-trust-guarantees {
    border-top: 1px dotted #000000;
    padding-top: 14px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.trust-guarantee-row {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12.5px;
    color: #000000;
}
.trust-guarantee-row svg {
    flex-shrink: 0;
}

/* Loading & Empty States */
.cart-loading-state {
    text-align: center;
    padding: 40px 10px;
}
.retro-spinner-box {
    width: 36px;
    height: 36px;
    border: 3px solid #000000;
    border-top-color: transparent;
    border-radius: 50%;
    margin: 0 auto 14px auto;
    animation: spinCart 0.8s linear infinite;
}
@keyframes spinCart {
    to { transform: rotate(360deg); }
}

.checkout-empty-cart {
    text-align: center;
    padding: 44px 20px;
    border: 2px dashed #000000;
    background: #fafafa;
}
.checkout-empty-cart h3 {
    font-family: 'Times New Roman', Times, Georgia, serif;
    font-size: 22px;
    margin: 0 0 8px 0;
}
.checkout-empty-cart p {
    font-size: 14px;
    color: #444;
    margin: 0 0 16px 0;
}

/* Responsive Breakpoints */
@media (max-width: 900px) {
    .retro-cart-grid {
        grid-template-columns: 1fr;
    }
    .summary-sticky-card {
        position: static;
    }
}

@media (max-width: 720px) {
    .retro-cart-table-wrap {
        display: none;
    }
    .cart-mobile-list {
        display: flex;
    }
    .cart-actions-bar {
        flex-direction: column;
        align-items: stretch;
    }
    .retro-btn-action {
        text-align: center;
    }
}
</style>

<script>
(function () {
    function formatRupiah(num) {
        return 'Rp ' + Number(num || 0).toLocaleString('id-ID');
    }

    function renderCart() {
        var container = document.getElementById('fullCartContent');
        if (!container) return;

        var items = window.ukmCart ? window.ukmCart.load() : [];

        if (!items || items.length === 0) {
            container.innerHTML = [
                '<div class="checkout-empty-cart">',
                '  <h3>Keranjang Belanja Sembako Anda Masih Kosong</h3>',
                '  <p>Pilih produk beras, minyak, gula, atau kebutuhan harian lain dari katalog kami untuk memulai pesanan.</p>',
                '  <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="retro-btn-action">',
                '    &larr; Lihat Katalog Produk Sekarang',
                '  </a>',
                '</div>'
            ].join('');

            updateTotals(0);
            return;
        }

        var total = 0;

        // Desktop Table Markup
        var tableHtml = '<div class="retro-cart-table-wrap">';
        tableHtml += '<table class="retro-cart-table">';
        tableHtml += '<thead><tr>';
        tableHtml += '<th>Produk Sembako</th>';
        tableHtml += '<th style="text-align:center;">Jumlah</th>';
        tableHtml += '<th style="text-align:right;">Harga Satuan</th>';
        tableHtml += '<th style="text-align:right;">Subtotal</th>';
        tableHtml += '<th style="text-align:center;">Hapus</th>';
        tableHtml += '</tr></thead><tbody>';

        // Mobile Card Markup
        var mobileHtml = '<div class="cart-mobile-list">';

        items.forEach(function (item) {
            var price = parseFloat(item.price) || 0;
            var qty = parseInt(item.qty, 10) || 1;
            var lineTotal = price * qty;
            total += lineTotal;

            var thumbSrc = item.thumb || '<?php echo esc_url(UKM_THEME_URI . '/assets/images/technova/hero-technova.jpg'); ?>';

            // Desktop Row
            tableHtml += '<tr>';
            tableHtml += '<td>';
            tableHtml += '  <div class="cart-item-info">';
            tableHtml += '    <img src="' + thumbSrc + '" alt="' + item.title + '" class="cart-item-thumb">';
            tableHtml += '    <div>';
            tableHtml += '      <h4 class="cart-item-title">' + item.title + '</h4>';
            tableHtml += '      <span class="cart-item-unit">Satuan: ' + (item.satuan || 'item') + '</span>';
            tableHtml += '    </div>';
            tableHtml += '  </div>';
            tableHtml += '</td>';
            tableHtml += '<td style="text-align:center;">';
            tableHtml += '  <div class="cart-qty-ctrls">';
            tableHtml += '    <button type="button" class="btn-qty-chg js-cart-minus" data-id="' + item.id + '" title="Kurangi 1">-</button>';
            tableHtml += '    <span class="qty-num-val">' + qty + '</span>';
            tableHtml += '    <button type="button" class="btn-qty-chg js-cart-plus" data-id="' + item.id + '" title="Tambah 1">+</button>';
            tableHtml += '  </div>';
            tableHtml += '</td>';
            tableHtml += '<td style="text-align:right; font-family: Courier New, monospace; font-size: 14px;">' + formatRupiah(price) + '</td>';
            tableHtml += '<td style="text-align:right; font-family: Courier New, monospace; font-weight: 900; font-size: 15px;">' + formatRupiah(lineTotal) + '</td>';
            tableHtml += '<td style="text-align:center;">';
            tableHtml += '  <button type="button" class="btn-item-del js-cart-del" data-id="' + item.id + '" title="Hapus produk">Hapus</button>';
            tableHtml += '</td>';
            tableHtml += '</tr>';

            // Mobile Card
            mobileHtml += '<div class="cart-mobile-item-card">';
            mobileHtml += '  <div class="mobile-item-top">';
            mobileHtml += '    <img src="' + thumbSrc + '" alt="' + item.title + '" class="cart-item-thumb">';
            mobileHtml += '    <div class="mobile-item-meta">';
            mobileHtml += '      <h4>' + item.title + '</h4>';
            mobileHtml += '      <span class="item-price">' + formatRupiah(price) + ' / ' + (item.satuan || 'item') + '</span>';
            mobileHtml += '    </div>';
            mobileHtml += '  </div>';
            mobileHtml += '  <div class="mobile-item-bottom">';
            mobileHtml += '    <div class="cart-qty-ctrls">';
            mobileHtml += '      <button type="button" class="btn-qty-chg js-cart-minus" data-id="' + item.id + '">-</button>';
            mobileHtml += '      <span class="qty-num-val">' + qty + '</span>';
            mobileHtml += '      <button type="button" class="btn-qty-chg js-cart-plus" data-id="' + item.id + '">+</button>';
            mobileHtml += '    </div>';
            mobileHtml += '    <div class="subtotal-tag">Subtotal: ' + formatRupiah(lineTotal) + '</div>';
            mobileHtml += '    <button type="button" class="btn-item-del js-cart-del" data-id="' + item.id + '">Hapus</button>';
            mobileHtml += '  </div>';
            mobileHtml += '</div>';
        });

        tableHtml += '</tbody></table></div>';
        mobileHtml += '</div>';

        container.innerHTML = tableHtml + mobileHtml;
        updateTotals(total);
    }

    function updateTotals(total) {
        var subEl = document.getElementById('cartSubtotalVal');
        var grandEl = document.getElementById('cartGrandTotalVal');
        if (subEl) subEl.textContent = formatRupiah(total);
        if (grandEl) grandEl.textContent = formatRupiah(total);
    }

    document.addEventListener('click', function (e) {
        if (!window.ukmCart) return;

        var plus = e.target.closest('.js-cart-plus');
        if (plus) {
            e.preventDefault();
            var id = plus.dataset.id;
            var item = window.ukmCart.load().find(function (i) { return String(i.id) === String(id); });
            if (item) {
                window.ukmCart.updateQty(id, (item.qty || 1) + 1);
                renderCart();
            }
            return;
        }

        var minus = e.target.closest('.js-cart-minus');
        if (minus) {
            e.preventDefault();
            var id = minus.dataset.id;
            var item = window.ukmCart.load().find(function (i) { return String(i.id) === String(id); });
            if (item) {
                var cur = item.qty || 1;
                if (cur > 1) {
                    window.ukmCart.updateQty(id, cur - 1);
                } else {
                    if (confirm('Hapus ' + item.title + ' dari keranjang belanja?')) {
                        window.ukmCart.removeItem(id);
                    }
                }
                renderCart();
            }
            return;
        }

        var del = e.target.closest('.js-cart-del');
        if (del) {
            e.preventDefault();
            var id = del.dataset.id;
            if (confirm('Hapus produk ini dari keranjang belanja?')) {
                window.ukmCart.removeItem(id);
                renderCart();
            }
            return;
        }
    });

    var clearBtn = document.getElementById('btnClearFullCart');
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            if (confirm('Kosongkan seluruh isi keranjang belanja?')) {
                window.ukmCart.clearCart();
                renderCart();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', renderCart);
    window.addEventListener('ukmCartUpdated', renderCart);
})();
</script>

<?php
get_footer();
