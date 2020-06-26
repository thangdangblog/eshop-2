<?php
function mycustom_woocommerce_price_html($price, $product) {
    return preg_replace('@(<del>.*?</del>).*?(<ins>.*?</ins>)@misx', '$2 $1', $price);
}

add_filter('woocommerce_get_price_html', 'mycustom_woocommerce_price_html', 100, 2);


add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 5; // 5 products per row
    }
}

//Remove add to cart
function remove_hook_custom(){
    if(is_product_category()){
        remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

        remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
        remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
    }
}
add_action('wp','remove_hook_custom');

function add_hook_custom(){
    if(is_product_category()){
        add_action('woocommerce_inner_thumbnail','woocommerce_show_product_loop_sale_flash',10);
        add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail_custom',10);
    }
}
add_action('wp','add_hook_custom');

?>