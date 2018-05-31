<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 * Left Sidebar
 */
?>
<div class="sidebar widget-area" role="complementary">
	<?php
	
	// for all left sidebars top
	if ( is_active_sidebar( 'sidebar-left-top' ) ) {
		dynamic_sidebar('sidebar-left-top');
	}

	// homepage sidebar left - if its home and left sidebar is there, show this sidebar
	if ( is_home() && is_active_sidebar('sidebar-home-left') || is_front_page() && is_active_sidebar('sidebar-home-left') ) {
		dynamic_sidebar('sidebar-home-left');
	}

	// page sidebar left - if its page show this sidebar
	if ( is_page() && is_active_sidebar('sidebar-3') ) {
		dynamic_sidebar('sidebar-3');
	}

	// for all left sidebars bottom
	if ( is_active_sidebar( 'sidebar-left-bottom' ) ) {
		dynamic_sidebar('sidebar-left-bottom');
	}

	?>
</div>