<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           FOOTER TEMPLATE
 *      ======================================
 *
 */


?>


<?php if ( get_theme_mod( 'lf_deactivation', '' ) != 1 ) : ?>
<footer class="lf text-center">
    <div class="container-fluid">

        <div class="row lf-description">
            <p id="lf-description"><?php echo esc_attr( get_theme_mod( 'lf_description' ) ); ?></p>
        </div>

        <div class="row">
            <ul class="lf-menu">
            <?php
            if ( has_nav_menu( 'light_footer_menu' ) ) {
                wp_nav_menu(  array(
                    'menu'           => 'light_footer_menu',
                    'container'      => '',
                    'theme_location' => 'light_footer_menu',
                    'items_wrap'     => '%3$s',
                ) );
            }
            ?>
            </ul>
        </div>

        <div class="row lf-social-icons">
            <?php if ( get_theme_mod( 'lf_facebook' ) == 1  && !empty( get_theme_mod( 'facebook_handler' ) ) ) : ?> <a href="<?php echo esc_url( get_theme_mod( 'facebook_handler' ) ); ?>" target="_blank"><i class="fab fa-facebook-f fb"></i></a>
            <?php endif; ?>

            <?php if ( get_theme_mod( 'lf_twitter' ) == 1  && !empty( get_theme_mod( 'twitter_handler' ) ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'twitter_handler' ) ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>

            <?php if ( get_theme_mod( 'lf_linkedin' ) == 1  && !empty( get_theme_mod( 'linkedin_handler' ) ) ) : ?><a href="<?php echo esc_url( get_theme_mod( 'linkedin_handler' ) ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <?php endif; ?>

            <?php if ( get_theme_mod( 'lf_youtube' ) == 1  && !empty( get_theme_mod( 'youtube_handler' ) ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'youtube_handler' ) ); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
            <?php endif; ?>
        </div>

        <div class="row lf-copyright-info" >
            <p id="lf-copyright-info"><?php echo esc_attr( get_theme_mod( 'lf_copyright_info' ) ); ?></p>
        </div>

    </div>
</footer>
<?php endif; ?>


<?php if ( get_theme_mod( 'df_deactivation', '' ) != 1 ) : ?>
<footer class="df">
    <div class="container-fluid">
        
        <?php if ( !empty( get_theme_mod( 'df_description' ) ) ) : ?>
        <div class="row df-description">
            <p id="df-description"><?php echo esc_attr( get_theme_mod( 'df_description' ) ); ?></p>
        </div>
        <?php endif; ?>
        
        <div class="row df-menus">
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 df-menu-column">
                <?php
                if ( has_nav_menu( 'dark_footer_first_menu' ) ) {
                    wp_nav_menu( 
                        array(
                            'menu'           => 'dark_footer_first_menu',
                            'container'      => '',
                            'theme_location' => 'dark_footer_first_menu',
                            'items_wrap'     => '%3$s',
                        )
                    );
                }
                ?>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 df-menu-column">
                <?php
                if ( has_nav_menu( 'dark_footer_second_menu' ) ) {
                    wp_nav_menu( 
                        array(
                            'menu'           => 'dark_footer_second_menu',
                            'container'      => '',
                            'theme_location' => 'dark_footer_second_menu',
                            'items_wrap'     => '%3$s',
                        )
                    );
                }
                ?>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 df-menu-column">
                <?php
                if ( has_nav_menu( 'dark_footer_third_menu' ) ) {
                    wp_nav_menu( 
                        array(
                            'menu'           => 'dark_footer_third_menu',
                            'container'      => '',
                            'theme_location' => 'dark_footer_third_menu',
                            'items_wrap'     => '%3$s',
                        )
                    );
                }
                ?>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 df-social-column">
                
                <table>
                    
                    <?php if ( get_theme_mod( 'df_facebook' ) == 1  && !empty( get_theme_mod( 'facebook_handler' ) ) ) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( get_theme_mod( 'facebook_handler' ) ); ?>" target="_blank"><i class="fab fa-facebook-f fb"></i></a>
                        </td>
                        <td class="media-name">
                            <a href="<?php echo esc_url( get_theme_mod( 'facebook_handler' ) ); ?>">Facebook</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    
                    
                    <?php if ( get_theme_mod( 'df_twitter' ) == 1  && !empty( get_theme_mod( 'twitter_handler' ) ) ) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( get_theme_mod( 'twitter_handler' ) ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        </td>
                        <td class="media-name"><a href="<?php echo esc_url( get_theme_mod( 'twitter_handler' ) ); ?>">Twitter</a></td>
                    </tr>
                    <?php endif; ?>
                    
                    <?php if ( get_theme_mod( 'df_linkedin' ) == 1  && !empty( get_theme_mod( 'linkedin_handler' ) ) ) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( get_theme_mod( 'linkedin_handler' ) ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </td>
                        <td class="media-name"><a href="<?php echo esc_url( get_theme_mod( 'linkedin_handler' ) ); ?>">Linkedin</a></td>
                    </tr>
                    <?php endif; ?>
                    
                    <?php if ( get_theme_mod( 'df_youtube' ) == 1  && !empty( get_theme_mod( 'youtube_handler' ) ) ) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( get_theme_mod( 'youtube_handler' ) ); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                        </td>
                        <td class="media-name">
                            <a href="<?php echo esc_url( get_theme_mod( 'youtube_handler' ) ); ?>">Youtube</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    
                </table>
                
            </div>
            
        </div>
        
        <?php if ( get_theme_mod( 'df_copyright_info' ) ) : ?>
        <div class="row df-copyright-info">
            <p id="df-copyright-info"><?php echo esc_attr( get_theme_mod( 'df_copyright_info' ) ); ?></p>
        </div>
        <?php endif; ?>
        
    </div>
</footer>
<?php endif; ?>






</body>
</html>

<?php wp_footer(); ?>
