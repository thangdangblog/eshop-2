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
function eshop_mobile_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}

add_filter('body_class', 'eshop_mobile_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function eshop_mobile_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'eshop_mobile_pingback_header');

if (!function_exists('woocommerce_template_loop_product_thumbnail_custom')) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail_custom()
    {
        echo "<div class='thumbnail-product'>";
        do_action('woocommerce_inner_thumbnail');
        echo woocommerce_get_product_thumbnail(); // WPCS: XSS ok.
        echo "</div>";
    }
}


if (!function_exists('search_by_variable')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_before_shop_loop', 'search_by_variable', 8);
    function search_by_variable()
    {
        wc_get_template('loop/searchby.php');
    }
endif;

if (!function_exists('sort_by')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_before_shop_loop', 'sort_by', 9);
    function sort_by()
    {
        wc_get_template('loop/sortby.php');
    }
endif;


if (!function_exists('show_category_child')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_after_main_content', 'show_category_child', 7);
    function show_category_child()
    {
        wc_get_template('loop/categories-child.php');
    }
endif;

if (!function_exists('show_header_single_product')) :
    /**
     * Display search by variable
     */
    add_action('eshop_header_single_product_summary', 'show_header_single_product', 5);
    function show_header_single_product()
    {
        wc_get_template('single-product/head-single.php');
    }
endif;

if (!function_exists('show_widget_after_product_single_product')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_single_product_summary', 'show_widget_after_product_single_product', 90);
    function show_widget_after_product_single_product()
    {
        wc_get_template('single-product/widget_after_product_meta.php');
    }
endif;

if (!function_exists('show_widget_right_product_single_product')) :
    /**
     * Display search by variable
     */
    add_action('eshop_right_single_product_summary', 'show_widget_right_product_single_product', 90);
    function show_widget_right_product_single_product()
    {
        wc_get_template('single-product/widget_right_product_meta_data.php');
    }
endif;


if (!function_exists('eshop_template_loop_product_title')) :
    /**
     * Display search by variable
     */
    add_action('woocommerce_shop_loop_item_title', 'eshop_template_loop_product_title', 90);
    function eshop_template_loop_product_title()
    {
        echo '<h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . substr_text(20,get_the_title()) . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

add_filter( 'comment_form_fields', 'eshop_comment_fields_custom' );
function eshop_comment_fields_custom( $fields ) {
    unset( $fields['url'] );
    return $fields;
}

add_filter( 'get_product_search_form' , 'eshp_custom_product_searchform' );

/**
 * Filter WooCommerce  Search Field
 *
 */
function eshp_custom_product_searchform( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
                        <div>
                                <label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
                                <input type="text" value="' . get_search_query() . '" name="s" id="search" placeholder="' . __( 'Tìm kiếm...', 'woocommerce' ) . '" />
                                <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
                                <input type="hidden" name="post_type" value="product" />
                                <i class="fas fa-search"></i>
                        </div>
                </form>';

    return $form;
}

function custom_mini_cart() {
?>
    <div class="filter-mini-cart"></div>
    <div class="cart-all-page">
        <div class="cart-all-page-inline"></div>
        <div class="count-cart">
            <?php echo WC()->cart->get_cart_contents_count(); ?>
        </div>
        <div class="circle"></div>
        <i class="fas fa-shopping-cart"></i>
        <div class="list-cart-product">
            <?php woocommerce_mini_cart(); ?>
        </div>
        <div class="footer-mini-cart"></div>
    </div>
<?php
//    woocommerce_mini_cart();
}
add_shortcode( 'custom-techno-mini-cart', 'custom_mini_cart' );