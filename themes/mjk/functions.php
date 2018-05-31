<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */

// include("mjk-options.php");
// require_once ( get_stylesheet_directory() . '/mjk-options.php' ); // custom options - in development
//require_once ( get_stylesheet_directory() . '/theme-options.php' ); // loaded below

////////////////////// Load Admin Options Starts ////////////////////////


//Activates Theme Mode
add_filter( 'ot_theme_mode', '__return_true' );
//Loads OptionTree
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
//Loads Theme Options
require( trailingslashit( get_template_directory() ) . 'theme-options.php' );
// Add plugin dependencies
// require( trailingslashit( get_template_directory() ) . 'plugin-dependency/plugin-install.php' );



// Theme call to get the variable
// theme_background_color_test is id of an element in theme admin
//$mycolor=ot_get_option("theme_background_color_test","#fff"); 
// echo "$mycolor";

////////////////////// Load Admin Options Ends ////////////////////////

// Powerful Custom Functions
// include("functions-custom.php");
require_once ( get_stylesheet_directory() . '/functions-custom.php' );

// Widgets for Sidebars
if (function_exists('register_sidebar')) {

	register_sidebar(array(
    	'name' => esc_html__( 'General Right Sidebar - Top' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Widgets will appear in all right sidebars at top' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

	register_sidebar(array(
    	'name' => esc_html__( 'General Right Sidebar - Bottom' ),
		'id' => 'sidebar-2',
		'description' => esc_html__( 'Widgets will appear in all right sidebars at bottom' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( 'General Left Sidebar - Top' ),
        'id' => 'sidebar-left-top',
        'description' => esc_html__( 'Widgets will appear in all left sidebars at top' ),
        'before_widget' => '<div id="%1$s" class="widget widget-left %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( 'General Left Sidebar - Bottom' ),
        'id' => 'sidebar-left-bottom',
        'description' => esc_html__( 'Widgets will appear in all left sidebars at bottom.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( 'Homepage Sidebar - Right' ),
        'id' => 'sidebar-home-right',
        'description' => esc_html__( 'Widgets will appear in right sidebar of homepage' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
         ));

    register_sidebar(array(
        'name' => esc_html__( 'Homepage Sidebar - Left' ),
        'id' => 'sidebar-home-left',
        'description' => esc_html__( 'Widgets will appear in left sidebar of homepage if left sidebar is present in template.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
         ));

    register_sidebar(array(
    	'name' => esc_html__( 'Page Sidebar - Left' ),
		'id' => 'sidebar-3',
		'description' => esc_html__( 'Widgets will appear in left sidebar of page if left sidebar is present in template.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
         ));

    register_sidebar(array(
    	'name' => esc_html__( 'Page Sidebar - Right' ),
		'id' => 'sidebar-4',
		'description' => esc_html__( 'Widgets will appear in right sidebar of page' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
         ));

    register_sidebar(array(
    	'name' => esc_html__( 'Blog Sidebar - Right' ),
		'id' => 'sidebar-5',
		'description' => esc_html__( 'Widgets will appear in right sidebar of blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
         ));

    register_sidebar(array(
    	'name' => esc_html__( 'Single Post Sidebar - Right' ),
		'id' => 'sidebar-6',
		'description' => esc_html__( 'Widgets will appear in right sidebar of single blog post' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
    	'name' => esc_html__( 'Archive Sidebar - Right' ),
		'id' => 'sidebar-7',
		'description' => esc_html__( 'Widgets will appear in right sidebar of archive pages' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
    	'name' => esc_html__( 'Search Sidebar - Right' ),
		'id' => 'sidebar-8',
		'description' => esc_html__( 'Widgets will appear in right sidebar of search page' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeInUp">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title"><i class="fa fa-angle-down fa-fw"></i>',
        'after_title' => '</h3>',
        ));

    // frontpage widgets
    register_sidebar(array(
        'name' => esc_html__( '1st Front Page Banner Widget' ),
        'id' => 'frontpage-banner1',
        'description' => esc_html__( 'Appears right below header on the Front Page' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( '2nd Front Page Banner Widget' ),
        'id' => 'frontpage-banner2',
        'description' => esc_html__( 'Appears right below content and above footer on the Front Page' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    // footer widgets
    register_sidebar(array(
        'name' => esc_html__( '1st Footer Widget Area' ),
        'id' => 'sidebar-footer1',
        'description' => esc_html__( 'Appears in the footer above copyright info' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( '2nd Footer Widget Area' ),
        'id' => 'sidebar-footer2',
        'description' => esc_html__( 'Appears in the footer. Make sure 1st footer widget is not empty before using it.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( '3rd Footer Widget Area' ),
        'id' => 'sidebar-footer3',
        'description' => esc_html__( 'Appears in the footer. Make sure 1st & 2nd footer widgets are not empty before using it.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( '4th Footer Widget Area' ),
        'id' => 'sidebar-footer4',
        'description' => esc_html__( 'Appears in the footer. Make sure 1st, 2nd & 3rd footer widgets are not empty before using it.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

    register_sidebar(array(
        'name' => esc_html__( 'Woocommerce Widget Area' ),
        'id' => 'woo_sidebar',
        'description' => esc_html__( 'Appears in the right side bar of shop pages.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s wow fadeIn">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ));

        

} // Widgets for sidebars end


// Remove Items from admin menus
function remove_menus(){
//  remove_menu_page( 'jetpack' );                    //Jetpack
//  remove_menu_page( 'edit.php?post_type=page' );    //Pages
//  remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'remove_menus', 9999 );



// Apply CSS to WordPress Admin - Here to hide a specific item

function custom_admin_css() {
   echo '<style type="text/css">
           #toplevel_page_ot-settings{display:none !important; visibility:hidden !important;}
         </style>';
}
add_action('admin_head', 'custom_admin_css');


add_filter( 'the_excerpt', 'ccustom_the_excerpt');

?>