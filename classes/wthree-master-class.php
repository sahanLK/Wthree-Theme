<?php


final class Wthree_Master {
    
    public function __construct() {

        /* 
        * Check active sidebars. if sidebar is active,
        * it will be 'Alive', otherwise will be 'Dead'.
        * 
        * "main-sidebar" is used in front page and other pages except in POSTS.
        * "post-sidebar" is only used in POSTS.
        * 
        */
        
        $sidebars = array( 
            'main_sidebar'      => 'main-sidebar',
            'secondary_sidebar' => 'post-sidebar',
        );
        
        foreach( $sidebars as $sidebar_name => $sidebar_id ) {
            $sidebar_stat = ( is_active_sidebar( $sidebar_id ) ) ? 'Alive' : 'Dead';
            $this-> $sidebar_name = $sidebar_stat;
        }
        
        
        /* 
        *
        * #.#. Wthree Menus
        *
        */
        
        // menu_name => menu_id
        $menus = array(
            'primary_menu'  => 'primary',
            'sidebar_menu'  => 'sidebar-menu',
        );
        
        foreach( $menus as $menu_name => $menu_id ) {
            $menu_stat = ( has_nav_menu( $menu_id ) ) ? 'Alive' : 'Dead';
            $this -> $menu_name = $menu_stat;
        }
        
        
        /* 
        *
        * #.#. Wthree Theme Settings ( From Customizer )
        *
        */
        
        // setting_name => setting_id
        $settings = array(
            'tutorials_loader'  => 'enable_tutorials_loader',
            'blog_mode'         => 'enable_blog_mode' 
        );
        
        /* for checkbox settings */
        foreach( $settings as $setting_name => $setting_id ) {
            $setting_stat = ( get_theme_mod( $setting_id ) == 1 ) ? 'Alive' : 'Dead';
            $this -> $setting_name = $setting_stat;
        }
        
        
        /* 
        * #.#. check if '$in_same_term' should be TRUE or FALSE.
        * This variable is used for generating POST pagination links
        */
        $this -> same_term = ( $this -> tutorials_loader == 'Alive' ) ? true : false;
        
        
    }
    
    
    final public function wthree_Grid_Classes() {
        
        /* if the loading url is HOMEPAGE or any other PAGE */
        
        if ( ! is_single() ) {
            
            /*
            * #.#. Required components for generating Bootstrap Classes.
            */
            
            $required_sidebar = $this -> main_sidebar;
            $required_menu = $this -> sidebar_menu;
            
            /*
            * #.#. Generating classes according to the active componnents.
            */
            
            if ( $required_sidebar == 'Alive' && $required_menu == 'Alive' ) {
                $first_col_classes = 'col-lg-2';
                $second_col_classes = 'col-xs-12 col-md-8 col-lg-7';
                $third_col_classes = 'col-xs-12 col-md-4 col-lg-3';
            }
            
            if ( $required_sidebar == 'Dead' && $required_menu == 'Alive' ) {
                $first_col_classes = 'col-lg-2';
                $second_col_classes = 'col-xs-12 col-lg-10';
                $third_col_classes = '';
            }
            
            if ( $required_sidebar == 'Alive' && $required_menu == 'Dead' ) {
                $first_col_classes = '';
                $second_col_classes = 'col-xs-12 col-md-8 col-lg-9';
                $third_col_classes = 'col-xs-12 col-md-4 col-lg-3';
            }
            
            if ( $required_sidebar == 'Dead' && $required_menu == 'Dead' ) {
                $first_col_classes = '';
                $second_col_classes = 'col-xs-12';
                $third_col_classes = '';
            }
            
        }
        
        
        /* if the loading url is a POST page */
        
        if ( is_single() ) {
            
            /*
            * #.#. Required components for generating Bootstrap Classes.
            */
            
            $required_sidebar = $this -> secondary_sidebar;
            $required_menu = $this -> sidebar_menu;
            $required_option = $this -> tutorials_loader;
            
            /*
            * #.#. Generating classes according to the active componnents.
            */
            
            if ( $required_sidebar == 'Alive' && ( $required_menu == 'Alive' || $required_option == 'Alive' ) ) {
                $first_col_classes = 'col-lg-2';
                $second_col_classes = 'col-xs-12 col-md-8 col-lg-7';
                $third_col_classes = 'col-xs-12 col-md-4 col-lg-3';
            }
            
            if ( $required_sidebar == 'Dead' && ( $required_menu == 'Alive' || $required_option == 'Alive' ) ) {
                $first_col_classes = 'col-lg-2';
                $second_col_classes = 'col-xs-12 col-lg-10';
                $third_col_classes = '';
            }
            
            if ( $required_sidebar == 'Alive' && ( $required_menu == 'Dead' && $required_option == 'Dead' ) ) {
                $first_col_classes = '';
                $second_col_classes = 'col-xs-12 col-md-8 col-lg-9';
                $third_col_classes = 'col-xs-12 col-md-4 col-lg-3';
            }
            
            if ( $required_sidebar == 'Dead' && ( $required_menu == 'Dead' && $required_option == 'Dead' ) ) {
                $first_col_classes = '';
                $second_col_classes = 'col-xs-12';
                $third_col_classes = '';
            }
            
        }
        
        $grid_classes = array();
        
        $grid_classes[ 'first_col_classes' ] = ( isset( $first_col_classes ) ) ? $first_col_classes : '';
        $grid_classes[ 'second_col_classes' ] = ( isset( $second_col_classes ) ) ? $second_col_classes : '';
        $grid_classes[ 'third_col_classes' ] = ( isset( $third_col_classes ) ) ? $third_col_classes : '';
        
        return $grid_classes;
        
    }
    
    
    final public static function wthree_blog_loop_pagination() { 
        $args = array(
            'screen_reader_text'    => '  ',
            'mid_size'              => 2,
            'prev_next'             => true,
            'prev_text'             => '<i class="fa fa-chevron-left"></i>',
            'next_text'             => '<i class="fa fa-chevron-right"></i>',
            'class'                 => 'wthree-blog-pagination',
        );
        
        the_posts_pagination( $args  );
    }
    
    
    /** 
    * Generate NEXT or PREVIOUS post links for single.php.
    * 
    * @Since 1.0.0
    *
    * @param string $button_type   shoulld be 'previous' or 'next'.
    * @param string $display_name  The Link output text.
    **/
    
