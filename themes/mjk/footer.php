<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
?>

<?php $footerWidth=ot_get_option("footer_width"); ?>

<?php //  frontpage / homepage bottom widget ?>
<?php if (is_home() && is_active_sidebar('frontpage-banner2') || is_front_page() && is_active_sidebar('frontpage-banner2')) { ?>
	<div class="container bottom-banner-home">
		<?php dynamic_sidebar( 'frontpage-banner2' ); ?>
	</div>
<?php } ?>


<?php //  footer starts ?>
<div id="footer">
	<div class="footer">

		<!--footer widgets start-->
		<?php if (is_active_sidebar('sidebar-footer1') || is_active_sidebar('sidebar-footer2') || 
		is_active_sidebar('sidebar-footer3') || is_active_sidebar('sidebar-footer4')) { ?> 
			<div class="<?php if(isset($footerWidth) && $footerWidth =='fixed') { echo "container"; } elseif(isset($footerWidth) && $footerWidth =='wide') { echo "container-fluid"; } else { echo "container"; } ?> footer-widgets">
				<div class="row">
					<div class="<?php if (is_active_sidebar('sidebar-footer1') && !is_active_sidebar('sidebar-footer2') && 
						!is_active_sidebar('sidebar-footer3') && !is_active_sidebar('sidebar-footer4')) { ?>col-md-12 col-sm-12
						<?php } ?>
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						!is_active_sidebar('sidebar-footer3') && !is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-6 col-sm-12
						<?php } ?>
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && !is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-4 col-sm-4
						<?php } ?>
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-3 col-sm-12
						<?php } ?>">
						<?php if (is_active_sidebar('sidebar-footer1')) { dynamic_sidebar( 'sidebar-footer1' ); } ?>
					</div>
					<div class="<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						!is_active_sidebar('sidebar-footer3') && !is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-6 col-sm-12
						<?php } ?>
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && !is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-4 col-sm-4
						<?php } ?>
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-3 col-sm-12
						<?php } ?>">
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2')) { dynamic_sidebar( 'sidebar-footer2' ); } ?>
					</div>
					<div class="<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && !is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-4 col-sm-4
						<?php } ?>
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-3 col-sm-12
						<?php } ?>">
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && is_active_sidebar('sidebar-footer3')) { dynamic_sidebar( 'sidebar-footer3' ); } ?>
					</div>
					<div class="<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && 
						is_active_sidebar('sidebar-footer3') && is_active_sidebar('sidebar-footer4')) { ?> 
						col-md-3 col-sm-12
						<?php } ?>">
						<?php if (is_active_sidebar('sidebar-footer1') && is_active_sidebar('sidebar-footer2') && is_active_sidebar('sidebar-footer3') && is_active_sidebar('sidebar-footer4')) { dynamic_sidebar( 'sidebar-footer4' ); } ?>
					</div>

				</div>


				<?php 
				// if footer widget is active add border bottom
				if (is_active_sidebar('sidebar-footer1') || is_active_sidebar('sidebar-footer2') || is_active_sidebar('sidebar-footer3') || is_active_sidebar('sidebar-footer4')) { ?>
				<div class="footer-widgets-brd"></div>
				<?php } ?>


			</div>
		<?php } ?>
		<!--footer widgets end-->

		<div class="<?php if(isset($footerWidth) && $footerWidth =='fixed') { echo "container"; } elseif(isset($footerWidth) && $footerWidth =='wide') { echo "container-fluid"; } else { echo "container"; } ?>">



<?php 
// social icons display check starts
$socialFooterDisplay=ot_get_option("social_links_footer_mjk"); ?>
<?php if(isset($socialFooterDisplay) && $socialFooterDisplay!='' && $socialFooterDisplay=='on') { ?>

			<div class="wow fadeInUp social-icons-footer" data-wow-duration="1s" data-wow-delay="0s">
				
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

			<div class="clear20"></div>
<?php
// social icons display check ends
 } ?>






			
			<div class="wow fadeInUp copyrights" data-wow-duration="1s" data-wow-delay="0.1s">

<?php 
// copyrights display
$copyrightTxt=ot_get_option("footer_text_copyrights"); ?>
<?php if(isset($copyrightTxt) && $copyrightTxt!='') { echo "$copyrightTxt"; } else { ?>

				
					&copy; <a href="<?php bloginfo('url'); ?>/"> <?php bloginfo('name'); ?></a> 2004-<?php echo date("Y"); ?>. ALL RIGHTS RESERVED.
					<br>
					MJK WordPress Theme, Design & Development by <a title="Muhammad Javed Khalil" href="http://www.javedkhalil.com" target="_blank">Javed Khalil</a> (<a href="http://www.techmynd.com" target="_blank">TechMynd</a>).
				    <br>

<?php
// copyrights ends
 } ?>

				<div><a href="<?php bloginfo('rss2_url'); ?>" target="_blank">RSS Feeds</a> - <a href="<?php bloginfo('comments_rss2_url'); ?>" target="_blank">Comments RSS</a></div>
			</div> 

		</div>
	</div>
</div>

	<?php // scroll to top ?>
	<div id="scrollToTop"><i class="fa fa-angle-up"></i></div>

	<?php // footer scripts ?>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery.easing.js"></script>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery.mousewheel.js"></script>
	<?php 
	// footer scripts injection for other plugins
	wp_footer(); ?>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/wow.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/bootstrap.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/custom.js"></script>


<?php $footerCode=ot_get_option("footer_code_js_mjk"); ?>
<?php if(isset($footerCode) && $footerCode!='') { echo "$footerCode"; } ?>

</body>
</html>