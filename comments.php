<?php

/* ------------------------------------------------------------------------------------------------------------

	Content template - Comments
	
	Notice: The actual listing of the comments is handled by jw_comment_layout() function located in 
	functions/common.php
	
------------------------------------------------------------------------------------------------------------ */

?>

<?php

	global $domain; /* The unique string used for translation */
	
	/* If loaded directly */
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	/* If password protected */
	if (post_password_required()) { 
		?><?php _e('This post is password protected. Enter the password to view comments.', $domain); ?><?php
		return;
	}
	
?>

<?php if (have_comments()): ?>
	
	<h4 id="comments"><?php comments_number(__('No Responses', $domain), __('One Response', $domain), __('% Responses', $domain));?></h4>

	<ol class="comment-list">
		<?php wp_list_comments('type=comment&callback=jw_comment_layout'); ?>
	</ol>
	
<?php else : /* If there are no comments */ ?>

	
<?php endif; /* end if have comments */ ?>

<?php if (comments_open()): ?>

	<div id="respond">

		<h4><?php comment_form_title(__('Comment on this post', $domain), __('Reply to %s', $domain)); ?><span class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></span></h4>

		<?php if (get_option('comment_registration') && !is_user_logged_in()): /* Only logged in users can comment */ ?>
			<p><?php _e('You must be logged in to post a comment.', $domain); ?></p>
		<?php else : ?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="cmxform">
			
			<fieldset>
			
				<?php if (is_user_logged_in()): /* If user logged in show details */ ?>

					<p><?php _e('Logged in as', $domain); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', $domain); ?> &raquo;</a></p><br />

				<?php else: /* If not logged in show fields for name, email and website  */ ?>
					
					<p>
						<input type="text" name="author" id="author" value="<?php if(esc_attr($comment_author) == ''){ _e('Name', $domain); }else{ echo esc_attr($comment_author); } ?>" tabindex="1" onfocus="if(this.value=='<?php _e('Name', $domain); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Name', $domain); ?>';" />
					</p>

					<p>
						<input type="text" name="email" id="email" value="<?php if(esc_attr($comment_author_email) == ''){ _e('Email', $domain); }else{ echo esc_attr($comment_author_email); } ?>" tabindex="2" onfocus="if(this.value=='<?php _e('Email', $domain); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Email', $domain); ?>';" />
					</p>

					<p>						
						<input type="text" name="url" id="url" value="<?php if(esc_attr($comment_author_url) == ''){ _e('Website', $domain); }else{ echo esc_attr($comment_author_url); } ?>" tabindex="3" onfocus="if(this.value=='<?php _e('Website', $domain); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Website', $domain); ?>';" />
					</p>

				<?php endif; /* End if user logged in or not */ ?>

				<p>
					<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
				</p>
			
			</fieldset>
			
			<p>
				<button class="submit" type="submit" name="submit">Submit</button>
				<?php comment_id_fields(); ?>
			</p>
			
			<?php do_action('comment_form', $post->ID); ?>

		</form>

		<?php endif; /* End if only logged in user can comment or not */ ?>
		
	</div><!-- #leave-comment -->

<?php endif; /* End if comments are open */ ?>