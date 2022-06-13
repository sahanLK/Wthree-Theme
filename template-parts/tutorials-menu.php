<?php 

/*
* #.#. Only used in single.php.
*
* Used for loading posts according to the category,
* only if specific option is activated by user.
*
*/


/* 

If Tutorial Loader option is Deactivated,
Display the PRIMARY menu and SIDEBAR-MENU.
And then return safely.

*/

if ( get_theme_mod( 'enable_tutorials_loader' ) != 1 ) :
    
    if ( has_nav_menu ( 'sidebar-menu' ) ) : ?>
        
        <ul class="sidebar-menu">
            <?php require get_template_directory(). '/template-parts/sidebar-menu.php'; ?>
        </ul><?php

    endif;

    /* This menu will be hidden until the Main navbar items get hidden. */
    if ( has_nav_menu( 'primary' ) ) : ?>

        <ul class="sidebar-menu main-navbar-secondary">
            
            <?php
            
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'menu'           => 'primary',
                    'container'      => '',
                    'theme_location' => 'primary',
                    'items_wrap'     => '%3$s',
                ) );

            }
            
            ?>
            
        </ul><?php 

    endif;
    
    return;

endif;


/*

If the Tutorial Loader option is activated,
Dont display any PRIMARY or SIDEBAR menu.
Just Load the posts according to the Loading post category.

*/


$categories = get_Categories();

if ( !empty( $categories ) ) {
    $number_of_categories = count( $categories )-1;
    $all_categories = array();
    
    /* Putting category names to a new array */
    foreach ( $categories as $category_object ) {
        $category_name = strtolower( $category_object -> name );
        array_push( $all_categories, $category_name );
    }
}

$last_part_of_url = strtolower( basename( get_the_permalink() ) );

//category name should not be empty. If this is empty string, left side menu will show all the posts without considering category names.
$category_name = ' ';

if ( in_array( $last_part_of_url, $all_categories ) ) {
	$category_name = $last_part_of_url;
}


$post_available = '';
$redirect_url = '';


/* Only if loading link is a POST */
if ( is_single() ) {
	$categories = get_the_category();
    
    /* Get current post category name and description */
    if ( !empty( $categories ) ) {
        $category_name = $categories[0] -> name;
        $category_description = $categories[0] -> description;
        
        if ( count( $categories ) == 1 ) {
            echo '<h3 class="cat-description">' .$category_description. '</h3>';
        }
        
        // opening the <ul>
        echo '<ul class="tutorials-menu" id="tutorials-menu">';
        
        // the query
        $the_query = new WP_Query(
            array(
                'category_name'     => $category_name,
                'posts_per_page'    => 1000,
            )
        );
        
        // The Loop
        if ( $the_query -> have_posts() ) {
            while ( $the_query -> have_posts() ) {
                $the_query -> the_post();
                $the_permalink = get_the_permalink();
                $the_title = get_the_title();
                
                if ( $the_title == '' ) {
                    $the_title = 'Untitled';
                }
                
                /* printing links one by one in first column */
                echo '<li><a href="'. $the_permalink . '" post-category="'.$category_name.'">' . $the_title .'</a></li>';
            }
            
            wp_reset_postdata();
            
            // closing the </ul>
            echo '</ul>';

        } else {
            // no posts found
            $post_available = 'no';
        }
        
    }
	
}

?>