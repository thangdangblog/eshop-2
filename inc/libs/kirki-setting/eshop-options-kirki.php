<?php

class EshopOption
{

    /**
     * Lấy dữ liệu slider từ panel
     */
    function getDataHomeSlide()
    {
        $settingsSlide = get_theme_mod('slide_homepage_repeat');

        if ($settingsSlide) {
            $data = [];
            foreach ($settingsSlide as $setting) {
                $data[] = [
                    'url-image' => wp_get_attachment_image_src($setting['image_slider'], 'full')[0],
                    'url' => $setting['link_slide'],
                    'title' => $setting['text_title_slide']
                ];
            }
        }

        return $data;
    }

    /**
     * Lấy dữ liệu banner từ panel
     */
    function getDataBanner()
    {
        $image = get_theme_mod('image_banner_header_url');
        if (empty($image)) {
            return "https://bizweb.dktcdn.net/100/348/133/themes/709285/assets/banner_under_slider.png?1586914632171";
        }
        return $image;
    }

    /**
     * Kiểm tra trạng thái của location1
     */
    function isActiveProductLocationOne()
    {
        return get_theme_mod('toggle_setting_product_location_1', true);
    }

    /**
     * Lấy dữ liệu cài đặt của khu vực 1
     */
    function getDataProductLocationOne(){
        $title = Kirki::get_option('text_setting_product_location_1');
        $categories = Kirki::get_option('categories_location_1');
        return [
            'title' => $title = !empty($title) ? $title : "Eshop Title",
            'categories' => $categories
        ];
    }

    /**
     * Kiểm tra trạng thái của location2
     */
    function isActiveProductLocationTwo()
    {
        return get_theme_mod('toggle_setting_product_location_2', true);
    }

    /**
     * Lấy dữ liệu cài đặt của khu vực 2
     */
    function getDataProductLocationTwo(){
        $title = Kirki::get_option('text_setting_product_location_2');
        $categories = Kirki::get_option('categories_location_2');
        return [
            'title' => $title = !empty($title) ? $title : "Eshop Title",
            'categories' => $categories
        ];
    }

    /**
     * Kiểm tra trạng thái của location3
     */
    function isActiveProductLocationThree()
    {
        return get_theme_mod('toggle_setting_product_location_3', true);
    }

    /**
     * Lấy dữ liệu cài đặt của khu vực 3
     */
    function getDataProductLocationThree(){

        $title = Kirki::get_option('text_setting_product_location_3','Eshop Title');
        $categories = Kirki::get_option('categories_location_3');
        return [
            'title' => $title = !empty($title) ? $title : "Eshop Title",
            'categories' => $categories
        ];
    }

}