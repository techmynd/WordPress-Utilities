<?php
/**
 * @package WordPress
 * @subpackage MJK_Theme
 */
/*
Template Name: 5- Fuill - No Container
*/
get_header(); ?>
<div class="no-container page">

			<div id="content-full">

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
				
				<?php edit_post_link('Edit this entry.', '<p class="padding15">', '</p>'); ?>

				<?php endwhile; else: ?>
				<p>Sorry, no posts/pages matched your criteria.</p>
				<?php endif; ?>

				<?php comments_template(); ?>

			</div>

</div><!-- .no-container ends -->
<?php get_footer(); ?>