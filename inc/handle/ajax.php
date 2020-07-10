<?php
// Xử lý bộ lọc sản phẩm
add_action( 'wp_ajax_nopriv_filter_sort_ajax', 'filter_sort_ajax' );
add_action( 'wp_ajax_filter_sort_ajax', 'filter_sort_ajax' );
function filter_sort_ajax(){
    $action_type = $_POST['actionType'];
    $query = $_POST['queryObject'];

    // Tạo query dựa vào action type
    switch ($action_type){
        case 'sortDESC':
            $add_query = [
                'post_type' => 'product',
                'orderby' => 'title',
                'order' => 'desc'
            ];
            break;
        case 'sortASC':
            $add_query = [
                'post_type' => 'product',
                'orderby' => 'title',
                'order' => 'asc'
            ];
            break;
        case 'sortNew':
            $add_query = [
                'post_type' => 'product',
                'orderby' => 'date',
            ];
            break;
        case 'sortlowtohight':
            $add_query = [
                'post_type' => 'product',
                'orderby' => 'meta_value_num',
                'meta_key' => '_price',
                'order' => 'asc'
            ];
            break;
        case 'sorthighttolow':
            $add_query = [
                'post_type' => 'product',
                'orderby' => 'meta_value_num',
                'meta_key' => '_price',
                'order' => 'desc'
            ];
            break;
    }

    $all_query = array_merge($query,$add_query);
    $the_query = new WP_Query( $all_query );

    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
            wc_get_template_part( 'content', 'product-ajax' );
        endwhile;
    endif;

    wp_reset_postdata();
    exit();
}

?>