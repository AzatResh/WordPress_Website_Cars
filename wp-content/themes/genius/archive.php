<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>
	<div>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header>

		<?php if(have_posts()) 
			: while(have_posts()) 
				: the_post(); ?>

			<?php get_template_part('template-parts/content'); ?>

		<?php endwhile; else :?>

			<?php get_template_part('template-parts/content', 'none'); ?>

		<?php endif ?> 
	</div>


<?php
//get_sidebar();
get_footer();
