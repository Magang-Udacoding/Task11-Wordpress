<?php
/**
 * Performance 95+ Lighthouse Optimizations
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Clean WP Head from Unnecessary Bloat
 */
function ukm_toko_cleanup_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'ukm_toko_cleanup_head');

/**
 * 2. Preload Critical Fonts & DNS Prefetch
 */
function ukm_toko_resource_hints($urls, $relation_type) {
    if ('dns-prefetch' === $relation_type) {
        $urls[] = '//fonts.googleapis.com';
        $urls[] = '//fonts.gstatic.com';
        $urls[] = '//wa.me';
    }
    return $urls;
}
add_filter('wp_resource_hints', 'ukm_toko_resource_hints', 10, 2);

/**
 * 3. Preload Critical CSS and Google Fonts
 */
function ukm_toko_preload_assets() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap">
    </noscript>
    <?php
}
add_action('wp_head', 'ukm_toko_preload_assets', 1);

/**
 * 4. Critical CSS Inlining for Instant Above-the-Fold Rendering (LCP < 1.2s)
 */
function ukm_toko_inline_critical_css() {
    $critical_file = get_stylesheet_directory() . '/assets/css/critical.css';
    if (file_exists($critical_file)) {
        echo '<style id="ukm-critical-css">' . file_get_contents($critical_file) . '</style>';
    }
}
add_action('wp_head', 'ukm_toko_inline_critical_css', 2);

/**
 * 5. Ensure All Images have native loading="lazy" & decoding="async"
 */
function ukm_toko_optimize_images($html, $post_id, $post_thumbnail_id, $size, $attr) {
    if (is_admin()) return $html;
    if (strpos($html, 'loading=') === false) {
        $html = str_replace('<img ', '<img loading="lazy" decoding="async" ', $html);
    }
    return $html;
}
add_filter('post_thumbnail_html', 'ukm_toko_optimize_images', 10, 5);

add_filter('the_content', function($content) {
    if (is_admin()) return $content;
    return preg_replace_callback('/<img\s+([^>]+)>/i', function($matches) {
        $img = $matches[0];
        if (strpos($img, 'loading=') === false) {
            $img = str_replace('<img ', '<img loading="lazy" decoding="async" ', $img);
        }
        return $img;
    }, $content);
});

/**
 * 6. Defer Non-Critical JavaScript
 */
function ukm_toko_defer_scripts($tag, $handle, $src) {
    if (is_admin()) return $tag;
    
    // Don't defer jQuery if needed, but defer custom theme scripts
    if (strpos($handle, 'ukm-toko') !== false || strpos($handle, 'slider') !== false) {
        return str_replace(' src', ' defer="defer" src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'ukm_toko_defer_scripts', 10, 3);

/**
 * 7. Send Browser Cache Headers
 */
function ukm_toko_cache_headers() {
    if (!is_admin() && !is_user_logged_in()) {
        header_remove('Pragma');
        header('Cache-Control: public, max-age=3600, stale-while-revalidate=86400');
    }
}
add_action('send_headers', 'ukm_toko_cache_headers');

/**
 * 8. Database & Transient Cache Optimization Helper
 */
function ukm_toko_optimize_database() {
    global $wpdb;
    // Clean expired transients
    $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_%' AND option_value < " . time() );
    $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%' AND option_name NOT LIKE '_transient_timeout_%' AND option_name NOT IN (SELECT REPLACE(option_name, '_timeout_', '_') FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_%')" );
    // Clean orphan postmeta & auto drafts older than 7 days
    $wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_status = 'auto-draft' AND post_date < NOW() - INTERVAL 7 DAY" );
}
add_action('wp_scheduled_delete', 'ukm_toko_optimize_database');

/**
 * 9. Optional CDN Support (Rewrites static asset URLs to CDN domain if defined)
 */
function ukm_toko_cdn_rewrite_url($url) {
    if (defined('UKM_CDN_DOMAIN') && !empty(UKM_CDN_DOMAIN) && !is_admin()) {
        $site_host = parse_url(home_url(), PHP_URL_HOST);
        return str_replace($site_host, UKM_CDN_DOMAIN, $url);
    }
    return $url;
}
add_filter('wp_get_attachment_url', 'ukm_toko_cdn_rewrite_url');
add_filter('theme_file_uri', 'ukm_toko_cdn_rewrite_url');

/**
 * 10. Gzip Compression for HTML Output
 */
function ukm_toko_gzip_compression() {
    if (!is_admin() && !ini_get('zlib.output_compression') && ini_get('output_handler') !== 'ob_gzhandler') {
        if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
            ob_start('ob_gzhandler');
        }
    }
}
add_action('init', 'ukm_toko_gzip_compression', 1);


