<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

do_action('eshop_before_container_wrap');
?>

<div class="container">
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
        <?php do_action('eshop_header_single_product_summary'); ?>
        <div class="row">
            <div class="col-lg-6 col-xl-5">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        /**
                         * Hook: woocommerce_single_product_summary.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10 -removed
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         * @hooked WC_Structured_Data::generate_product_data() - 60
                         */
                        do_action('woocommerce_single_product_summary');
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-none d-xl-block">
                <?php do_action('eshop_right_single_product_summary'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">

                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20 - removed
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>
            </div>
            <div class="col-md-3">
                <h3 class="title-more-phone">Thông số kỹ thuật</h3>
                <div class="content-more-phone">
                    <ul>

                        <?php if(get_post_meta($product->get_id(),'_manhinh',true)): ?>
                        <li><span class="label">Màn hình:</span> <span><?php echo get_post_meta($product->get_id(),'_manhinh',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_camera_truoc',true)): ?>
                        <li><span class="label">Camera trước:</span> <span><?php echo get_post_meta($product->get_id(),'_camera_truoc',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_camera_sau',true)): ?>
                        <li><span class="label">Camera sau:</span> <span><?php echo get_post_meta($product->get_id(),'_camera_sau',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_phone_ram',true)): ?>
                        <li><span class="label">Ram:</span> <span><?php echo get_post_meta($product->get_id(),'_phone_ram',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_bo_nho_trong',true)): ?>
                        <li><span class="label">Bộ nhớ trong:</span> <span><?php echo get_post_meta($product->get_id(),'_bo_nho_trong',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_phone_gpu',true)): ?>
                        <li><span class="label">GPU:</span> <span><?php echo get_post_meta($product->get_id(),'_phone_gpu',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_phone_battery',true)): ?>
                        <li><span class="label">Dung lượng pin:</span> <span><?php echo get_post_meta($product->get_id(),'_phone_battery',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_phone_os',true)): ?>
                        <li><span class="label">Hệ điều hành:</span> <span><?php echo get_post_meta($product->get_id(),'_phone_os',true) ?></span></li>
                        <?php endif; ?>
                        <?php if(get_post_meta($product->get_id(),'_phone_sim',true)): ?>
                        <li><span class="label">Thẻ SIM:</span> <span><?php echo get_post_meta($product->get_id(),'_phone_sim',true) ?></span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <?php do_action('eshop_after_single_product_summary'); ?>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>
