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
		<div class="col-md-8">
			<div id="content">

			<?php if (have_posts()) : ?>
				<h2 class="pagetitle">Search Results</h2>
				<?php while (have_posts()) : the_post(); ?>
					<?php 
					// get category id to use as class
					$catID = the_category_ID($echo=false);
					?>
					<div <?php post_class('category-'.$catID); ?> id="post-<?php the_ID(); ?>">
						
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						
						<div class="postinfo">
							<i class="fa fa-user fa-fw"></i> <?php the_author_posts_link() ?>
							<i class="fa fa-clock-o fa-fw"></i> <?php the_time('F jS, Y') ?>
						</div>

						<div class="entry">
							
							<?php if(has_post_thumbnail()) :?>
							
								<div class="row">				
									
									<div class="col-md-3">
										<div class="featured-img wow fadeIn">
											<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive center-block' ) ); ?>
										</div>
									</div>

									<div class="col-md-9">
										<?php // the_excerpt(); ?>

										<?php 
										$getCon=get_the_content(); 
										$stripCon=strip_tags($getCon);
										$limitCon=mb_strimwidth($stripCon, 0, 420,' ...');
										$finalCon=strip_shortcodes($limitCon);
										echo "$finalCon";
										?>
										<a href="<?php the_permalink() ?>" class="more-link">Continue Reading <i class="fa fa-angle-double-right fa-fw"></i></a>


									</div>

								</div>

							<?php else :?>

								<?php // the_excerpt(); ?>

										<?php 
										$getCon=get_the_content(); 
										$stripCon=strip_tags($getCon);
										$limitCon=mb_strimwidth($stripCon, 0, 350,' ...');
										$finalCon=strip_shortcodes($limitCon);
										echo "$finalCon";
										?>
										<a href="<?php the_permalink() ?>" class="more-link">Continue Reading <i class="fa fa-angle-double-right fa-fw"></i></a>


							<?php endif;?>

						<div class="postmetadata">
						    <?php if(has_category()) { ?>
						    <i class="fa fa-folder fa-fw"></i><?php the_category(', ') ?>
						    <?php } ?>
							<?php the_tags('<i class="fa fa-tag fa-fw"></i>', ', ', '  '); ?>
							<?php $commentCnt = get_comments_number(get_the_ID()); if ($commentCnt > 0) { ?>
							<i class="fa fa-comment fa-fw"></i>
							 	<a href="<?php comments_link(); ?>"><?php echo "$commentCnt"; ?></a>
							 <?php } ?> 
							 
							<?php edit_post_link('<i class="fa fa-pencil fa-fw"></i>Edit Post', '', ''); ?>
						</div>

						</div>
					</div>
				<?php endwhile; ?>

				<div class="clear20"></div>
			
				<div class="text-center">
				<?php 
				// WordPress Pagination
				the_posts_pagination( array(
				'mid_size'  => 4,
				'prev_text' => __( '<i class="fa fa-angle-double-left"></i> Previous', 'textdomain' ),
				'next_text' => __( 'Next <i class="fa fa-angle-double-right"></i>', 'textdomain' ),
				));
				?>
				</div>

				<div class="clear20"></div>

			<?php else : ?>

				<div class="clear10"></div>		
		        <div class="alert alert-warning">No results found. Please try different keywords!</div>
				<div class="text-center"><?php // get_search_form(); ?>
		        <div class="clear10"></div>
		                    
						<div class="row">
		                    <div class="col-md-4"></div>
								<div class="col-md-4">
										<?php echo do_shortcode('[mjk-search]'); ?>
								</div>
							<div class="col-md-4"></div>        
						</div>
		        
		        <div class="clear20"></div>
		        </div>
			<?php endif; ?>

			</div>

		</div><!-- .col-md-8 ends -->
			
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
			

	</div><!-- .row ends -->
</div><!-- .container ends -->
<?php get_footer(); ?>