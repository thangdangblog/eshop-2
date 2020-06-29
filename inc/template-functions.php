<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package eshop_mobile
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eshop_mobile_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'eshop_mobile_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function eshop_mobile_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'eshop_mobile_pingback_header' );

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail_custom' ) ) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail_custom() {
        echo "<div class='thumbnail-product'>";
        do_action( 'woocommerce_inner_thumbnail' );
        echo woocommerce_get_product_thumbnail(); // WPCS: XSS ok.
        echo "</div>";
    }
}


if (!function_exists('search_by_variable')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_before_shop_loop','search_by_variable',8);
    function search_by_variable()
    {
        wc_get_template( 'loop/searchby.php' );
    }
endif;

if (!function_exists('sort_by')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_before_shop_loop','sort_by',9);
    function sort_by()
    {
        wc_get_template( 'loop/sortby.php' );
    }
endif;


if (!function_exists('show_category_child')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_after_main_content','show_category_child',7);
    function show_category_child()
    {
        wc_get_template( 'loop/categories-child.php' );
    }
endif;

if (!function_exists('show_header_single_product')) :
    /**
     * Display search by variable
     */
    add_action('eshop_header_single_product_summary','show_header_single_product',5);
    function show_header_single_product()
    {
        wc_get_template( 'single-product/head-single.php' );
    }
endif;

if (!function_exists('show_widget_after_product_single_product')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_single_product_summary','show_widget_after_product_single_product',90);
    function show_widget_after_product_single_product()
    {
        wc_get_template( 'single-product/widget_after_product_meta.php' );
    }
endif;

if (!function_exists('show_widget_right_product_single_product')) :
    /**
     * Display search by variable
     */
    add_action('eshop_right_single_product_summary','show_widget_right_product_single_product',90);
    function show_widget_right_product_single_product()
    {
        wc_get_template( 'single-product/widget_right_product_meta_data.php' );
    }
endif;