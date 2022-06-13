<?php

/**
 * @package : Wthree
 *
 *      ======================================
 *           CUSTOM SEARCH FORM TEMPLATE        
 *      ======================================
 *
 */

?>

<form role="search" method="get" action="<?php echo esc_attr( home_url( '/' ) ); ?>" class="search-form">
    <input type="search" class="input-field" value="<?php echo get_search_query(); ?>" name="s" title="search" placeholder="search here ...">

    <button type='submit' class="search-submit-button">
        <i class="fa fa-arrow-right"></i>
    </button>
</form>
