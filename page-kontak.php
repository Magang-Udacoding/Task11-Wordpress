<?php
/**
 * Template Name: Halaman Kontak Toko (Classic Facebook Contact Page)
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
$wa_url    = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode('Halo Admin Toko Bahri, saya ingin bertanya.');
?>

<div class="fb-3col-layout">
    <!-- Left Sidebar -->
    <aside class="fb-col-left">
        <div class="fb-left-card fb-profile-card">
            <div class="fb-profile-avatar-box">
                <span class="fb-profile-emoji">🏪</span>
            </div>
            <div class="fb-profile-info">
                <h2 class="fb-profile-name">Toko Sembako Bahri</h2>
                <span class="fb-profile-role">Layanan Pelanggan (CS)</span>
                <span class="fb-edit-profile-link">🟢 CS Sedang Online</span>
            </div>
        </div>

        <div class="fb-left-card fb-nav-card">
            <span class="fb-card-heading">SALURAN BANTUAN</span>
            <ul class="fb-left-menu">
                <li class="active">
                    <a href="#form-kontak">
                        <span class="fb-menu-icon">✉️</span>
                        <span class="fb-menu-label">Kirim Pesan</span>
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/<?php echo esc_attr($wa_clean); ?>" target="_blank">
                        <span class="fb-menu-icon">💬</span>
                        <span class="fb-menu-label">WhatsApp Admin</span>
                        <span class="fb-menu-badge">Cepat</span>
                    </a>
                </li>
                <li>
                    <a href="#lokasi-toko">
                        <span class="fb-menu-icon">📍</span>
                        <span class="fb-menu-label">Peta & Lokasi</span>
                    </a>
                </li>
                <li>
                    <a href="#faq-section">
                        <span class="fb-menu-icon">❓</span>
                        <span class="fb-menu-label">Tanya Jawab (FAQ)</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Center Column: Contact Form & Info -->
    <section class="fb-col-center">
        <!-- Contact Card -->
        <article class="fb-post-card" id="form-kontak">
            <div class="fb-post-header">
                <div class="fb-post-avatar">
                    <span class="fb-avatar-box">✉️</span>
                </div>
                <div class="fb-post-header-meta">
                    <div class="fb-author-line">
                        <strong class="fb-author-name">Formulir Pesan & Bantuan Pelanggan</strong>
                    </div>
                    <div class="fb-post-time">Hubungi tim customer service kami secara langsung</div>
                </div>
            </div>

            <div class="fb-post-body" style="font-size:12px;">
                <p style="margin-bottom:14px; color:#555;">
                    Ada pertanyaan seputar ketersediaan stok sembako, pemesanan partai besar, atau kerjasama mitra warung? Silakan kirimkan pesan Anda melalui formulir di bawah ini atau chat langsung via WhatsApp.
                </p>

                <form class="fb-contact-form" id="contactFormDemo" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim ke sistem Toko Bahri. Kami akan membalas via WhatsApp dalam beberapa menit.');">
                    <div style="margin-bottom:10px;">
                        <label style="display:block; font-weight:bold; color:#3b5998; margin-bottom:3px;">Nama Lengkap:</label>
                        <input type="text" class="fb-form-control" required placeholder="Contoh: Budi Santoso" />
                    </div>

                    <div style="margin-bottom:10px;">
                        <label style="display:block; font-weight:bold; color:#3b5998; margin-bottom:3px;">Nomor WhatsApp / HP:</label>
                        <input type="tel" class="fb-form-control" required placeholder="Contoh: 081234567890" />
                    </div>

                    <div style="margin-bottom:10px;">
                        <label style="display:block; font-weight:bold; color:#3b5998; margin-bottom:3px;">Topik Pertanyaan:</label>
                        <select class="fb-form-control">
                            <option>Pemesanan Sembako Eceran</option>
                            <option>Pemesanan Grosir / Warung Makan</option>
                            <option>Pendaftaran Mitra Warung Binaan</option>
                            <option>Konfirmasi Pembayaran</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div style="margin-bottom:14px;">
                        <label style="display:block; font-weight:bold; color:#3b5998; margin-bottom:3px;">Isi Pesan:</label>
                        <textarea class="fb-form-control" rows="4" required placeholder="Tuliskan kebutuhan barang atau pertanyaan Anda..."></textarea>
                    </div>

                    <div style="display:flex; gap:10px; align-items:center;">
                        <button type="submit" class="fb-pub-submit-btn">
                            Kirim Pesan Sekarang
                        </button>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" class="fb-action-wa" style="padding:6px 14px; text-decoration:none;">
                            Atau Langsung Chat via WhatsApp &rarr;
                        </a>
                    </div>
                </form>
            </div>
        </article>

        <!-- Simulated Map & Store Location Card -->
        <article class="fb-post-card" id="lokasi-toko" style="margin-top:14px;">
            <div class="fb-post-header">
                <div class="fb-post-avatar">
                    <span class="fb-avatar-box">📍</span>
                </div>
                <div class="fb-post-header-meta">
                    <div class="fb-author-line">
                        <strong class="fb-author-name">Lokasi Fisik Toko Bahri</strong>
                    </div>
                    <div class="fb-post-time">Kunjungi kami di Bandung</div>
                </div>
            </div>

            <div class="fb-post-body" style="font-size:12px;">
                <!-- Simulated Google Maps Frame -->
                <div style="background:#e5e3df; border:1px solid #bdc7d8; padding:30px; text-align:center; border-radius:2px; margin-bottom:12px;">
                    <div style="font-size:36px; margin-bottom:6px;">🗺️</div>
                    <strong style="color:#3b5998; font-size:14px;">Toko UKM Sembako Bahri Bandung</strong>
                    <p style="color:#666; margin-top:4px;">Jl. Merdeka No. 45, Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117</p>
                    <a href="https://maps.google.com" target="_blank" class="fb-confirm-btn" style="display:inline-block; margin-top:10px;">Buka di Google Maps ↗</a>
                </div>

                <div style="background:#f2f2f2; border:1px solid #d8dfea; padding:10px;">
                    <strong>🕒 Jadwal Buka Toko:</strong>
                    <ul style="margin:4px 0 0 18px; padding:0; color:#555;">
                        <li>Senin - Sabtu: 07:00 - 21:00 WIB</li>
                        <li>Minggu / Libur Nasional: 08:00 - 20:00 WIB</li>
                        <li>Jadwal Kirim Kurir: Pukul 09:00, 13:00, dan 16:30 WIB</li>
                    </ul>
                </div>
            </div>
        </article>

        <!-- FAQ Section -->
        <article class="fb-post-card" id="faq-section" style="margin-top:14px;">
            <div class="fb-post-header">
                <div class="fb-post-avatar">
                    <span class="fb-avatar-box">❓</span>
                </div>
                <div class="fb-post-header-meta">
                    <div class="fb-author-line">
                        <strong class="fb-author-name">Pertanyaan Sering Diajukan (FAQ)</strong>
                    </div>
                    <div class="fb-post-time">Informasi cepat seputar belanja sembako</div>
                </div>
            </div>

            <div class="fb-post-body" style="font-size:12px;">
                <details style="border-bottom:1px solid #e9ebee; padding:8px 0; cursor:pointer;" open>
                    <summary style="font-weight:bold; color:#3b5998;">Apakah ada minimal pembelian untuk belanja antar?</summary>
                    <p style="margin-top:6px; color:#555;">Tidak ada minimal pembelian! Untuk wilayah sekitar radius 3 km dari toko, kami melayani pengiriman gratis ongkir dengan minimal pembelian Rp 50.000.</p>
                </details>

                <details style="border-bottom:1px solid #e9ebee; padding:8px 0; cursor:pointer;">
                    <summary style="font-weight:bold; color:#3b5998;">Metode pembayaran apa saja yang diterima?</summary>
                    <p style="margin-top:6px; color:#555;">Kami menerima pembayaran tunai di tempat (COD) saat barang tiba, transfer bank (BCA, Mandiri, BRI), serta scan QRIS instan.</p>
                </details>

                <details style="padding:8px 0; cursor:pointer;">
                    <summary style="font-weight:bold; color:#3b5998;">Bagaimana jika beras atau minyak yang diterima rusak/bocor?</summary>
                    <p style="margin-top:6px; color:#555;">Toko Bahri memberikan garansi tukar barang 100% jika kemasan cacat atau tidak sesuai saat serah terima dari kurir toko.</p>
                </details>
            </div>
        </article>
    </section>

    <!-- Right Sidebar -->
    <aside class="fb-col-right">
        <div class="fb-right-card">
            <div class="fb-right-card-header">
                <span class="fb-header-title">KONTAK CEPAT</span>
            </div>
            <div style="font-size:11px; line-height:1.6; color:#555;">
                <p><strong>WhatsApp:</strong> +62 812-3456-7890</p>
                <p><strong>Telepon Toko:</strong> (022) 420-9988</p>
                <p><strong>Email:</strong> admin@tokobahri.urmin.my.id</p>
            </div>
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" class="fb-confirm-btn" style="display:block; text-align:center; margin-top:8px;">
                Chat WhatsApp Sekarang
            </a>
        </div>
    </aside>
</div>

<?php
get_footer();
