<?php

get_header();

$term = get_term_by('slug', get_query_var('term'),  get_query_var('taxonomy'));

echo $term ->name;

if(have_posts()) 
	: while(have_posts()) 
		: the_post(); ?>

	        <?php get_template_part('template-parts/content', 'car'); ?>

	<?php endwhile; else :?>

		<?php get_template_part('template-parts/content', 'none'); ?>

	<?php endif ?> 

<?php

get_footer();