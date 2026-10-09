/**
 * UKM Toko Theme — Main JavaScript
 * Toko Berkah | Vanilla JS, no jQuery dependency.
 *
 * Features:
 * 1. Mobile navigation drawer (hamburger toggle)
 * 2. Sticky header on scroll
 * 3. Mini cart (localStorage) + WooCommerce AJAX add-to-cart
 * 4. Product image gallery switcher (single-produk.php)
 * 5. Smooth scroll for anchor links
 * 6. Input quantity increment/decrement
 */

(function () {
  'use strict';

  /* ─────────────────────────────────────────────
     1. DOM READY HELPER
     ───────────────────────────────────────────── */
  function ready(fn) {
    if (document.readyState !== 'loading') {
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  /* ─────────────────────────────────────────────
     2. MOBILE NAVIGATION DRAWER
     ───────────────────────────────────────────── */
  function initMobileNav() {
    const toggle   = document.getElementById('mobileMenuToggle');
    const drawer   = document.getElementById('mobileNavDrawer');
    const backdrop = document.getElementById('mobileNavBackdrop');
    if (!toggle || !drawer) return;

    function openDrawer() {
      drawer.classList.add('is-open');
      backdrop && backdrop.classList.add('is-visible');
      toggle.setAttribute('aria-expanded', 'true');
      drawer.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
      drawer.classList.remove('is-open');
      backdrop && backdrop.classList.remove('is-visible');
      toggle.setAttribute('aria-expanded', 'false');
      drawer.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    toggle.addEventListener('click', function () {
      const isOpen = drawer.classList.contains('is-open');
      isOpen ? closeDrawer() : openDrawer();
    });

    backdrop && backdrop.addEventListener('click', closeDrawer);

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        closeDrawer();
        toggle.focus();
      }
    });
  }

  /* ─────────────────────────────────────────────
     3. STICKY / SHADOW HEADER
     ───────────────────────────────────────────── */
  function initStickyHeader() {
    const header = document.getElementById('masthead');
    if (!header) return;
    let lastScroll = 0;

    window.addEventListener('scroll', function () {
      const current = window.scrollY;
      if (current > 60) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
      lastScroll = current;
    }, { passive: true });
  }

  /* ─────────────────────────────────────────────
     4. LOCAL MINI-CART (window.ukmCart)
     ───────────────────────────────────────────── */
  window.ukmCart = (function () {
    var STORAGE_KEY = 'ukm_mini_cart';

    function loadCart() {
      try {
        var data = JSON.parse(localStorage.getItem(STORAGE_KEY));
        return Array.isArray(data) ? data : [];
      } catch (e) {
        return [];
      }
    }

    function saveCart(items) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
      } catch (e) {}
      updateCartBadge();
      window.dispatchEvent(new CustomEvent('ukmCartUpdated', { detail: { items: items } }));
    }

    function getCount() {
      return loadCart().reduce(function (sum, item) {
        return sum + (parseInt(item.qty, 10) || 1);
      }, 0);
    }

    function getSubtotal() {
      return loadCart().reduce(function (sum, item) {
        var p = parseFloat(item.price) || 0;
        var q = parseInt(item.qty, 10) || 1;
        return sum + (p * q);
      }, 0);
    }

    function addItem(item) {
      var items = loadCart();
      var itemId = String(item.id);
      var found = items.find(function (i) {
        return String(i.id) === itemId;
      });
      if (found) {
        found.qty = (parseInt(found.qty, 10) || 1) + (parseInt(item.qty, 10) || 1);
      } else {
        items.push({
          id: itemId,
          title: item.title || item.name || 'Produk Sembako',
          price: parseFloat(item.price) || 0,
          thumb: item.thumb || '',
          satuan: item.satuan || 'item',
          qty: parseInt(item.qty, 10) || 1
        });
      }
      saveCart(items);
      return getCount();
    }

    function updateQty(id, qty) {
      var items = loadCart();
      var itemId = String(id);
      var newQty = parseInt(qty, 10);
      if (newQty <= 0) {
        items = items.filter(function (i) { return String(i.id) !== itemId; });
      } else {
        var found = items.find(function (i) { return String(i.id) === itemId; });
        if (found) found.qty = newQty;
      }
      saveCart(items);
      return items;
    }

    function removeItem(id) {
      var items = loadCart();
      var itemId = String(id);
      items = items.filter(function (i) { return String(i.id) !== itemId; });
      saveCart(items);
      return items;
    }

    function clearCart() {
      saveCart([]);
    }

    return {
      load: loadCart,
      save: saveCart,
      getCount: getCount,
      getSubtotal: getSubtotal,
      addItem: addItem,
      updateQty: updateQty,
      removeItem: removeItem,
      clearCart: clearCart,
      updateBadge: updateCartBadge
    };
  })();

  /* ─────────────────────────────────────────────
     5. UPDATE CART COUNT BADGE UI
     ───────────────────────────────────────────── */
  function updateCartBadge(count) {
    if (typeof count === 'undefined' && window.ukmCart) {
      count = window.ukmCart.getCount();
    }
    var badges = document.querySelectorAll('#header-cart-count, #ukmCartCount, .cart-badge-count');
    badges.forEach(function (badge) {
      if (badge) {
        badge.textContent = count;
        badge.style.display = 'flex';
      }
    });
  }

  /* ─────────────────────────────────────────────
     6. QUICK ADD-TO-CART (Local + Dynamic)
     ───────────────────────────────────────────── */
  function initAddToCart() {
    document.body.addEventListener('click', function (e) {
      var btn = e.target.closest('.btn-quick-add, .btn-technova-cart, .js-add-to-cart, .btn-single-cart');
      if (!btn) return;
      e.preventDefault();

      var card = btn.closest('.technova-product-card, .ukm-product-card, .single-product-main, article, .prod-card-details');
      
      var id = btn.dataset.id;
      if (!id && card) {
        var postEl = btn.closest('[id^="post-"]');
        if (postEl) id = postEl.id.replace('post-', '');
      }
      if (!id) id = 'prod-' + Date.now();

      var title = btn.dataset.title || btn.dataset.name;
      if (!title && card) {
        var tEl = card.querySelector('.prod-card-title a, .prod-card-title, .single-product-title, h1, h2, h3');
        if (tEl) title = tEl.textContent.trim();
      }
      if (!title) title = 'Produk Sembako';

      var price = parseFloat(btn.dataset.price);
      if (isNaN(price) || price <= 0) {
        if (card) {
          var pEl = card.querySelector('.price-current, .price-display-main, .price');
          if (pEl) {
            price = parseFloat(pEl.textContent.replace(/[^0-9]/g, '')) || 0;
          }
        }
      }
      if (isNaN(price)) price = 0;

      var thumb = btn.dataset.thumb || '';
      if (!thumb && card) {
        var imgEl = card.querySelector('img.prod-card-img, img.single-main-img, img');
        if (imgEl) thumb = imgEl.src;
      }

      var satuan = btn.dataset.satuan || 'item';

      // Add to window.ukmCart
      window.ukmCart.addItem({
        id: id,
        title: title,
        price: price,
        thumb: thumb,
        satuan: satuan,
        qty: 1
      });

      // Feedback animation on button
      var original = btn.innerHTML;
      btn.innerHTML = '<span>Ditambahkan! ✓</span>';
      btn.classList.add('btn-added-state');

      setTimeout(function () {
        btn.innerHTML = original;
        btn.classList.remove('btn-added-state');
      }, 1500);

      showToast('✓ ' + title + ' ditambahkan ke keranjang!');
    });
  }

  /* ─────────────────────────────────────────────
     7. TOAST NOTIFICATION
     ───────────────────────────────────────────── */
  function showToast(msg) {
    var existing = document.getElementById('ukmToast');
    if (existing) existing.remove();

    var toast = document.createElement('div');
    toast.id = 'ukmToast';
    toast.setAttribute('role', 'status');
    toast.setAttribute('aria-live', 'polite');
    toast.style.cssText = [
      'position:fixed', 'bottom:88px', 'right:24px', 'z-index:10000',
      'background:#0f172a', 'color:#fff', 'padding:12px 20px',
      'border-radius:10px', 'font-size:0.875rem', 'font-weight:600',
      'box-shadow:0 8px 24px rgba(0,0,0,0.20)', 'max-width:320px',
      'animation:fadeInUp 0.3s ease forwards',
    ].join(';');
    toast.textContent = msg;
    document.body.appendChild(toast);

    setTimeout(function () {
      toast.style.animation = 'fadeOutDown 0.3s ease forwards';
      setTimeout(function () { toast.remove(); }, 300);
    }, 2800);
  }

  // Inject toast animation keyframes once
  (function injectToastStyles() {
    if (document.getElementById('ukm-toast-styles')) return;
    var style = document.createElement('style');
    style.id = 'ukm-toast-styles';
    style.textContent = [
      '@keyframes fadeInUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}',
      '@keyframes fadeOutDown{from{opacity:1;transform:translateY(0)}to{opacity:0;transform:translateY(12px)}}',
    ].join('');
    document.head.appendChild(style);
  })();

  /* ─────────────────────────────────────────────
     8. PRODUCT GALLERY SWITCHER (single-produk.php)
     ───────────────────────────────────────────── */
  function initProductGallery() {
    var mainImg = document.getElementById('productMainImage');
    if (!mainImg) return;

    document.querySelectorAll('.gallery-thumb').forEach(function (thumb) {
      thumb.addEventListener('click', function () {
        var src = this.dataset.full || this.getAttribute('src');
        mainImg.src = src;
        mainImg.alt = this.alt;

        document.querySelectorAll('.gallery-thumb').forEach(function (t) {
          t.classList.remove('active');
        });
        this.classList.add('active');
      });

      thumb.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          this.click();
        }
      });
    });
  }

  /* ─────────────────────────────────────────────
     9. QUANTITY INCREMENT / DECREMENT
     ───────────────────────────────────────────── */
  function initQtyButtons() {
    document.body.addEventListener('click', function (e) {
      var btn = e.target.closest('[data-qty]');
      if (!btn) return;

      var target  = document.getElementById(btn.dataset.target);
      if (!target) return;

      var current = parseInt(target.value, 10) || 1;
      var min     = parseInt(target.getAttribute('min'), 10) || 1;
      var max     = parseInt(target.getAttribute('max'), 10) || 9999;
      var step    = parseInt(target.getAttribute('step'), 10) || 1;

      if (btn.dataset.qty === '+') {
        target.value = Math.min(max, current + step);
      } else {
        target.value = Math.max(min, current - step);
      }
      target.dispatchEvent(new Event('change', { bubbles: true }));
    });
  }

  /* ─────────────────────────────────────────────
     10. SMOOTH SCROLL FOR ANCHOR LINKS
     ───────────────────────────────────────────── */
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener('click', function (e) {
        var id = this.getAttribute('href').slice(1);
        if (!id) return;
        var target = document.getElementById(id);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  }

  /* ─────────────────────────────────────────────
     11. STICKY ADD-TO-CART (single-produk.php)
     ───────────────────────────────────────────── */
  function initStickyAddToCart() {
    var stickyBar = document.getElementById('stickyAddToCart');
    var mainCta   = document.getElementById('productMainCta');
    if (!stickyBar || !mainCta) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          stickyBar.classList.remove('is-visible');
        } else {
          stickyBar.classList.add('is-visible');
        }
      });
    }, { threshold: 0.1 });

    observer.observe(mainCta);
  }

  /* ─────────────────────────────────────────────
     12. HEADER SCROLLED STYLE
     ───────────────────────────────────────────── */
  (function injectHeaderScrollStyles() {
    if (document.getElementById('ukm-header-scroll-styles')) return;
    var style = document.createElement('style');
    style.id = 'ukm-header-scroll-styles';
    style.textContent = [
      '#masthead.header-scrolled{box-shadow:0 2px 12px rgba(15,23,42,0.10);position:sticky;top:0;z-index:1000;background:#fff;}',
      '.site-main-header{background:#fff;transition:box-shadow 0.3s ease;}',
    ].join('');
    document.head.appendChild(style);
  })();

  /* ─────────────────────────────────────────────
     BOOTSTRAP ON READY
     ───────────────────────────────────────────── */
  ready(function () {
    initMobileNav();
    initStickyHeader();
    initAddToCart();
    initProductGallery();
    initQtyButtons();
    initSmoothScroll();
    initStickyAddToCart();

    // Sync cart badge on load
    updateCartBadge(ukmCart.getCount());
  });

})();


