<?php 
/* Template name: Example Template */ 

get_header(); ?>

<div class="cars">
		<?php
		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
		);
		$cars = new WP_Query($args);

		?>
		<?php if($cars->have_posts()) 
			: while($cars->have_posts()) 
				: $cars->the_post(); ?>

			<?php get_template_part('template-parts/content'); ?>

		<?php endwhile; else :?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif;
		
		wp_reset_postdata();
		
		?> 

		<hr>
		
	</div>

<?php
//get_sidebar();
get_footer();