<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           HEADER TEMPLATE
 *      ======================================
 *
 */


?>

<!Doctype html>
<html '<?php language_attributes(); ?>'>
    <!--    To support the new JavaScript functionality with comment threading-->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    
    <body '<?php body_class(); ?>'>
        
        <!-- Preloader -->
        <div class="preloader-overlay" id="preloader-overlay">
            <div class="preloader-container">
               <div class="sk-chase">
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                  <div class="sk-chase-dot"></div>
                </div>
            </div>
        </div>
        
        <!-- Search Window -->
        <div class="search-window overlay" id="search-window">
            <div class="overlay-content" id="overlay-content">
                <button class="close-search-window" id="close-search-window">
                    <i class="fas fa-times"></i>
                </button>
                <?php get_search_form(); ?>
            </div>
        </div>
        
        
        <?php 
        if( !empty( get_header_image() ) ) {
            $header_img = get_header_image();
            $header_img_width = absint( get_custom_header()->width );
            $header_img_height = absint( get_custom_header()->height );
        } 
        ?>
        
        
<!--
        <?php if ( get_header_image() ) : ?>
            <div id="site-header">
                <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>"  height="<?php echo absint( get_custom_header()->height ); ?>"alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
            </div>
        <?php endif; ?>

        
     
        <header class="container-fluid">
            <div class="row">
                <div class="col-xs-12 header-container background-image" style="background-image: url(<?php echo header_image(); ?>);">
                    
                    <div class="header-content header-table">
                        <div class="header-table-cell">
                            <h2 class="no-padding"><a href="<?php echo get_site_url(); ?>"><?php bloginfo( 'name' ); ?></a></h2>
                            <h6 class="no-padding"><?php bloginfo( 'description' ); ?></h6>
                        </div>
                    </div>
                    
                </div>
            </div><
        </header>

-->

        
        <header>
            <div class="container-fluid">

                <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                    $custom_logo_name = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_name );
                }
                ?>

                <?php if ( ! has_custom_logo() ) : ?>
                    <div class="row title-and-tagline">
                        <div class="col-sm-12 col-md-12 col-lg-4 site-identity">
                            <a href= "<?php echo get_site_url(); ?>" class="site-title">
                                <?php echo bloginfo( 'name' ) ?> 
                            </a>
                        </div>

                        <div class="col-lg-8 site-identity">
                            <a class="site-tagline">
                                <?php echo get_bloginfo( 'description' ); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( has_custom_logo() ) : ?>
                    <div class="row logo-and-tagline">
                        <div class="col-sm-12 col-md-12 col-lg-4 site-identity">
                            <a href= "<?php echo get_site_url(); ?>" class="site-logo">
                                <img class="logo" src="<?php echo esc_attr( $logo[0] ); ?>" alt='logo'>
                            </a>
                        </div>

                        <div class="col-lg-8 site-identity">
                            <a class="site-tagline">
                                <?php echo get_bloginfo( 'description' ); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </header>

        <nav id="nav" class="main-navbar row">
            <div>
                <ul>
                    <?php 
                    if ( has_nav_menu( 'sidebar-menu' ) ) {
                        $menu_icon_class = 'show-1200';
                    } elseif( is_single() && get_theme_mod( 'enable_tutorials_loader' ) == 1 ){
                        $menu_icon_class = 'show-1200';
                    } else {
                        $menu_icon_class = 'show-1040';
                    }
                    ?>

                    <li class="menu-icon <?php echo $menu_icon_class; ?>" id="menu-icon">
                        <a href="javascript:void(0);" id="menu-icon">
                            <i class="fa fa-bars" style="font-size: 20px;"></i>
                        </a>
                    </li>

                    <li class="home-icon">
                        <a href= "<?php echo get_site_url(); ?>">
                            <i class="fa fa-home" style="font-size:22px"></i>
                        </a>
                    </li>
    

                    <?php 
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( 
                            array(
                                'menu'           => 'primary',
                                'container'      => '',
                                'theme_location' => 'primary',
                                'items_wrap'     => '%3$s',
                                'walker'         => new Wthree_Main_Menu_Walker(),
                            )
                        );
                    }
                    ?>

                    <?php //require get_template_directory(). '/template-parts/mega-menu.php'; ?>
    
                    <li class="search-icon" id="search-icon">
                        <a href="javascript:void(0);"><i class="fas fa-search"></i></a>
                    </li>
    
                </ul>
            </div>
        </nav>