<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Elementor_About_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gn_about_widget';
	}
	public function get_title() {
		return esc_html__( 'About', 'genius-core' );
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
		return [ 'About'];
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
			'genius_pre_title',
			[
				'label' => esc_html__( 'Pretitle', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => "Welcome To",
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
			]
		);

		$this->add_control(
			'genius_image',
			[
				'label' => esc_html__( 'Choose image', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'genius_title',
			[
				'label' => esc_html__( 'Title', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
			]
		);

		$this->add_control(
			'genius_description',
			[
				'label' => esc_html__( 'Description Two', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
				'default' => "Justo et eos et ut takimata sed sadipscing dolore lorem, et elitr labore labore voluptua no rebum sed, stet voluptua amet sed elitr ea dolor dolores no clita. Dolores diam magna clita ea eos amet, amet rebum voluptua vero vero sed clita accusam takimata. Nonumy labore ipsum sea voluptua sea eos sit justo, no ipsum sanctus sanctus no et no ipsum amet, tempor labore est labore no. Eos diam eirmod lorem ut eirmod, ipsum diam sadipscing stet dolores elitr elitr eirmod dolore. Magna elitr accusam takimata labore, et at erat eirmod consetetur tempor eirmod invidunt est, ipsum nonumy at et.",
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
			<h1 class="display-4 text-uppercase text-center mb-5"> <?php echo esc_html($settings['genius_pre_title']) ?> <span class="text-primary"> <?php echo esc_html($settings['genius_title']) ?> </span></h1>
			<div class="row justify-content-center">
				<div class="col-lg-10 text-center">
					<?php if($settings['genius_image']['url']) { ?><img class="w-75 mb-4" src="<?php echo esc_url($settings['genius_image']['url']) ?>" alt=""> <?php } ?>
					<p><?php echo esc_html($settings['genius_description']) ?></p>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-4 mb-2">
					<div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
						<div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
							<i class="fa fa-2x fa-headset text-secondary"></i>
						</div>
						<h4 class="text-uppercase m-0">24/7 Car Rental Support</h4>
					</div>
				</div>
				<div class="col-lg-4 mb-2">
					<div class="d-flex align-items-center bg-secondary p-4 mb-4" style="height: 150px;">
						<div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
							<i class="fa fa-2x fa-car text-secondary"></i>
						</div>
						<h4 class="text-light text-uppercase m-0">Car Reservation Anytime</h4>
					</div>
				</div>
				<div class="col-lg-4 mb-2">
					<div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
						<div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
							<i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
						</div>
						<h4 class="text-uppercase m-0">Lots Of Pickup Locations</h4>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	}

}