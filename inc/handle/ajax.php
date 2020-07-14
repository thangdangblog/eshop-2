<?php
// Xử lý bộ lọc sản phẩm
add_action('wp_ajax_nopriv_filter_product','filter_ajax_handle');
add_action('wp_ajax_filter_product','filter_ajax_handle');

function filter_ajax_handle() {
    $data = $_POST['dataFilter'];
    $queryObject = $_POST['queryObject'];

    $brands =  isset($data['brand']) ?  $data['brand'] : [];
    $price =  isset($data['price']) ?  $data['price'] : [];
    $sortCheckedAction =  isset($data['sortCheckedAction']) ?  $data['sortCheckedAction'] : null;

    // Thêm query dựa vào điều kiện về sort
    if($sortCheckedAction){
        // Tạo query dựa vào action type
        switch ($sortCheckedAction){
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
        // Merge query
        $queryObject = array_merge($queryObject,$add_query);
    }

    // Thêm query dựa vào brand
    if(count($brands)){
        $queryObject['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'brand',
                'field' => 'id',
                'terms' => $brands,
                'include_children' => true,
                'operator' => 'IN'
            ),
        );
    }
    if(count($price)){
        $dataPriceFilter = array(
            'relation' => 'OR'
        );
        foreach($price as $one){
            $data = unserialize(str_replace("\\","",$one));
            $value = count($data) == 2 ? $value = $data[1] : [$data[1],$data[2]];
            $dataPriceFilter[] = [
                'key' => '_price',
                'value' => $value,
                'type' => 'numeric',
                'compare' => $data[0]
            ];
        }
        $queryObject['meta_query'] = $dataPriceFilter;
    }

    $the_query = new WP_Query( $queryObject );

    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
            wc_get_template_part( 'content', 'product-ajax' );
        endwhile;
    else:
        echo "<div class='notfound'>Không tìm thấy sản phẩm nào ứng với điều kiện của bộ lọc.</div>";
    endif;

    wp_reset_postdata();


    exit();
}

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

    var_dump($the_query->have_posts());

    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
            wc_get_template_part( 'content', 'product-ajax' );
        endwhile;
    else:
        echo "<div class='notfound'>Không có sản phẩm nào trong danh mục này.</div>";
    endif;

    wp_reset_postdata();
    exit();
}

?>