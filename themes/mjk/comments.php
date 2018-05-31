<?php
/**
 * @package WordPress
 * @subpackage NJK_Theme
 */

	// Security Check
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php return; } ?>

<!-- You can edit below -->

<div id="comments">

<?php if ( have_comments() ) : ?>

	<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php else : // this is displayed if there are no comments ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments show this. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">Comments are closed.</p>-->

	<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

	<div id="respond">

		<h3><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h3>

		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( $user_ID ) : ?>

		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>
		
		<div class="form-group">
			<label>Name <?php if ($req) echo "<span class='redfont'>(required)</span>"; ?></label>
			<input type="text" class="form-control" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
		</div>

		<div class="form-group">
			<label for="email">Email Address <span class="text-muted small">(will not be published)</span> <?php if ($req) echo "<span class='redfont'>(required)</span>"; ?></label>
			<input type="text" class="form-control" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
		</div>
		
		<!-- <div class="form-group">
			<label><small>Website</small></label>
			<input type="text" class="form-control" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3">
		</div> -->
		
		<?php endif; ?>
		
		<div class="form-group">
			<label>Comment</label>
			<textarea name="comment" class="form-control" id="comment" rows="10" tabindex="4"></textarea>
		</div>

		<?php
		// math test - requires plugin
		 mcsp_html(); 
		?>


		<button class="btn btn-success" name="submit" type="submit" id="submit" tabindex="5"><i class="fa fa-send fa-fw"></i> Submit Comment</button>

		<?php comment_id_fields(); ?>
		
		<?php do_action('comment_form', $post->ID); ?>

		</form>
		
		<div class="clear5"></div>

	<?php endif; // If registration required and not logged in ?>

	</div>

<?php endif; // Don't delete this ?>

</div> <!-- div id=comments -->