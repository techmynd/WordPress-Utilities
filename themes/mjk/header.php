<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php bloginfo('name'); ?> <?php if(is_single()) { ?><?php } ?> <?php wp_title(); ?><?php if(is_home()) { ?> <?php bloginfo('description'); } ?><?php if(is_search()) { ?> - Search Results<?php } ?></title>

	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>">
	<!--<link rel="alternate" type="application/rss+xml" title="<?php // bloginfo('name'); ?> RSS Feed" href="<?php // bloginfo('rss2_url'); ?>">-->
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php if (is_home()) { wp_get_archives('type=monthly&format=link'); } ?>
	
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/animate.min.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/font-awesome.min.css">
	
	<?php wp_head(); ?>

    <script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery-1.11.3.min.js"></script>

	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png">
	<link rel="icon" type="images/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico">

	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/bootstrap-theme.min.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/custom.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/shahinshah.css">
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/responsive.css">


<!--conditioonal font URLs start-->
<?php $bodyFontURL=ot_get_option("general_font_url_body"); ?>
	<?php if(isset($bodyFontURL) && $bodyFontURL!='') { echo "$bodyFontURL"; ?>
<?php } ?>
<?php $hFontURL=ot_get_option("heading_font_url_heading"); ?>
	<?php if(isset($hFontURL) && $hFontURL!='') { echo "$hFontURL"; ?>
<?php } ?>
<!--conditioonal font URLs start-->

<style type="text/css">
/*Conditional CSS from Theme Options*/
<?php require( trailingslashit( get_template_directory() ) . 'theme-options-header-spray.php' ); ?>
</style>

<?php $siteTagsHomepage=ot_get_option("site_verification_extra_tags"); ?>
<?php if(isset($siteTagsHomepage) && $siteTagsHomepage!='' && is_home() || isset($siteTagsHomepage) && $siteTagsHomepage!='' && is_front_page()) 
{ echo "$siteTagsHomepage"; } ?>

<?php $siteCSSOverride=ot_get_option("custom_code_css_header_mjk"); ?>
<?php if(isset($siteCSSOverride) && $siteCSSOverride!='') { ?>
	<style type="text/css">
	<?php echo "$siteCSSOverride"; ?>
	</style>
<?php } ?>

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="<?php $composer_chk=get_field('composer_check'); if(isset($composer_chk) && $composer_chk=='yes') { echo "composer-on"; } ?><?php $unique_body_c=get_field('unique_body_class'); if(isset($unique_body_c) && $unique_body_c!='') { echo " $unique_body_c"; } ?>">

<?php //Header Starts - use class navbar-fixed-top to stick it to top?>

<?php $topBarShow=ot_get_option("mjk_show_topbar"); ?>
<?php 
$show_topbar_cf=get_field('show_top_bar');
// show topbar check starts
if(isset($topBarShow) && $topBarShow!='' && $topBarShow=='on' && $show_topbar_cf!='no') { ?>

<?php $topBarWidth=ot_get_option("topbar_width"); ?>

<?php $phoneShow=ot_get_option("phone_show_mjk"); ?>
<?php $emailShow=ot_get_option("email_address_show_mjk"); ?>
<?php $addressShow=ot_get_option("business_address_show_mjk"); ?>

<div class="top-bar">
	<div class="<?php if(isset($topBarWidth) && $topBarWidth =='fixed') { echo "container"; } elseif(isset($topBarWidth) && $topBarWidth =='wide') { echo "container-fluid"; } else { echo "container"; } ?> clearfix">
		<div class="pull-left wow fadeInDown contact-info" data-wow-duration="1s" data-wow-delay="0s">
			<?php if(isset($phoneShow) && $phoneShow!='') { ?>
				<i class="fa fa-phone fa-fw"></i><?php echo "$phoneShow"; ?>
			<?php } ?>
			<?php if(isset($emailShow) && $emailShow!='') { ?>
				<a href="mailto:<?php echo "$emailShow"; ?>"><i class="fa fa-envelope-o fa-fw"></i> <?php echo "$emailShow"; ?></a> 
			<?php } ?>
			<?php if(isset($addressShow) && $addressShow!='') { ?>
				<i class="fa fa-map-marker fa-fw"></i><?php echo "$addressShow"; ?>
			<?php } ?>
		</div>

		<?php $sFB=ot_get_option("facebook_link_mjk"); ?>
		<?php $sTW=ot_get_option("twitter_link_mjk"); ?>
		<?php $sLK=ot_get_option("linkedin_link_mjk"); ?>
		<?php $sGP=ot_get_option("google_link_mjk"); ?>
		<?php $sYT=ot_get_option("youtube_link_mjk"); ?>
		<?php $sVM=ot_get_option("vimeo_link_mjk"); ?>
		<?php $sFLK=ot_get_option("flickr_link_mjk"); ?>
		<?php $sPINT=ot_get_option("pinterest_link_mjk"); ?>
		<?php $sINST=ot_get_option("instagram_link_mjk"); ?>
		<?php $sRSS=ot_get_option("show_rss_link_mjk"); ?>
		
		<?php $topSocialShow=ot_get_option("social_links_show_top_mjk"); ?>
		<?php 
		// show top social links check starts
		if(isset($topSocialShow) && $topSocialShow!='' && $topSocialShow=='on') { ?>
		<div class="pull-right wow fadeInDown socials" data-wow-duration="1s" data-wow-delay="0.1s">
			
			<?php if(isset($sFB) && $sFB!='') { ?>
			<a href="<?php echo "$sFB"; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sTW) && $sTW!='') { ?>
			<a href="<?php echo "$sTW"; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sLK) && $sLK!='') { ?>
			<a href="<?php echo "$sLK"; ?>" target="_blank" title="Linkedin"><i class="fa fa-linkedin fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sGP) && $sGP!='') { ?>
			<a href="<?php echo "$sGP"; ?>" target="_blank" title="Google+"><i class="fa fa-google-plus fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sYT) && $sYT!='') { ?>
			<a href="<?php echo "$sYT"; ?>" target="_blank" title="YouTube"><i class="fa fa-youtube fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sVM) && $sVM!='') { ?>
			<a href="<?php echo "$sVM"; ?>" target="_blank" title="Vimeo"><i class="fa fa-vimeo fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sFLK) && $sFLK!='') { ?>
			<a href="<?php echo "$sFLK"; ?>" target="_blank" title="Flickr"><i class="fa fa-flickr fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sPINT) && $sPINT!='') { ?>
			<a href="<?php echo "$sPINT"; ?>" target="_blank" title="Pinterest"><i class="fa fa-pinterest fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sINST) && $sINST!='') { ?>
			<a href="<?php echo "$sINST"; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram fa-fw"></i></a>
			<?php } ?>
			<?php if(isset($sRSS) && $sRSS!='' && $sRSS=='on') { ?>
			<a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="RSS"><i class="fa fa-rss fa-fw"></i></a>
			<?php } ?>

		</div>
		<?php 
		// show top social links check ends
		} ?>

	</div>
</div>

<?php 
// show topbar check ends
} ?>

