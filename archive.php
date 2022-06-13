<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           ARCHIVE PAGE TEMPLATE        
 *      ======================================
 *
 */

get_header(); ?>

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

    
    <!-- site container -->
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-2 first-column">
                <ul class="sidebar-menu" id="sidebar-menu">
                    <?php require get_template_directory(). '/template-parts/sidebar-menu.php'; ?>
                </ul>
            </div><!-- .first-column -->
            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 second-column">
                
                <?php 
                
                if ( have_posts() ) :
                
                    while ( have_posts() ) :
                
                        the_post();
                        get_template_part( '/template-parts/posts/content', get_post_format() );
                
                    endwhile;
                
                endif;
                
                Wthree_Master::wthree_blog_loop_pagination();
                
                ?>
                
            </div><!--  .second column  -->
            
        </div><!-- .row -->
    </div><!-- .container-fluid -->
	
<?php get_footer(); ?>
