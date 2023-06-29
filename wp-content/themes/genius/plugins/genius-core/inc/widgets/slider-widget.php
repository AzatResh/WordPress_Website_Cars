<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gn_slider_widget';
	}
	public function get_title() {
		return esc_html__( 'Slider', 'genius-core' );
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
		return [ 'Slider'];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'genius_title_one',
			[
				'label' => esc_html__( 'First title', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => "Welcome To",
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
			]
		);

		$repeater->add_control(
			'genius_title_two',
			[
				'label' => esc_html__( 'Second title', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type your title here', 'elementor-oembed-widget' ),
			]
		);

		$repeater->add_control(
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
			'slider',
			[
				'label' => esc_html__( 'Slider', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ genius_title_one }}}',
			]
		);

		$this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		$counter = 0;
		//$html = wp_oembed_get( $settings['url'] );

		//echo '<div class="oembed-elementor-widget">';
		//echo ( $html ) ? $html : $settings['url'];
		//echo '</div>';
?>
	<div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            
                <?php if ( $settings['slider'] ) {
                    echo '<div class="carousel-inner">';
                    foreach (  $settings['slider'] as $item ) {
						if($counter == 0){
							?><div class="carousel-item active"><?php
						}
						else{
							?><div class="carousel-item"><?php
						}
                        ?> 
                            <?php if($item['genius_image']['url']) { ?><img class="w-100" src="<?php echo esc_url($item['genius_image']['url']) ?>" alt="Image"><?php } ?>
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase mb-md-3"><?php echo esc_html($item['genius_title_one']); ?></h4>
                                    <h1 class="display-1 text-white mb-md-4"><?php echo esc_html($item['genius_title_two']); ?></h1>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
						$counter++;
                    }
                    echo '</div>';
                }?>
                
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>

<?php
	}

}