/* ─── TechNova Interactions ─── */
document.addEventListener('DOMContentLoaded', function () {
  // Mobile Nav Toggle
  var navToggle = document.getElementById('nav-toggle');
  var mobileMenu = document.getElementById('mobile-menu');
  if (navToggle && mobileMenu) {
    navToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('is-open');
    });
  }

  // Wishlist Heart Toggle
  document.querySelectorAll('.prod-wishlist-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var svg = btn.querySelector('svg');
      if (svg) {
        if (svg.getAttribute('fill') === 'currentColor') {
          svg.setAttribute('fill', 'none');
          btn.style.color = '#64748b';
        } else {
          svg.setAttribute('fill', 'currentColor');
          btn.style.color = '#ef4444';
        }
      }
    });
  });


  // Slider buttons micro-interaction
  var dots = document.querySelectorAll('.hero-dot');
  var prevBtn = document.querySelector('.hero-arrow-prev');
  var nextBtn = document.querySelector('.hero-arrow-next');
  var currentDot = 0;

  function updateDots(index) {
    if (dots.length === 0) return;
    dots.forEach(function (d) { d.classList.remove('active'); });
    dots[index].classList.add('active');
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      currentDot = (currentDot + 1) % dots.length;
      updateDots(currentDot);
    });
  }
  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      currentDot = (currentDot - 1 + dots.length) % dots.length;
      updateDots(currentDot);
    });
  }
});
