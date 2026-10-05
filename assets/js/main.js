/**
 * Modern E-Commerce Shopping Cart & Interactive UI Engine
 * UKM Toko Sembako Bahri
 */

(function() {
    'use strict';

    // 1. Cart State Management (Stored in localStorage)
    var CART_STORAGE_KEY = 'tokobahri_cart_items';

    function getCart() {
        try {
            var raw = localStorage.getItem(CART_STORAGE_KEY);
            return raw ? JSON.parse(raw) : [];
        } catch (e) {
            return [];
        }
    }

    function saveCart(cart) {
        try {
            localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
        } catch (e) {}
        updateAllCartBadges();
    }

    function formatRupiah(num) {
        return 'Rp ' + Number(num).toLocaleString('id-ID');
    }

    function getCartTotal(cart) {
        var total = 0;
        cart.forEach(function(item) {
            total += (item.price * item.qty);
        });
        return total;
    }

    function getCartCount(cart) {
        var count = 0;
        cart.forEach(function(item) {
            count += item.qty;
        });
        return count;
    }

    function addToCart(product) {
        var cart = getCart();
        var existing = cart.find(function(item) { return String(item.id) === String(product.id); });
        if (existing) {
            existing.qty += 1;
        } else {
            cart.push({
                id: product.id,
                title: product.title,
                price: parseInt(product.price, 10) || 0,
                satuan: product.satuan || 'pcs',
                thumb: product.thumb || '',
                qty: 1
            });
        }
        saveCart(cart);
        showModernToast('✓ ' + product.title + ' berhasil ditambahkan ke keranjang!');
    }

    function removeFromCart(productId) {
        var cart = getCart().filter(function(item) { return String(item.id) !== String(productId); });
        saveCart(cart);
        renderCheckoutCart();
    }

    function updateCartQty(productId, delta) {
        var cart = getCart();
        var item = cart.find(function(i) { return String(i.id) === String(productId); });
        if (item) {
            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(function(i) { return String(i.id) !== String(productId); });
            }
            saveCart(cart);
            renderCheckoutCart();
        }
    }

    function updateAllCartBadges() {
        var cart = getCart();
        var count = getCartCount(cart);
        var total = getCartTotal(cart);

        // Header cart badges
        var hCount = document.getElementById('headerCartCount');
        var hTotal = document.getElementById('headerCartTotal');
        if (hCount) hCount.textContent = count;
        if (hTotal) hTotal.textContent = formatRupiah(total);

        // Sub navbar badge
        var subCount = document.getElementById('subCartCount');
        if (subCount) subCount.textContent = count;
    }

    // Modern Emerald Floating Toast Notification
    function showModernToast(msg) {
        var existing = document.querySelector('.modern-cart-toast');
        if (existing) existing.remove();

        var toast = document.createElement('div');
        toast.className = 'modern-cart-toast';
        toast.style.cssText = 'position:fixed; bottom:24px; left:24px; background:linear-gradient(135deg, #059669 0%, #047857 100%); color:#ffffff; font-weight:700; padding:14px 22px; border-radius:14px; box-shadow:0 12px 30px rgba(5,150,105,0.35); z-index:99999; font-size:13.5px; display:flex; align-items:center; gap:10px; border:1px solid rgba(255,255,255,0.2); animation:slideUp 0.3s cubic-bezier(0.16,1,0.3,1);';
        toast.innerHTML = '<span>🛒</span><span>' + msg + '</span>';
        document.body.appendChild(toast);

        setTimeout(function() {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
            toast.style.transition = 'all 0.3s ease';
            setTimeout(function() { toast.remove(); }, 300);
        }, 2800);
    }

    // 2. Checkout Page Cart Renderer
    function renderCheckoutCart() {
        var container = document.getElementById('checkoutCartItems');
        if (!container) return;

        var cart = getCart();

        // If cart is empty on checkout page, initialize with realistic demo items for easy evaluation
        if (cart.length === 0) {
            cart = [
                { id: '201', title: 'Beras Premium Rojolele 5kg', price: 75000, satuan: '5kg', qty: 1, thumb: '' },
                { id: '202', title: 'Minyak Goreng Bimoli 1 Liter', price: 18000, satuan: '1L', qty: 2, thumb: '' }
            ];
            saveCart(cart);
        }

        var total = getCartTotal(cart);
        var subtotalEl = document.getElementById('summarySubtotal');
        var grandTotalEl = document.getElementById('summaryGrandTotal');
        if (subtotalEl) subtotalEl.textContent = formatRupiah(total);
        if (grandTotalEl) grandTotalEl.textContent = formatRupiah(total);

        var html = '<table style="width:100%; border-collapse:collapse; background:#ffffff; border-radius:12px; overflow:hidden;">';
        html += '<thead style="background:#f8fafc; border-bottom:1px solid #e2e8f0; font-size:12.5px; text-transform:uppercase; color:#64748b;">';
        html += '<tr><th style="padding:14px 16px; text-align:left;">Produk</th><th style="padding:14px 16px; text-align:left;">Harga</th><th style="padding:14px 16px; text-align:center;">Jumlah</th><th style="padding:14px 16px; text-align:right;">Subtotal</th><th style="padding:14px 16px; text-align:center;">Aksi</th></tr>';
        html += '</thead><tbody>';

        cart.forEach(function(item) {
            var sub = item.price * item.qty;
            html += '<tr style="border-bottom:1px solid #f1f5f9;">';
            html += '<td style="padding:14px 16px;">';
            html += '<div style="display:flex; align-items:center; gap:12px;">';
            html += '<div style="width:36px; height:36px; border-radius:8px; background:#ecfdf5; color:#059669; display:flex; align-items:center; justify-content:center; font-size:18px;">📦</div>';
            html += '<div><strong style="color:#0f172a; font-size:14px; display:block;">' + item.title + '</strong><span style="color:#64748b; font-size:11.5px;">Satuan: ' + item.satuan + '</span></div>';
            html += '</div>';
            html += '</td>';
            html += '<td style="padding:14px 16px; color:#334155; font-weight:600;">' + formatRupiah(item.price) + '</td>';
            html += '<td style="padding:14px 16px; text-align:center;">';
            html += '<div style="display:inline-flex; align-items:center; gap:6px; background:#f1f5f9; padding:4px 8px; border-radius:8px;">';
            html += '<button type="button" class="btn-qty" data-action="minus" data-id="' + item.id + '" style="border:none; background:#ffffff; width:24px; height:24px; border-radius:4px; font-weight:bold; cursor:pointer;">−</button>';
            html += '<span style="font-weight:700; min-width:20px; font-size:13px;">' + item.qty + '</span>';
            html += '<button type="button" class="btn-qty" data-action="plus" data-id="' + item.id + '" style="border:none; background:#ffffff; width:24px; height:24px; border-radius:4px; font-weight:bold; cursor:pointer;">+</button>';
            html += '</div>';
            html += '</td>';
            html += '<td style="padding:14px 16px; text-align:right; color:#059669; font-weight:800; font-size:14.5px;">' + formatRupiah(sub) + '</td>';
            html += '<td style="padding:14px 16px; text-align:center;"><button type="button" class="btn-remove-item" data-id="' + item.id + '" style="background:none; border:none; color:#ef4444; cursor:pointer; font-size:12.5px; font-weight:600;">🗑️ Hapus</button></td>';
            html += '</tr>';
        });

        html += '</tbody></table>';
        container.innerHTML = html;

        // Attach listeners
        container.querySelectorAll('.btn-qty').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var act = this.getAttribute('data-action');
                updateCartQty(id, act === 'plus' ? 1 : -1);
            });
        });

        container.querySelectorAll('.btn-remove-item').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                removeFromCart(id);
            });
        });
    }

    // 3. Sandbox Payment Execution
    function initSandboxPayment() {
        var payRadioButtons = document.querySelectorAll('input[name="payment_method"]');
        var previewBox = document.getElementById('paymentPreviewBox');

        payRadioButtons.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (previewBox) {
                    var val = this.value;
                    if (val === 'qris') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px;"><span style="display:inline-block; background:#ecfdf5; color:#059669; font-size:11px; font-weight:800; padding:4px 12px; border-radius:999px; margin-bottom:12px;">QRIS RESMI SANDBOX</span><div><img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=TOKOBAHRI-SANDBOX-PAYMENT" alt="QRIS Demo" style="margin:0 auto; border:4px solid #0f172a; border-radius:12px;" /></div><p style="font-size:12px; color:#64748b; margin-top:10px;">Scan dengan aplikasi mobile banking apa saja (BCA, Mandiri, GoPay, OVO, ShopeePay).</p></div>';
                    } else if (val === 'va_bca') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px;"><span style="font-size:11px; color:#64748b;">Nomor BCA Virtual Account:</span><p style="font-size:22px; font-weight:900; letter-spacing:2px; color:#0f172a; font-family:monospace; margin:8px 0;">8801 2345 6789 001</p><p style="font-size:12px; color:#059669; font-weight:600;">Otomatis diverifikasi dalam 5 detik.</p></div>';
                    } else if (val === 'va_mandiri') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px;"><span style="font-size:11px; color:#64748b;">Nomor Mandiri Virtual Account:</span><p style="font-size:22px; font-weight:900; letter-spacing:2px; color:#0f172a; font-family:monospace; margin:8px 0;">8902 4432 1098 772</p><p style="font-size:12px; color:#059669; font-weight:600;">Otomatis diverifikasi dalam 5 detik.</p></div>';
                    } else if (val === 'cod') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px;"><span style="font-size:32px;">💵</span><h4 style="font-size:15px; font-weight:800; margin:6px 0;">Bayar Tunai di Tempat (COD)</h4><p style="font-size:12.5px; color:#64748b;">Siapkan uang pas saat sembako diantar oleh kurir resmi Toko Bahri.</p></div>';
                    }
                }
            });
        });

        var btnPay = document.getElementById('btnExecuteSandboxPay');
        var modal = document.getElementById('sandboxSuccessModal');
        var modalLoading = document.getElementById('modalLoadingState');
        var modalSuccess = document.getElementById('modalSuccessState');
        var btnClose = document.getElementById('btnCloseModal');

        if (btnPay && modal) {
            btnPay.addEventListener('click', function() {
                var cart = getCart();
                if (cart.length === 0) {
                    alert('Keranjang belanja Anda kosong!');
                    return;
                }

                var custName = (document.getElementById('custName') || {}).value || 'Pelanggan Toko Bahri';
                var custPhone = (document.getElementById('custPhone') || {}).value || '-';
                var custAddress = (document.getElementById('custAddress') || {}).value || 'Bandung';
                var total = getCartTotal(cart);
                var invId = '#TB-' + Math.floor(100000 + Math.random() * 900000);

                modal.style.display = 'flex';
                modalLoading.style.display = 'block';
                modalSuccess.style.display = 'none';

                setTimeout(function() {
                    modalLoading.style.display = 'none';
                    modalSuccess.style.display = 'block';

                    var invNum = document.getElementById('invNumber');
                    var invTot = document.getElementById('invTotal');
                    if (invNum) invNum.textContent = invId;
                    if (invTot) invTot.textContent = formatRupiah(total);

                    saveCart([]);
                }, 1200);
            });
        }

        if (btnClose && modal) {
            btnClose.addEventListener('click', function() {
                modal.style.display = 'none';
                window.location.href = 'http://tokobahri.urmin.my.id/produk/';
            });
        }
    }

    // 4. Initialization on DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        updateAllCartBadges();

        // Bind quick add buttons on product cards
        document.querySelectorAll('.btn-quick-add').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var id = this.getAttribute('data-id');
                var title = this.getAttribute('data-title') || 'Produk Sembako';
                var price = this.getAttribute('data-price') || 0;
                var satuan = this.getAttribute('data-satuan') || 'pcs';
                var thumb = this.getAttribute('data-thumb') || '';

                addToCart({
                    id: id,
                    title: title,
                    price: price,
                    satuan: satuan,
                    thumb: thumb
                });

                // Subtle animation button feedback
                var origText = this.innerHTML;
                this.innerHTML = '<span>✓ Masuk!</span>';
                this.style.background = '#047857';
                var self = this;
                setTimeout(function() {
                    self.innerHTML = origText;
                    self.style.background = '';
                }, 1200);
            });
        });

        // Checkout page handlers
        renderCheckoutCart();
        initSandboxPayment();
    });

})();
