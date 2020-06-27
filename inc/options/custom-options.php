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

    if(is_singular()){
        remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
        remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
        remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
        remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
    }

    if(is_product_category()){
        remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
        remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
        remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
        remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
        remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
        remove_action('woocommerce_archive_description','woocommerce_product_archive_description',10);
        remove_action('woocommerce_archive_description','woocommerce_taxonomy_archive_description',10);
    }
    remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
}
add_action('wp','remove_hook_custom');

function add_hook_custom(){
    if(is_product_category()){
        add_action('woocommerce_inner_thumbnail','woocommerce_show_product_loop_sale_flash',10);
        add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail_custom',10);
        add_action('woocommerce_after_main_content','woocommerce_product_archive_description',8);
        add_action('woocommerce_after_main_content','woocommerce_taxonomy_archive_description',8);
    }
    add_action('eshop_before_container_wrap','woocommerce_breadcrumb',10);
}
add_action('wp','add_hook_custom');


add_filter( 'woocommerce_breadcrumb_defaults', 'eshop_woocommerce_breadcrumbs' );
function eshop_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' <i class="fa fa-angle-right"></i> ',
        'wrap_before' => '<div class="wrap-breadcrumb"><div class="container"><nav class="woocommerce-breadcrumb">',
        'wrap_after'  => '</nav></div></div>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}



?>