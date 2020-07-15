<?php
function eshop_menu_custom_field($item_id, $item) {

    $isParent = $item->menu_item_parent == 0;
    if($isParent){
        wp_nonce_field( 'custom_menu_meta_nonce', '_custom_menu_meta_nonce_name_'.$item_id );
        $custom_menu_meta = get_post_meta( $item_id, '_eshop_custom_menu_meta', true );
        $isChecked = $custom_menu_meta == 'on' ? 'checked' : '';
        echo "Bật chế độ cho menu:<br />";
        echo "<input name='eshop_custom_menu_meta[$item_id]' type='checkbox' ".$isChecked." /> Mega Menu";
    }
}
add_action( 'wp_nav_menu_item_custom_fields', 'eshop_menu_custom_field',10,2 );

function eshop_menu_custom_field_update($menu_id, $item_id){
    if(!isset($_POST['_custom_menu_meta_nonce_name_'.$item_id]) || !wp_verify_nonce( $_POST['_custom_menu_meta_nonce_name_'.$item_id], 'custom_menu_meta_nonce' )){
        return $menu_id;
    }

    if(isset($_POST['eshop_custom_menu_meta'][$item_id])){
        $data = $_POST['eshop_custom_menu_meta'][$item_id];
        update_post_meta( $item_id, '_eshop_custom_menu_meta', $data );
    }else {
        delete_post_meta( $item_id, '_eshop_custom_menu_meta' );
    }
}
add_action( 'wp_update_nav_menu_item', 'eshop_menu_custom_field_update', 10, 2 );



function add_menu_parent_class( $items ) {
    $parents = array();
    foreach ( $items as $item ) {
        //Check if the item is a parent item
        $custom_menu_meta = get_post_meta( $item->ID, '_eshop_custom_menu_meta', true );
        if ( $custom_menu_meta == 'on' ) {
            $parents[] = $item->ID;
        }
    }

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            //Add "menu-parent-item" class to parents
            $item->classes[] = 'eshop-mega-menu';
        }
    }

    return $items;
}
//add_menu_parent_class to menu
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );

?>