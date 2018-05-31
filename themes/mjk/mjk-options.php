<?php

// in development // can be used to create custom admin - call it in functions.php

// Add stylesheet
add_action('admin_head', 'admin_register_head');
function admin_register_head() {  
	$furl = get_bloginfo('template_directory') . '/styles/font-awesome.min.css';  
	echo "<link rel='stylesheet' href='$furl' />n";
	$burl = get_bloginfo('template_directory') . '/styles/theme-options-page.css';  
 	echo "<link rel='stylesheet' href='$burl' />n";
}


function mjk_settings_page()
{
    ?>
	    <div class="wrap mjk-options-wrap">
	    <h1><i class="fa fa-gear fa-fw"></i><span style="font-weight:900;">MJK</span> Theme Settings</h1>

		<?php if( isset($_GET['settings-updated']) && isset($_GET['page']) && $page='mjk-theme-settings' ) { ?>
		    <div id="message" class="updated">
		        <p><strong><?php _e('MJK Settings saved successfully.') ?></strong></p>
		    </div>
		<?php } ?>

	    <hr>

		<div class="clear10"></div>
	    <div class="wp-core-ui">
	    	<button class="button-primary">Layout/Colors</button>
	    	<button class="button-primary">Blog Settings</button>
	    	<button class="button-primary">Social Profiles</button>
	    	<button class="button-primary">Header/Footer</button>
	    	<button class="button-primary">Switch</button>
	    </div>

	    <form method="post" action="options.php" enctype="multipart/form-data">
	    	<div style="">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>
	        </div>          
	    </form>


		</div>
	<?php
}

// add this page as main menu 
/*
function add_theme_menu_item() {
	add_menu_page("Theme Panel", "MJK Settings", "manage_options", "mjk-theme-settings", "mjk_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");
*/

// add this page as sub menu under appearance
function register_options_submenu_page() {
    add_submenu_page(
        'themes.php',
        'MJK Settings',
        'MJK Options',
        'manage_options',
        'mjk-theme-settings',
        'mjk_settings_page' );
}
add_action('admin_menu', 'register_options_submenu_page');


function display_theme_panel_fields()
{
	add_settings_section("section", "Layout & Color Settings", null, "theme-options");
	
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("container_option", "Container Class Type", "display_container_option", "theme-options", "section");

    add_settings_field("check_1", "Feature 1", "display_check_1", "theme-options", "section");
    add_settings_field("area_one", "Footer Tracking Code", "display_area_one", "theme-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "container_option");
    register_setting("section", "check_1");
    register_setting("section", "area_one");

}
add_action("admin_init", "display_theme_panel_fields");








// fields

function display_twitter_element() { ?>
   	<input type="text" class="regular-text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>">
<?php }

function display_facebook_element() { ?>
   	<input type="text" class="regular-text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>">
<?php }

function display_container_option() { ?>
		<?php $what_container_option=get_option('container_option'); ?>
		<select class="" name="container_option" id="container_option">
			<option value="container" <?php if($what_container_option=="container") { echo "selected"; } ?>>Container</option>
			<option value="container-fluid" <?php if($what_container_option=="container-fluid") { echo "selected"; } ?>>Container Fluid</option>
		</select>
		<span class="description">Website container class</span>
<?php }

function display_check_1() { ?>
<?php $get_check_1=get_option('check_1'); ?>
<label>
<input name="check_1" type="checkbox" id="check_1" value="1" <?php if($get_check_1=='1') {echo "checked";} ?>>
	Some chekbox value
</label>
<?php }







function display_area_one() { ?>
<?php 

$mytext_var=get_option('area_one'); // this var may contain previous data that was stored in mysql.
// wp_editor( $content, $editor_id, $settings = array() );
wp_editor($mytext_var,"area_one", array('textarea_rows'=>5, 'editor_class'=>'mjk-textarea-class','media_buttons'=>'false', 'teeny'=>'true', 'textarea_name'=>'area_one'));

// wp_editor( $content, $editor_id, $settings = array() ); ?> 
   	<!-- <textarea name="area_one" rows="10" cols="50" id="area_one" class="large-text code"><?php echo get_option('area_one'); ?></textarea> -->
<?php }











// how to use
// call stuff from this page in themes like below

/*
// facebook_url is id used here for an input
$facebook_url = get_option('facebook_url');
echo "$facebook_url";
$container_option = get_option('container_option');
echo "$container_option";
*/


?>
