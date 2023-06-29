<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Elementor_Services_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'gn_services_widget';
	}
	public function get_title() {
		return esc_html__( 'Services', 'genius-core' );
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
		return [ 'Services'];
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

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'genius_card_title',
			[
				'label' => esc_html__( 'Card title', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type card title here', 'elementor-oembed-widget' ),
			]
		);

		$repeater->add_control(
			'genius_card_description',
			[
				'label' => esc_html__( 'Card Description', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type description here', 'elementor-oembed-widget' ),
			]
		);

		$repeater->add_control(
			'genius_card_icon',
			[
				'label' => esc_html__( 'Type icon code', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'fa-car', 'elementor-oembed-widget' ),
			]
		);

        $this->add_control(
			'cards',
			[
				'label' => esc_html__( 'Cards', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ genius_card_title }}}',
			]
		);

		$this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();

        $counter = 1;
        
		//$html = wp_oembed_get( $settings['url'] );

		//echo '<div class="oembed-elementor-widget">';
		//echo ( $html ) ? $html : $settings['url'];
		//echo '</div>';
?>
	<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center"><?php echo esc_html($settings['genius_title_one']) ?></h1>
            <h1 class="display-4 text-uppercase text-center mb-5"><?php echo esc_html($settings['genius_title_two']) ?></h1>
            
                <?php if ( $settings['cards'] ) {
                    echo '<div class="row">';
                    foreach (  $settings['cards'] as $item ) {
                        ?> 
                            <div class="col-lg-4 col-md-6 mb-2">
                                <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                        <?php if($item['genius_card_icon']) { ?><i class="fa fa-2x <?php echo $item['genius_card_icon'] ?> text-secondary"></i><?php } ?>
                                        </div>
                                        <h1 class="display-2 text-white mt-n2 m-0"><?php echo '0'.esc_html($counter) ?></h1>
                                    </div>
                                    <h4 class="text-uppercase mb-3"><?php echo esc_html($item['genius_card_title']) ?></h4>
                                    <p class="m-0"><?php echo esc_html($item['genius_card_description']) ?></p>
                                </div>
                            </div>
                        
                        <?php
						$counter++;
                    }
                    echo '</div>';
                }?>
        </div>
    </div>

<?php
	}

}