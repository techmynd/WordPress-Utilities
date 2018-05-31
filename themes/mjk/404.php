<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
get_header(); ?>

<?php 
// check body width
$conWid=ot_get_option("body_content_width"); 
if($conWid=='fixed') { $contentWidth="container"; }
elseif($conWid=='wide') { $contentWidth="container-fluid"; }
else { $contentWidth="container"; }
?>

<div class="<?php echo "$contentWidth"; ?>">
	<div class="row">
		<div class="col-md-12">
			<div id="content">
			<!-- ///////////////////// Not Found Starts //////////////////////////-->
				<div class="page page-404">
					<div class="clear20"></div>
					<h1 class="text-center txt-404">404</h1>
					<h3 class="text-center">Page Not Found</h3>
					<div class="text-center">It was either moved or does not exist!</div>
					<div class="clear20"></div>
					<div class="text-center">
						<a href="<?php echo get_option('home'); ?>/" class="btn btn-success"><i class="fa fa-home fa-fw"></i> GO BACK TO HOMEPAGE</a>
					</div>
					<div class="clear20"></div>	
					<div class="text-center">or try  search<br><br>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="404-search">
							<?php echo do_shortcode('[mjk-search]'); ?>
						</div>
					</div>
					<div class="col-md-4"></div>
					</div>
					<div class="clear40"></div>
				</div>
			<!-- ///////////////////// Not Found Ends //////////////////////////-->        
			</div><!--#content ends-->
		</div><!--.col-md-12 ends-->
	</div><!--.row ends-->
</div><!--.container ends-->
<?php get_footer(); ?>