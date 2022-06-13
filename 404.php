<?php 

/**
 * @package : Wthree
 *
 *      ======================================
 *           404.php        
 *      ======================================
 *
 * This is the template which is displayed when,
 * 404 error ( Page Not Found ) occured.
 *
 */

wp_head(); ?>

<div class="empty-body">
    <div class="container-fluid">
        
        <h1 class="page-not-found"> 404 ERROR !</h1>

        <p> Sorry, the page you are looking
        is broken. Please Search Something else.</p>
        
        <div class="empty-form">
            <form role="search" method="get" action="<?php echo esc_attr( home_url( '/' ) ); ?>" id="search-form" onsubmit="return check_search_input();">
                <input type="search" class="empty-field" id="search-query" value="<?php echo get_search_query(); ?>" name="s" title="search" placeholder="search here ...">

                <input type='submit' value="search" class="empty-submit">
            </form>
        </div>
        
        <div class="empty-run-row">
            <i class="fas fa-running empty-running"></i> &nbsp;&nbsp;
            <i class="fas fa-angle-right empty-arrow"></i>
        </div>
        <div class="empty-home-url">
            <a href="<?php echo get_site_url(); ?>">Go To Homepage</a>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>