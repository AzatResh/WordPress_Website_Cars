<?php global $genius_options; ?>

<!-- Footer Start -->
<div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <?php if($genius_options['title_one']){?><h4 class="text-uppercase text-light mb-4"><?php echo esc_html($genius_options['title_one']);?></h4>  <?php } ?>
                <?php if($genius_options['address']){?><p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i><?php echo esc_html($genius_options['address']);?></p> <?php } ?>
                <?php if($genius_options['phonefooter']){?><p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i><?php echo esc_html($genius_options['phonefooter']);?></p> <?php } ?>
                <?php if($genius_options['emailfooter']){?><p><i class="fa fa-envelope text-white mr-3"></i><?php echo esc_html($genius_options['emailfooter']);?></p> <?php } ?>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <?php if($genius_options['title_two']){?> <h4 class="text-uppercase text-light mb-4"><?php echo esc_html($genius_options['title_two']);?></h4>  <?php } ?>
                <div class="d-flex flex-column justify-content-start">


                    <?php 
                        echo strip_tags(wp_nav_menu(
                            array(
                                'theme_location'=>'footer_nav',
                                'container'         => false,
                                'container_class'   => false,
                                'link_before' => '<i class="fa fa-angle-right text-white mr-2"></i>',
                                'add_li_class'   => 'text-body mb-2',
                                'echo'=> false,
                                'items_wrap'=>'%3$s',
                                'depth'=>0
                                )
                            ), '<i><a>'); 
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <?php if($genius_options['title_three']){?> <h4 class="text-uppercase text-light mb-4"><?php echo esc_html($genius_options['title_three']);?></h4><?php } ?>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <?php if($genius_options['title_four']){?><h4 class="text-uppercase text-light mb-4"><?php echo esc_html($genius_options['title_four']);?></h4><?php } ?>
               
                <p class="mb-4"><?php esc_html_e('Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et', 'genius'); ?></p>
                <p class="mb-4"><?php esc_html_e('Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et', 'genius'); ?></p>
                
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <?php 
            if($genius_options['copyrights']){ 
                echo wp_kses_post($genius_options); 
            } else { ?>
            <p class="mb-2 text-center text-body"><?php esc_html_e('&copy; Your Site Name. All Rights Reserved.', 'genius'); ?></p>
            <p class="m-0 text-center text-body"><?php esc_html_e('Designed by Team Name.', 'genius'); ?></p>
        <?php } ?>
    </div>

<?php 
	// wp_nav_menu(
	// 	array(
	// 		'theme_location'=>'footer_nav'
	// 		)
	// 	);
		
?>
<?php wp_footer(); ?>

</body>
</html>
