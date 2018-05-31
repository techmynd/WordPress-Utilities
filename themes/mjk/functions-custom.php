<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
*/

// define('WP_CACHE', true);
// define('AUTOSAVE_INTERVAL', 10); //in seconds
// define('WP_POST_REVISIONS', true);
// define('WP_POST_REVISIONS', 1); //1 revision

// define('EMPTY_TRASH_DAYS', 2 ); //the amount of days
// define('WP_ALLOW_REPAIR', true);
// define('WP_MEMORY_LIMIT', '128M');

// @ini_set('log_errors','Off'); // On - Off
// @ini_set('display_errors','Off');
// @ini_set('error_log','/home/path/domain/logs/php_error.log');

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Add theme support for HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
// add_theme_support( 'title-tag' );

// Enable support for WooCommerce
add_theme_support( 'woocommerce' );

// This theme uses wp_nav_menu() in one location
// register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'quark' ) ));
// register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'mjk_menu' ) ));

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'mjk' ),
));

// #############################################

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

// enable shortcode in widgets
add_filter('widget_text', 'do_shortcode');

// #############################################
// add support for post thumbnails
add_theme_support('post-thumbnails');
// usage > place the following code inside your loop
//<?php the_post_thumbnail(); ? >
//<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive center-block' ) ); ? >
//or
// wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

// Create an extra image size for the Post featured image
add_image_size( 'post_feature_full_width', 792, 300, true );

// #############################################
// remove wordpress version number from source
function mjk_remove_version() {
return '';
}
add_filter('the_generator', 'mjk_remove_version');

// #############################################
// custom admin logo
function wpb_custom_logo() {
echo '<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/custom-admin-logo.png) !important;
background-position: 50% 50%; background-size: cover; color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon { background-position: 50% 50%; }
</style>';
}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// #############################################
// remove admin logo dropdownlinks
function remove_admin_logo_dropdown() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('about');
	$wp_admin_bar->remove_menu('wporg');
	$wp_admin_bar->remove_menu('documentation');
	$wp_admin_bar->remove_menu('support-forums');
	$wp_admin_bar->remove_menu('feedback');
	// $wp_admin_bar->remove_menu('view-site');
	// remove wp logo altogether
	// $wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_logo_dropdown' );


// #############################################
// Add custom links in admin bar
function mjk_custom_admin_bar() {
 global $wp_admin_bar;
// Add a top-level menu url
 $blogURL = 'http://techmynd.com/';
 $wp_admin_bar->add_menu( array(
 'parent' => false,
 'id' => 'blog',
 'title' => __('<div class="wp-menu-image dashicons-before dashicons-admin-page"> Top Menu Item Custom</div>'),
 'href' => $blogURL
 ));

// Add a secondary menu item
 $blognURL = 'http://techmynd.com/';
 $wp_admin_bar->add_menu(array(
 'parent' => 'blog',
 'id' => 'contact_us',
 'title' => __('Sublink'),
 'href' => $blognURL
 ));
}
// display it
add_action( 'wp_before_admin_bar_render', 'mjk_custom_admin_bar' );

// #############################################
// remove footer from admin
function remove_footer_admin () {
echo 'Designed & Developed by <a href="http://www.techmynd.com" target="_blank">Muhammad Javed Khalil</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
add_filter( 'update_footer', '__return_empty_string', 11 );

// #############################################
// custom Dashboard Widgets
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

// Widget slug / Widget title / Display function

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
wp_add_dashboard_widget('custom_links_widget_1', 'Useful Links', 'custom_dashboard_links_1');
wp_add_dashboard_widget('custom_links_widget_2', 'Landing Pages', 'custom_dashboard_links_2');

// adding widgets in sidebar to show in dashboard
// DEFINE DASHBOARD SIDEBAR (step 1)
wp_add_dashboard_widget('custom_dashboard_sidebar', 'Widgets Box','dashboard_sidebar');
// rest of the part is below for this
}

	
	// this depends on wp_add_dashboard_widget('custom_dashboard_sidebar', 'Dashboard Widgets','dashboard_sidebar');
	// register Dashboard Sidebar in widgets area (step 2)
	register_sidebar(array(
        'name' => esc_html__( 'Dashboard Sidebar' ),
        'id' => 'dynamic_dashboard_sidebar',
        'description' => esc_html__( 'Add widgets to dashboard here.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s dashboard-widgets" style="margin-bottom:10px; padding-bottom:10px;">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="dashboard-widget-title" style="background-color:#eee; font-weight:bold; text-transform:uppercase; padding:4px;">',
        'after_title' => '</h3>',
    ));

	// Show Dashboard Sidebar in Dashboard (step 3)
	function dashboard_sidebar() {
		dynamic_sidebar('dynamic_dashboard_sidebar');
	}


// Regular Hardcoded Dashboard Widgets
// Dashboard Widget 1
function custom_dashboard_help() {
echo '<p>Welcome to MJK Blog Theme! Need help? Contact the developer <a href="mailto:admin@techmynd.com">admin@techmynd.com</a>.
<br>
Edit this from functions.php
</p>';
}

// Dashboard Widget 2
function custom_dashboard_links_1() {
echo '<p>
<a href="#">Custom Link 1</a>
<br>
<a href="#">Custom Link 2</a>
<br>
Edit this from functions.php
</p>';
}

// Dashboard Widget 3
function custom_dashboard_links_2() {
echo '<p>
<a href="#">Landing Page 1</a>
<br>
<a href="#">Landing Page 2</a>
<br>
Edit this from functions.php
</p>';
}

// #############################################
//change default gravatar
// won't show on localhost
// you will need to go to /wp-admin/options-discussion.php and select this new avatar to show
add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
$myavatar = get_bloginfo('template_directory') . '/images/custom-avatar.gif';
$avatar_defaults[$myavatar] = "MJK (Theme Default)";
return $avatar_defaults;
}

