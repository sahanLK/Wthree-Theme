<?php

/*
@package wthree

    ==================================
        REGISTER MENUS
    ==================================

*/

function wthree_menus() {
	$locations = array(
		'primary'                     => 'Primary Navbar Menu',
		'sidebar-menu'                => 'Sidebar Menu',
        'light-footer-menu'           => 'Light Footer Menu',             
        'dark-footer-first-menu'      => 'Dark Footer Menu 1',
        'dark-footer-second-menu'     => 'Dark Footer Menu 2',
        'dark-footer-third-menu'      => 'Dark Footer Menu 3',
	);
    
	register_nav_menus( $locations );
}

add_action( 'init', 'wthree_menus' );

?>