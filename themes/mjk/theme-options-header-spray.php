<?php // nav starts ?>

<?php $navBG=ot_get_option("nav_background_color"); ?>
<?php if(isset($navBG) && $navBG!='') { ?>
.navbar-default {background-image:none; background-color:<?php echo "$navBG"; ?>;}
.navbar-nav .dropdown-menu {background-color:<?php echo "$navBG"; ?>;}
.navbar-brand, .navbar-nav>li>a {text-shadow:none;}
<?php } ?>

<?php $navLinkColor=ot_get_option("nav_link_color"); ?>
<?php if(isset($navLinkColor) && $navLinkColor!='') { ?>
.navbar-brand, .navbar-nav>li>a {text-shadow:none;}
.navbar-default .navbar-nav>li>a {color:<?php echo "$navLinkColor"; ?>;}
<?php } ?>

<?php $navLinkHColor=ot_get_option("nav_link_hover_color"); ?>
<?php if(isset($navLinkHColor) && $navLinkHColor!='') { ?>
.navbar-brand, .navbar-nav>li>a {text-shadow:none;}
.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {color:<?php echo "$navLinkHColor"; ?>;}
.dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {background-image:none; background-color:transparent; color:<?php echo "$navLinkHColor"; ?>;}
<?php } ?>

<?php $navLinkAColor=ot_get_option("nav_link_active_color"); ?>
<?php if(isset($navLinkAColor) && $navLinkAColor!='') { ?>
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover 
{color:<?php echo "$navLinkAColor"; ?>;}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover
{color:<?php echo "$navLinkAColor"; ?>;}
<?php } ?>

<?php $navLinkABColor=ot_get_option("nav_link_active_background_color"); ?>
<?php if(isset($navLinkABColor) && $navLinkABColor!='') { ?>
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover 
{background-image:none; background-color:<?php echo "$navLinkABColor"; ?>;}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover
{background-image:none; background-color:<?php echo "$navLinkABColor"; ?>;}
<?php } ?>

<?php // nav ends ?>

<?php $bodyFont=ot_get_option("associated_font_family_general"); ?>
	<?php if(isset($bodyFont) && $bodyFont!='') { ?>body {<?php echo "$bodyFont"; ?>}
<?php } ?>
<?php $hbodyFont=ot_get_option("associated_font_family_heading"); ?>
	<?php if(isset($hbodyFont) && $hbodyFont!='') { ?>h1 a,h2,h3,h4,h5,h6 {<?php echo "$hbodyFont"; ?>}
<?php } ?>

<?php $bodyBG=ot_get_option("body_background_color"); ?>
	<?php if(isset($bodyBG) && $bodyBG!='') { ?>body {background-color:<?php echo "$bodyBG"; ?>;}
<?php } ?>
<?php $conentBG=ot_get_option("content_background_color"); ?>
	<?php if(isset($conentBG) && $conentBG!='') { ?>#content {background-color:<?php echo "$conentBG"; ?>;}
<?php } ?>

<?php $conentHeadingC=ot_get_option("content_heading_color"); ?>
	<?php if(isset($conentHeadingC) && $conentHeadingC!='') { ?>#content h2, #content h2 a, #content h3, #content h3 a, #content h4, #content h4 a, #content h5, #content h5 a, #content h6, #content h6 a {color:<?php echo "$conentHeadingC"; ?>;}
<?php } ?>
<?php $conentHHC=ot_get_option("content_heading_hover_color"); ?>
	<?php if(isset($conentHHC) && $conentHHC!='') { ?>#content h2 a:hover, #content h3 a:hover {color:<?php echo "$conentHHC"; ?>;}
<?php } ?>
<?php $conentTxtC=ot_get_option("content_text_color"); ?>
	<?php if(isset($conentTxtC) && $conentTxtC!='') { ?>#content .entry {color:<?php echo "$conentTxtC"; ?>;}
<?php } ?>
<?php $conentEbrdC=ot_get_option("content_brd_bottom_color"); ?>
	<?php if(isset($conentEbrdC) && $conentEbrdC!='') { ?>#content .entry {border-bottom-color:<?php echo "$conentEbrdC"; ?>;}
<?php } ?>

