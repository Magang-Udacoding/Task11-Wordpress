<?php
/**
 * WordPress Theme Customizer Settings (Colors, Typography, Header, Footer)
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Customizer Sections, Settings & Controls (Requirement 29)
 */
function ukm_toko_customize_register($wp_customize) {
    // -------------------------------------------------------------
    // 1. SECTION: COLORS
    // -------------------------------------------------------------
    // Primary Color
    $wp_customize->add_setting('ukm_color_primary', array(
        'default'           => '#09090b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ukm_color_primary', array(
        'label'    => __('Warna Primer (Primary)', 'ukm-toko-theme'),
        'section'  => 'colors',
    )));

    // Secondary Color
    $wp_customize->add_setting('ukm_color_secondary', array(
        'default'           => '#10b981',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ukm_color_secondary', array(
        'label'    => __('Warna Sekunder (Secondary)', 'ukm-toko-theme'),
        'section'  => 'colors',
    )));

    // Background Color
    $wp_customize->add_setting('ukm_color_background', array(
        'default'           => '#f8fafc',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ukm_color_background', array(
        'label'    => __('Warna Background', 'ukm-toko-theme'),
        'section'  => 'colors',
    )));

    // Text Color
    $wp_customize->add_setting('ukm_color_text', array(
        'default'           => '#1e293b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ukm_color_text', array(
        'label'    => __('Warna Teks (Body Text)', 'ukm-toko-theme'),
        'section'  => 'colors',
    )));

    // Link Color
    $wp_customize->add_setting('ukm_color_link', array(
        'default'           => '#059669',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ukm_color_link', array(
        'label'    => __('Warna Tautan (Link)', 'ukm-toko-theme'),
        'section'  => 'colors',
    )));

    // -------------------------------------------------------------
    // 2. SECTION: TYPOGRAPHY
    // -------------------------------------------------------------
    $wp_customize->add_section('ukm_typography_section', array(
        'title'       => __('Tipografi (Typography)', 'ukm-toko-theme'),
        'priority'    => 35,
        'description' => __('Atur jenis font dan ukuran font website', 'ukm-toko-theme'),
    ));

    // Heading Font
    $wp_customize->add_setting('ukm_font_heading', array(
        'default'           => 'Plus Jakarta Sans',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_font_heading', array(
        'label'    => __('Heading Font', 'ukm-toko-theme'),
        'section'  => 'ukm_typography_section',
        'type'     => 'select',
        'choices'  => array(
            'Plus Jakarta Sans' => 'Plus Jakarta Sans (Modern Clean)',
            'Inter'             => 'Inter (Professional)',
            'Poppins'           => 'Poppins (Geometric Bold)',
            'Roboto'            => 'Roboto (Standard)',
        ),
    ));

    // Body Font
    $wp_customize->add_setting('ukm_font_body', array(
        'default'           => 'Plus Jakarta Sans',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_font_body', array(
        'label'    => __('Body Font', 'ukm-toko-theme'),
        'section'  => 'ukm_typography_section',
        'type'     => 'select',
        'choices'  => array(
            'Plus Jakarta Sans' => 'Plus Jakarta Sans',
            'Inter'             => 'Inter',
            'Roboto'            => 'Roboto',
            'system-ui'         => 'System Native',
        ),
    ));

    // Base Font Size
    $wp_customize->add_setting('ukm_font_size_base', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_font_size_base', array(
        'label'       => __('Ukuran Font Dasar (px)', 'ukm-toko-theme'),
        'section'     => 'ukm_typography_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 12, 'max' => 20, 'step' => 1),
    ));

    // -------------------------------------------------------------
    // 3. SECTION: HEADER
    // -------------------------------------------------------------
    $wp_customize->add_section('ukm_header_section', array(
        'title'       => __('Header & Navigasi', 'ukm-toko-theme'),
        'priority'    => 40,
        'description' => __('Atur tampilan header, logo, judul toko, dan layout', 'ukm-toko-theme'),
    ));

    // Store Name in Header
    $wp_customize->add_setting('ukm_store_brand_name', array(
        'default'           => 'TOKO BAHRI',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_store_brand_name', array(
        'label'    => __('Store Name (Header)', 'ukm-toko-theme'),
        'section'  => 'ukm_header_section',
        'type'     => 'text',
    ));

    // Store Tagline in Header
    $wp_customize->add_setting('ukm_store_brand_tagline', array(
        'default'           => 'SEMBAKO & RETAIL',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_store_brand_tagline', array(
        'label'    => __('Store Tagline (Header)', 'ukm-toko-theme'),
        'section'  => 'ukm_header_section',
        'type'     => 'text',
    ));

    // Header Layout
    $wp_customize->add_setting('ukm_header_layout', array(
        'default'           => 'standard',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_header_layout', array(
        'label'    => __('Header Layout', 'ukm-toko-theme'),
        'section'  => 'ukm_header_section',
        'type'     => 'select',
        'choices'  => array(
            'standard' => 'Marketplace Bar + Navigation Tabs',
            'compact'  => 'Compact Single Row',
        ),
    ));

    // WhatsApp Store Number
    $wp_customize->add_setting('ukm_wa_number', array(
        'default'           => '6281234567890',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_wa_number', array(
        'label'    => __('Nomor WhatsApp Admin (Awali 62)', 'ukm-toko-theme'),
        'section'  => 'ukm_header_section',
        'type'     => 'text',
    ));

    // -------------------------------------------------------------
    // 4. SECTION: FOOTER & SOCIAL MEDIA
    // -------------------------------------------------------------
    $wp_customize->add_section('ukm_footer_section', array(
        'title'       => __('Footer & Sosial Media', 'ukm-toko-theme'),
        'priority'    => 120,
        'description' => __('Atur teks hak cipta, kontak, dan tautan sosial media', 'ukm-toko-theme'),
    ));

    // Footer Copyright Text
    $wp_customize->add_setting('ukm_footer_text', array(
        'default'           => '© ' . date('Y') . ' Toko UKM Sembako Bahri. Seluruh hak cipta dilindungi.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_footer_text', array(
        'label'    => __('Footer Copyright Text', 'ukm-toko-theme'),
        'section'  => 'ukm_footer_section',
        'type'     => 'text',
    ));

    // Store Physical Address
    $wp_customize->add_setting('ukm_store_address', array(
        'default'           => 'Jl. Merdeka No. 45, Sentra UKM Kota Bandung',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_store_address', array(
        'label'    => __('Alamat Kontak Toko', 'ukm-toko-theme'),
        'section'  => 'ukm_footer_section',
        'type'     => 'textarea',
    ));

    // Facebook
    $wp_customize->add_setting('ukm_social_facebook', array(
        'default'           => 'https://facebook.com/tokobahri',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_social_facebook', array(
        'label'    => __('Facebook Link', 'ukm-toko-theme'),
        'section'  => 'ukm_footer_section',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('ukm_social_instagram', array(
        'default'           => 'https://instagram.com/tokobahri',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_social_instagram', array(
        'label'    => __('Instagram Link', 'ukm-toko-theme'),
        'section'  => 'ukm_footer_section',
        'type'     => 'url',
    ));

    // TikTok
    $wp_customize->add_setting('ukm_social_tiktok', array(
        'default'           => 'https://tiktok.com/@tokobahri',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('ukm_social_tiktok', array(
        'label'    => __('TikTok Link', 'ukm-toko-theme'),
        'section'  => 'ukm_footer_section',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'ukm_toko_customize_register');

/**
 * Output Dynamic CSS from Customizer in <head>
 */
function ukm_toko_customizer_dynamic_css() {
    $primary    = get_theme_mod('ukm_color_primary', '#09090b');
    $secondary  = get_theme_mod('ukm_color_secondary', '#10b981');
    $background = get_theme_mod('ukm_color_background', '#f8fafc');
    $text       = get_theme_mod('ukm_color_text', '#1e293b');
    $link       = get_theme_mod('ukm_color_link', '#059669');
    $heading_f  = get_theme_mod('ukm_font_heading', 'Plus Jakarta Sans');
    $body_f     = get_theme_mod('ukm_font_body', 'Plus Jakarta Sans');
    $font_size  = get_theme_mod('ukm_font_size_base', 16);

    echo "<style id='ukm-customizer-live-css'>\n";
    echo ":root {\n";
    echo "  --ukm-primary: " . esc_attr($primary) . ";\n";
    echo "  --ukm-secondary: " . esc_attr($secondary) . ";\n";
    echo "  --ukm-bg: " . esc_attr($background) . ";\n";
    echo "  --ukm-text: " . esc_attr($text) . ";\n";
    echo "  --ukm-link: " . esc_attr($link) . ";\n";
    echo "  --ukm-font-heading: '" . esc_attr($heading_f) . "', sans-serif;\n";
    echo "  --ukm-font-body: '" . esc_attr($body_f) . "', sans-serif;\n";
    echo "  --ukm-font-size: " . intval($font_size) . "px;\n";
    echo "}\n";
    echo "body { font-size: var(--ukm-font-size); color: var(--ukm-text); background-color: var(--ukm-bg); font-family: var(--ukm-font-body); }\n";
    echo "h1, h2, h3, h4, h5, h6 { font-family: var(--ukm-font-heading); }\n";
    echo "a { color: var(--ukm-link); }\n";
    echo "</style>\n";
}
add_action('wp_head', 'ukm_toko_customizer_dynamic_css', 15);
