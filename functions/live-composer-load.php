<?php
	
	require('../../../../wp-load.php');
	
	$post_id = $_GET['post_id'];
	if(!isset($_POST['new_composer_value'])){
		
		/* Get the custom fields values */
		$layout = get_post_meta($post_id, 'jw_layout');
		$value = get_post_meta($post_id, 'jw_composer');
		$composer_back = get_post_meta($post_id, 'jw_composer_back');
		if(!empty($composer_back)){ $composer_back_stripped = htmlspecialchars($composer_back[0]); $composer_back = $composer_back[0]; }else{ $composer_back = ''; $composer_back_stripped = ''; }
		$composer_front = get_post_meta($post_id, 'jw_composer_front');
		if(!empty($composer_front)){ $composer_front_stripped = htmlspecialchars($composer_front[0]); $composer_front = $composer_front[0]; }else{ $composer_front = ''; $composer_front_stripped = ''; }
		
		?>

		<input type="hidden" id="on-page-composer-layout" value="<?php echo $layout[0]; ?>" />
		
		<div class="metabox-composer">
			
			<div class="metabox-composer-widgets">
			
				<ul>
					<li id="blank">
						<?php _e('Blank', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
					<li id="separator">
						<?php _e('Separator', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
					<li id="ltweet">
						<?php _e('Latest Tweet', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
					<li id="service">
						<?php _e('Service', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
					<li id="testimonials">
						<?php _e('Testimonials', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
					<li id="portfolio_posts">
						<?php _e('Portfolio', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
					<li id="contact_form">
						<?php _e('Contact Form', $domain); ?>
						<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/icons/add.png" /></a>
						<img src="<?php bloginfo('template_url'); ?>/images/icons/ajax-loader.gif" class="metabox-composer-widget-load" />
					</li>
				</ul>
			
			</div><!-- .metabox-composer-widgets -->
			
			<div class="metabox-composer-c-s-container">
			
				<div class="metabox-composer-content">
				
					<ul>
						<?php echo $composer_back; ?>
					</ul>
					
				</div><!-- .metabox-composer-content -->
				
				<div class="metabox-composer-content-sidebar">Used Area<br />(sidebar)</div>
			
			</div><!-- .metabox-composer-c-s-container -->
			
			<div class="metabox-composer-edit">
				<!-- This will be populated via ajax call to composer-widgets.php -->
			</div><!-- .metabox-composer-edit -->
			
			<!-- The 2 textareas bellow hold the layouts for the backend(admin) and frontend(website) -->
			<textarea name="jw_composer_front" class="jw-composer-front"><?php echo $composer_front_stripped; ?></textarea>
			<textarea name="jw_composer_back" class="jw-composer-back"><?php echo $composer_back_stripped; ?></textarea>
			<input type="hidden" name="<?php echo $field['name']; ?>" class="widefat real-value" style="width:98%;" value="<?php echo $value; ?>" />
			
			<input type="hidden" id="jw_path_to_shortcodes_ajax" value="<?php echo bloginfo('stylesheet_directory'); ?>/functions/composer-widgets.php" />
			
		</div><!-- .metabox-composer -->
		
	<?php 
	}else{
		
		echo do_shortcode(stripslashes($_POST['new_composer_value']));
		
	}
	?>