    final public function wthree_post_pagination( $button_type, $display_name ) {
        
        $same_term = $this -> same_term;
        $post_type = ( $button_type == 'previous' ) ? true : false;
        
        $requested_post_link = get_adjacent_post( $in_same_term = $same_term, $excluded_terms = '', $previous = $post_type, $taxonomy ='category' );
        
        if ( !empty( $requested_post_link ) ) {
            
            /*
            Post title that ends with ">" character causes unnecessary tag closing.
            Prevent it removing > from bootstrap popover 'data_content'.
            */
            $data_content = $requested_post_link -> post_title;
            
            if (substr($data_content, -1) == '>') {
                $data_content = substr_replace($data_content, '', -1);
            }
            
            $requested_post_link = '<a href="'. get_permalink( $requested_post_link->ID ) .'" data-toggle="popover" data-placement="bottom" data-content="' . $data_content . '" data-trigger="hover">' . $display_name . '</a>';
        }
         
        return $requested_post_link;
        
    }
    
    
    /*
    * If a single post is paginated to multiple section get those links.
    * This function has 'echo' because, 'wp_link_pages' has by default
    * echo => true .
    **/
    
    final public function wthree_get_single_post_paginated_links() {
        
        $args = array(
            'before'            => esc_html__( '❮❮&nbsp;', 'wthree' ),
            'after'             => esc_html__( '&nbsp; ❯❯', 'wthree' ),
            'link_before'       => '',
            'link_after'        => '',
            'aria_current'      => 'page',
            'separator'         => '&nbsp;&nbsp;',
            'nextpagelink'      => esc_html__( 'Next', 'wthree' ),
            'previouspagelink'  => esc_html__( 'Previous', 'wthree' ),
            'pagelink'          => '%',
            'echo'              => false,

        );

        $paginated_links = '<div class="post-pagination">'. wp_link_pages( $args ) .'</div>';
        echo $paginated_links;
        
    }
    
    
}

    
?>

