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

<div class="<?php echo "$contentWidth"; ?> archive-page">
	<div class="row">
		<div class="col-md-8">
			<div id="content">

		          <?php if (have_posts()) : ?>
			 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			 	  <?php /* If this is a category archive */ if (is_category()) { ?>
					<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
			 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
			 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
			 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
				  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<h2 class="pagetitle">Author's Archive</h2>
			 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h2 class="pagetitle">Blog Archives</h2>
			 	  <?php } ?>

					<?php while (have_posts()) : the_post(); ?>
					    
						    <?php 
							// get category id to use as class
							$catID = the_category_ID($echo=false);
							?>
							<div <?php post_class('category-'.$catID); ?> id="post-<?php the_ID(); ?>">
							
							<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
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

						<?php if ( is_category() ) { // If this is a category archive
							printf("<h6 class='center'>Sorry, but there aren't any posts in the %s category yet.</h6>", single_cat_title('',false));
						} else if ( is_date() ) { // If this is a date archive
							echo("<h6>Sorry, but there aren't any posts with this date.</h6>");
						} else if ( is_author() ) { // If this is a category archive
							$userdata = get_userdatabylogin(get_query_var('author_name'));
							printf("<h6 class='center'>Sorry, but there aren't any posts by %s yet.</h6>", $userdata->display_name);
						} else {
							echo("<h6 class='center'>No posts found.</h6>");
						}
						// get_search_form();
						?>
						   
							<div class="clear20"></div>
						   <div class="row">
			                    <div class="col-md-4"></div>
									<div class="col-md-4">
											<?php echo do_shortcode('[mjk-search]'); ?>
									</div>
								<div class="col-md-4"></div>        
							</div>
			        
			        		<div class="clear20"></div>

					<?php endif; ?>

			</div>

				<?php // AUTHOR BOX STARTS ///////////////////////// ?>
					<?php if(is_author()) { ?>

					<?php
					if(isset($_GET['author_name'])) :
					$curauth = get_userdatabylogin($author_name);
					else :
					$curauth = get_userdata(intval($author));
					endif;
					?>
						<div class="author_info author-info-block">
						<?php
							// Determine which gravatar to use for the user
							$email = $curauth->user_email;
							$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] )."&size=60";
						?>
						<div class="author_photo"><img src="<?php echo $grav_url; ?>" width="60" height="60" alt="" class="img-responsive"></div>
						<p><span class="authnm"><?php echo $curauth->nickname; ?></span> 
						 (published <strong><?php the_author_posts(); ?></strong> Articles on <a href="<?php echo get_option('home'); ?>/"><?php  bloginfo('name'); ?></a>)
						</p>
						<p><?php echo $curauth->description; ?> <br style="clear:both;" /></p>
						<div class="clear"></div>
						</div>
					<div class="clear20"></div>

					<?php } // if author ends ?>
					<?php // AUTHOR BOX ENDS ///////////////////////// ?>


        </div><!-- .col-md-8 ends -->
		
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
		

	</div><!-- .row ends -->
</div><!-- .container ends -->
<?php get_footer(); ?>