<?php 

if ( ! is_active_sidebar( 'car-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar">
	<?php dynamic_sidebar( 'car-sidebar' ); ?>
</aside><!-- #secondary -->
