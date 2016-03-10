<?php

/* ------------------------------------------------------------------------------------------------------------

	Functions - Common
	
	Description: Here are the functions that are common for all themes but some parts are probably different on 
	theme to theme basis such as html layout or scripts included.
	
	Table of contents:
		1) jw_comment_layout
		2) jw_include_js
		3) jw_include_admin_js
		4) jw_about_author
		5) jw_include_admin_css
		6) jw_post_meta
		7) jw_portfolio_meta
		8) jw_excerpt_more
	
------------------------------------------------------------------------------------------------------------ */

	/* Actions */
	add_action('wp_print_scripts', 'jw_include_js'); /* Include JavaScript files */
	add_action('admin_print_scripts', 'jw_include_admin_js'); /* Include JavaScript files in admin */
	add_action('admin_print_styles', 'jw_include_admin_css'); /* Include CSS files in the admin */
	add_filter('get_the_excerpt', 'jw_excerpt_more');
	

	/* -----------------------------------------------------------------
		
		Name: jw_comment_layout
1)		
		Used to format the comment layout. There is no
		closing li tag because WordPress will close it for us (because 
		of threaded comments).
		
	----------------------------------------------------------------- */
	function jw_comment_layout($comment, $args, $depth) {
		
		global $domain; /* The unique string used for translation */
		
		$GLOBALS['comment'] = $comment;
	
		?>
	   
		<li <?php comment_class('commentWrap'); ?> id="comment-<?php comment_ID() ?>">
				
			<!-- comment layout starts here -->
			
			<div class="comment-container">
			
				<div class="user-info">
					<div class="img"><?php echo get_avatar($comment, $size = '60'); ?></div>
					<div class="info"><p class="name"><?php comment_author_link(); ?></p><p class="date"><?php comment_date(); ?></p></div>
				</div>
				<div class="comment">
				
					<?php if ($comment->comment_approved == '0'){ /* If comment is awaing moderation */ ?>
						<p><em><?php _e('Your comment is awaiting moderation', $domain); ?></em></p>
					<?php } ?>
					
					<?php comment_text(); ?>
					<?php comment_reply_link(array_merge(array('reply_text' => "Reply"), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</div>
			
			</div><!-- .comment-container -->
			
			<!-- comment layout ends here -->
		
	<?php 
	} /* jw_comment_layout() END */
	
	
	/* ------------------------------------------------------------------
	
		Name: jw_include_js
2)		
		Including JavaScript files in the theme (not in admin)
	
	------------------------------------------------------------------ */
	function jw_include_js(){
	
		if (!is_admin()) {
		
			// Deregister scripts
			wp_deregister_script('jquery');
			
			// Register scripts
			
			wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery-1.4.2.min.js', false);
			wp_register_script('js_ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.3/jquery-ui.min.js', false);
			wp_register_script('js_easing', get_bloginfo('template_url').'/js/jquery.easing.1.2.js', false);
			wp_register_script('js_custom', get_bloginfo('template_url').'/js/custom.js', false);
			wp_register_script('js_combined', get_bloginfo('template_url').'/js/plugins.combined.js', false);
			wp_register_script('js_swfobject', get_bloginfo('template_url').'/scripts/piecemaker/scripts/swfobject/swfobject.js', false);
			wp_register_script('js_quicksand', get_bloginfo('template_url').'/js/quicksand.js', false);
			
			// Enqueue scripts
			wp_enqueue_script('jquery');
			wp_enqueue_script('js_ui');
			wp_enqueue_script('js_easing');
			wp_enqueue_script('js_combined');
			wp_enqueue_script('js_custom');
			wp_enqueue_script('js_swfobject');
			wp_enqueue_script('js_quicksand');
			
			// Added in v1.3 for content composer front end
			if(current_user_can('level_10')){
				wp_enqueue_script('jquery-ui-core');
				wp_enqueue_script('jquery-ui-sortable');
				wp_enqueue_script('jquery-ui-droppable');
				wp_enqueue_script('jquery-ui-draggable');
			}
			
		}
	
	} /* jw_include_js() END */
	
	
	/* ------------------------------------------------------------------
	
		Name: jw_include_admin_js
3)		
		Including JavaScript files in the WordPress admin
	
	------------------------------------------------------------------ */
	function jw_include_admin_js(){
				
		// Register scripts
		wp_register_script('js_admin_custom', get_bloginfo('template_url').'/js/admin.js', false);
		
		// Enqueue scripts
		wp_enqueue_script('js_admin_custom');
		
	} /* jw_include_admin_js() END */
	
	
	/* ------------------------------------------------------------------
	
		Name: jw_about_author
4)		
		Info about the author on blog posts
	
	------------------------------------------------------------------ */
	function jw_about_author(){
		
		global $domain; /* The unique string used for translation */
		
		?>
		<h3><?php _e('About the author', $domain); ?></h3>
		<div class="about-author">
			<div class="img"><?php echo get_avatar(get_the_author_meta('user_email'), $size = '60'); ?></div>
			<div class="content">
				<h4><?php _e('Written by', $domain); ?> <?php the_author_posts_link(); ?></h4>
				<p><?php if(get_the_author_meta('description') != ''){ the_author_meta('description'); }else{ _e('Currently there is no additional info about this author.', $domain); } ?></p>
			</div>
		</div>
		
		<div class="hr noline"></div>
		<?php
		
	} /* jw_about_author() END */
	
	
	/* ------------------------------------------------------------------
	
		Name: jw_include_admin_css
5)		
		Include stylesheets in the admin
	
	------------------------------------------------------------------ */
	function jw_include_admin_css(){
	
		/* Register styles */
		wp_register_style('jw_admin_css', get_bloginfo('template_url').'/css/admin.css');
		wp_register_style('jw_admin_font_droid_serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold');
		wp_register_style('jw_admin_font_droid_sans', 'http://fonts.googleapis.com/css?family=Droid+Sans');
		
		/* Enqueue styles */
		wp_enqueue_style( 'jw_admin_css');
		wp_enqueue_style( 'jw_admin_font_droid_serif');
		wp_enqueue_style( 'jw_admin_font_droid_sans');
        
	
	} /* jw_include_admin_css() END */
	
	/* ------------------------------------------------------------------
	
		Name: jw_post_meta
6)		
		Show the blog post information
	
	------------------------------------------------------------------ */
	function jw_post_meta(){
		
		global $domain; /* The unique string used for translation */
		
		?>
		
		<div class="entry-meta">
			<span class="post-date"><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('M'); ?></span><span class="year"><?php the_time('Y'); ?></span></span> 
			<span class="post-author"><?php the_author_posts_link(); ?></span> 
			<span class="post-tags"><?php the_category(', '); ?></span> 
			<span class="post-comments"><?php comments_popup_link(__('No comments', $domain), __('One comment', $domain), __('% comments', $domain), '', __('Comments disabled', $domain)); ?></span>
		</div>
		
		<?php
		
	} /* jw_post_meta() END */
	

	/* ------------------------------------------------------------------
	
		Name: jw_portfolio_meta
7)		
		Show the blog post information
	
	------------------------------------------------------------------ */
	function jw_portfolio_meta(){
		
		global $domain; /* The unique string used for translation */
		global $post;
		?>
		
		<div class="entry-meta">
			<span class="post-date"><span class="day"><?php the_time('j'); ?></span><span class="month"><?php the_time('M'); ?></span></span> 
			<span class="post-author"><?php the_author_posts_link(); ?></span> 
			<span class="post-tags">
				<?php
				$portfolio_cats = get_the_terms($post->ID, 'jw_portfolio_categories');
				$p_count = 0;
				foreach($portfolio_cats as $portfolio_cat){
					$p_count++;
					if($p_count > 1){ echo ', '.$portfolio_cat->name; }else{ echo $portfolio_cat->name; }
				}
				?>
			</span> 
		</div>
		
		<?php
		
	} /* jw_portfolio_meta() END */
	
	
	/* -----------------------------------------------------------------
		
		Name: jw_excerpt more
8)		
		Change [...] with something else
		
	----------------------------------------------------------------- */
	function jw_excerpt_more($text) {
		return str_replace('[...]', '...', $text);
	}
	
?>