// #############################################
// REMOVE META BOXES (news and updates widgets) FROM WORDPRESS DASHBOARD FOR ALL USERS
function mjk_remove_dashboard_widgets()
{
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}
add_action('wp_dashboard_setup', 'mjk_remove_dashboard_widgets' );

// #############################################
// custom admin login logo and background image
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
	body.login { background-image: url('.get_bloginfo('template_directory').'/images/custom-login-bg.jpg) !important; 
	background-repeat:no-repeat; background-position:50% 50%; background-size:cover;
	</style>';
}
add_action('login_head', 'custom_login_logo');

// #############################################
// custom stylesheet for login page
function my_custom_login_style() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/styles/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login_style');

// #############################################
// add author profile fields
function mjk_contactmethods( $contactmethods ) {
//add LinkedIn
$contactmethods['linkedin'] = 'LinkedIn';
//add Skype
$contactmethods['skype'] = 'Skype';
return $contactmethods;
}
add_filter('user_contactmethods','mjk_contactmethods',10,1);
// call these like this >>>>>>>>
// <?php echo $curauth->twitter; ? >

// #############################################
// enable threaded comments
function mjk_enable_threaded_comments(){
	if (!is_admin()) {
	if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
	wp_enqueue_script('comment-reply');
	}
}
add_action('get_header', 'mjk_enable_threaded_comments');

// #############################################
// customize excerpt [...] more

/*
function new_excerpt_more($more) {
    global $post;
    return '<span class="more-dots"> … </span><br>
    <a href="'. get_permalink($post->ID) . '" class="more-link">Continue Reading<i class="fa fa-angle-double-right fa-fw"></i></a>';
   }
add_filter('excerpt_more', 'new_excerpt_more',100);

// #############################################
// custom excerpt length
function new_excerpt_length($length) {
return 60;
}
add_filter('excerpt_length', 'new_excerpt_length');
*/



// #############################################
// enable full editor in admin and all buttons
function enable_more_buttons($buttons) {
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'styleselect';
$buttons[] = 'backcolor';
$buttons[] = 'newdocument';
$buttons[] = 'cut';
$buttons[] = 'copy';
$buttons[] = 'charmap';
$buttons[] = 'hr';
$buttons[] = 'visualaid';
return $buttons;
}
add_filter("mce_buttons_3", "enable_more_buttons");

add_filter( 'tiny_mce_before_init', 'myformatTinyMCE' );
function myformatTinyMCE( $in ) {
$in['wordpress_adv_hidden'] = FALSE;
return $in;
}

// #############################################
// Add "Next-page"-button in WYSIYG-editor in admin
add_filter('mce_buttons','wysiwyg_editor');
function wysiwyg_editor($mce_buttons) {
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
}

// #############################################
// remove update notifications from WordPress Admin
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');


// #############################################
// Stop Spammers on comments form
function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
        wp_die( __('Please enable referrers in your browser, or, if youre a spammer, bugger off!') );
    }
}
add_action('check_comment_flood','check_referrer');


// SHORTCODES //////////////////////////////////
// #############################################
// search shortcode
function mjk_search_function() { 
$srchBlock = '<form role="search" method="get" class="mjk-search-form" action="'.get_site_url().'/">
    <div class="form-group">
    	<i class="fa fa-search fa-fw"></i>
        <input type="search" class="form-control" placeholder="Keywords …" value="" name="s">
    </div>
    <button type="submit" class="btn btn-success btn-block">SEARCH</button>
</form><div class="clear"></div>';
return $srchBlock;
} 
add_shortcode('mjk-search', 'mjk_search_function');
// usage
// in widgets > [mjk-search]
// in php < ? php echo do_shortcode('[mjk-search]'); ? >

