<?php 
/* Custom Functions */
/*######################################*/

// Change the Footer in WordPress Admin Panel
function remove_footer_admin () {
	echo 'Oasis WordPress Theme by <a href="https://www.javedkhalil.com" target="_blank">M. Javed Khalil</a></p>';
	}
add_filter('admin_footer_text', 'remove_footer_admin');

// Remove query string from static files
function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
	$src = remove_query_arg( 'ver', $src );
	return $src;
   }
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

// add shortlink functionality in posts
add_filter( 'get_shortlink', function( $shortlink ) {return $shortlink;} );

//Remove WordPress Version Number 
function wpb_remove_version() {
	return '';
	}
add_filter('the_generator', 'wpb_remove_version');

// kill the admin nag
if (!current_user_can('edit_users')) {
	add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
	add_filter('pre_option_update_core', create_function('$a', "return null;"));
}

// use category id in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
		return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

// Remove Welcome Panel from WordPress Dashboard
remove_action('welcome_panel', 'wp_welcome_panel');

// Enable Shortcode Execution in Text Widgets
add_filter('widget_text','do_shortcode');

// Hide Login Errors in WordPress
function no_wordpress_errors(){
	return 'Some information is wrong! Please try again.';
  }
add_filter( 'login_errors', 'no_wordpress_errors' );

// limit revisions
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 2);
//if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', false);

// Add Author Profile Fields
function wpb_new_contactmethods( $contactmethods ) {
	//add Facebook
	$contactmethods['facebook'] = 'Facebook Profile';
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter Profile';
	// Add LinkedIn
	$contactmethods['linkedin'] = 'LinkedIn Profile';
	// Add Instagram
	$contactmethods['instagram'] = 'Instagram Profile';
	
	 
	return $contactmethods;
	}
add_filter('user_contactmethods','wpb_new_contactmethods',10,1);

// usage <?php echo $curauth->twitter; 

// Add page name as class in body tag
add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) 
{
	if ( is_singular( 'page' ) ) {
		global $post;
		// add 'post_name' to the $classes array 
		$classes[] = $post->post_name;
		// return the $classes array
	}
	return $classes;
}

// Add Widget Ready Areas or Sidebar in WordPress Themes
// Register Sidebars
/*
function custom_sidebars() {
 
    $args = array(
        'id'            => 'custom_sidebar',
        'name'          => __( 'Custom Widget Area', 'text_domain' ),
        'description'   => __( 'A custom widget area', 'text_domain' ),
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
    );
    register_sidebar( $args );
 
}
add_action( 'widgets_init', 'custom_sidebars' );

// usage

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('custom_sidebar') ) : ?>
<!–Default sidebar info goes here–>
<?php endif; ?>
*/

// Disable Login by Email in WordPress
// remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );

// Change Read More Text for Excerpts in WordPress
/*
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Your Read More Link Text</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );
*/

// Add Additional File Types to be Uploaded in WordPress
/*
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);
*/

// custom excerpt ellipses for 2.9+
/*
function custom_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
*/

// hide update notifications
/*
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes

add_action('after_setup_theme','remove_core_updatess');
function remove_core_updatess() {
if(! current_user_can('update_core')){return;}
add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
add_filter('pre_option_update_core','__return_null');
add_filter('pre_site_transient_update_core','__return_null');
}

remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');
*/

/*
// Show posts of 'post', 'page', 'portfolio' and 'project' post types in search results
function search_filter( $query ) {
	if ( !is_admin() && $query->is_main_query() ) {
	  if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'portfolio', 'project' ) );
	  }
	}
  }
add_action( 'pre_get_posts','search_filter' );
*/

/*
// Add a Custom Dashboard Logo
function wpb_custom_logo() {
	echo '
	<style type="text/css">
	#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
	background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/custom-logo.png) !important;
	background-position: 0 0;
	color:rgba(0, 0, 0, 0);
	}
	#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
	background-position: 0 0;
	}
	</style>
	';
	}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
*/

// Change the Default Gravatar in WordPress
/*
add_filter( 'avatar_defaults', 'wpb_new_gravatar' );
function wpb_new_gravatar ($avatar_defaults) {
$myavatar = 'http://example.com/wp-content/uploads/2017/01/wpb-default-gravatar.png';
$avatar_defaults[$myavatar] = "Default Gravatar";
return $avatar_defaults;
}
*/

// Add Additional Image Sizes in WordPress
/*
add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode
add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode
// usage > <?php the_post_thumbnail( 'homepage-thumb' ); ?>
*/

// Add Custom Dashboard Widgets in WordPress
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
wp_add_dashboard_widget('custom_help_widget', 'Oasis Theme Notes', 'custom_dashboard_help');
}
function custom_dashboard_help() {
echo '
<p>Manage this CMS by using sections/links in the left sidebar.</p>
<hr>
<p><u>Site Main Settings</u>: Oasis Settings</p>
<p><u>Site/Plugins Settings</u>: Settings</p>
<p><u>Update Header/Footer Menus</u>: Appearace > Menus</p>
<p><u>Edit Pages</u>: Pages > All Pages</p>
<p><u>Create New Post</u>: Posts > Add New</p>
<p><u>Create New Page</u>: Pages > Add New</p>
<p><u>Add New Project (Portfolio Entry)</u>: Portfolio > Add New</p>
<p><u>Approve/Disapprove Comments</u>: Comments</p>
<p><u>Inject CSS/JS Code in Header/Footer</u>: Settings > Header and Footer</p>
<p><u>Reusable Code Blocks</u>: Text Blocks</p>
<p><u>Reusable Tables</u>: TablePress</p>
<hr>
Main areas are "<u>Posts</u>", "<u>Pages</u>", "<u>Oasis Settings</u>", "<u>Appearance</u>", "<u>Plugins</u>" and "<u>Settings</u>".<br>
"Settings" contain almost all plugins setting pages.<br>
Some plugins create more sidebar "menus" for their setting pages.
<hr>
If you are creating a NEW PAGE, use<br>
- "Container" template for .container<br>
- "Container Fluid" template for .container-fluid<br>
- "Full Width" template for no container and 100% width
<hr>
<strong style="color:red;">DO NOT change/switch theme. Site design depends on current theme</strong>.<br>
<strong style="color:red;">DO NOT upgrade "Advanced Custom Fields PRO" plugin. This site depends on custom fields & we do not have key for latest version</strong>.<br>
<strong style="color:red;">Take atleast one backup (files and DB) in a month</strong>.<br>
<strong style="color:red;">Theme and plugin updates have been stopped after development but we will manage to update when there is a crucial upgrade available. During development all plugins and themes are at latest version</strong>.
<hr>
Happy WordPressing...!<br>
<a href="https://javedkhalil.com" target="_blank">M. Javed Khalil</a>
';
}

// change admin logo 
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-black.png");
		width:202px;
		height:69px;
		background-size: 202px 69px;
		background-repeat: no-repeat;
       	padding-bottom: 0px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// add support of shortcodes in acf fields
// not tested
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=input', 'do_shortcode');

// or use this in template file // for slider or a contact form
/*
$slider_shortcode = get_field( 'slider_shortcode_field_name' ); 
echo do_shortcode($slider_shortcode);
*/


// Turn off error reporting
// error_reporting(0);
// @ini_set('display_errors', 0);

// shortcodes for redux
// include ("shortcode_clients.php");
// include ("shortcode_slider.php");
