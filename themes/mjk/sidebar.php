<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 * Right Sidebar
 */
?>

<div class="sidebar widget-area">
	<?php

	// for all right sidebars top
	if ( is_active_sidebar('sidebar') ) {
		dynamic_sidebar('sidebar');
	}

	// for woocommerce pages - right sidebar
	if ( is_woocommerce() && is_active_sidebar('woo_sidebar') ) {
		dynamic_sidebar('woo_sidebar');
	}

	// homepage sidebar right - if its home show this sidebar
	if ( is_home() && is_active_sidebar('sidebar-home-right') || is_front_page() && is_active_sidebar('sidebar-home-right') ) {
		dynamic_sidebar('sidebar-home-right');
	}

	// page sidebar right - if its page show this sidebar
	if ( is_page() && is_active_sidebar('sidebar-4') ) {
		dynamic_sidebar('sidebar-4');
	}

	// blog sidebar right - if its blog show this sidebar
	if ( !is_front_page() && is_home() && is_active_sidebar('sidebar-5') ) {
		dynamic_sidebar('sidebar-5');
	}

	// single post sidebar right - if its single post show this sidebar
	if ( is_single() && is_active_sidebar('sidebar-6') ) {
		dynamic_sidebar('sidebar-6');
	}

	// archive sidebar right - if its archive page show this sidebar
	if ( is_archive() && is_active_sidebar('sidebar-7') ) {
		dynamic_sidebar('sidebar-7');
	}

	// search sidebar right - if its search results page show this sidebar
	if ( is_search() && is_active_sidebar('sidebar-8') ) {
		dynamic_sidebar('sidebar-8');
	}			

	// for all right sidebars - bottom
	if ( is_active_sidebar('sidebar-2') ) {
		dynamic_sidebar('sidebar-2');
	}

	?>

</div> 

<?php 
// show alert to logged in admin if there are no widgets in right sidebar
if(current_user_can('administrator')) { ?>
	
	<?php if(is_active_sidebar('sidebar') || 
		is_active_sidebar('sidebar-2') || 
		is_active_sidebar('sidebar-home-right') || 
		is_active_sidebar('sidebar-4') || 
		is_active_sidebar('sidebar-5') || 
		is_active_sidebar('sidebar-6') || 
		is_active_sidebar('sidebar-7') || 
		is_active_sidebar('woo_sidebar') || 
		is_active_sidebar('sidebar-8') ) { 
		// active
	    } else  { ?> 
		<div class="alert alert-info">No widgets present in right sidebar. 
		To add widgets here, go to Appearance > Widgets.</div>
	<?php } ?>

<?php } ?>