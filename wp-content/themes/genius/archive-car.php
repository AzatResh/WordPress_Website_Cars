<?php
/* http://localhost/genius/car/ */

get_header();
?>
	<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">03</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
            <div class="row">

			<?php
				$paged = (get_query_var('paged')) ? (get_query_var('paged')) : 1;
				$cars = new WP_Query(array('post_type' => 'car', 'post_per_page' => 6, 'paged' => $paged));

				if($cars->have_posts()): while ($cars->have_posts() ) : $cars->the_post();
						
				get_template_part('template-parts/content', 'car');

				endwhile;
				
				?> 

				<div class="pagination">
					<?php gn_paginate($cars); ?>
				</div> 
				
				<?php

				else :

					get_template_part('template-parts/content', 'none');

				endif;

                wp_reset_postdata();

				?>
				
			</div>
        </div>
	</div>


<?php
get_footer();
