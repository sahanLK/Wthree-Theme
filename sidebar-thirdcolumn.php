<?php 

/*
@package wthree

    ==================================
        THIRD COLUMN SIDEBAR IN SINGLE POST
    ==================================

*/

?>

<?php
if ( is_active_sidebar( 'third-column-sidebar' ) ) {
    dynamic_sidebar( 'third-column-sidebar' );
} else {
    //nothing
}
?>