<?php 
/* Template name: Full width Template */ 

get_header(); 

if(have_posts()) 
    : while(have_posts()) 
        : the_post(); 

        echo '<main>'.the_content().'</main>';

        if(comments_open() || get_comments_number()):
            commenys_template();
        endif;

    endwhile;
endif;
?>

<?php
get_footer();