<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

?>

<div class="header-single">
    <div class="title-single"><h1><?php echo get_the_title($product->ID) ?></h1></div>
    <div class="more-info-header">
        <div class="product-code">Mã sản phẩm: <strong><?php echo $product->get_sku() == '' ? 'Đang cập nhật' : $product->get_sku() ?></strong></div>
        <?php
        if ( $rating_count > 0 ) : ?>

            <div class="woocommerce-product-rating">
                <?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
            <?php if ( comments_open() ) : ?>
                <?php //phpcs:disable ?>
                <a href="#reviews" class="woocommerce-review-link" rel="nofollow">Đánh giá sản phẩm</a>
                <?php // phpcs:enable ?>
            <?php endif ?>
        </div>

        <?php endif; ?>
        <div class="clear-fix"></div>
    </div>
</div>
