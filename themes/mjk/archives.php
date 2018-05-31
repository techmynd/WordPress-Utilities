<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
/*
Template Name: Archives
*/
/*Assign a page this template to show sitemap kind of page that includes category archives, month based archives and tag archives*/
get_header(); ?>

<?php 
// check body width
$conWid=ot_get_option("body_content_width"); 
if($conWid=='fixed') { $contentWidth="container"; }
elseif($conWid=='wide') { $contentWidth="container-fluid"; }
else { $contentWidth="container"; }
?>

<div class="<?php echo "$contentWidth"; ?>">
		<div id="content">
			<div class="post">
				<h2>Archives</h2>
					<div class="row">
					<div class="col-md-4 col-sm-6">
						<h3>Archives by Subject</h3>
						<ul class="list-unstyled">
							 <?php wp_list_categories('show_count=1&title_li='); ?>
						</ul>
					</div>

					<div class="col-md-4 col-sm-6">
						<h3>Archives by Month</h3>
						<ul class="list-unstyled">
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
						</ul>
					</div>

					<div class="col-md-4 col-sm-6">
						<h3>Archives by Tags</h3>
						<?php wp_tag_cloud('smallest=8&largest=22&unit=pt&number=45&format=flat&orderby=name&order=ASC') ?>
					</div>

					</div>
			<div class="clear"></div>
			</div>
		</div>
</div>
<?php get_footer(); ?>