<?php $navWidth=ot_get_option("header_navigation_width"); ?>

<div class="header">
	<div class="<?php if(isset($navWidth) && $navWidth=='narrow') { echo "container"; } ?> clearfix"><?php // add class container in clearfix to make menu contained ?>

	<?php 
	// convert wordpress menu into bootstrap responsive nav menu
	require_once('wp_bootstrap_navwalker.php'); 
	?>

	<!-- #nav Starts -->
    <div id="nav">
    <nav class="navbar navbar-default no-border no-border-radius full-width-nav" role="navigation">
      <div class="<?php if(isset($navWidth) && $navWidth=='wide') { echo "container-fluid"; } elseif(isset($navWidth) && $navWidth=='fixed') { echo "container"; } elseif(isset($navWidth) && $navWidth=='narrow') { echo ""; } else { echo "container"; } ?> clearfix"><?php // remove class container in this line if you place container above to make menu contained ?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <!--incase we have logo show site logo-->
		<?php $logoImgCheck=ot_get_option("upload_logo_mjk"); ?>
		<?php 
		// if we have logo
		if(isset($logoImgCheck) && $logoImgCheck!='') { ?>
          <h1><a class="navbar-brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>, <?php bloginfo('description'); ?>"><img class="logo" src="<?php echo "$logoImgCheck"; ?>" class="img-responsive" alt="<?php bloginfo('name'); ?>, <?php bloginfo('description'); ?>"></a></h1>
		<?php } else { ?>	
		  <!--incase of no logo use site name and slgan -->			  
		  <div id="siteTitle">
		  	<h1><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
		  </div>
		<?php } ?>

        </div>
        <?php
        wp_nav_menu( array(
                'menu'              => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'navbar-collapse collapse',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
      </div><!-- /.container-fluid -->
    </nav>
</div><!-- #nav -->



	</div> <!-- .clearfix ends -->
</div> <!-- header ends -->

<?php 
// revslider for any page or post start
$revSlider=get_field("slider_shortcode");
if(isset($revSlider) && $revSlider!='') { ?>
<div class="home-slider-area">
	<?php echo do_shortcode('[rev_slider alias="'.$revSlider.'"]'); ?>
</div>
<?php } 
// revslider for any page or post ends
?>

<?php 
// custom fields // page top banner start
$bannerImg = get_field("background_image_bm");
$bannerCapt = get_field("caption_bm");
$bannerDesc = get_field("description_bm");
$bannerCustomClass = get_field("custom_class_name_bm");
$bannerHeightBm = get_field("area_height_bm");
$bannerTxtTone = get_field("text_tone_bm");
if(isset($bannerImg) && $bannerImg!='') {
?>
	<div class="pgBanner <?php if(isset($bannerCustomClass) && $bannerCustomClass!='') { echo "$bannerCustomClass"; } ?>" style="background-image:url(<?php echo "$bannerImg"; ?>);">
		<div class="pgbn-container <?php if(isset($bannerTxtTone) && $bannerTxtTone!='') { echo "$bannerTxtTone"; } ?>" <?php if(isset($bannerHeightBm) && $bannerHeightBm!='') { ?> style="height:<?php echo "$bannerHeightBm"; ?>px;"; <?php } ?>>
			<?php if(isset($bannerCapt) && $bannerCapt!='') { ?>
				<h2 class="title"><?php echo "$bannerCapt"; ?></h2>
			<?php } ?>	
			<?php if(isset($bannerDesc) && $bannerDesc!='') { ?>
				<div class="description"><?php echo "$bannerDesc"; ?></div>
			<?php } ?>
		</div>
	</div>
<?php } 
// custom fields // page top banner end
?>

<?php 
// frontpage / homepage top widget
if (is_home() && is_active_sidebar('frontpage-banner1') || is_front_page() && is_active_sidebar('frontpage-banner1')) { ?>
	<div class="container top-banner-home">
		<?php dynamic_sidebar( 'frontpage-banner1' ); ?>
	</div>
<?php } ?>

<?php 
// breadcrumb
$show_crumb_cf=get_field('show_breadcrumb');
if( function_exists('mjk_breadcrumbs') && $show_crumb_cf!='no' && !is_404() && !is_woocommerce() && !is_feed() && !is_front_page() && !is_home() && !in_category('landing-pages') ) { ?>
	<div class="container">
		<?php mjk_breadcrumbs(); ?>
	</div>
	<div class="clear"></div>
<?php } ?>

