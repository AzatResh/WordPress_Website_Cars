<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Elementor_Cars_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gn_cars_widget';
	}
	public function get_title() {
		return esc_html__( 'Cars', 'genius-core' );
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
		return [ 'Cars'];
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
			'genius_title_one',
			[
				'label' => esc_html__( 'First title', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => "02",
				'placeholder' => esc_html__( 'Type first title here', 'elementor-oembed-widget' ),
			]
		);

        $this->add_control(
			'genius_title_two',
			[
				'label' => esc_html__( 'Second title', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'OUR SERVICES',
				'placeholder' => esc_html__( 'Type second title here', 'elementor-oembed-widget' ),
			]
		);

        $this->add_control(
			'genius_post_number',
			[
				'label' => esc_html__( 'Max post number', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 'OUR SERVICES',
				'placeholder' => esc_html__( 'Type max post number', 'elementor-oembed-widget' ),
			]
		);

		$this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		//$html = wp_oembed_get( $settings['url'] );

		//echo '<div class="oembed-elementor-widget">';
		//echo ( $html ) ? $html : $settings['url'];
		//echo '</div>';
?>
	<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center"><?php echo esc_html($settings['genius_title_one']) ?></h1>
            <h1 class="display-4 text-uppercase text-center mb-5"><?php echo esc_html($settings['genius_title_two']) ?></h1>

            <div class="row">

			<?php
				$paged = (get_query_var('paged')) ? (get_query_var('paged')) : 1;
				$cars = new WP_Query(array('post_type' => 'car', 'post_per_page' => $settings['genius_post_number'], 'paged' => $paged));

				if($cars->have_posts()): while ($cars->have_posts() ) : $cars->the_post();
						
				get_template_part('template-parts/content', 'car');

				endwhile;
				
				?> 
				
				<?php

				else :

					get_template_part('template-parts/content', 'none');

				endif;

                wp_reset_postdata();

				?>
				
			</div>
        </div>
    </div>

<?php
	}

}