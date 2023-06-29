<?php

function gn_acf_metaboxes(){
    acf_add_local_field_group(array(
        'key'=>'acf_carsettings',
        'title'=>'Car Settings for ACF from code',
        'fields'=> array(
            array(
                'key'=> 'custom_year',
                'label'=>'Car Year',
                'name'=>'custom_year',
                'type'=>'text'
            ),
            array(
                'key'=> 'custom_engine_type',
                'label'=>'Car Engine Price',
                'name'=>'custom_engine_type',
                'type'=>'select',
                'choices'=>array(
                    'manual'=>esc_html__("Manual", 'genius'),
                    'auto'=>esc_html__("Auto", 'genius')
                ),
                'allow_null'=>1
            ),
            array(
                'key'=> 'custom_travel_km',
                'label'=>'Car Travel km',
                'name'=>'custom_travel_km',
                'type'=>'text'
            ),
            array(
                'key'=> 'custom_price',
                'label'=>'Car Price',
                'name'=>'custom_price',
                'type'=>'text'
            ),
        ),
        'location'=>array(
            array(
                array(
                    'param'=>'post_type',
                    'operator'=>'==',
                    'value'=>'car'
                )
            )
        ),
        'menu_order'=>0,
        'position'=>'normal', // side или acf_after_title
        'style'=>'default', // seemless
        'label_placement'=>'top',//left
        'instruction_placement'=>'label',//field
        'hide_on_screen'=>array()
    ));
}
add_action("acf/init", "gn_acf_metaboxes");