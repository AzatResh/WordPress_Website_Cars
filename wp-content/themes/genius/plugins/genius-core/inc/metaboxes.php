<?php

function gn_add_metabox(){
    
    add_meta_box("car-metabox", esc_html("Cars Settings", 'genius'), 'gn_cars_metabox', 'car', 'normal');

}
//add_action('add_meta_boxes', 'gn_add_metabox');

function gn_cars_metabox($post){

    $car_price = get_post_meta($post->ID, 'car_price', true);
    $car_engine = get_post_meta($post->ID, 'car_engine', true);

    wp_nonce_field('gn_random_string_id', '_carmetabox')

?>
    <p>
        <label for="car_price"><?php esc_html_e("Car Price", "genius") ?></label>
        <input type="text" id="car_price" name="car_price" value="<?php echo esc_attr($car_price); ?>">
    </p>

    <p>
        <label for="car_engine"><?php esc_html_e("Car Engine", "genius") ?></label>
        <select type="text" id="car_engine" name="car_engine">
            <option value="manual" <?php if($car_engine =="manual"){echo 'selected';}?>>Manual</option>
            <option value="auto" <?php if($car_engine =="auto"){echo 'selected';}?>>Auto</option>
        </select>
    </p>
<?php
}

function gn_save_metabox($post_id, $post){

    if((!isset($_POST['_carmetabox'])) || !wp_verify_nonce($_POST['_carmetabox'], 'gn_random_string_id')){
        return $post_id;
    }

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE){
        return $post_id;
    }

    if($post->post_type != 'car'){
        return $post_id;
    }

    $post_type = get_post_type_object($post->post_type);
    if(!current_user_can($post_type->cap->edit_post, $post_id)){
        return $post_id;
    }

    if(isset($_POST['car_price'])){
        update_post_meta($post_id, 'car_price', sanitize_text_field($_POST['car_price']));
    }
    else{
        delete_post_meta();
    }

    if(isset($_POST['car_engine'])){
        update_post_meta($post_id, 'car_engine', sanitize_text_field($_POST['car_engine']));
    }
    else{
        delete_post_meta();
    }

    return $post_id;
}
//add_action("save_post", "gn_save_metabox", 10, 2);