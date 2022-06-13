<?php


function wthree_load_more() {
    
    $paged = $_POST["page"] + 1;
    
    $query = new WP_Query( array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'paged'         => $paged, 
    ) );
    
    if ( $query->have_posts() ) :
        
        while ( $query->have_posts() ) : 
            $query->the_post();

            if ( get_post_type() == 'post' ) :
                get_template_part( '/template-parts/posts/content', get_post_format() );
            endif;

        endwhile;

    endif; 
    
    wp_reset_postdata();
    
    die();
    
}

add_action( 'wp_ajax_wthree_load_more', 'wthree_load_more' );
add_action( 'wp_ajax_nopriv_wthree_load_more', 'wthree_load_more' );

?>

