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

			<div id="content" class="single-post">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php 
						// get category id to use as class
						$catID = the_category_ID($echo=false);
						?>
						<div <?php post_class('category-'.$catID); ?> id="post-<?php the_ID(); ?>">
						
						<h2><?php the_title(); ?></h2>

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

									<?php the_content(); ?>

									<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

	                                    <div class="clear"></div>

										<div class="postmetadata alt single-post-info">
											This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
											and is filed under <?php the_category(', ') ?> and with <?php the_tags('tags: ', ', ', '  '); ?>.
											You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

											<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
												// Both Comments and Pings are open ?>
												You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

											<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
												// Only Pings are Open ?>
												Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

											<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
												// Comments are open, Pings are not ?>
												You can skip to the end and leave a response. Pinging is currently not allowed.

											<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
												// Neither Comments, nor Pings are open ?>
												Both comments and pings are currently closed.

											<?php } edit_post_link('Edit this entry','','.'); ?>
						                    
										</div>

					                    <div class="clear10"></div>
					                    
							<?php // AUTHOR BOX STARTS ///////////////////////// ?>
							<div class="author_info author-info-block">
		                        <?php
		                            // Determine which gravatar to use for the user
								$email = get_the_author_email();
		                            $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] )."&size=60";
		                        ?>
		                        <div class="author_photo"><img src="<?php echo $grav_url; ?>" width="60" height="60" alt="" class="img-responsive"></div>
		                        <p><span class="authnm"><?php the_author_posts_link(); ?></span> 
								<br>
								(published <strong><?php the_author_posts(); ?></strong> Posts on <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>)
								</p>
		                        <p><?php the_author_description(); ?></p>
		                        <div class="clear"></div>
		                    </div>					
							<?php // AUTHOR BOX ENDS ///////////////////////// ?>

							<?php  // next and previous posts links ?>
					        
					        <div class="clear20"></div>

					        <div class="row">
								<div class="col-md-6"><?php previous_post_link('&laquo; %link') ?></div>
								<div class="col-md-6 text-right"><?php next_post_link('%link &raquo;') ?></div>
							</div>                    
					        
					        <div class="clear10"></div>
					                    
									
								</div>
					</div>

				<?php comments_template(); ?>

				<?php endwhile; else: ?>
			        
			<!-- ///////////////////// Not Found Starts //////////////////////////-->
					<div class="post">
					
					<div class="alert alert-warning">No records...!</div>
					
					<div class="clear10"></div>
					</div>
			<!-- ///////////////////// Not Found Ends //////////////////////////-->
			       
				<?php endif; ?>

			</div> <!--#content ends-->
		</div><!-- .col-md-8 ends -->

		
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
		
	</div><!-- .row ends -->
</div><!-- .container ends -->
<?php get_footer(); ?>