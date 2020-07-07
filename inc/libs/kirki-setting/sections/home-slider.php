<?php
/**
 * Thêm section home slider
 */
Kirki::add_section( 'home_slider', array(
    'title'          => esc_html__( 'Home Slider', 'eshop' ),
    'description'    => esc_html__( 'Thiết lập silder tại homepage.', 'eshop' ),
    'panel'          => 'eshop_customize',
    'priority'       => 160,
) );

/**
 * Danh sách các field trong sections home slider
 */
Kirki::add_field( 'eshop', [
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Slider Homepage', 'eshop' ),
    'section'     => 'home_slider',
    'priority'    => 10,
    'row_label' => [
        'type'  => 'field',
        'value' => esc_html__( 'Hình ảnh', 'eshop' ),
        'field' => 'text_title_slide',
    ],
    'settings'    => 'slide_homepage_repeat',
    'fields' => [
        'text_title_slide' => [
            'type' => 'text',
            'label' => esc_attr__( 'Title', 'eshop' ),
            'description' => esc_attr__('Hiển thị text dưới slide', 'eshop')
        ],
        'image_slider' => [
            'type'        => 'image',
            'label'       => esc_attr__( 'Hình ảnh', 'eshop' ),
            'description' => esc_attr__( '', 'eshop' ),
        ],
        'link_slide' => [
            'type' => 'link',
            'label' => esc_attr__( 'Link', 'eshop' ),
            'description' => esc_attr__('Liên kết muốn chuyển đến', 'eshop')
        ]

    ],
    'default'     => [
        [
//            'image_slider' => esc_attr__( 'Link Text Example', 'eshop' ),
        ],
    ],
    'choices' => [
        'limit' => 5
    ],
] );