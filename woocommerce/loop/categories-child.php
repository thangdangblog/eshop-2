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

$queried_object = get_queried_object();
$id_category_parent = $queried_object->term_id;
$child_categories = get_term_children($id_category_parent, 'product_cat');


?>

<div class="categoies-child">
    <?php foreach ($child_categories as $category_id): ?>
        <?php $category = get_term($category_id, 'product_cat'); ?>
        <?php echo "<a href='" . get_term_link($category) . "' >" . $category->name . "</a>" ?>
    <?php endforeach; ?>
</div>