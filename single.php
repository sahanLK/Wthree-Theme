<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           POST TEMPLATE        
 *      ======================================
 *
 * This file is responsible for displaying all the posts
 * in the theme.
 */

 get_header(); ?>


<?php

// The object for generating grid classes.
$wthree_object = new Wthree_Master();
$grid_classes = $wthree_object -> Wthree_Grid_Classes();

?>

    <div id="sidenav" class="mobile-menu">
        <a href="javascript:void(0);" class="close-mobile-menu" id="close-button">&times;</a><br><br>
        
        <?php require( get_template_directory().'/template-parts/tutorials-menu.php' ); ?>
    </div>

	
    <div class="container-fluid">
        <div class="row">
            
            <?php if ( get_theme_mod( 'enable_tutorials_loader' ) == 1 || has_nav_menu( 'sidebar-menu' )  ) : ?>
                <div class="<?php echo esc_attr( $grid_classes[ 'first_col_classes' ] ); ?> first-column no-padding">
                    
                    <div class="left-sidebar-menu" id="desktop-sidebar">
                        <?php require( get_template_directory().'/template-parts/tutorials-menu.php' ); ?>
                    </div>
                    
                </div><!-- first column -->
            <?php endif; ?>

            
            <div class="<?php echo esc_attr( $grid_classes[ 'second_col_classes' ] ); ?> second-column"  id="<?php the_id(); ?>">
                <div class="wthree-content-inner">

                    <?php 
                    if ( have_posts() ) :
                    
                        while ( have_posts() ) :
                    
                            the_post(); ?>
                    
                            <div <?php post_class( 'single-post-content' ); ?>>
                                
                                <small class="post-meta">
                                    <?php 
                                    
                                    echo wthree_get_post_author();
                                    wthree_get_date_archive();
                                    wthree_get_tags();
                                    
                                    ?>
                                </small>

                                <h2 class="post-title"><?php the_title(); ?></h2>
                                
                                <?php 
                                
                                the_content();
                                $wthree_object -> wthree_get_single_post_paginated_links(); 
                                
                                ?>
                                
                            </div>
                    

                            <!-- Next and Previous posts Buttons -->
                            <div class="row post-pagination-row">
                                <div class="col-xs-6 previous-but">
                                    <?php echo $wthree_object -> wthree_post_pagination( false , '❮ Previous' ); ?>
                                </div>

                                <div class="col-xs-6 next-but">
                                    <?php echo $wthree_object -> wthree_post_pagination( true , 'Next ❯' ); ?>
                                </div>
                            </div> <?php
                    
                        endwhile;
                    
                    endif; 
                    
                    ?>

                    <div class="comments">
                        <?php
                        if ( comments_open() || get_comments_number() ) {
                            comments_template( '/comments.php' );
                        }
                        ?>
                    </div>

                </div>
            </div><!-- .second column -->

            <?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>
            <div class="<?php echo esc_attr( $grid_classes[ 'third_col_classes' ] ); ?> third-column">
                
                <?php dynamic_sidebar( 'post-sidebar' ); ?>
                
            </div><!-- .third column -->
            <?php endif; ?>
           
            
        </div><!--  .row  -->
    </div><!--  .container-fluid  -->
	
<?php get_footer(); ?>

