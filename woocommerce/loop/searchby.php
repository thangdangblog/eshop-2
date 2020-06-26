<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="search_by_variable">
    <div class="label search_by_variable_label">Tìm theo:</div>
    <div class="aside-item" data-id="#thuong-hieu">Thương hiệu
        <div class="list-item-search" id="thuong-hieu">
            <ul>
                <li class="item-search-variable"><div class="checkbox-item checked"></div>Apple</li>
                <li class="item-search-variable"><div class="checkbox-item"></div>Asus</li>
                <li class="item-search-variable"><div class="checkbox-item"></div>HP</li>
            </ul>
        </div>
    </div>
    <div class="aside-item" data-id="#gia-san-pham">Giá sản phẩm
        <div class="list-item-search" id="gia-san-pham">
            <ul>
                <li class="item-search-variable"> <div class="checkbox-item checked"></div> Dưới 100.000 VNĐ</li>
                <li class="item-search-variable"> <div class="checkbox-item"></div> Dưới 100.000 VNĐ</li>
                <li class="item-search-variable"> <div class="checkbox-item"></div> Dưới 100.000 VNĐ</li>
                <li class="item-search-variable"> <div class="checkbox-item"></div> Dưới 100.000 VNĐ</li>
                <li class="item-search-variable"> <div class="checkbox-item"></div> Dưới 100.000 VNĐ</li>
            </ul>
        </div>
    </div>
    <div class="aside-item">Loại</div>
    <div class="aside-item">Kích thước</div>
    <div class="aside-item">Màn hình</div>
    <div class="aside-item">Hệ điều hành</div>
</div>