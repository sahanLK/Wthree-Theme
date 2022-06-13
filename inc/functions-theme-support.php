<?php 

/*
@package wthree

    ==================================
        THEME SUPPORT OPTIONS
    ==================================

*/

function wthree_theme_support() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );
}

add_action( 'after_setup_theme', 'wthree_theme_support' );

//
//function wthree_custom_header() {
//    $args = array(
//        'default-image'      => get_template_directory_uri() . '/assets/img/default-header.JPG',
//        'default-text-color' => 'fff',
//        'width'              => '2000',
//        'height'             => '700',
//        'flex-height'        => true,
//        'flex-width'         => true,
//    );
//    
//    add_theme_support( 'custom-header', $args );
//}
//
//add_action( 'after_setup_theme', 'wthree_custom_header' );


add_theme_support( 'post-formats', array( 'image' ) );
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

function wthree_add_editor_style() {
    add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'wthree_add_editor_style' );


/* Comments Pagination Support*/

function wthree_comments_page_navigation() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

		<div class="comment-navigation" role="navigation">
            <div class="row">
                <div class="col-xs-6 link-left">
                    <?php next_comments_link( esc_html__( '&#171; Latest Comments', 'wthree' ) ); ?>
                </div>
                <div class="col-xs-6 link-right">
                    <?php previous_comments_link( esc_html__( 'Older Comments &#187;', 'wthree' ) ); ?>
                </div>
            </div>
        </div><?php
    
    endif;
}

?>