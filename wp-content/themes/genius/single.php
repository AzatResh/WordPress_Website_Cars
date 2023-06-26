<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>
	<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'genius' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'genius' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;

		?>
		</div>
	</div>
<?php
//get_sidebar();
get_footer();
