<?php
/**
 * Sidebar Template — Toko Berkah
 *
 * @package UKM_Toko_Theme
 */

if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
    return;
}
?>

<aside id="sidebar-primary" class="sidebar-area" aria-label="<?php esc_attr_e( 'Sidebar Toko', 'ukm-toko-theme' ); ?>">
    <?php dynamic_sidebar( 'shop-sidebar' ); ?>
</aside>
