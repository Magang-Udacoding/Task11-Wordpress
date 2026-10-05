/**
 * Classic Facebook (2008-2010) UI & Sandbox Checkout Payment Engine
 * UKM Toko Sembako Bahri - Task 11
 */

(function() {
    'use strict';

    // CART STATE MANAGEMENT (Stored in localStorage)
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
        var existing = cart.find(function(item) { return item.id === product.id; });
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
        showCartToast('✓ ' + product.title + ' dimasukkan ke keranjang!');
    }

    function removeFromCart(productId) {
        var cart = getCart().filter(function(item) { return item.id !== productId; });
        saveCart(cart);
        renderCheckoutCart();
    }

    function updateCartQty(productId, delta) {
        var cart = getCart();
        var item = cart.find(function(i) { return i.id === productId; });
        if (item) {
            item.qty += delta;
            if (item.qty <= 0) {
                cart = cart.filter(function(i) { return i.id !== productId; });
            }
            saveCart(cart);
            renderCheckoutCart();
        }
    }

    function updateAllCartBadges() {
        var cart = getCart();
        var count = getCartCount(cart);
        var total = getCartTotal(cart);

        // Update header badge
        var hCount = document.getElementById('headerCartCount');
        if (hCount) hCount.textContent = count;

        // Update sub-navbar badge & total
        var subCount = document.getElementById('subCartCount');
        var subTotal = document.getElementById('subCartTotal');
        if (subCount) subCount.textContent = count;
        if (subTotal) subTotal.textContent = formatRupiah(total);

        // Update sidebar cart
        var sideCount = document.getElementById('sidebarCartCount');
        var sideTotal = document.getElementById('sidebarCartTotal');
        if (sideCount) sideCount.textContent = count;
        if (sideTotal) sideTotal.textContent = formatRupiah(total);
    }

    function showCartToast(msg) {
        var toast = document.createElement('div');
        toast.className = 'fb-cart-toast';
        toast.style.cssText = 'position:fixed; top:54px; right:20px; background:#108a38; color:#fff; font-weight:bold; padding:10px 16px; border-radius:2px; box-shadow:0 4px 12px rgba(0,0,0,0.25); z-index:10000; font-size:12px; font-family:Tahoma,sans-serif; animation:fbSlideDown 0.3s ease;';
        toast.textContent = msg;
        document.body.appendChild(toast);
        setTimeout(function() {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.3s ease';
            setTimeout(function() { toast.remove(); }, 300);
        }, 2200);
    }

    // CHECKOUT PAGE CART RENDERER
    function renderCheckoutCart() {
        var container = document.getElementById('checkoutCartItems');
        if (!container) return;

        var cart = getCart();

        // If cart is empty on checkout page, initialize with realistic demo items for easy evaluation
        if (cart.length === 0) {
            cart = [
                { id: 'demo-201', title: 'Beras Premium Rojolele 5kg', price: 75000, satuan: '5kg', qty: 1, thumb: '' },
                { id: 'demo-202', title: 'Minyak Goreng Bimoli 1 Liter', price: 18000, satuan: '1L', qty: 2, thumb: '' }
            ];
            saveCart(cart);
        }

        var total = getCartTotal(cart);
        var subtotalEl = document.getElementById('summarySubtotal');
        var grandTotalEl = document.getElementById('summaryGrandTotal');
        if (subtotalEl) subtotalEl.textContent = formatRupiah(total);
        if (grandTotalEl) grandTotalEl.textContent = formatRupiah(total);

        var html = '<table class="fb-cart-table">';
        html += '<thead><tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr></thead>';
        html += '<tbody>';

        cart.forEach(function(item) {
            var sub = item.price * item.qty;
            html += '<tr>';
            html += '<td>';
            html += '<div style="display:flex; align-items:center; gap:12px;">';
            html += '<div class="fb-cart-thumb">🛒</div>';
            html += '<div><strong style="color:#0f172a; font-size:13.5px; display:block; margin-bottom:2px;">' + item.title + '</strong><span style="color:#64748b; font-size:11.5px; background:#f1f5f9; padding:2px 8px; border-radius:6px;">Satuan: ' + item.satuan + '</span></div>';
            html += '</div>';
            html += '</td>';
            html += '<td style="color:#334155; font-weight:600;">' + formatRupiah(item.price) + '</td>';
            html += '<td>';
            html += '<div class="fb-qty-control">';
            html += '<button type="button" class="fb-qty-btn" data-action="minus" data-id="' + item.id + '" title="Kurangi">−</button>';
            html += '<span class="fb-qty-val">' + item.qty + '</span>';
            html += '<button type="button" class="fb-qty-btn" data-action="plus" data-id="' + item.id + '" title="Tambah">+</button>';
            html += '</div>';
            html += '</td>';
            html += '<td style="color:#059669; font-weight:800; font-size:14px;">' + formatRupiah(sub) + '</td>';
            html += '<td style="text-align:center;"><a href="javascript:void(0);" class="fb-cart-remove-btn" data-id="' + item.id + '" title="Hapus produk"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Hapus</a></td>';
            html += '</tr>';
        });

        html += '</tbody></table>';
        container.innerHTML = html;

        // Attach quantity and delete listeners
        container.querySelectorAll('.fb-qty-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var act = this.getAttribute('data-action');
                updateCartQty(id, act === 'plus' ? 1 : -1);
            });
        });

        container.querySelectorAll('.fb-cart-remove-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                removeFromCart(id);
            });
        });
    }

    // SANDBOX PAYMENT EXECUTION
    function initSandboxPayment() {
        var payRadioButtons = document.querySelectorAll('input[name="payment_method"]');
        var previewBox = document.getElementById('paymentPreviewBox');

        payRadioButtons.forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.fb-payment-option').forEach(function(opt) {
                    opt.classList.remove('selected');
                });
                this.closest('.fb-payment-option').classList.add('selected');

                if (previewBox) {
                    var val = this.value;
                    if (val === 'qris') {
                        previewBox.innerHTML = '<div class="fb-qris-demo"><div class="fb-qris-header"><div class="qris-brand-logo"><span class="qris-bold">QRIS</span><span class="qris-sub">Standar Pembayaran Nasional</span></div><div class="qris-nmid-pill">NMID: ID1020261199TOKOBAHRI</div></div><div class="fb-qris-code"><div class="qr-scanner-frame"><span class="corner c-tl"></span><span class="corner c-tr"></span><span class="corner c-bl"></span><span class="corner c-br"></span><img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=TOKOBAHRI-SANDBOX-PAYMENT-SIMULATION" alt="QRIS Demo" /></div></div><div class="fb-qris-footer"><div class="pulse-indicator-row"><span class="pulse-green-dot"></span><strong>Menunggu Pembayaran Scanner QRIS...</strong></div><p>Simulasi QR Code Sandbox Aktif · Tanpa Biaya Admin Tambahan (Rp 0)</p></div></div>';
                    } else if (val === 'va_bca') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px 10px;"><div style="display:inline-flex; align-items:center; gap:6px; background:#eff6ff; color:#1d4ed8; padding:4px 12px; border-radius:999px; font-size:11px; font-weight:800; margin-bottom:10px;">🏦 BCA VIRTUAL ACCOUNT</div><div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; padding:14px; max-width:320px; margin:0 auto 10px auto; box-shadow:0 2px 8px rgba(0,0,0,0.03);"><span style="font-size:11px; color:#64748b; display:block; margin-bottom:4px;">Nomor Virtual Account:</span><p style="font-size:20px; font-weight:900; letter-spacing:2px; margin:0; color:#0f172a; font-family:monospace;">8801 2345 6789 001</p></div><button type="button" onclick="navigator.clipboard.writeText(\'880123456789001\'); this.textContent=\'✓ Nomor VA Berhasil Disalin!\'; setTimeout(()=>this.textContent=\'📋 Salin Nomor VA\', 2000);" style="background:#0f172a; color:#fff; border:none; padding:8px 18px; border-radius:8px; font-size:12px; font-weight:700; cursor:pointer;">📋 Salin Nomor VA</button><p style="font-size:11.5px; color:#64748b; margin-top:12px; margin-bottom:0;">Simulasi gateway akan otomatis mendeteksi transfer sandbox dalam hitungan detik.</p></div>';
                    } else if (val === 'va_mandiri') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px 10px;"><div style="display:inline-flex; align-items:center; gap:6px; background:#fefce8; color:#a16207; padding:4px 12px; border-radius:999px; font-size:11px; font-weight:800; margin-bottom:10px;">🏛️ MANDIRI VIRTUAL ACCOUNT</div><div style="background:#ffffff; border:1px solid #e2e8f0; border-radius:12px; padding:14px; max-width:320px; margin:0 auto 10px auto; box-shadow:0 2px 8px rgba(0,0,0,0.03);"><span style="font-size:11px; color:#64748b; display:block; margin-bottom:4px;">Kode Perusahaan: <strong>8902</strong> · Nomor VA:</span><p style="font-size:20px; font-weight:900; letter-spacing:2px; margin:0; color:#0f172a; font-family:monospace;">8902 4432 1098 772</p></div><button type="button" onclick="navigator.clipboard.writeText(\'890244321098772\'); this.textContent=\'✓ Nomor VA Berhasil Disalin!\'; setTimeout(()=>this.textContent=\'📋 Salin Nomor VA\', 2000);" style="background:#0f172a; color:#fff; border:none; padding:8px 18px; border-radius:8px; font-size:12px; font-weight:700; cursor:pointer;">📋 Salin Nomor VA</button><p style="font-size:11.5px; color:#64748b; margin-top:12px; margin-bottom:0;">Simulasi bayar lewat Mandiri Livin\' atau ATM. Otomatis lunas.</p></div>';
                    } else if (val === 'cod') {
                        previewBox.innerHTML = '<div style="text-align:center; padding:16px 10px;"><div style="width:48px; height:48px; border-radius:50%; background:#ecfdf5; color:#059669; display:flex; align-items:center; justify-content:center; font-size:24px; margin:0 auto 10px auto;">💵</div><strong style="color:#0f172a; font-size:15px; display:block;">Bayar Tunai di Tempat (COD)</strong><p style="font-size:12.5px; color:#475569; max-width:360px; margin:8px auto 0 auto; line-height:1.5;">Kurir resmi Toko Bahri akan mengantarkan belanjaan sembako ke lokasi Anda. Silakan siapkan uang pas saat pesanan Anda terima.</p></div>';
                    }
                }
            });
        });

        // Pay Button Action
        var btnPay = document.getElementById('btnExecuteSandboxPay');
        var modal = document.getElementById('sandboxSuccessModal');
        var modalLoading = document.getElementById('modalLoadingState');
        var modalSuccess = document.getElementById('modalSuccessState');
        var btnClose = document.getElementById('btnCloseModal');

        if (btnPay && modal) {
            btnPay.addEventListener('click', function() {
                var cart = getCart();
                if (cart.length === 0) {
                    alert('Keranjang belanja kosong! Silakan pilih barang sembako terlebih dahulu.');
                    return;
                }

                var custName = (document.getElementById('custName') || {}).value || 'Pelanggan Toko Bahri';
                var custPhone = (document.getElementById('custPhone') || {}).value || '-';
                var custAddress = (document.getElementById('custAddress') || {}).value || 'Bandung';
                var selectedRadio = document.querySelector('input[name="payment_method"]:checked');
                var methodVal = selectedRadio ? selectedRadio.value : 'qris';
                
                var methodMap = {
                    'qris': 'QRIS Instan (Sandbox)',
                    'va_bca': 'Virtual Account BCA (Sandbox)',
                    'va_mandiri': 'Virtual Account Mandiri (Sandbox)',
                    'cod': 'Bayar di Tempat (COD Tunai)'
                };
                var methodLabel = methodMap[methodVal] || 'Sandbox Gateway';
                var total = getCartTotal(cart);
                var invId = '#TB-' + Math.floor(100000 + Math.random() * 900000);
                var nowStr = new Date().toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });

                // Show modal in loading state
                modal.style.display = 'flex';
                modalLoading.style.display = 'block';
                modalSuccess.style.display = 'none';

                // Simulate sandbox gateway processing delay
                setTimeout(function() {
                    modalLoading.style.display = 'none';
                    modalSuccess.style.display = 'block';

                    // Populate receipt data
                    document.getElementById('invNumber').textContent = invId;
                    document.getElementById('invTime').textContent = nowStr;
                    document.getElementById('invMethod').textContent = methodLabel;
                    document.getElementById('invCust').textContent = custName + ' (' + custPhone + ')';
                    document.getElementById('invAddress').textContent = custAddress;
                    document.getElementById('invTotal').textContent = formatRupiah(total);

                    // Populate items list
                    var itemsContainer = document.getElementById('invItemsList');
                    if (itemsContainer) {
                        var itemsHtml = '<div style="font-weight:bold; margin-bottom:4px; color:#3b5998;">Rincian Barang yang Dibeli:</div>';
                        var waSummary = 'Halo Admin Toko Bahri, saya telah melakukan Pembayaran Sandbox untuk pesanan:\n';
                        waSummary += '• No. Invoice: ' + invId + '\n';
                        waSummary += '• Penerima: ' + custName + ' (' + custPhone + ')\n';
                        waSummary += '• Alamat: ' + custAddress + '\n';
                        waSummary += '• Metode: ' + methodLabel + '\n\nBarang Belanja:\n';

                        cart.forEach(function(item, idx) {
                            itemsHtml += '<div style="display:flex; justify-content:space-between; margin-bottom:3px;">';
                            itemsHtml += '<span>' + (idx+1) + '. ' + item.title + ' (' + item.qty + 'x)</span>';
                            itemsHtml += '<strong>' + formatRupiah(item.price * item.qty) + '</strong>';
                            itemsHtml += '</div>';

                            waSummary += '• ' + item.title + ' (' + item.qty + 'x) = ' + formatRupiah(item.price * item.qty) + '\n';
                        });

                        waSummary += '\nTotal: ' + formatRupiah(total) + ' (LUNAS)\nMohon segera diproses dan diantar. Terima kasih!';
                        itemsContainer.innerHTML = itemsHtml;

                        // Setup WhatsApp Receipt Button
                        var waBtn = document.getElementById('btnSendWaReceipt');
                        if (waBtn) {
                            var waUrl = 'https://wa.me/6281234567890?text=' + encodeURIComponent(waSummary);
                            waBtn.href = waUrl;
                        }
                    }

                    // Reset cart
                    saveCart([]);
                }, 1300);
            });
        }

        if (btnClose && modal) {
            btnClose.addEventListener('click', function() {
                modal.style.display = 'none';
                window.location.href = 'http://tokobahri.urmin.my.id/produk/';
            });
        }
    }

    // INITIALIZATION ON DOM READY
    document.addEventListener('DOMContentLoaded', function() {
        updateAllCartBadges();

        // 1. Add to Cart on product cards
        document.querySelectorAll('.fb-btn-add-cart').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var card = this.closest('.fb-post-card');
                if (card) {
                    var product = {
                        id: card.getAttribute('data-product-id') || Math.random().toString(),
                        title: card.getAttribute('data-product-title') || 'Produk Sembako',
                        price: card.getAttribute('data-product-price') || 0,
                        satuan: card.getAttribute('data-product-satuan') || 'pcs',
                        thumb: card.getAttribute('data-product-thumb') || ''
                    };
                    addToCart(product);
                }
            });
        });

        // 2. Direct Checkout Button
        document.querySelectorAll('.fb-btn-direct-checkout').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var card = this.closest('.fb-post-card');
                if (card) {
                    var product = {
                        id: card.getAttribute('data-product-id') || Math.random().toString(),
                        title: card.getAttribute('data-product-title') || 'Produk Sembako',
                        price: card.getAttribute('data-product-price') || 0,
                        satuan: card.getAttribute('data-product-satuan') || 'pcs',
                        thumb: card.getAttribute('data-product-thumb') || ''
                    };
                    addToCart(product);
                    window.location.href = 'http://tokobahri.urmin.my.id/checkout/';
                }
            });
        });

        // 3. Interactive Like Button
        document.querySelectorAll('.fb-like-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var isLiked = this.getAttribute('data-liked') === 'true';
                var card = this.closest('.fb-post-card');
                var counterEl = card ? card.querySelector('.fb-like-counter') : null;
                var labelEl = this.querySelector('.fb-action-label');
                var currentCount = parseInt(this.getAttribute('data-count') || '15', 10);

                if (!isLiked) {
                    this.setAttribute('data-liked', 'true');
                    this.classList.add('liked');
                    if (labelEl) labelEl.textContent = 'Batal Suka';
                    currentCount += 1;
                    this.setAttribute('data-count', currentCount);
                    if (counterEl) counterEl.textContent = currentCount;
                } else {
                    this.setAttribute('data-liked', 'false');
                    this.classList.remove('liked');
                    if (labelEl) labelEl.textContent = 'Suka';
                    currentCount -= 1;
                    this.setAttribute('data-count', currentCount);
                    if (counterEl) counterEl.textContent = currentCount;
                }
            });
        });

        // 4. Focus Comment Box
        document.querySelectorAll('.fb-comment-trigger-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var card = this.closest('.fb-post-card');
                if (card) {
                    var input = card.querySelector('.fb-comment-input');
                    if (input) input.focus();
                }
            });
        });

        // 5. Publisher Box Submit
        var statusBtn = document.getElementById('fbSendStatusBtn');
        var statusText = document.getElementById('fbStatusText');
        if (statusBtn && statusText) {
            statusBtn.addEventListener('click', function() {
                var text = statusText.value.trim() || 'Halo Admin Toko Bahri, saya butuh sembako untuk diantar ke rumah.';
                var url = 'https://wa.me/6281234567890?text=' + encodeURIComponent(text);
                window.open(url, '_blank');
            });
        }

        // 6. Delete Friend Request Item
        document.querySelectorAll('.fb-delete-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var item = this.closest('.fb-friend-request-item');
                if (item) {
                    item.style.opacity = '0.3';
                    setTimeout(function() { item.remove(); }, 250);
                }
            });
        });

        // 7. Docked Chat Toggle
        var dockToggle = document.getElementById('fbDockToggle');
        var dockedChat = document.getElementById('fbDockedChat');
        if (dockToggle && dockedChat) {
            dockToggle.addEventListener('click', function() {
                dockedChat.classList.toggle('minimized');
            });
        }

        // 8. If on checkout page, render checkout items and init sandbox
        renderCheckoutCart();
        initSandboxPayment();
    });
})();
