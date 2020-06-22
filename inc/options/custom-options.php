<?php
function mycustom_woocommerce_price_html($price, $product) {
    return preg_replace('@(<del>.*?</del>).*?(<ins>.*?</ins>)@misx', '$2 $1', $price);
}

add_filter('woocommerce_get_price_html', 'mycustom_woocommerce_price_html', 100, 2);
?>