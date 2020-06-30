<?php
function eshop_metabox_option()
{
    add_meta_box("product-moreinformation", "Thuộc tính sản phẩm", "eshop_product_infomation_output", "product");
}

add_action('add_meta_boxes', 'eshop_metabox_option');


//show information field in product
function eshop_product_infomation_output($product){
    $manhinh =  get_post_meta($product->ID,'_manhinh',true);
    $phone_ram =  get_post_meta($product->ID,'_phone_ram',true);
    $bo_nho_trong =  get_post_meta($product->ID,'_bo_nho_trong',true);
    $gpu =  get_post_meta($product->ID,'_phone_gpu',true);
    $phone_battery =  get_post_meta($product->ID,'_phone_battery',true);
    $camera_truoc =  get_post_meta($product->ID,'_camera_truoc',true);
    $camera_sau =  get_post_meta($product->ID,'_camera_sau',true);
    $phone_os =  get_post_meta($product->ID,'_phone_os',true);
    $phone_sim =  get_post_meta($product->ID,'_phone_sim',true);
    ?>
        <div class="box-information" style="overflow: hidden">
            <div class="left" style="float:left;width: 50%">
                <label style="min-width: 100px;display: inline-block;" for="manhinh">Màn hình:</label>
                <input type="text" id="manhinh" name="manhinh" value="<?php esc_attr_e($manhinh) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="phone_ram">Ram:</label>
                <input type="text" id="phone_ram" name="phone_ram" value="<?php esc_attr_e($phone_ram) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="bo_nho_trong">Bộ nhớ trong:</label>
                <input type="text" id="bo_nho_trong" name="bo_nho_trong" value="<?php esc_attr_e($bo_nho_trong) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="phone_gpu">GPU:</label>
                <input type="text" id="phone_gpu" name="phone_gpu" value="<?php esc_attr_e($gpu) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="phone_battery">Dung lượng pin:</label>
                <input type="text" id="phone_battery" name="phone_battery" value="<?php esc_attr_e($phone_battery) ?>">
                <br />
                <br />
            </div>
            <div class="right">
                <label style="min-width: 100px;display: inline-block;" for="camera_truoc">Carmera trước:</label>
                <input type="text" id="camera_truoc" name="camera_truoc" value="<?php esc_attr_e($camera_truoc) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="camera_sau">Camera sau:</label>
                <input type="text" id="camera_sau" name="camera_sau" value="<?php esc_attr_e($camera_sau) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="phone_os">Hệ điều hành:</label>
                <input type="text" id="phone_os" name="phone_os" value="<?php esc_attr_e($phone_os) ?>">
                <br />
                <br />
                <label style="min-width: 100px;display: inline-block;" for="phone_os">Thẻ sim:</label>
                <input type="text" id="phone_sim" name="phone_sim" value="<?php esc_attr_e($phone_sim) ?>">
            </div>
        </div>
    <?php
}


//Save metabox
function eshop_product_infomation_save($product_id){

    save_metabox_to_product($product_id,'_manhinh',$_POST['manhinh']);
    save_metabox_to_product($product_id,'_phone_ram',$_POST['phone_ram']);
    save_metabox_to_product($product_id,'_bo_nho_trong',$_POST['bo_nho_trong']);
    save_metabox_to_product($product_id,'_phone_gpu',$_POST['phone_gpu']);
    save_metabox_to_product($product_id,'_phone_battery',$_POST['phone_battery']);
    save_metabox_to_product($product_id,'_camera_truoc',$_POST['camera_truoc']);
    save_metabox_to_product($product_id,'_camera_sau',$_POST['camera_sau']);
    save_metabox_to_product($product_id,'_phone_os',$_POST['phone_os']);
    save_metabox_to_product($product_id,'_phone_sim',$_POST['phone_sim']);

}
add_action( 'save_post', 'eshop_product_infomation_save' );


function save_metabox_to_product($product_id,$key,$value){
    $data = sanitize_text_field($value);
    update_post_meta( $product_id, $key, $data );
}

?>