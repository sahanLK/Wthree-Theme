<?php 

/*
@package wthree

    ==================================
        HOMEPAGE SIDEBAR
    ==================================

*/

?>

<?php 
	if ( is_active_sidebar( 'main-sidebar' ) ) {
		dynamic_sidebar( 'main-sidebar' );
	} else {
		//No active Widgets
	}
?>