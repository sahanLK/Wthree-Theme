<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           PAGE TEMPLATE
 *      ======================================
 *
 * This template may not responsible for displaying all
 * the pages in this theme. Some pages will use other
 * templates.
 */

get_header(); ?>

<?php

$wthree_object = new Wthree_Master();
$grid_classes = $wthree_object -> Wthree_Grid_Classes();

?>

    <!--  Mobile Sidebar Menu  -->
    <div id="sidenav" class="mobile-menu">
        
        <a href="javascript:void(0);" class="close-mobile-menu" id="close-button">×</a><br><br><br>
        
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
        </ul>
        
        <ul class="sidebar-menu">
            <?php require get_template_directory(). '/template-parts/sidebar-menu.php'; ?>
        </ul>
        
    </div>
    


    <div class="container-fluid">
        <div class="row">
            
            <?php if ( has_nav_menu( 'sidebar-menu' ) ) : ?>
            <div class="first-column col-lg-2" id="desktop-sidebar">
                
                <ul class="sidebar-menu">
                    <?php require get_template_directory(). '/template-parts/sidebar-menu.php'; ?>
                </ul>

            </div><!-- .first column -->
            <?php endif; ?>
            

            <div class="<?php echo esc_attr( $grid_classes[ 'second_col_classes' ] ); ?> second-column">
                
                <div class="wthree-content-inner">
                    
                    <?php 
                    
                    if ( have_posts() ) :
                    
                        while ( have_posts() ) :
                    
                            the_post(); ?>
                    
                            <h1 class="page-title"><?php the_title(); ?></h1> <?php
                    
                            the_content();
                            $wthree_object -> wthree_get_single_post_paginated_links();
                                        
                        endwhile;
                    
                    endif;
                    
                    ?>
                    
                </div>
                
                <div class="comments">
                    <?php
                    
                    if ( comments_open() || get_comments_number() ) {
                        comments_template( '/comments.php' );
                    }
                    
                    ?>
                </div>
                
            </div><!--  .second column  -->
            
            
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
                <div class="<?php echo esc_attr( $grid_classes[ 'third_col_classes' ] ); ?> third-column">
                    
                    <?php dynamic_sidebar('main-sidebar'); ?>
                    
                </div><!-- .third column -->
            <?php endif; ?>
            
        
        </div><!--  .row  -->
    </div><!--  .container-fluid -->

<?php get_footer(); ?>
