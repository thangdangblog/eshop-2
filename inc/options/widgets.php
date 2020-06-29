<?php

/**
 * Register the new location widget.
 * Name: After Product meta
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_after_product_meta' );
function e_shop_register_widget_after_product_meta() {
    register_sidebar( array(
        'name'          => 'After Product',
        'id'            => 'after_product_meta',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="after_product_meta"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: After Product meta
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_right_product_meta' );
function e_shop_register_widget_right_product_meta() {
    register_sidebar( array(
        'name'          => 'Right Product',
        'id'            => 'right_product_meta',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="right_product_meta"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 1
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_1' );
function e_shop_register_widget_footer_1() {
    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_1"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 2
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_2' );
function e_shop_register_widget_footer_2() {
    register_sidebar( array(
        'name'          => 'Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_2"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 3
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_3' );
function e_shop_register_widget_footer_3() {
    register_sidebar( array(
        'name'          => 'Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_3"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 4
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_4' );
function e_shop_register_widget_footer_4() {
    register_sidebar( array(
        'name'          => 'Footer 4',
        'id'            => 'footer_4',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_4"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 5
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_5' );
function e_shop_register_widget_footer_5() {
    register_sidebar( array(
        'name'          => 'Footer 5',
        'id'            => 'footer_5',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_5"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 6
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_6' );
function e_shop_register_widget_footer_6() {
    register_sidebar( array(
        'name'          => 'Footer 6',
        'id'            => 'footer_6',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_6"><span>',
        'after_title'   => '</span></h3>',
    ) );
}

/**
 * Register the new location widget.
 * Name: Footer 7
 * @see 'widgets_init'
 */
add_action( 'widgets_init', 'e_shop_register_widget_footer_7' );
function e_shop_register_widget_footer_7() {
    register_sidebar( array(
        'name'          => 'Footer 7',
        'id'            => 'footer_7',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer_7"><span>',
        'after_title'   => '</span></h3>',
    ) );
}