<?php $conentLinksColor=ot_get_option("content_links_color"); ?>
	<?php if(isset($conentLinksColor) && $conentLinksColor!='') { ?>#content .entry a, #content .postinfo a {color:<?php echo "$conentLinksColor"; ?>;}
<?php } ?>
<?php $contentLinksHoverColor=ot_get_option("content_links_hover_color"); ?>
	<?php if(isset($contentLinksHoverColor) && $contentLinksHoverColor!='') { ?>#content .entry a:hover, #content .postinfo a:hover {color:<?php echo "$contentLinksHoverColor"; ?>;}
<?php } ?>

<?php $sWidget3=ot_get_option("sidebar_widgets_content_color"); ?>
	<?php if(isset($sWidget3) && $sWidget3!='') { ?>.widget-area .widget {color:<?php echo "$sWidget3"; ?>;}
<?php } ?>
<?php $sWidget4=ot_get_option("sidebar_widgets_content_link_color"); ?>
	<?php if(isset($sWidget4) && $sWidget4!='') { ?>.widget-area .widget a {color:<?php echo "$sWidget4"; ?>;}
<?php } ?>
<?php $sWidget5=ot_get_option("sidebar_widgets_content_link_hover_color"); ?>
	<?php if(isset($sWidget5) && $sWidget5!='') { ?>.widget-area .widget a:hover {color:<?php echo "$sWidget5"; ?>;}
<?php } ?>
<?php $sWidget6=ot_get_option("sidebar_widgets_content_background_color"); ?>
	<?php if(isset($sWidget6) && $sWidget6!='') { ?>.widget-area .widget {background-color:<?php echo "$sWidget6"; ?>;}
<?php } ?>
<?php $sWidget1=ot_get_option("sidebar_widgets_heading_color"); ?>
	<?php if(isset($sWidget1) && $sWidget1!='') { ?>.widget .widget-title, .widget .widget-title .fa {color:<?php echo "$sWidget1"; ?>;}
<?php } ?>
<?php $sWidget2=ot_get_option("sidebar_widgets_heading_background_color"); ?>
	<?php if(isset($sWidget2) && $sWidget2!='') { ?>.widget .widget-title {background-color:<?php echo "$sWidget2"; ?>;}
<?php } ?>

<?php $footerC1=ot_get_option("footer_background_color"); ?>
	<?php if(isset($footerC1) && $footerC1!='') { ?>.footer {background-color:<?php echo "$footerC1"; ?>;}
<?php } ?>
<?php $footerC2=ot_get_option("footer_text_color"); ?>
	<?php if(isset($footerC2) && $footerC2!='') { ?>.footer, .footer .copyrights a, .footer-widgets .widget .widget-title {color:<?php echo "$footerC2"; ?>;}
<?php } ?>
<?php $footerC3=ot_get_option("footer_links_color"); ?>
	<?php if(isset($footerC3) && $footerC3!='') { ?>
	    .footer a, .footer .footer-widgets .widget ul li a, .social-icons-footer a .fa {color:<?php echo "$footerC3"; ?>;}
		.footer-widgets-brd {border-bottom: 1px solid <?php echo "$footerC3"; ?>; opacity:0.4;}
		.footer-widgets .widget .widget-title:after {background-color: <?php echo "$footerC3"; ?>; opacity:0.4;}
<?php } ?>
<?php $footerC4=ot_get_option("footer_links_hover_color"); ?>
	<?php if(isset($footerC4) && $footerC4!='') { ?>
		.footer a:hover, .footer-widgets .widget ul li a:hover {color:<?php echo "$footerC4"; ?>;}
		.social-icons-footer a:hover .fa {color:<?php echo "$footerC4"; ?>;}
<?php } ?>

