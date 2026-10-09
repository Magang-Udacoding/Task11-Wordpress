<?php
/**
 * Template Name: Halaman Tentang Toko - Retro About Us
 *
 * @package UKM_Toko_Theme
 */

get_header();

$wa_number = get_theme_mod('ukm_wa_number', '6281234567890');
$wa_clean  = preg_replace('/[^0-9]/', '', $wa_number);
$wa_url    = 'https://wa.me/' . $wa_clean . '?text=' . rawurlencode('Halo Admin Toko Berkah, saya ingin bertanya tentang toko.');
?>

<main id="primary-content" class="about-page-main">
    <div class="site-container">

        <!-- Breadcrumbs -->
        <div class="retro-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">&larr; Beranda</a>
            <span class="bc-sep">/</span>
            <span class="bc-current">Tentang Kami</span>
        </div>

        <!-- Hero Header -->
        <div class="about-hero-card">
            <div class="about-badge-pill">
                <span>[PROFIL RESMI TOKO BERKAH]</span>
            </div>
            <h1 class="about-main-title">Melayani Kebutuhan Sembako Keluarga & Usaha Warung Sejak 2018</h1>
            <p class="about-main-subtitle">
                Dari warung kelontong keluarga sederhana hingga menjadi sentra distributor sembako resmi di Kota Bandung. Berkomitmen menjaga timbangan pas, harga grosir jujur, dan pengiriman tepat waktu.
            </p>
        </div>

        <!-- 3-Column Highlights -->
        <div class="about-stats-grid">
            <div class="stat-card">
                <span class="stat-num">2018</span>
                <strong class="stat-title">Tahun Didirikan</strong>
                <p>Berpengalaman melayani ribuan dapur keluarga dan warung makan di seluruh Bandung.</p>
            </div>
            <div class="stat-card">
                <span class="stat-num">22+</span>
                <strong class="stat-title">Produk Pokok Ready</strong>
                <p>Beras pulen, minyak goreng resmi, gula kristal, tepung, telur, dan sabun higienis.</p>
            </div>
            <div class="stat-card">
                <span class="stat-num">100%</span>
                <strong class="stat-title">Garansi Timbangan</strong>
                <p>Digital kalibrasi akurat dan jaminan penggantian penuh jika timbangan kurang.</p>
            </div>
        </div>

        <!-- Story & Values Section -->
        <div class="about-story-section">
            <div class="story-content-card">
                <span class="section-subtitle">[SEJARAH & PERJALANAN USAHA]</span>
                <h2 class="story-heading">Membangun Ekosistem Pangan Lokal yang Adil & Berkelanjutan</h2>
                
                <p>
                    <strong>Toko UKM Sembako Bahri</strong> berawal dari usaha ritel keluarga yang berlokasi di Bandung. Bermula dari sebuah warung kelontong kecil, kini Toko Berkah telah berkembang menjadi mitra pasokan sembilan bahan pokok bagi ratusan keluarga, warung makan, katering hajatan, hingga pedagang kelontong binaan.
                </p>
                <p>
                    Kami menjalin kemitraan langsung dengan petani padi di Jawa Barat serta distributor resmi produsen pangan nasional (seperti Bimoli, Sania, Segitiga Biru, Gulaku, Rinso, dan Sunlight). Jalur distribusi pendek ini memungkinkan kami menawarkan harga grosir yang lebih hemat langsung kepada konsumen akhir.
                </p>

                <!-- Value Pillars Grid -->
                <div class="story-pillars-grid">
                    <div class="pillar-box">
                        <div class="pillar-badge">[MUTU]</div>
                        <h4>Kualitas Tanpa Kompromi</h4>
                        <p>Beras murni tanpa pemutih kimia, minyak higienis, serta masa simpan terjamin segar setiap hari.</p>
                    </div>
                    <div class="pillar-box">
                        <div class="pillar-badge">[KILAT]</div>
                        <h4>Pengiriman Same-Day</h4>
                        <p>Armada kurir toko siap mengantar pesanan sebelum jam 17:00 WIB langsung ke depan pintu Anda.</p>
                    </div>
                    <div class="pillar-box">
                        <div class="pillar-badge">[MITRA]</div>
                        <h4>Kemitraan Warung Binaan</h4>
                        <p>Dukungan harga khusus grosir dan pasokan berkala bagi pemilik warung kelontong kecil.</p>
                    </div>
                    <div class="pillar-box">
                        <div class="pillar-badge">[MUDAH]</div>
                        <h4>Transaksi Fleksibel</h4>
                        <p>Mendukung metode transfer bank, scan QRIS instan, maupun bayar tunai di tempat (COD).</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Card -->
        <div class="about-cta-card">
            <div class="cta-inner-flex">
                <div class="cta-text-col">
                    <h3 class="cta-heading">Ingin Bermitra atau Pesan Sembako dalam Jumlah Banyak?</h3>
                    <p class="cta-desc">Hubungi staf admin Toko Berkah sekarang untuk mendapatkan penawaran harga grosir terbaik dan jadwal antar ke alamat Anda.</p>
                </div>
                <div class="cta-btns">
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener noreferrer" class="retro-btn-cta-black">
                        Hubungi via WhatsApp &rarr;
                    </a>
                    <a href="<?php echo esc_url(home_url('/produk/')); ?>" class="retro-btn-cta-white">
                        Lihat Katalog Produk &rarr;
                    </a>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();
