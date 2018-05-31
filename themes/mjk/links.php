<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */

/*
Template Name: Links
*/
/*Custom Optional Template to display links - Although links/bookmarks have been removed fom WordPress but can be used with help of plugins*/
?>

<?php get_header(); ?>

<?php 
// check body width
$conWid=ot_get_option("body_content_width"); 
if($conWid=='fixed') { $contentWidth="container"; }
elseif($conWid=='wide') { $contentWidth="container-fluid"; }
else { $contentWidth="container"; }
?>

<div class="<?php echo "$contentWidth"; ?>">
	<div class="row">
		<div class="col-md-8">
			<div id="content">

				<h2>Bookmarks</h2>

				<ul class="list-unstyled">
					<?php wp_list_bookmarks('title_li='); ?>
				</ul>

			</div>

		</div><!-- .col-md-8 ends -->
		
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- .row ends -->
</div><!-- .container ends -->

<?php get_footer(); ?>