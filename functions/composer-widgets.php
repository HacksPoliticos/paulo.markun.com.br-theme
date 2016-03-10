<?php
/* ------------------------------------------------------------------------------------------------------------

	Composer Widget Layouts
	
------------------------------------------------------------------------------------------------------------ */
	
	define('WP_USE_THEMES', false);
	require('../../../../wp-load.php');
	
	/* -----------------------------------------------------------------
	
		Widget layouts
	
	----------------------------------------------------------------- */
	
	$widget = $_GET['widget_name'];
	
	if($widget == 'blank'){
		
		?>
		
		<li class="one-half">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/2</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Blank</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-edit"></a>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-half" />
			<input type="hidden" class="composer-widget-name-value" value="blank" />
			<input type="hidden" class="composer-widget-content" value="" />
			
		</li>
		
		<?php
		
	}elseif($widget == 'separator'){
		
		?>
		<li class="full-width">
			
			<!-- widget title -->
			Separator
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<span class="composer-widget-edit-direct"><small>With line?</small> <input type="checkbox" class="composer-widget-separator-line" value="checked" /></span>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="full-width" />
			<input type="hidden" class="composer-widget-name-value" value="separator" />
			
		</li>
		
		<?php
		
	}elseif($widget == 'ltweet'){
		
		?>
		
		<li class="one-half">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/2</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Latest Tweet</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-edit"></a>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-half" />
			<input type="hidden" class="composer-widget-name-value" value="ltweet" />
			<input type="hidden" class="composer-widget-content" value="" />
			
		</li>
		
		<?php
		
	}elseif($widget == 'service'){
		
		?>
		
		<li class="one-half">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/2</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Service</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-edit"></a>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-half" />
			<input type="hidden" class="composer-widget-name-value" value="service" />
			<input type="hidden" class="composer-widget-content" value="" />
			
			<!-- special values -->
			<input type="hidden" class="service-icon-value" />
			
		</li>
		
		<?php
		
	}elseif($widget == 'testimonials'){
		
		?>
		
		<li class="one-half">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/2</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Testimonials</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-edit"></a>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-half" />
			<input type="hidden" class="composer-widget-name-value" value="testimonials" />
			<input type="hidden" class="composer-widget-content" value="" />
			
			<!-- special values -->
			<input type="hidden" class="testimonial-type-value" />
			<input type="hidden" class="testimonial-amount-value" />
			<input type="hidden" class="testimonial-columns-value" />
			
		</li>
		
		<?php
		
	}elseif($widget == 'portfolio_posts'){
		
		?>
		
		<li class="one-third">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/3</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Portfolio</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-edit"></a>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-third" />
			<input type="hidden" class="composer-widget-name-value" value="portfolio_posts" />
			<input type="hidden" class="composer-widget-content" value="" />
			
			<!-- special values -->
			<input type="hidden" class="portfolio_posts-type-value" />
			<input type="hidden" class="portfolio_posts-amount-value" />
			<input type="hidden" class="portfolio_posts-show-thumbnail-value" />
			<input type="hidden" class="portfolio_posts-show-title-value" />
			<input type="hidden" class="portfolio_posts-show-excerpt-value" />
			<input type="hidden" class="portfolio_posts-show-meta-value" />
			<input type="hidden" class="portfolio_posts-type-value" />
			<input type="hidden" class="portfolio_posts-category-value" />
			
		</li>
		
		<?php
		
	}elseif($widget == 'blog_posts'){
		
		?>
		
		<li class="one-third">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/3</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Blog</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-edit"></a>
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-third" />
			<input type="hidden" class="composer-widget-name-value" value="blog_posts" />
			<input type="hidden" class="composer-widget-content" value="" />
			
			<!-- special values -->
			<input type="hidden" class="blog_posts-type-value" />
			<input type="hidden" class="blog_posts-amount-value" />
			<input type="hidden" class="blog_posts-show-thumbnail-value" />
			<input type="hidden" class="blog_posts-show-title-value" />
			<input type="hidden" class="blog_posts-show-excerpt-value" />
			<input type="hidden" class="blog_posts-type-value" />
			<input type="hidden" class="blog_posts-category-value" />
			
		</li>
		
		<?php
			
	
	}elseif($widget == 'contact_form'){
		
		?>
		
		<li class="one-third">
			
			<!-- widget size manage -->
			<span class="composer-widget-width">
				<a href="#" class="composer-widget-width-less"></a>
				<span class="composer-widget-width-current">1/3</span>
				<a href="#" class="composer-widget-width-more"></a>
			</span>
			
			<!-- widget title -->
			<span class="composer-widget-title">Contact Form</span>
			
			<!-- widget actions -->
			<span class="composer-widget-actions">
				<a href="#" class="composer-widget-remove-ask"></a>
			</span>
			
			<!-- delete confirmation -->
			<span class="composer-widget-remove-container">
				Are you sure? <a href="#" class="composer-widget-remove-cancel">Cancel</a> - <a href="#" class="composer-widget-remove">Delete</a>
			</span>
			
			<!-- widget values -->
			<input type="hidden" class="composer-widget-width-value" value="one-third" />
			<input type="hidden" class="composer-widget-name-value" value="contact_form" />
			<input type="hidden" class="composer-widget-content" value="" />
			
		</li>
		
		<?php
		
	}
	
	/* ---------------------------------------------------------------------------------------- 
	
		Edit layouts
	
	---------------------------------------------------------------------------------------- */
	
	if($widget == 'blank_edit'){
		
		?>
			<div class="blank-edit">
				
				<div class="composer-edit-actions top-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				<div class="metabox-field">
					<label>Title</label>
					<small>Shown in the drag&amp;drop part, for your own descriptional purposes.</small>
					<input type="text" class="metabox-new-field-title" />
				</div>
				<div class="metabox-field">
					<label>Content</label>
					<small>What you type in here will be shown in the page content.</small>
					<textarea class="metabox-new-field-content"></textarea>
				</div>
				<div class="composer-edit-actions bottom-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				
			</div>
		<?php
		
	}elseif($widget == 'ltweet_edit'){
		
		?>
			<div class="ltweet-edit">
				
				<div class="composer-edit-actions top-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				<div class="metabox-field">
					<label>Title</label>
					<small>Shown in the drag&amp;drop part, for your own descriptional purposes.</small>
					<input type="text" class="metabox-new-field-title" />
				</div>
				<div class="metabox-field">
					<label>Twitter profile</label>
					<small>Type in your twitter profile name.</small>
					<input type="text" class="metabox-new-field-content" />
				</div>
				<div class="composer-edit-actions bottom-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				
			</div>
		<?php
		
	}elseif($widget == 'service_edit'){
		
		?>
			<div class="service-edit">
				
				<div class="composer-edit-actions top-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				<div class="metabox-field">
					<label>Title</label>
					<small>Shown in the drag&amp;drop part, for your own descriptional purposes.</small>
					<input type="text" class="metabox-new-field-title" />
				</div>
				<div class="metabox-field">
					<label>Icon</label>
					<small>Select the icon.</small>
					<ul class="metabox-service-icons">
						
						<?php for ($i = 1; $i <= 29; $i++) { ?>
						
							<?php
							if($i < 10){ $num = '0'.$i; }else{ $num = $i; }
							if($i != 7 && $i != 11 && $i != 18 && $i != 24){
							?>
								<li><img class="metabox-service-icons-books" alt="books_<?php echo $num; ?>.png" src="<?php bloginfo('template_url'); ?>/images/icons/books_<?php echo $num; ?>.png" /></li>
							<?php } ?>
							
						<?php } ?>
						
						<?php for ($i = 1; $i <= 31; $i++) { ?>
						
							<?php
							if($i < 10){ $num = '0'.$i; }else{ $num = $i; }
							if($i != 9 && $i != 25 && $i != 26 && $i != 27){
							?>
								<li><img class="metabox-service-icons-drives" alt="drives_<?php echo $num; ?>.png" src="<?php bloginfo('template_url'); ?>/images/icons/drives_<?php echo $num; ?>.png" /></li>
							<?php } ?>
							
						<?php } ?>
						
						<?php for ($i = 1; $i <= 20; $i++) { ?>
						
							<?php
							if($i < 10){ $num = '0'.$i; }else{ $num = $i; }
							?>
							
							<li><img class="metabox-service-icons-hardware" alt="hardware_<?php echo $num; ?>.png" src="<?php bloginfo('template_url'); ?>/images/icons/hardware_<?php echo $num; ?>.png" /></li>
							
						<?php } ?>
						
						<?php for ($i = 1; $i <= 58; $i++) { ?>
						
							<?php
							if($i < 10){ $num = '0'.$i; }else{ $num = $i; }
							if(($i < 7 || $i > 11) && $i != 16 && $i != 33 && $i != 34 && $i != 41 && $i != 42 && $i != 44 && $i != 48){
							?>
								<li><img class="metabox-service-icons-misc" alt="misc_<?php echo $num; ?>.png" src="<?php bloginfo('template_url'); ?>/images/icons/misc_<?php echo $num; ?>.png" /></li>
							<?php } ?>
							
						<?php } ?>
						
						<?php for ($i = 1; $i <= 17; $i++) { ?>
						
							<?php
							if($i < 10){ $num = '0'.$i; }else{ $num = $i; }
							if($i != 1 && $i != 7){
							?>
								<li><img class="metabox-service-icons-weather" alt="weather_<?php echo $num;; ?>.png" src="<?php bloginfo('template_url'); ?>/images/icons/weather_<?php echo $num; ?>.png" /></li>
							<?php } ?>
							
						<?php } ?>
						
					</ul>
				</div>
				<div class="metabox-field">
					<label>Content</label>
					<small>What you type in here will be shown in the page content.</small>
					<textarea class="metabox-new-field-content"></textarea>
				</div>
				<div class="composer-edit-actions bottom-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				
			</div>
		<?php
		
	}elseif($widget == 'testimonials_edit'){
		
		?>
			<div class="testimonials-edit">
				
				<div class="composer-edit-actions top-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				<div class="metabox-field">
					<label>Title</label>
					<small>Shown in the drag&amp;drop part, for your own descriptional purposes.</small>
					<input type="text" class="metabox-new-field-title" />
				</div>
				<div class="metabox-field">
					<label>Type</label>
					<small>There are 2 types you can choose from, scroller and list.</small>
					<select class="testimonial-type-value-new">
						<option value="scroller">Scroller</option>
						<option value="list">List</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Amount</label>
					<small>Amount of posts to show.</small>
					<select class="testimonial-amount-value-new">
						<?php
						for ($i = 1; $i <= 15; $i++) {
							?><option><?php echo $i; ?></option><?php
						}
						?>
					</select>
				</div>
				<div class="metabox-field">
					<label>Columns</label>
					<small><em>Notice: Only for list type.</em> Select how wide each testimonial will be.</small>
					<select class="testimonial-columns-value-new">
						<option value="4">1/4 (one fourth)</option>
						<option value="3">1/3 (one_third)</option>
						<option value="2">1/2 (one_half)</option>
						<option value="1">1/1 (full width)</option>
					</select>
				</div>
				<div class="composer-edit-actions bottom-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				
			</div>
		<?php
		
	}elseif($widget == 'portfolio_posts_edit'){
		
		?>
			<div class="portfolio_posts-edit">
				
				<div class="composer-edit-actions top-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				<div class="metabox-field">
					<label>Title</label>
					<div class="clear"></div>
					<small>Shown in the drag&amp;drop part, for your own descriptional purposes.</small>
					<input type="text" class="metabox-new-field-title" />
				</div>
				<div class="metabox-field">
					<label>Type</label>
					<div class="clear"></div>
					<small>There are 2 types you can choose from, "Grid 1" and "Grid 2". <strong>Notice:</strong> Grid 2 can only be used in full width.</small>
					<select class="portfolio_posts-type-value-new">
						<option value="grid_1">Grid 1</option>
						<option value="grid_2">Grid 2</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Amount</label>
					<div class="clear"></div>
					<small>Amount of posts to show.</small>
					<select class="portfolio_posts-amount-value-new">
						<?php
						for ($i = 1; $i <= 15; $i++) {
							?><option><?php echo $i; ?></option><?php
						}
						?>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Thumbnail</label>
					<div class="clear"></div>
					<small><strong>Grid 1 only.</strong> Should the thumbnail be shown?</small>
					<select class="portfolio_posts-show-thumbnail-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Title</label>
					<div class="clear"></div>
					<small><strong>Grid 1 only.</strong> Should the title be shown?</small>
					<select class="portfolio_posts-show-title-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Except</label>
					<div class="clear"></div>
					<small><strong>Grid 1 only.</strong> Should the excerpt be shown?</small>
					<select class="portfolio_posts-show-excerpt-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Meta</label>
					<div class="clear"></div>
					<small><strong>Grid 1 only.</strong> Should the meta be shown?</small>
					<select class="portfolio_posts-show-meta-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Category</label>
					<div class="clear"></div>
					<small>From which category do you want to show the portfolio posts?</small>
					<select class="portfolio_posts-category-value-new">
						<option value="all">All</option>
						<?php
						$categories =  get_categories('taxonomy=jw_portfolio_categories');
						if(!empty($categories)){
							foreach($categories as $cat){
								?><option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option><?php
							}
						}
						?>
					</select>
				</div>
				<div class="composer-edit-actions bottom-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				
			</div>
		<?php
		
	}elseif($widget == 'blog_posts_edit'){
		
		?>
			<div class="blog_posts-edit">
				
				<div class="composer-edit-actions top-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				<div class="metabox-field">
					<label>Title</label>
					<div class="clear"></div>
					<small>Shown in the drag&amp;drop part, for your own descriptional purposes.</small>
					<input type="text" class="metabox-new-field-title" />
				</div>
					<div class="metabox-field">
					<label>Type</label>
					<div class="clear"></div>
					<small>There are 2 types you can choose from, "Grid" and "List".</small>
					<select class="blog_posts-type-value-new">
						<option value="grid">Grid</option>
						<option value="list">List</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Amount</label>
					<div class="clear"></div>
					<small>Amount of posts to show.</small>
					<select class="blog_posts-amount-value-new">
						<?php
						for ($i = 1; $i <= 15; $i++) {
							?><option><?php echo $i; ?></option><?php
						}
						?>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Thumbnail</label>
					<div class="clear"></div>
					<small><strong>Grid only. </strong>Should the thumbnail be shown?</small>
					<select class="blog_posts-show-thumbnail-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Title</label>
					<div class="clear"></div>
					<small><strong>Grid only. </strong>Should the title be shown?</small>
					<select class="blog_posts-show-title-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Show Except</label>
					<div class="clear"></div>
					<small><strong>Grid only. </strong>Should the excerpt be shown?</small>
					<select class="blog_posts-show-excerpt-value-new">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				</div>
				<div class="metabox-field">
					<label>Category</label>
					<div class="clear"></div>
					<small>From which category do you want to show the portfolio posts?</small>
					<select class="blog_posts-category-value-new">
						<option value="all">All</option>
						<?php
						$categories =  get_categories();
						if(!empty($categories)){
							foreach($categories as $cat){
								?><option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option><?php
							}
						}
						?>
					</select>
				</div>
				<div class="composer-edit-actions bottom-actions">
					<a href="#" class="composer-edit-save button-primary">Save</a><a href="#" class="composer-edit-cancel button-secondary">Cancel</a>
				</div>
				
			</div>
		<?php
		
	}
	
?>