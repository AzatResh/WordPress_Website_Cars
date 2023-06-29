<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Elementor_Ads_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gn_ads_widget';
	}
	public function get_title() {
		return esc_html__( 'Ads', 'genius-core' );
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
			'genius_title_left',
			[
				'label' => esc_html__( 'Title left', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
				'default' => 'WANT TO BE DRIVER?'
			]
		);
		$this->add_control(
			'genius_image_left',
			[
				'label' => esc_html__( 'Choose image Left', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->add_control(
			'genius_description_left',
			[
				'label' => esc_html__( 'Description Two', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
				'default' => "Lorem justo sit sit ipsum eos lorem kasd, kasd labore",
			]
		);

		$this->add_control(
			'genius_title_right',
			[
				'label' => esc_html__( 'Title right', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
				'default' => "LOOKING FOR A CAR?",
			]
		);
		$this->add_control(
			'genius_image_right',
			[
				'label' => esc_html__( 'Choose image Right', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->add_control(
			'genius_description_right',
			[
				'label' => esc_html__( 'Description Two', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 4,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
				'default' => "Lorem justo sit sit ipsum eos lorem kasd, kasd labore",
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
		<div class="container py-5">
			<div class="row mx-0">
				<div class="col-lg-6 px-0">
					<div class="px-5 bg-secondary d-flex align-items-center justify-content-between" style="height: 350px;">
						<?php if($settings['genius_image_left']['url']) { ?><img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-4" src="<?php echo esc_url($settings['genius_image_left']['url']) ?>" alt=""> <?php } ?>
						<div class="text-right">
							<h3 class="text-uppercase text-light mb-3"><?php echo esc_html($settings['genius_title_left']); ?></h3>
							<p class="mb-4"><?php echo esc_html($settings['genius_description_left']); ?></p>
							<a class="btn btn-primary py-2 px-4" href="">Start Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 px-0">
					<div class="px-5 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
						<div class="text-left">
							<h3 class="text-uppercase text-light mb-3"><?php echo esc_html($settings['genius_title_right']);?></h3>
							<p class="mb-4"><?php echo esc_html($settings['genius_description_right']); ?></p>
							<a class="btn btn-primary py-2 px-4" href="">Start Now</a>
						</div>
						<?php if($settings['genius_image_right']['url']) { ?><img class="img-fluid flex-shrink-0 mr-n5 w-50 ml-4" src="<?php echo esc_url($settings['genius_image_right']['url']) ?>" alt=""> <?php } ?>
					</div>
				</div>
			</div>
		</div>
    </div>
<?php
	}

}