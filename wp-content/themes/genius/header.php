<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package genius
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php global $genius_options; ?>

<!-- Topbar Start -->
<div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <?php if($genius_options['phone']){?>
                        <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i><?php echo esc_html($genius_options['phone']);?></a>
                        <span class="text-body">|</span> <?php } ?>
                    <?php if($genius_options['email']){?><a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i><?php echo esc_html($genius_options['email']);?></a><?php } ?>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <?php if($genius_options['fb']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_html($genius_options['fb']); ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a> <?php } ?>
                    <?php if($genius_options['twi']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_html($genius_options['twi']); ?>">
                        <i class="fab fa-twitter"></i>
                    </a> <?php } ?>
                    <?php if($genius_options['in']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_html($genius_options['in']); ?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a> <?php } ?>
                    <?php if($genius_options['ins']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_html($genius_options['ins']); ?>">
                        <i class="fab fa-instagram"></i>
                    </a> <?php } ?>
                    <?php if($genius_options['yt']){ ?>
                    <a class="text-body pl-3" href="<?php echo esc_html($genius_options['yt']); ?>">
                        <i class="fab fa-youtube"></i>
                    </a> <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1"><?php echo esc_html(bloginfo('name')); ?> </h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'header_nav',
                            'menu_class' => 'navbar-nav ml-auto py-0',
                            'container' => '',
                            'add_li_class' => 'nav-item nav-link',
                        )   
                    ); ?>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <?php 
        $bg_image = '';
        if(!is_front_page()){
            if(get_the_post_thumbnail_url(get_the_id(), 'full')){
                $bg_image = 'style="background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url('. get_the_post_thumbnail_url(get_the_id(), 'full'). ') center / cover no-repeat"';
            }
            else if($genius_options['header_img']['url']){
                $bg_image = 'style="background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url('. $genius_options['header_img']['url']. ') center / cover no-repeat"';
            }
            ?>
            <div class="container-fluid page-header"<?php echo $bg_image; ?> >
                <h1 class="display-3 text-uppercase text-white mb-3"><?php wp_title(""); ?></h1>
            </div> <?php
        }
        else{
            if($genius_options['header_img']['url']){
                $bg_image = 'style="background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url('. $genius_options['header_img']['url']. ') center / cover no-repeat"';
            }
            ?>
            <div class="container-fluid page-header"<?php echo $bg_image; ?> >
                <h1 class="display-3 text-uppercase text-white mb-3">Cars</h1>
            </div> <?php
        }
    ?>

<?php 

	// wp_nav_menu(
	// 	array(
	// 		'theme_location'=>'header_nav',
	// 		'menu_class'=>'myclass',
	// 		'container'=>'container',
	// 		'depth'=>'2'
	// 		)
	// 	);

	// if(is_tax('brand', array('bmw', 'mercedes'))){
	// 	echo "Header For Taxonomy";
	// }
	// else{
	// 	echo "Header";
	// }
	
	//get_search_form();
?>
<br>
<!-- 
<button id='button_car'>Show All Cards</button>
<div id='car_content' style="background: gray;"> </div> -->