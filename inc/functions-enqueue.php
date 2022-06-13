
<?php

/*

@package wthree

    ==================================
        ENQUEUE FILES
    ==================================

*/

function wthree_load_admin_scripts( $hook ) {
        
    /* commonly including jquery and FontAwesome for all admin pages */
    wp_enqueue_style( 'wthree-admin-fontawesome', get_template_directory_uri(). '/fontawesome/css/all.css', array(), '5.14.0', 'all' );
    
    //For System Toplevel page and Subpages
    if ( $hook == 'system_page_wthree_registration' || $hook == 'toplevel_page_wthree_system' ) {
        wp_enqueue_style( 'wthree_system_registration', get_template_directory_uri(). '/admin/assets/css/wthree-admin-system.css');
    }
}

add_action( 'admin_enqueue_scripts', 'wthree_load_admin_scripts' );


function wthree_register_styles() {
	/* Getting version dynamically for style.css file  */
	$version = wp_get_theme() -> get( 'Version' );
    
    /* Icomoon Fonts */
    wp_enqueue_style( 'wthree-icomoon-fonts', get_template_directory_uri(). '/assets/css/icomoon-icons.css', array(), '1.0.0', 'all' );

    
    /*  Google Fonts  */
    wp_enqueue_style( 'wthree-Lobster-Font',"https://fonts.googleapis.com/css2?family=Lobster&display=swap", array(), '1.0', 'all' );
	wp_enqueue_style( 'wthree-Roboto-Font',"https://fonts.googleapis.com/css2?family=Roboto&display=swap", array(), '1.0', 'all' );
	wp_enqueue_style( 'wthree-Open-Sans-Font',"https://fonts.googleapis.com/css2?family=Open+Sans&display=swap", array(), '1.0', 'all' );
    wp_enqueue_style( 'wthree-Noto-Sans-Font',"https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap", array(), '1.0', 'all' );
    wp_enqueue_style( 'wthree-Monda-Font',"https://fonts.googleapis.com/css2?family=Monda&display=swap", array(), '1.0', 'all' );
    
    /*  stylesheets  */
	wp_enqueue_style( 'wthree-fontawesome', get_template_directory_uri(). '/fontawesome/css/all.css', array('wthree-bootstrap'), '5.14.0', 'all' );
	wp_enqueue_style( 'wthree-bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(), '5.14.0', 'all' );
	wp_enqueue_style( 'wthree-bootstrap_animations', get_template_directory_uri(). '/assets/css/animate.min.css', array(), '5.14.0', 'all' );
	wp_enqueue_style( 'wthree-bootstrap_dropdown', get_template_directory_uri(). '/assets/css/bootstrap-dropdownhover.min.css', array(), '5.14.0', 'all' );
    
	wp_enqueue_style( 'wthree-maincssFile', get_template_directory_uri(). '/style.css', array(), $version, 'all' );
    wp_enqueue_style( 'wthree-block-editor', get_template_directory_uri(). '/assets/css/block-editor.css', array(), $version, 'all' );
	wp_enqueue_style( 'wthree-frontpage-cssFile', get_template_directory_uri(). '/assets/css/frontpage.css', array(), $version, 'all' );	
}

add_action( 'wp_enqueue_scripts', 'wthree_register_styles' );

/*--------------------------------------------------------------*/

function wthree_register_scripts() {
	wp_enqueue_script( 'wthree-jquery-js', get_template_directory_uri(). '/assets/js/jquery.min.js', array(), '', true );
	wp_enqueue_script( 'wthree-bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'wthree-bootstrap-dropdownjs', get_template_directory_uri(). '/assets/js/bootstrap-dropdownhover.min.js', array(), '', true );
	wp_enqueue_script( 'wthree-fitvid-js', get_template_directory_uri(). '/assets/js/jquery.fitvids.js', array(), '', true );
	wp_enqueue_script( 'wthree-main-js', get_template_directory_uri(). '/assets/js/main.js', array(), '', true );
}

add_action( 'wp_enqueue_scripts', 'wthree_register_scripts' );

/*--------------------------------------------------------*/
?>