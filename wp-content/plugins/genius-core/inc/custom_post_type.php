<?php

function gn_register_post_type(){

	$args_tx = array(
		'hierarchical' => false,
		'labels' => array(
			'name'              => esc_html_x( 'Brands', 'taxonomy general name', 'genius' ),
			'singular_name'     => esc_html_x( 'Brand', 'taxonomy singular name', 'genius' ),
			'search_items'      => esc_html__( 'Search Brands', 'genius' ),
			'all_items'         => esc_html__( 'All Brands', 'genius' ),
			'parent_item'       => esc_html__( 'Parent Brand', 'genius' ),
			'parent_item_colon' => esc_html__( 'Parent Brand:', 'genius' ),
			'edit_item'         => esc_html__( 'Edit Brand', 'genius' ),
			'update_item'       => esc_html__( 'Update Brand', 'genius' ),
			'add_new_item'      => esc_html__( 'Add New Brand', 'genius' ),
			'new_item_name'     => esc_html__( 'New Brand Name', 'genius' ),
			'menu_name'         => esc_html__( 'Brand', 'genius' ),
		),
		'show_ui'=> true,
		'rewrite'=> array('slug'=>'brands'),
		'query_var'=>true,
		'show_in_rest' => true
	);

	if(!taxonomy_exists('brand')){
	 	register_taxonomy('brand', array('car'), $args_tx);
	}

	$args = array(
		'label' => esc_html__("Cars", "genius"),
		'labels' => array(
			'name'                  => esc_html_x( 'cars', 'Post type general name', 'genius' ),
			'singular_name'         => esc_html_x( 'car', 'Post type singular name', 'genius' ),
			'menu_name'             => esc_html_x( 'cars', 'Admin Menu text', 'genius' ),
			'name_admin_bar'        => esc_html_x( 'car', 'Add New on Toolbar', 'genius' ),
			'add_new'               => esc_html__( 'Add New', 'genius' ),
			'add_new_item'          => esc_html__( 'Add New car', 'genius' ),
			'new_item'              => esc_html__( 'New car', 'genius' ),
			'edit_item'             => esc_html__( 'Edit car', 'genius' ),
			'view_item'             => esc_html__( 'View car', 'genius' ),
			'all_items'             => esc_html__( 'All cars', 'genius' ),
			'search_items'          => esc_html__( 'Search cars', 'genius' ),
			'parent_item_colon'     => esc_html__( 'Parent cars:', 'genius' ),
			'not_found'             => esc_html__( 'No cars found.', 'genius' ),
			'not_found_in_trash'    => esc_html__( 'No cars found in Trash.', 'genius' ),
			'featured_image'        => esc_html_x( 'Car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'genius' ),
			'set_featured_image'    => esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'genius' ),
			'remove_featured_image' => esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'genius' ),
			'use_featured_image'    => esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'genius' ),
			'archives'              => esc_html_x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'genius' ),
			'insert_into_item'      => esc_html_x( 'Insert into car', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'genius' ),
			'uploaded_to_this_item' => esc_html_x( 'Uploaded to this car', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'genius' ),
			'filter_items_list'     => esc_html_x( 'Filter cars list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'genius' ),
			'items_list_navigation' => esc_html_x( 'cars list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'genius' ),
			'items_list'            => esc_html_x( 'cars list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'genius' ),
		),
		'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'post-formats'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => true,
		'menu_position' => 60,
		'menu_icon' => 'dashicons-car',
		'hierarchical' => true,
		'show_in_rest' => false //тип редактирования
	);

	register_post_type("car", $args);
}
add_action('init', 'gn_register_post_type');