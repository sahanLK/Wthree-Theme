<?php 

/*
@package wthree

    ==================================
        FOOTER SIDEBAR
    ==================================

*/

?>

<?php 
	if ( is_active_sidebar( 'footer-1' ) ) {
		dynamic_sidebar( 'footer-1' );
	} else {
		//No active Widgets
	}
?>