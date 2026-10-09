<?php
/**
 * Custom WooCommerce Cart Template
 *
 * @package UKM_Toko_Theme
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="site-container custom-woo-cart-container" style="padding-top: 36px; padding-bottom: 60px;">
    <h1 class="cart-heading-title" style="font-family: var(--font-heading, sans-serif); font-size: 32px; font-weight: 800; margin-bottom: 24px; color: #0f172a;">
        <?php esc_html_e( 'Keranjang Belanja', 'ukm-toko-theme' ); ?>
    </h1>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0" style="width: 100%; border-collapse: separate; border-spacing: 0 12px;">
            <thead>
                <tr style="background: #f8fafc; text-align: left;">
                    <th class="product-remove" style="padding: 14px 18px; border-radius: 12px 0 0 12px;">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name" style="padding: 14px 18px;"><?php esc_html_e( 'Produk', 'woocommerce' ); ?></th>
                    <th class="product-price" style="padding: 14px 18px;"><?php esc_html_e( 'Harga', 'woocommerce' ); ?></th>
                    <th class="product-quantity" style="padding: 14px 18px;"><?php esc_html_e( 'Jumlah', 'woocommerce' ); ?></th>
                    <th class="product-subtotal" style="padding: 14px 18px; border-radius: 0 12px 12px 0;"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>" style="background: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border-radius: 12px;">

                            <td class="product-remove" style="padding: 16px; border-radius: 12px 0 0 12px;">
                                <?php
                                    echo apply_filters(
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s" style="color: #ef4444; font-size: 20px; font-weight: bold; text-decoration: none;">&times;</a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $_product->get_name() ) ) ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ),
                                        $cart_item_key
                                    );
                                ?>
                            </td>

                            <td class="product-thumbnail" style="padding: 16px;">
                            <?php
                            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                            if ( ! $product_permalink ) {
                                echo $thumbnail;
                            } else {
                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                            }
                            ?>
                            </td>

                            <td class="product-name" data-title="<?php esc_attr_e( 'Produk', 'woocommerce' ); ?>" style="padding: 16px; font-weight: 600;">
                            <?php
                            if ( ! $product_permalink ) {
                                echo wp_kses_post( $_product->get_name() . '&nbsp;' );
                            } else {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" style="color: #0f172a; text-decoration: none;">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                            }
                            ?>
                            </td>

                            <td class="product-price" data-title="<?php esc_attr_e( 'Harga', 'woocommerce' ); ?>" style="padding: 16px; color: #0a634a; font-weight: 700;">
                                <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
                            </td>

                            <td class="product-quantity" data-title="<?php esc_attr_e( 'Jumlah', 'woocommerce' ); ?>" style="padding: 16px;">
                            <?php
                            if ( $_product->is_sold_individually() ) {
                                $min_quantity = 1;
                                $max_quantity = 1;
                            } else {
                                $min_quantity = 0;
                                $max_quantity = $_product->get_max_purchase_quantity();
                            }

                            $product_quantity = woocommerce_quantity_input(
                                array(
                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                    'input_value'  => $cart_item['quantity'],
                                    'max_value'    => $max_quantity,
                                    'min_value'    => $min_quantity,
                                    'product_name' => $_product->get_name(),
                                ),
                                $_product,
                                false
                            );

                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                            ?>
                            </td>

                            <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>" style="padding: 16px; font-weight: 800; color: #0f172a; border-radius: 0 12px 12px 0;">
                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

                <?php do_action( 'woocommerce_cart_contents' ); ?>

                <tr>
                    <td colspan="6" class="actions" style="padding: 20px 0;">
                        <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Perbarui Keranjang', 'ukm-toko-theme' ); ?>" style="background: #f1f5f9; color: #0f172a; border: 1px solid #cbd5e1; border-radius: 9999px; padding: 10px 24px; font-weight: 600; cursor: pointer;">
                            <?php esc_html_e( 'Perbarui Keranjang', 'ukm-toko-theme' ); ?>
                        </button>
                        <?php do_action( 'woocommerce_cart_actions' ); ?>
                        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    </td>
                </tr>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </tbody>
        </table>
        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>

    <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

    <div class="cart-collaterals" style="margin-top: 36px;">
        <?php
            /**
             * Cart collaterals hook.
             */
            do_action( 'woocommerce_cart_collaterals' );
        ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
