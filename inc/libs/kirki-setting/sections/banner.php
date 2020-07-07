<?php
/**
 * Thêm section banner
 */
Kirki::add_section( 'banner_home', array(
    'title'          => esc_html__( 'Banner Header', 'eshop' ),
    'description'    => esc_html__( 'Thiết lập banner tại homepage.', 'eshop' ),
    'panel'          => 'eshop_customize',
    'priority'       => 160,
) );

/**
 * Danh sách các field trong sections Banner Header
 */

Kirki::add_field( 'eshop', [
    'type'        => 'image',
    'settings'    => 'image_banner_header_url',
    'label'       => esc_html__( 'Banner Header', 'eshop' ),
    'description' => esc_html__( 'Hình ảnh hiển thị banner tại HomePage Header.', 'eshop' ),
    'section'     => 'banner_home',
    'default'     => '',
] );