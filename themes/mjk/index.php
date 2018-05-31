<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
get_header(); ?>
<?php $blogStyle=ot_get_option("blog_style"); ?>

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
			<?php // while (have_posts()) : the_post(); ?>
			





<?php 
// default blog view
if( isset($blogStyle) && $blogStyle =='default_blog_view' || !isset($blogStyle) ) { ?>
<?php while (have_posts()) : the_post(); ?>

					<?php 
					// get category id to use as class
					$catID = the_category_ID($echo=false);
					?>
					<div <?php post_class('category-'.$catID); ?> id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="postinfo">
							<i class="fa fa-user fa-fw"></i> <?php the_author_posts_link() ?>
							<i class="fa fa-clock-o fa-fw"></i> <?php the_time('F jS, Y') ?>
						</div>

						<div class="entry">
							
							<?php if(has_post_thumbnail()) :?>
							<div class="featured-img wow fadeIn">
								<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive center-block' ) ); ?>
							</div>
							<?php else :?><?php endif;?>

							<?php // the_excerpt(); ?>

							<?php // excerpt alternative start ?>
							<?php 
							$getCon=get_the_content(); 
							$stripCon=strip_tags($getCon);
							$limitCon=mb_strimwidth($stripCon, 0, 350,' ...');
							$finalCon=strip_shortcodes($limitCon);
							echo "$finalCon";
							?>
							<a href="<?php the_permalink() ?>" class="more-link">Continue Reading <i class="fa fa-angle-double-right fa-fw"></i></a>							
							<?php // excerpt alternative ends ?>


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

<?php 
// default blog view ends
} ?>









<?php 
// grid blog view
if(isset($blogStyle) && $blogStyle =='grid_blog_view') { ?>
<div class="row">

	<?php // posts counter to add clear after 2 cols in grid view
	$counter = 1; ?>

<?php while (have_posts()) : the_post(); ?>

	<div class="col-md-6 col-sm-12">

					<?php 
					// get category id to use as class
					$catID = the_category_ID($echo=false);
					?>
					<div <?php post_class('category-'.$catID); ?> id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="postinfo">
							<i class="fa fa-user fa-fw"></i> <?php the_author_posts_link() ?>
							<i class="fa fa-clock-o fa-fw"></i> <?php the_time('F jS, Y') ?>
						</div>

						<div class="entry">
							
							<?php if(has_post_thumbnail()) :?>
							<div class="featured-img wow fadeIn">
								<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive center-block' ) ); ?>
							</div>
							<?php else :?><?php endif;?>

							<?php // the_excerpt(); ?>

							<?php // excerpt alternative start ?>
							<?php 
							$getCon=get_the_content(); 
							$stripCon=strip_tags($getCon);
							$limitCon=mb_strimwidth($stripCon, 0, 350,' ...');
							$finalCon=strip_shortcodes($limitCon);
							echo "$finalCon";
							?>
							<a href="<?php the_permalink() ?>" class="more-link">Continue Reading <i class="fa fa-angle-double-right fa-fw"></i></a>							
							<?php // excerpt alternative ends ?>							

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

	</div><!--.col-md-6 ends-->





<?php // adds a clear after two posts / before endwhile ?>
<div class="hidden-sm hidden-xs"><?php if( ($counter % 2 ) == 0) { ?><div class="clear"></div><?php } ?></div>
<?php $counter++; ?>
<?php // adds a clear after two posts - ends?>





<?php endwhile; ?>	

</div><!--.row ends-->

<?php 
// grid blog view ends
} ?>












				<?php // endwhile; ?>

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
		        
				<!-- ///////////////////// Not Found Starts //////////////////////////-->
				<div class="post">
				
				<div class="alert alert-warning">No records...!</div>
				
				<div class="clear10"></div>
				</div>
				<!-- ///////////////////// Not Found Ends //////////////////////////-->

			<?php endif; ?>

			</div>

























		</div><!-- .col-md-8 ends -->
			
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
			
	</div><!-- .row ends -->
</div><!-- .container ends -->

<?php get_footer(); ?>