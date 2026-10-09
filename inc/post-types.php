<?php
/**
 * Post Types Loader: Includes CPT Produk and CPT Klien
 *
 * @package UKM_Toko_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once get_stylesheet_directory() . '/inc/cpt-produk.php';
require_once get_stylesheet_directory() . '/inc/cpt-klien.php';

