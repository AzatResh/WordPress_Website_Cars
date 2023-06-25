<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Elementor_About_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gn_about_widget';
	}
	public function get_title() {
		return esc_html__( 'About', 'genius' );
	}
	public function get_icon() {
		return 'eicon-code';
	}
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}
	public function get_categories() {
		return [ 'general' ];
	}
	public function get_keywords() {
		return [ 'About', 'url', 'link' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'url',
			[
				'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			]
		);

		$this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		$html = wp_oembed_get( $settings['url'] );

		echo '<div class="oembed-elementor-widget">';
		echo ( $html ) ? $html : $settings['url'];
		echo '</div>';

	}

}