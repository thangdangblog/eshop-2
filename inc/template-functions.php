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
