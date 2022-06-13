<?php

/*
@package wthree

    ==================================
        REGISTER SIDEBARS
    ==================================

*/

function wthree_register_sidebars() {
	
	register_sidebar(
		array(
			'name' 			=> 'Main Sidebar',
			'id' 			=> 'main-sidebar',
			'class' 		=> '',
			'description'	=> 'These widgets will be visible in third column of homepage.',
			'before_widget' => '<aside id="%1$s" class="widget %2$s homepage-widget">',
			'after_widget'	=> '</aside>',
		)
	);
    
    register_sidebar(
        array(
			'name' 			=> 'Post Sidebar',
			'id' 			=> 'post-sidebar',
			'class' 		=> '',
			'description' 	=> 'These widgets will be visible in third column of theme except in homepage.',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
        )
    );
}

add_action('widgets_init', 'wthree_register_sidebars');

?>