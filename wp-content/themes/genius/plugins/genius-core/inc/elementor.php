<?php
/**
 * Plugin Name: Elementor oEmbed Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-oembed-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_oembed_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/about-widget.php' );
	require_once( __DIR__ . '/widgets/ads-widget.php' );
	require_once( __DIR__ . '/widgets/slider-widget.php' );
	require_once( __DIR__ . '/widgets/services-widget.php' );
	require_once( __DIR__ . '/widgets/cars-widget.php' );

	$widgets_manager->register( new \Elementor_About_Widget() );
	$widgets_manager->register( new \Elementor_Ads_Widget() );
	$widgets_manager->register( new \Elementor_Slider_Widget() );
	$widgets_manager->register( new \Elementor_Services_Widget() );
	$widgets_manager->register( new \Elementor_Cars_Widget() );

}
add_action( 'elementor/widgets/register', 'register_oembed_widget' );