<?php 

/*
@package wthree

    ===========================================
         THE MENU USED FOR FIRST COLUMN( except in single.php ) AND IN SIDENAV(mobiles)
    ===========================================
    
    The reason of adding this single menu to a new file, to reduce the code lines. because this menu uses more times.
    This menu will not be displayed in single.php

*/

if ( has_nav_menu( 'sidebar-menu' ) ) {
    wp_nav_menu( array(
        'menu'           => 'sidebar-menu',
        'container'      => '',
        'theme_location' => 'sidebar-menu',
        'items_wrap'     => '%3$s',
        'walker'         => new Wthree_Side_Menu_Walker(),
    ) );
}

?>
