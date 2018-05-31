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

<div class="<?php echo "$contentWidth"; ?> page">
	<div class="row">
		<div class="col-md-8">

			<div id="content" class="clearfix">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div id="page-<?php the_ID(); ?>">
					
					<?php $pg_title_cf=get_field('show_page_title'); 
					if(isset($pg_title_cf) && $pg_title_cf!='no' || !isset($pg_title_cf))
					{
					?>
					<h2><?php the_title(); ?></h2>
					<?php } ?>

					<div class="entry clearfix">

					<?php if(has_post_thumbnail()) :?>
						<div class="featured-img wow fadeIn">
							<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive center-block' ) ); ?>
						</div>
					<?php else :?><?php endif;?>

						<?php the_content(); ?>

						
						<?php wp_link_pages(array('before' => '<div class="pages-paginate"><p class="more-pages">', 'after' => '</p></div>', 'next_or_number' => 'number')); ?>
						
						
					</div>

				</div>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

				<?php if ( comments_open() ) : ?>
					<?php comments_template(); // Get wp-comments.php template ?>
				<?php endif; ?>

				<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
				<?php endif; ?>

			<?php comments_template(); ?>
			</div>

		</div><!-- .col-md-8 ends -->
		
		<div class="col-md-4">
			<?php get_sidebar(); ?>
			<?php // get_sidebar('left'); ?>
		</div>
		

	</div><!-- .row ends -->
</div><!-- .container ends -->

<?php get_footer(); ?>