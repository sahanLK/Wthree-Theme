<?php

function wthree_add_system_page() {
    //Generate main page
    add_menu_page( 'wthree System', 'System', 'manage_options', 'wthree_system', 'wthree_create_system_page', get_template_directory_uri(). '/inc/icons/wthree-icon.ico', 10 );
    
    add_submenu_page( 'wthree_system', 'wthree Welcome', 'Status', 'manage_options', 'wthree_system', 'wthree_create_system_page' );
    
    add_submenu_page( 'wthree_system', 'wthree Registration', 'Registration', 'manage_options', 'wthree_registration', 'wthree_create_registration_page' );
}

add_action( 'admin_menu', 'wthree_add_system_page' );


function wthree_create_system_page() {
    //Creating Top level Welcome page
    require_once( get_template_directory(). '/admin/screens/welcome-page.php' );
}


function wthree_create_registration_page() {
    //Creating Registration Submenu Page
    require_once( get_template_directory(). '/admin/screens/registration-page.php' );
}


?>



