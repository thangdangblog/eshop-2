<?php

/**
 * Panel child - nested panel
 */

Kirki::add_panel( 'eshop_customize_product', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Product Location', 'eshop' ),
    'description' => esc_html__( 'Setting for eshop theme', 'eshop' ),
    'panel' => 'eshop_customize'
) );


/**
 * Thêm section banner
 */
Kirki::add_section( 'product_home_1', array(
    'title'          => esc_html__( 'Product Home Location 1', 'eshop' ),
    'description'    => esc_html__( 'Thiết lập Product Home Location 1 tại homepage.', 'eshop' ),
    'panel'          => 'eshop_customize_product',
    'priority'       => 160,
) );

Kirki::add_section( 'product_home_2', array(
    'title'          => esc_html__( 'Product Home Location 2', 'eshop' ),
    'description'    => esc_html__( 'Thiết lập Product Home Location 1 tại homepage.', 'eshop' ),
    'panel'          => 'eshop_customize_product',
    'priority'       => 160,
) );

Kirki::add_section( 'product_home_3', array(
    'title'          => esc_html__( 'Product Home Location 3', 'eshop' ),
    'description'    => esc_html__( 'Thiết lập Product Home Location 1 tại homepage.', 'eshop' ),
    'panel'          => 'eshop_customize_product',
    'priority'       => 160,
) );

/**
 * Danh sách các field trong sections Banner Header
 */

//Khu vực 1

Kirki::add_field( 'eshop', [
    'type'     => 'text',
    'settings' => 'text_setting_product_location_1',
    'label'    => esc_html__( 'Title', 'eshop' ),
    'section'  => 'product_home_1',
    'default'  => esc_html__( 'Điện thoại', 'eshop' ),
    'priority' => 10,
] );

Kirki::add_field( 'eshop', [
    'type'        => 'toggle',
    'settings'    => 'toggle_setting_product_location_1',
    'label'       => esc_html__( 'Trạng thái', 'eshop' ),
    'section'     => 'product_home_1',
    'default'     => '1',
    'priority'    => 10,
] );

add_action('init',function(){
    Kirki::add_field( 'eshop', array(
            'type'        => 'select',
            'settings'    => 'categories_location_1',
            'label'       => esc_html__( 'Chọn chuyên mục muốn hiển thị', 'eshop' ),
            'section'     => 'product_home_1',
            'default'     => 'option-1',
            'priority'    => 10,
            'multiple'    => 999,
            'choices'     => Kirki_Helper::get_terms( 'product_cat')
        )
    );
});


//Khu vực 2

Kirki::add_field( 'eshop', [
    'type'     => 'text',
    'settings' => 'toggle_setting_product_location_2',
    'label'    => esc_html__( 'Title', 'eshop' ),
    'section'  => 'product_home_1',
    'default'  => esc_html__( 'Điện thoại', 'eshop' ),
    'priority' => 10,
] );

Kirki::add_field( 'eshop', [
    'type'        => 'toggle',
    'settings'    => 'toggle_setting_product_location_2',
    'label'       => esc_html__( 'Trạng thái', 'eshop' ),
    'section'     => 'product_home_2',
    'default'     => '1',
    'priority'    => 10,
] );

add_action('init',function(){
    Kirki::add_field( 'eshop', array(
            'type'        => 'select',
            'settings'    => 'categories_location_2',
            'label'       => esc_html__( 'Chọn chuyên mục muốn hiển thị', 'eshop' ),
            'section'     => 'product_home_2',
            'default'     => 'option-1',
            'priority'    => 10,
            'multiple'    => 999,
            'choices'     => Kirki_Helper::get_terms( 'product_cat')
        )
    );
});

//Khu vực 3

Kirki::add_field( 'eshop', [
    'type'     => 'text',
    'settings' => 'toggle_setting_product_location_3',
    'label'    => esc_html__( 'Title', 'eshop' ),
    'section'  => 'product_home_1',
    'default'  => esc_html__( 'Điện thoại', 'eshop' ),
    'priority' => 10,
] );

Kirki::add_field( 'eshop', [
    'type'        => 'toggle',
    'settings'    => 'toggle_setting_product_location_3',
    'label'       => esc_html__( 'Trạng thái', 'eshop' ),
    'section'     => 'product_home_3',
    'default'     => '1',
    'priority'    => 10,
] );

add_action('init',function(){
    Kirki::add_field( 'eshop', array(
            'type'        => 'select',
            'settings'    => 'categories_location_3',
            'label'       => esc_html__( 'Chọn chuyên mục muốn hiển thị', 'eshop' ),
            'section'     => 'product_home_3',
            'default'     => 'option-1',
            'priority'    => 10,
            'multiple'    => 999,
            'choices'     => Kirki_Helper::get_terms( 'product_cat')
        )
    );
});