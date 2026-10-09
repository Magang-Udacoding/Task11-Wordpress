<?php
/**
 * Security Hardening & Protection
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Security HTTP Headers
 */
function ukm_toko_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
        header('Permissions-Policy: geolocation=(), camera=(), microphone=()');
    }
}
add_action('send_headers', 'ukm_toko_security_headers');

/**
 * 2. Disable XML-RPC (Blocks Brute Force and DDoS Amplification)
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * 3. Disable REST API User Enumeration (wp-json/wp/v2/users)
 */
add_filter('rest_endpoints', function($endpoints) {
    if (!is_user_logged_in() && isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (!is_user_logged_in() && isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});

/**
 * 4. Remove WP Version Info from Scripts & Styles
 */
function ukm_toko_remove_wp_version_strings($src) {
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'ukm_toko_remove_wp_version_strings');
add_filter('style_loader_src', 'ukm_toko_remove_wp_version_strings');

/**
 * 5. Obscure Login Errors (Prevent username enumeration during brute-force)
 */
add_filter('login_errors', function() {
    return __('Login gagal: Kombinasi username atau kata sandi tidak cocok.', 'ukm-toko-theme');
});

/**
 * 6. Disable Author Scans (?author=1 redirect)
 */
function ukm_toko_block_author_scans() {
    if (!is_admin() && isset($_REQUEST['author'])) {
        wp_redirect(home_url(), 301);
        exit;
    }
}
add_action('template_redirect', 'ukm_toko_block_author_scans');

