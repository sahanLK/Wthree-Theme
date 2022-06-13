<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           WTHREE THEME FUNCTIONS
 *      ======================================
 *
 */


/* wthree predefined variables */
define( 'WTHREE_ADMIN', get_template_directory(). '/admin' );
define( 'WTHREE_INC', get_template_directory(). '/inc' );
define( 'WTHREE_CLASSES', get_template_directory(). '/classes' );


require_once WTHREE_CLASSES. '/walkers.php';
require_once WTHREE_CLASSES. '/wthree-master-class.php';

require_once WTHREE_INC. '/functions-enqueue.php';
require_once WTHREE_INC. '/functions-theme-support.php';
require_once WTHREE_INC. '/functions-sidebars.php';
require_once WTHREE_INC. '/functions-menus.php';
require_once WTHREE_INC. '/ajax.php';

require_once WTHREE_ADMIN. '/functions/functions-system.php';
require_once WTHREE_ADMIN. '/customizer/wthree-customizer.php';
require_once WTHREE_ADMIN. '/tgm/tgm-init.php';


/*  setting the content width  */
if ( !isset( $content_width ) ) {
    $content_width = 1200;
}


if ( ! function_exists( 'wp_body_open' ) ) {
    //  Added for backwards compatibility to support WordPress versions prior to 5.2.0.
    function wp_body_open() {
        //  Triggered after the opening <body> tag.
        do_action( 'wp_body_open' );
    }
}


/* get Limited categories */

function wthree_get_categories( $max_categories = 4 ) {
    $categories = get_the_category();
    
    if ( !empty( $categories ) ) {
        $categories_length = count( $categories );
        echo '<label><i class="fa fa-list"></i>&nbsp;';
        
        $counter = 1;
        
        foreach( $categories as $category_object ) {
            if ( $counter == $max_categories && $counter < $categories_length ) {
                $final_char = ' ...';
            } elseif ( $counter == $categories_length ) {
                $final_char = '';
            } else {
                $final_char = ', ';
            }
            
            $category_name = $category_object -> name;
            $category_url = esc_url( get_category_link( $category_object -> term_id ) );
            echo '<a href="'. $category_url .'">'. $category_name .'</a>'. $final_char;
            
            if ( $counter >= $max_categories ) {
                break;
            }
            
            $counter++;
        }
        
        echo '</label> &emsp;';
    }
}


/* Get Limited Tags */

function wthree_get_tags( $max_tags = 4 ) {
    $tags = get_the_tags();
    
    if ( !empty( $tags ) ) {
        $tags_length = count( $tags );
        echo '<label><i class="fa fa-tags"></i>&nbsp;';
        
        $counter = 1;
        
        foreach( $tags as $tag_object ) {
            if ( $counter == $max_tags && $counter < $tags_length ) {
                $final_char = ' ...';
            } elseif ( $counter == $tags_length ) {
                $final_char = '';
            } else {
                $final_char = ', ';
            }
            
            $tag_name = $tag_object -> name;
            $tag_url = esc_url( get_tag_link( $tag_object -> term_id ) );
            echo '<a href="'. $tag_url .'">'. $tag_name .'</a>'. $final_char;
            
            if ( $counter >= $max_tags ) break;
            $counter++;
        }
        
        echo '&emsp; </label>';
    }
}

/* Get post posted date as an archive link */
function wthree_get_date_archive() {
    $archive_year  = get_the_time( 'Y' ); 
    $archive_month = get_the_time( 'm' ); 
    $archive_day   = get_the_time( 'd' ); 
    
    $archive_link = esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) );
    
    echo '<label><i class="far fa-calendar-check"></i>&nbsp; <a href="'.$archive_link.'">'. get_the_date( 'Y /m /d' ) .'</a>&emsp;</label>';
    
}

/* Print Post Author URI and Bootstrap icon */
function wthree_get_post_author() {
    $author = get_the_author_link();
    
    if ( isset( $author ) ) {
        $icon =  '<i class="fas fa-user-edit"></i>';
        return '<label>' .$icon. '&nbsp;' . $author . '&emsp; </label>';
    }
}

/* search query */
function wthree_get_search_query() {
    global $wp_query;
    $found_posts = $wp_query -> found_posts;
    
    if ( $found_posts == 0 ) {
        $query = __( 'No Results Found', 'wthree' );
    } elseif ( $found_posts == 1 ) {
        $query = __( '1 Result Found', 'wthree' );
    } else {
        $query = sprintf( esc_html__( '%s Results Found', 'wthree' ) , $found_posts );
    }
    
    return $query;
}


function wthree_load_text_domain() {
    load_theme_textdomain( 'wthree', get_template_directory(). '/languages' );
}

add_action( 'after_theme_setup', 'wthree_load_text_domain' );



?>