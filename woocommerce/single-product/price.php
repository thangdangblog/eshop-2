<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
    <?php if($product->is_on_sale()): ?>
        <span class="sale-price">
            <?php echo wc_price($product->get_sale_price()); ?>
        </span>
        <div class="regular-price"><span>Giá thị trường: </span> <span class="giathitruong"><?php echo wc_price($product->get_regular_price()); ?></span> <span class="price-save">Tiết kiệm: <span class=""><?php echo wc_price($product->get_regular_price() - $product->get_sale_price()) ?></span></span></div>
    <?php else: ?>
        <span class="regular-price-not-sale">
            <?php echo wc_price($product->get_regular_price()); ?>
        </span>
    <?php endif; ?>

</p>
