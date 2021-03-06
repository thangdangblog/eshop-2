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

<div class="sort_by">
    <div class="label sort_label">Xếp theo:</div>
    <ul>
        <li class="filter-action" data-action="sortASC"><div class="radio-check"><div class="round"></div></div>Tên A-Z</li>
        <li class="filter-action" data-action="sortDESC"><div class="radio-check"><div class="round"></div></div>Tên Z-A</li>
        <li class="filter-action" data-action="sortNew"><div class="radio-check"><div class="round"></div></div>Hàng mới</li>
        <li class="filter-action" data-action="sortlowtohight"><div class="radio-check"><div class="round"></div></div>Giá từ thấp đến cao</li>
        <li class="filter-action" data-action="sorthighttolow"><div class="radio-check"><div class="round"></div></div>Giá từ cao xuống thấp</li>
    </ul>
</div>