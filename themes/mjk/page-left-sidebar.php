<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
/*
Template Name: 3- Only Left Sidebar
*/
get_header(); ?>

<?php 
// check body width
$conWid=ot_get_option("body_content_width"); 
if($conWid=='fixed') { $contentWidth="container"; }
elseif($conWid=='wide') { $contentWidth="container-fluid"; }
else { $contentWidth="container"; }
?>

<div class="<?php echo "$contentWidth"; ?> page">
	<div class="row">

		<div class="col-md-4">
			<?php get_sidebar('left'); ?>
		</div>

		<div class="col-md-8">

			<div id="content">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div id="page-<?php the_ID(); ?>">

					<?php $pg_title_cf=get_field('show_page_title'); 
					if(isset($pg_title_cf) && $pg_title_cf!='no' || !isset($pg_title_cf))
					{
					?>
					<h2><?php the_title(); ?></h2>
					<?php } ?>
					
					<div class="entry clearfix">
						<?php the_content(); ?>
						
						<?php wp_link_pages(array('before' => '<div class="pages-paginate"><p class="more-pages">', 'after' => '</p></div>', 'next_or_number' => 'number')); ?>
						
					</div>

				</div>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

				<?php endwhile; else: ?>
				<p>Sorry, no posts/pages matched your criteria.</p>
				<?php endif; ?>
            <?php comments_template(); ?>   
			</div>

		</div><!-- .col-md-8 ends -->

	</div><!-- .row ends -->
</div><!-- .container fluid ends -->
<?php get_footer(); ?>