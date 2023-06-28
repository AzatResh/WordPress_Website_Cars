<?php


require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/redux-options.php';


add_action( 'tgmpa_register', 'gn_register_required_plugins' );

function gn_register_required_plugins() {
	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Genius Core', // The plugin name.
			'slug'               => 'genius-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/genius-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),
		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => true,
		),
	);

	$config = array(
		'id'           => 'genius',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}


function gn_paginate($query){
	$big = 999999999; // need an unlikely integer

	$paged ="";
	if(is_singular()){
		$paged =  get_query_var('page');
	}
	else{
		$paged =  get_query_var('paged');
	}

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, $paged ),
		'total' => $query->max_num_pages));
}

function gn_enqueue_scripts(){
	wp_register_style('geniuscourses-general', get_template_directory_uri().'/assets/css/style.css', array(), '1.0', 'all');
	wp_register_script('geniuscourses-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '1.0', true);
	
	//wp_enqueue_style('geniuscourses-general');
	wp_enqueue_script('geniuscourses-script');

	wp_enqueue_script('genius-ajax', get_template_directory_uri().'/assets/js/ajax.js', array('jquery'), '1.0', true);

	wp_enqueue_script('bootstrap.bundle.min', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('easing', get_template_directory_uri().'/assets/js/lib/easing/easing.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/js/lib/waypoints/waypoints.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('carousel', get_template_directory_uri().'/assets/js/lib/owlcarousel/owl.carousel.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('moment', get_template_directory_uri().'/assets/js/lib/tempusdominus/js/moment.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('moment-timezone', get_template_directory_uri().'/assets/js/lib/tempusdominus/js/moment-timezone.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('tempusdominus-bootstrap-4', get_template_directory_uri().'/assets/js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('genius-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);

	wp_enqueue_style('genius-fonts', gn_fonts_url(), array(), '1.0');

	wp_enqueue_style('genius-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css', array(), '1.0', 'all');
	wp_enqueue_style('carousel-css', get_template_directory_uri().'/assets/js/lib/owlcarousel/assets/owl.carousel.min.css', array(), '1.0', 'all');
	wp_enqueue_style('genius-tempusdominus-bootstrap-css', get_template_directory_uri().'/assets/js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css', array(), '1.0', 'all');
	wp_enqueue_style('genius-bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('genius-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0', 'all');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// wp_localize_script(
	// 	'genius-ajax',
	// 	'genius_ajax_script',
	// 	array(
	// 		'ajaxurl'=> admin_url('admin-ajax.php'),
	// 		'nonce'=> wp_create_nonce('ajax-nonce'),
	// 		'string_box'=> esc_html__('Hello', 'genius'),
	// 		'string_new'=> esc_html__('Hello world', 'genius'),
	// 	)
	// );
}
add_action('wp_enqueue_scripts', 'gn_enqueue_scripts');

function gn_fonts_url(){
	$fonts_url = "";

	$families = array();
	$families[] = 'Oswald:wght@400;500;600;700';
	$families[] = 'Rubik';

	$query_args = array(
		'family' => urlencode(implode("|", $families)),
	);
	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	return esc_url_raw($fonts_url);
}

function genius_ajax_example(){

	if(!wp_verify_nonce($_REQUEST['nonce'], 'ajax-nonce')){
		die;
	}

	if(isset($_REQUEST['string_one'])){
		echo $_REQUEST['string_one'];
	}

	echo '<br>';

	if(isset($_REQUEST['string_two'])){
		echo $_REQUEST['string_two'];
	}

	$cars = new WP_Query(array(
		'post_type'=>'car',
		'post_per_page'=>-1,
	));

	if($cars->have_posts()) : while($cars->have_posts()): $cars->the_post();
	get_template_part('template-parts/content', 'car'); 

	endwhile; endif;
	wp_reset_postdata();

	die;
}
add_action('wp_ajax_genius_ajax_example', 'genius_ajax_example');
add_action('wp_ajax_nopriv_genius_ajax_example', 'genius_ajax_example');

function gn_show_meta(){
	echo "<meta name='author' content=CRIK0VA''>";
}

add_action('wp_head', 'gn_show_meta');

// function gn_body_class($classes){
// 	$classes[] = 'main_class';

// 	return $classes;
// }
// add_filter('body_class', 'gn_body_class');
function add_class_to_li( $class, $item, $args ){
	if(isset($args->add_li_class)){
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_li', 1, 3);

function genius_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'genius' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'genius' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Car Pages Sidebar', 'genius' ),
			'id'            => 'car-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'genius' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'genius_widgets_init' );


function gn_theme_menus(){
	register_nav_menus(array( 
		'header_nav'=>'Навигация для header',
		'footer_nav'=>'Навигация для footer'));

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	load_theme_textdomain( 'genius', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );
	add_image_size('car-cover', 250, 250, true);

	add_theme_support( 'post-formats', array(
		'video',
		'quote',
		'image',
		'gallery'
	) );
	add_post_type_support('car','post-formats');
}
add_action('after_setup_theme','gn_theme_menus', 0);

function gn_custom_search($form){
	$form = "html for search";

	return $form;
}
//add_filter('get_search_form', 'gn_custom_search');

function gn_rewrite_rules(){
	gn_register_post_type();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'gn_rewrite_rules');


function genius_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'genius_content_width', 640 );
}
add_action( 'after_setup_theme', 'genius_content_width', 0 );
