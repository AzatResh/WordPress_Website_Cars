<?php

class Gn_About_Widget extends WP_Widget{

    function __construct(){
        parent::__construct('gn_aboout_widget', esc_html__( 'About widget', 'genius' ), array(
            'description' => esc_html__( 'First description', 'genius' )));
    }

    public function widget($args, $instance){
        //frontend

        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $text = apply_filters('the_content', $instance['text']);

        echo $before_widget;

        if($title){
            echo $before_title. esc_html__($title). $after_title;
        }
        if($text){
            echo wp_kses_post($text);
        }

        echo $after_widget;
    }

    public function form($instance){
        if(isset($instance['title'])){
            $title = $instance['title'];
        }
        else{
            $title = "";
        }

        if(isset($instance['text'])){
            $text = $instance['text'];
        }
        else{
            $text = "";
        }
        ?>
        
        <p>
            <label for="<?php echo $this -> get_field_id('title');?>"> 
                <?php esc_html_e( 'Title', 'genius' ); ?></label>
        </p>
        <input class="widefat" id="<?php echo $this -> get_field_id('title');?>" name="<?php echo $this -> get_field_name('title');?>" value="<?php echo esc_attr($title); ?>" type="text">

        <p>
            <label for="<?php echo $this -> get_field_id('text');?>"> 
                <?php esc_html_e( 'Title', 'genius' ); ?></label>
        </p>
        <textarea class="widefat" id="<?php echo $this -> get_field_id('text');?>" name="<?php echo $this -> get_field_name('text');?>" type="text"> <?php echo esc_attr($text); ?> </textarea>

        <?php
    }

    public function update($new_instance, $old_instance){
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] = strip_tags($new_instance['text']);

        return $instance;
    }
}

function gn_register_about_widget(){
    register_widget('Gn_About_Widget');
}
add_action( 'widgets_init', 'gn_register_about_widget' );