// Socials shortcode
function mjk_social_function() { 
$socialBlock = '<div class="mjk-social text-center"><a href="#" target="_blank"><i class="fa fa-facebook fa-fw"></i></a>
<a href="#" target="_blank"><i class="fa fa-twitter fa-fw"></i></a>
<a href="#" target="_blank"><i class="fa fa-linkedin fa-fw"></i></a>
<a href="#" target="_blank"><i class="fa fa-instagram fa-fw"></i></a></div>';
return $socialBlock;
} 
add_shortcode('mjk-social', 'mjk_social_function');
// usage
// in widgets > [mjk-social]
// in php < ? php echo do_shortcode('[mjk-social]'); ? >


/**
 * MJK Breadcrumbs
 */
function mjk_breadcrumbs(){
  /* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['tax'] 	  = 'Archive for "%s"'; // text for a taxonomy page
	$text['search']   = 'Search Results for "%s"'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page

	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = ''; // delimiter between crumbs
	$before      = '<li class="current active">'; // tag before the current crumb
	$after       = '</li>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$homeLink = get_bloginfo('url') . '/';
	$linkBefore = '<li>';
	$linkAfter = '</li>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

	if (is_home() || is_front_page()) {

		if ($showOnHome == 1) echo '<ol id="crumbs" class="breadcrumb"><a href="' . $homeLink . '">' . $text['home'] . '</a></ol>';

	} else {

		echo '<ol id="crumbs" class="breadcrumb">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

		
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif( is_tax() ){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
		
		}elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
			$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo $delimiter;
			}
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ol>';

	}
} // end mjk_breadcrumbs()


// POST FORMATS //////////////////////////////////
// Remove post formats support & remove Formats box from new post
add_action('after_setup_theme', 'remove_post_formats', 11);
function remove_post_formats() {
    remove_theme_support('post-formats');
}



/*
// #############################################
// register sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'MiddleSidebar',
'before_widget' => '<li class="widget">',
'after_widget' => '</li>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h3>',
));
register_sidebar(array('name'=>'FooterSidebar',
'before_widget' => '<li class="widget">',
'after_widget' => '</li>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h3>',
));

// call sidebars >>>>>>>>>>
// < ? p h p if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('MiddleSidebar') ) : ? >
// Default sidebar info goes here
// <?php endif; ? >

// #############################################
// category id in body and post class
function category_id_class($classes) {
	global $post;
	foreach((get_the_category($post->ID)) as $category)
		$classes [] = 'cat-' . $category->cat_ID . '-id';
		return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

// #############################################
// rss footer addition
function mjk_postrss($content) {
if(is_feed()){
$content = 'This post was written by MJK '.$content.'Check out MJK';
}
return $content;
}
add_filter('the_excerpt_rss', 'mjk_postrss');
add_filter('the_content', 'mjk_postrss');

// #############################################
// add thumbnails to rss feeds
function mjk_rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'mjk_rss_post_thumbnail');
add_filter('the_content_feed', 'mjk_rss_post_thumbnail');

// #############################################
// enable adsense shortcode
function showads() {
return '<div id="adsense"><script type="text/javascript"><!–
google_ad_client = "pub-XXXXXXXXXXXXXX";
google_ad_slot = "4668915978";
google_ad_width = 468;
google_ad_height = 60;
//–>
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>';
}
add_shortcode('adsense', 'showads');

*/


/*
// Advanced Custom Fields Pro - Options Page
if(function_exists('acf_add_options_page')) {
	
	// acf_add_options_page();	
	//acf_add_options_sub_page('Header');
	//acf_add_options_sub_page('Footer');

	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug' => 'theme-options',
		'capability' => 'edit_posts',
		'parent_slug' => '',
		'position' => false,
		'icon_url' => false,
		'redirect' => false
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Header',
		'menu_title' => 'Header',
		'menu_slug' => 'theme-options-header',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-options',
		'position' => false,
		'icon_url' => false,
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Footer',
		'menu_title' => 'Footer',
		'menu_slug' => 'theme-options-footer',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-options',
		'position' => false,
		'icon_url' => false,
	));

	acf_add_options_sub_page(array(
		'page_title' => 'Post Settings',
		'menu_title' => 'Post Settings',
		'menu_slug' => 'post-settings',
		'capability' => 'edit_posts',
		'parent_slug' => 'edit.php',
		'position' => false,
		'icon_url' => false,
	));	
}
// Advanced Custom Fields Pro - Ends
*/

?>
