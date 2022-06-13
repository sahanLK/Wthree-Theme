<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           FRONT PAGE TEMPLATE
 *      ======================================
 *
 */

get_header(); ?>


<?php

// The object for generating grid classes.
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
            <div class="<?php echo esc_attr( $grid_classes[ 'first_col_classes' ] ); ?> first-column">
                
                <ul class="sidebar-menu">
                    <?php require get_template_directory(). '/template-parts/sidebar-menu.php'; ?>
                </ul>
                
            </div><!-- .first-column -->
            <?php endif; ?>

            
            <div class="<?php echo esc_attr( $grid_classes[ 'second_col_classes' ] ); ?> second-column">
                <div class=" wthree-post-container">                    
                                        
                    <?php
                    
                    if ( have_posts() ) :
        
                        while ( have_posts() ) :
                    
                            the_post();
                    
                            if ( get_post_type() == 'post' ) :
                                get_template_part( '/template-parts/posts/content', get_post_format() );
                            endif;
                    
                            if ( get_post_type() == 'page' ) : ?>
                                <h2><?php the_title(); ?></h2> <?php
                                the_content();
                                $wthree_object -> wthree_get_single_post_paginated_links();
                            endif;

                        endwhile;

                    endif;
                    
                    Wthree_Master::wthree_blog_loop_pagination(); 
                    
                    ?>
                    
                </div>
                
                <div class="comments">
                    <?php
                    
                    if ( comments_open() || get_comments_number() ) {
                        comments_template( '/comments.php' );
                    }
                    
                    ?>
                </div>
                
            </div><!-- .second-column -->
            
            
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
            <div class="<?php echo esc_attr( $grid_classes[ 'third_col_classes' ] ); ?> third-column">
                
                <?php get_sidebar('homepage'); ?>
                
            </div><!-- .third-column -->
            <?php endif; ?>

        </div><!--  .row  -->
    </div><!--  .container-fluid  -->
	

<?php get_footer(); ?>
