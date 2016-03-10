<?php

/* ------------------------------------------------------------------------------------------------------------

	Functions - Metaboxes framework
	
	Description: The custom metaboxes framework.
	
	Table of contents:
		1) jw_metabox_add
		2) jw_metabox_output
		3) jw_metabox_save
	
------------------------------------------------------------------------------------------------------------ */


	/* Actions */
	add_action('admin_init', 'jw_metabox_add', 1);
	add_action('save_post', 'jw_metabox_save');
	
	/* -----------------------------------------------------------------
		
		Name: jw_metabox_add
1)		
		Add the custom metaboxes. The output of those metaboxes is 
		regulated inside the jw_metabox_output function which is set
		as the callback for add_meta_box().
		
		add_meta_box( id, title, callback, post type, position, priority, callback_args )
		
	----------------------------------------------------------------- */	
	function jw_metabox_add(){

		/* Get the metaboxes */
		global $jw_metabox, $jw_metabox_fields;
		
		/* Loop all metaboxes and add them */
		foreach($jw_metabox as $instance){
			add_meta_box($instance['id'], $instance['title'], 'jw_metabox_output', $instance['post_type'], $instance['position'], $instance['priority'], $instance);
		}
		
	} /* jw_metabox_add() END */

	
	/* -----------------------------------------------------------------
		
		Name: jw_metabox_output
2)		
		This is the callback function of add_meta_box() function used
		inside the jw_metabox_add() function. The metaboxes content is
		regulated here.
		
	----------------------------------------------------------------- */	
	function jw_metabox_output($post, $metabox){
		
		global $domain;
		
		/* Get the metaboxes */
		global $jw_metabox, $jw_metabox_fields;
		
		/* Get the metabox id and the fields */
		$metabox_name = $metabox['id'];
		$metabox_fields[] = $jw_metabox_fields[$metabox_name];
		
		/* Loop all the fields from the metabox */
		foreach($metabox_fields as $fields){
			
			/* Loop the fields */
			foreach($fields as $field){
		
				if($field['type'] != 'open' && $field['type'] != 'close'){
					
					$value = get_post_meta($post->ID, $field['name']);
					
					if(!empty($value)){ $value = $value[0]; }else{ $value = $field['default']; }
		
					$orig_value = $value;
					$value = htmlspecialchars($value);
					
					if($field['type'] == 'composer'){
						$composer_back = get_post_meta($post->ID, 'jw_composer_back');
						if(!empty($composer_back)){ $composer_back_stripped = htmlspecialchars($composer_back[0]); $composer_back = $composer_back[0]; }else{ $composer_back = ''; $composer_back_stripped = ''; }
						$composer_front = get_post_meta($post->ID, 'jw_composer_front');
						if(!empty($composer_front)){ $composer_front_stripped = htmlspecialchars($composer_front[0]); $composer_front = $composer_front[0]; }else{ $composer_front = ''; $composer_front_stripped = ''; }
					}
					
				}
				
				?>
				
				<?php
				
				if($field['type'] == 'open'){
					
					if(isset($field['size'])){ $size_class = $field['size']; }else{ $size_class = ''; }
				
					if(isset($field['style_att'])){ $inline_style = 'style="'.$field['style_att'].'"'; }else { $inline_style = ''; }
				?>
				
					<div class="metabox-field-container <?php echo $size_class; ?>" <?php echo $inline_style; ?>>
					
						<?php if(isset($field['title'])){ ?>
							<div class="metabox-section-intro">
								<span class="metabox-field-title">- <?php echo $field['title']; ?> -</span>
								<?php if(isset($field['descr'])){ ?><span class="metabox-field-description"><?php echo $field['descr']; ?></span><?php } ?>
							</div>
						<?php } ?>
			
				
				<?php
				
				}elseif($field['type'] == 'close'){
				
				?>
				
				</div> <!-- .metabox-field-container -->
				
				<?php 
					if(isset($field['size'])){ 
						
						if(strpos($field['size'], 'last') !== false){
							?><div class="metabox-clear"></div><?php
						}
					
					}
				?>
				
				<?php
				
				/* Textarea field */
				}elseif($field['type'] == 'textarea'){
					
					?>
					
					<div class="metabox-field">
						<label><?php echo $field['title']; ?></label>
						<div class="clear"></div>
						<?php if(isset($field['descr'])){ ?>
							<small><?php echo $field['descr']; ?></small>
						<?php } ?>
						<textarea name="<?php echo $field['name']; ?>" rows="10" style="width:98%;"><?php echo $value; ?></textarea>
					</div>	
					
					<?php
				
				/* Normal text field */
				}elseif($field['type'] == 'text'){
					
					?>
					
					<div class="metabox-field">
						<label><?php echo $field['title']; ?></label>
						<div class="clear"></div>
						<?php if(isset($field['descr'])){ ?>
							<small><?php echo $field['descr']; ?></small>
						<?php } ?>
						<input type="text" name="<?php echo $field['name']; ?>" class="widefat" style="width:98%;" value="<?php echo $value; ?>" />
					</div>	
					
					<?php
				
				/* Radio field */
				}elseif($field['type'] == 'radio'){
				
					?>
					
					<div class="metabox-field">
						<label><?php echo $field['title']; ?></label>
						<div class="clear"></div>
						<?php if(isset($field['descr'])){ ?>
							<small><?php echo $field['descr']; ?></small>
						<?php } ?>
						<?php _e('Yes', 'lifeline'); ?><input type="radio" name="<?php echo $field['name']; ?>" value="yes" <?php if($value == 'yes'){ ?>checked<?php } ?>  />
						<?php _e('No', 'lifeline'); ?><input type="radio" name="<?php echo $field['name']; ?>" value="no" <?php if($value == 'no'){ ?>checked<?php } ?> />
					</div>	
					
					<?php
					
				/* Select option field */
				}elseif($field['type'] == 'select'){
				
					?>
					
					<div class="metabox-field">
						<label><?php echo $field['title']; ?></label>
						<div class="clear"></div>
						<?php if(isset($field['descr'])){ ?>
							<small><?php echo $field['descr']; ?></small>
						<?php } ?>
						<select name="<?php echo $field['name']; ?>">
							
							<?php
							foreach($field['options'] as $key => $val){
								?><option value="<?php echo $val; ?>" <?php if($value == $val){ ?>selected<?php } ?>><?php echo $key; ?></option><?php
							}
							?>
							
						</select>
					</div>	
					
					<?php
					
				/* Special field - Select category */
				}elseif($field['type'] == 'select_category'){
					
					?>
					
					<div class="metabox-field">
					
						<?php
					
						if(strpos($value, ',') !== false) {
							$selected_cats = explode(',', $value);
						}else{
							$selected_cats[] = $value;
						}
						
						$categories =  get_categories('taxonomy=portfolio_type'); 
						foreach($categories as $cat){
							?><p><input type="checkbox" name="<?php echo $cat->category_nicename; ?>" value="<?php echo $cat->term_id ?>" <?php if(in_array($cat->term_id, $selected_cats)){ echo "checked"; } ?> /> <?php echo $cat->name; ?></p><?php
						}
						
						?><input type="hidden" name="<?php echo $field['name']; ?>" class="widefat" style="width:98%;" value="<?php echo $value; ?>" /><?php
					
					?>
					
					</div>
					
				<?php
				
				/* Special field - Layout */
				}elseif($field['type'] == 'layout'){
				
					?>
					
					<div class="metabox-field metabox-layout">
						
						<ul class="metabox-layout-options-page">
							<li <?php if($value == 'layout_c'){ ?>class="active"<?php } ?>><img src="<?php bloginfo('template_url'); ?>/functions/images/layout-c.png" /><span class="active-info"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon-tick.png" /></span><input type="hidden" value="layout_c" /></li>
							<li <?php if($value == 'layout_cs'){ ?>class="active"<?php } ?>><img src="<?php bloginfo('template_url'); ?>/functions/images/layout-c+s.png" /><span class="active-info"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon-tick.png" /></span><input type="hidden" value="layout_cs" /></li>
							<li <?php if($value == 'layout_sc'){ ?>class="active"<?php } ?>><img src="<?php bloginfo('template_url'); ?>/functions/images/layout-s+c.png" /><span class="active-info"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon-tick.png" /></span><input type="hidden" value="layout_sc" /></li>
						</ul>
						<ul class="metabox-layout-options-portfolio">
							<li <?php if($value == 'layout_p1'){ ?>class="active"<?php } ?>><img src="<?php bloginfo('template_url'); ?>/functions/images/layout-p1.png" /><span class="active-info"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon-tick.png" /></span><input type="hidden" value="layout_p1" /></li>
							<li <?php if($value == 'layout_p2'){ ?>class="active"<?php } ?>><img src="<?php bloginfo('template_url'); ?>/functions/images/layout-p2.png" /><span class="active-info"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon-tick.png" /></span><input type="hidden" value="layout_p2" /></li>
							<li <?php if($value == 'layout_p3'){ ?>class="active"<?php } ?>><img src="<?php bloginfo('template_url'); ?>/functions/images/layout-p3.png" /><span class="active-info"><img src="<?php bloginfo('template_url'); ?>/images/icons/icon-tick.png" /></span><input type="hidden" value="layout_p3" /></li>
						</ul>
						<input type="hidden" name="<?php echo $field['name']; ?>" class="widefat real-value" style="width:98%;" value="<?php echo $value; ?>" />
						
					</div>
					
					<?php
				
				}elseif($field['type'] == 'sidebar'){
					
					?>
					<div class="metabox-field metabox-sidebar">
					
						<?php if($value != ''){ ?>
							
							<p class="metabox-sidebar-info"><?php _e('Active widget section:', $domain); ?> <strong><?php echo $value; ?></strong> - <a href="#"><?php _e('remove', $domain); ?></a></p>
							
						<?php } ?>
						
						<div class="metabox-sidebar-manipulation" <?php if($value != ''){ ?>style="display:none;"<?php } ?>>
						
							<p><label><?php _e('Create New', $domain); ?></label> <input type="text" /></p>
							<p><em><?php _e('or', $domain); ?></em></p>
							<p><label><?php _e('Select Existing', $domain); ?></label>
								<select>
									<option value=""><?php _e('- Select -', $domain); ?></option>
									<?php
									global $wpdb;
	
									$widgetized_pages = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'jw_sidebar'"));
									
									if($widgetized_pages){
										
										foreach($widgetized_pages as $w_page){
											?><option><?php echo $w_page; ?></option><?php
										}
										
									}
									?>
								</select>
							</p>
							
						</div>
						
						<input type="hidden" name="<?php echo $field['name']; ?>" class="widefat real-value" style="width:98%;" value="<?php echo $value; ?>" />
						
					</div>
					<?php
					
				}elseif($field['type'] == 'slider'){
					
					?>
						
						<div class="clear"></div>
						
						<div class="metabox-field metabox-slider">
								
							<label><?php echo $field['title']; ?></label>
							<div class="clear"></div>
							<?php if(isset($field['descr'])){ ?>
								<small><?php echo $field['descr']; ?></small>
							<?php } ?>
							
							<!-- Currently active -->
							<div class="metabox-slider-active">
								
								<p><?php _e('Currently active slides:', $domain); ?> <a href="#" class="metabox-slider-show-media" style="float:right;"><?php _e('+ Add slides', $domain); ?></a></p>
								
								<ul>
									<?php 
										
										$value_admin = $orig_value;
										$value_admin = str_replace('[slide', '[slide_admin', $value_admin);
										$value_admin = str_replace('[/slide]', '[/slide_admin]', $value_admin);
										
										echo do_shortcode($value_admin);
										
										
									?>
								</ul>
								
							</div><!-- .metabox-slider-active-->
							
							<!-- All images listing -->
							<div class="metabox-slider-media">
								
								<p><?php _e('Add slides:', $domain); ?> <a href="#" class="metabox-slider-show-active" style="float:right;"><?php _e('&larr; Finish adding', $domain); ?></a></p>
								
								<?php
								
								$min_width = 960;
								
								global $wpdb;
								$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
								
								?>
								
								<ul>
								
									<?php
									foreach($media_images as $image_post){
										
										$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
										
										//If image is big enough for the slider proceed
										if($img_details[1] >= $min_width){
										
											$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
											$thumb_src = $thumb_src[0];
											
											if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
											
											?>
											<li<?php echo $class_attr; ?>>
												<img src="<?php echo $thumb_src; ?>" alt="<?php echo $img_details[0] ?>" />
												<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
												<span class="added-notice"><?php _e('Added', $domain); ?></span>
											</li>
											<?php
											
										}
										
									}
									?>
									
								</ul>
								
							</div><!-- .metabox-slider-media -->
							
							<!-- Edit a slide -->
							<div class="metabox-slider-edit">
								
								<p><?php _e('Edit slide', $domain); ?> <a href="#" class="metabox-slider-show-active" style="float:right;">&larr; Back</a></p>
								
								<p><label><?php _e('Title', $domain); ?></label><input type="text" class="slider-edit-title" /></p>
								<p><label><?php _e('Description', $domain); ?></label><textarea class="slider-edit-description"></textarea></p>
								<p><label><?php _e('Link', $domain); ?></label><input type="text" class="slider-edit-link" /></p>
								<p><label>&nbsp;</label><a href="#" class="metabox-slider-submit-edit"><?php _e('Save', $domain); ?></a> - <a href="#" class="metabox-slider-show-active"><?php _e('Cancel', $domain); ?></a>
								
							</div><!-- .metabox-slider-edit -->
							
							<textarea name="<?php echo $field['name']; ?>" class="real-value" rows="10" style="width:100%;"><?php echo $value; ?></textarea>
							
						</div>
					
					<?php
						
					}elseif($field['type'] == 'composer'){
						
						?>
						
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
									<li id="blog_posts">
										<?php _e('Blog', $domain); ?>
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
							
							<input type="hidden" id="jw_path_to_shortcodes_ajax" value="<?php echo bloginfo('template_url'); ?>/functions/composer-widgets.php" />
							
						</div><!-- .metabox-composer -->
							
						<?php
						
					}elseif($field['type'] == 'portfolio_images'){
					
					?>
						
						<div class="clear"></div>
						
						<div class="metabox-slider portfolio-images">
							
							<!-- Currently active -->
							<div class="metabox-slider-active">
								
								<p><?php _e('Currently active images:', $domain); ?> <a href="#" class="metabox-slider-show-media" style="float:right;"><?php _e('+ Add image', $domain); ?></a></p>
								
								<ul>
									<?php 
										
										$value_admin = $orig_value;
										$value_admin = str_replace('[portfolio_image', '[portfolio_image_admin', $value_admin);
										$value_admin = str_replace('[/portfolio_image]', '[/portfolio_image_admin]', $value_admin);
										
										echo do_shortcode($value_admin);
										
										
									?>
								</ul>
								
							</div><!-- .metabox-slider-active-->
							
							<!-- All images listing -->
							<div class="metabox-slider-media">
								
								<p><?php _e('Add images:', $domain); ?> <a href="#" class="metabox-slider-show-active" style="float:right;"><?php _e('&larr; Finish adding', $domain); ?></a></p>
								
								<?php
								
								$min_width = 0;
								
								global $wpdb;
								$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
								
								?>
								
								<ul>
								
									<?php
									foreach($media_images as $image_post){
										
										$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
										
										//If image is big enough for the slider proceed
										if($img_details[1] >= $min_width){
										
											$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
											$thumb_src = $thumb_src[0];
											
											if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
											
											?>
											<li<?php echo $class_attr; ?>>
												<img src="<?php echo $thumb_src; ?>" alt="<?php echo $img_details[0] ?>" />
												<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
												<span class="added-notice"><?php _e('Added', $domain); ?></span>
											</li>
											<?php
											
										}
										
									}
									?>
								</ul>
								
							</div><!-- .metabox-slider-media -->
							
							<textarea name="<?php echo $field['name']; ?>" class="real-value" rows="10" style="width:100%;"><?php echo $value; ?></textarea>
							
						</div>
					
					<?php
						
					}elseif($field['type'] == 'portfolio_categories'){
						
						?>
						<div class="metabox-field metabox-portfolio-categories">
						<?php
							
							if(strpos($value, ',') !== false) {
								$selected_cats = explode(',', $value);
							}else{
								$selected_cats[] = $value;
							}
							
							$categories =  get_categories('taxonomy=jw_portfolio_categories');
							if(!empty($categories)){
								foreach($categories as $cat){
									?><p><input type="checkbox" name="<?php echo $cat->category_nicename; ?>" value="<?php echo $cat->term_id ?>" <?php if(in_array($cat->term_id, $selected_cats)){ echo "checked"; } ?> /> <?php echo $cat->name; ?></p><?php
								}
							}else{
								?><p><?php _e('There aren\'t any categories yet. All will be shown.', $domain); ?></p><?php
							}
							
							?><input type="hidden" name="<?php echo $field['name']; ?>" class="widefat" style="width:98%;" value="<?php echo $value; ?>" /><?php
							
						?>
						</div>
						<?php
					}
				?>
				
				<?php
			
			} /* metabox fields loop END */
			
		} /* metaboxes loop END */
	  
	} /* jw_metabox_output() END */

	/* -----------------------------------------------------------------
		
		Name: jw_metabox_save
3)		
		Saving the values of our custom fields from our custom metaboxes
		
	----------------------------------------------------------------- */	
	function jw_metabox_save($post_id){

		/* Get the metaboxes */
		global $jw_metabox, $jw_metabox_fields;

		/* If the save is triggered by the autosave WordPress feature don't continue executing the script */
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
			return $post_id;
		
		/* Loop all metaboxes */
		foreach($jw_metabox_fields as $fields){
			
			/* Loop all fields of a metabox */
			foreach($fields as $field){
				
				if($field['type'] != 'open' && $field['type'] != 'close'){
				
					/* Field name */
					$name = $field['name'];
					
					if(isset($_POST[$name])){
						
						if($field['type'] == 'portfolio_categories'){
							$selected_cats = '';
							$categories =  get_categories('taxonomy=jw_portfolio_categories'); 
							foreach($categories as $cat){
								if(isset($_POST[$cat->category_nicename])){
									$selected_cats .= ','.$_POST[$cat->category_nicename];
								}
							}
							$selected_cats = preg_replace('/,/', '', $selected_cats, 1);
							if(!empty($selected_cats)){ $value = $selected_cats; }else{ $value = ''; }
						}else{
							/* Get the value */
							$value = $_POST[$name];						
						}
						
						/* Add if it's new */
						if (get_post_meta($post_id, $name) == '') { add_post_meta($post_id, $name, $value, true); }

						/* Update if already has a value */
						elseif ($value != get_post_meta($post_id, $name, true)) { update_post_meta($post_id, $name, $value); }

						/* Delete if empty */
						elseif ($value == '') { delete_post_meta($post_id, $name, get_post_meta($post_id, $name, true)); }
						
					
					}
					
					if(isset($_POST['jw_composer_back']) && $field['type'] == 'composer'){
						
						/* Get the value */
						$composer_back = $_POST['jw_composer_back'];
						$composer_front = $_POST['jw_composer_front'];
						
						/* COMPOSER BACK */
						
						/* Add if it's new */
						if (get_post_meta($post_id, 'jw_composer_back') == '') { add_post_meta($post_id, 'jw_composer_back', $composer_back, true); }

						/* Update if already has a value */
						elseif ($composer_back != get_post_meta($post_id, 'jw_composer_back', true)) { update_post_meta($post_id, 'jw_composer_back', $composer_back); }

						/* Delete if empty */
						elseif ($composer_back == '') { delete_post_meta($post_id, 'jw_composer_back', get_post_meta($post_id, 'jw_composer_back', true)); }
						
						/* COMPOSER FRONT */
						
						/* Add if it's new */
						if (get_post_meta($post_id, 'jw_composer_front') == '') { add_post_meta($post_id, 'jw_composer_front', $composer_front, true); }
						
						/* Update if already has a value */
						elseif ($composer_front != get_post_meta($post_id, 'jw_composer_front', true)) { update_post_meta($post_id, 'jw_composer_front', $composer_front); }
						
						/* Delete if empty */
						elseif ($composer_front == '') { delete_post_meta($post_id, 'jw_composer_front', get_post_meta($post_id, 'jw_composer_front', true)); }
					}
				
				} /* If not open or close END */
				
			} /* metabox fields loop END */
			
		} /* metaboxes loop END */
		
	} /* jw_metabox_save() END */
	
?>