<article <?php post_class();?> id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>">
	<?php
	?>
    <h1 class="display-4 text-uppercase text-center mb-5"><?php the_title(); ?></h1>
	<div class="text-center"><?php the_content(); ?></div>
	<div> <?php
		if(has_post_thumbnail(get_the_ID())){
			the_post_thumbnail('car-cover');
		} ?>
	</div>
</article>