<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Template Name: Portfolio
	
	Custom page template - Portfolio
	
------------------------------------------------------------------------------------------------------------ */
?>
	
	<?php include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php'; ?>
	
	<?php get_header(); ?>

	<?php jw_breadcrumbs(); /* Show breadcrubs */ ?>
	
	<?php 
		
		/* Get the custom fields values */
		$post_custom = get_post_custom($post->ID); 
	
	?>

	<?php
		
		if($post_custom['jw_layout'][0] == 'layout_p1'){ 
			if(get_option('jw_portfolio_per_page_p1') !== FALSE){
				$portfolio_posts_to_query = get_option('jw_portfolio_per_page_p1');
			}else{
				$portfolio_posts_to_query = 6;
			}
		}else if($post_custom['jw_layout'][0] == 'layout_p2'){
			if(get_option('jw_portfolio_per_page_p2') !== FALSE){
				$portfolio_posts_to_query = get_option('jw_portfolio_per_page_p2');
			}else{
				$portfolio_posts_to_query = 6;
			}
		}else if($post_custom['jw_layout'][0] == 'layout_p3'){
			if(get_option('jw_portfolio_per_page_p3') !== FALSE){
				$portfolio_posts_to_query = get_option('jw_portfolio_per_page_p3');
			}else{
				$portfolio_posts_to_query = 6;
			}
		}else{
			$portfolio_posts_to_query = 6;
		}
		
		// This will get an array of posts belonging to the terms you defined in the 'portfolio_terms_ids' variable
		if(isset($post_custom['jw_portfolio_categories'][0]) && $post_custom['jw_portfolio_categories'][0] != 'show_all'){
			$portfolio_categories_to_query = get_objects_in_term( explode( ",", $post_custom['jw_portfolio_categories'][0] ), 'jw_portfolio_categories');
		}else{
			$portfolio_categories_to_query = '';
		}
		
		/* 
			Query the portfolio posts (custom post type named jw_portfolio).
		*/
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'paged'				=> $paged,
			'post_type'			=> 'jw_portfolio',
			'posts_per_page'	=> $portfolio_posts_to_query,
			'post__in'			=> $portfolio_categories_to_query
		);
		$jw_query = new WP_Query($args); 
		
		$count = 0;
		
		the_post();

	?>

	<div id="contentWrap" class="full-width">
		
		<div id="content">
			
			<?php include TEMPLATEPATH.'/content-parts/page-intro.php'; /* Show title and tagline */ ?>
			
			<?php if(isset($post_custom['jw_portfolio_categories'][0]) && $post_custom['jw_portfolio_categories'][0] != '' && isset($post_custom['jw_portfolio_filter'][0]) && $post_custom['jw_portfolio_filter'][0] != 'no'){ ?>
			
			<div id="quicksand-nav" style="text-align:center">
				<?php
					echo do_shortcode('[button link="'.get_bloginfo('template_url').'/functions/quicksand-load.php?type='.$post_custom['jw_layout'][0].'&cat_id='.$post_custom['jw_portfolio_categories'][0].'&last=3"]All[/button]');
					$portfolio_categories = explode(",", $post_custom['jw_portfolio_categories'][0]);
					foreach($portfolio_categories as $p_cat){
						$p_cat_details = get_term_by('id', $p_cat, 'jw_portfolio_categories');
						echo do_shortcode('[button link="'.get_bloginfo('template_url').'/functions/quicksand-load.php?type='.$post_custom['jw_layout'][0].'&cat_id='.$p_cat.'&last=3"]'.$p_cat_details->name.'[/button]');
					}
				?>
			</div>
			<div class="hr"></div>
			
			<?php } ?>
			
			<?php $count = 0; ?>
			
			<?php if($post_custom['jw_layout'][0] == 'layout_p1'){ ?>
				
				<div class="hr noline"></div>
				
				<div class="portfolio grid">
					
					<ul class="portfolio-ul">
					
						<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
						
							<?php $c_post_custom = get_post_custom($post->ID); ?>
							
							<?php if($jw_portfolio_thickbox_p3 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; } ?>
							
							<li class="<?php echo $fancybox_class; ?>">
								<?php if(has_post_thumbnail()){ ?>
									<span class="grid-img"><?php the_post_thumbnail('jw_portfolio_grid'); ?></span>
								<?php } ?>
								<div class="content">
									
									<h5><?php the_title(); ?></h5>
									
									<p><?php echo jw_text_excerpt(get_the_excerpt(), 120); ?></p>
									
									<?php if(isset($c_post_custom['jw_portfolio_client'][0])){ ?>
										<div class="row">
											<span class="name"><?php _e('Client'); ?></span>
											<span class="detail"><?php echo $c_post_custom['jw_portfolio_client'][0]; ?></span>
										</div> <!-- end row -->
									<?php } ?>
									
									<div class="row">
										<span class="name"><?php _e('Date'); ?></span>
										<span class="detail"><?php the_time('F j Y'); ?></span>
									</div> <!-- end row -->
									
									<?php 
									$portfolio_cats = get_the_terms($post->ID, 'jw_portfolio_categories');
									if(!empty($portfolio_cats)){
									?>
										<div class="row">
											<span class="name"><?php _e('Tags'); ?></span>
											<?php 
												foreach($portfolio_cats as $portfolio_cat){
													?><span class="detail"><?php echo $portfolio_cat->name; ?></span><?php
												}
											
											?>
										</div> <!-- end row -->
									
									<?php } ?>
									
									<?php if(isset($c_post_custom['jw_portfolio_author'][0])){ ?>
									
									<div class="row">
										<span class="name"><?php _e('Author'); ?></span>
										<span class="detail"><?php echo $c_post_custom['jw_portfolio_author'][0]; ?></span>
									</div><!-- end row -->
									
									<?php } ?>
									
									<a class="folio-more" href="<?php the_permalink(); ?>"></a>
									
									<?php if(isset($c_post_custom['jw_portfolio_images'][0]) && $c_post_custom['jw_portfolio_images'][0] != '' && $jw_portfolio_thickbox_p1 == 'on'){ ?>
										<a class="folio-zoom" rel="folio-zoom" href="<?php preg_match('!http://.+\.(?:jpe?g|png|gif)!Ui', $c_post_custom['jw_portfolio_images'][0],$matches); echo $matches[0]; ?>">
									<?php }elseif(isset($c_post_custom['jw_portfolio_video'][0]) && $jw_portfolio_thickbox_p1 == 'on'){ ?>
										<a class="folio-zoom" href="<?php echo $c_post_custom['jw_portfolio_video'][0]; ?>">
									<?php } ?>
										</a>
									<?php
										if(isset($c_post_custom['jw_portfolio_images'][0])){
											$jw_portfolio_images = preg_replace('/\[portfolio_image/', '[portfolio_image show="no"', $c_post_custom['jw_portfolio_images'][0], 1);
											echo do_shortcode($jw_portfolio_images);
										}
									?>
									
								</div> <!-- end portfolio content -->
							</li> <!-- end portfolio item -->
						
						<?php endwhile; else: /* If no posts found */ ?>
							
							<p><?php _e('The portfolio is empty', $domain); ?></p>
						
						<?php endif; /* End if have posts */ ?>
					
					</ul>
					
				</div><!-- .portfolio.grid -->
			
			<?php }elseif($post_custom['jw_layout'][0] == 'layout_p2'){ ?>
			
				<div class="portfolio grid-2">
					
					<ul class="portfolio-ul">
					
						<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
							
							<?php $c_post_custom = get_post_custom($post->ID); ?>
							
							<?php if($jw_portfolio_thickbox_p2 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; } ?>
							
							<?php
							
								$li_class = '';
								$li_clear = false;
								
								/* Add the last class to every 3rd */
								if($count == 3){ $li_class .= 'last '; $count = 0; $li_clear = true;  }
								
							?>
						
							<li class="<?php echo $li_class.$fancybox_class; ?>">
								
								<?php if(has_post_thumbnail()){ ?>
									<div>
										<?php if(isset($c_post_custom['jw_portfolio_images'][0]) && $jw_portfolio_thickbox_p2 == 'on'){ ?>
											<a class="folio-zoom" rel="folio-zoom" href="<?php preg_match('!http://.+\.(?:jpe?g|png|gif)!Ui', $c_post_custom['jw_portfolio_images'][0],$matches); echo $matches[0]; ?>">
										<?php }elseif(isset($c_post_custom['jw_portfolio_video'][0]) && $jw_portfolio_thickbox_p2 == 'on'){ ?>
											<a href="<?php echo $c_post_custom['jw_portfolio_video'][0]; ?>">
										<?php }else{ ?>
											<a href="<?php the_permalink(); ?>">
										<?php } ?>
												<?php the_post_thumbnail('jw_third'); ?>
											</a>
										<?php
											if(isset($c_post_custom['jw_portfolio_images'][0])){
												$jw_portfolio_images = preg_replace('/\[portfolio_image/', '[portfolio_image show="no"', $c_post_custom['jw_portfolio_images'][0], 1);
												echo do_shortcode($jw_portfolio_images);
											}
										?>
									</div>
								<?php } ?>
								
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<?php the_excerpt(); ?>
								<span class="info">
									<span class="date"><?php the_time('F j Y'); ?></span>
									<?php
									$portfolio_cats = get_the_terms($post->ID, 'jw_portfolio_categories');
									$cat_count = 0;
									if(!empty($portfolio_cats)){
									?>
									<span class="tags">
										<?php 
											foreach($portfolio_cats as $portfolio_cat){
												$cat_count++;
												if($cat_count > 1){ echo ', '.$portfolio_cat->name; }else{ echo $portfolio_cat->name; }
											}
										?>
										</span>
									<?php } ?>
								</span>
							</li>
							
							<?php if($li_clear == true){ ?><div class="clear"></div><?php } ?>
						
						<?php endwhile; else: /* If no posts found */ ?>
							
							<p><?php _e('The portfolio is empty', $domain); ?></p>
						
						<?php endif; /* End if have posts */ ?>
					
					</ul>
					
				</div><!-- .portfolio.grid-2 -->
			
			<?php }elseif($post_custom['jw_layout'][0] == 'layout_p3'){ ?>
				
				<ul class="portfolio-ul">
				
					<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
					
						<?php $c_post_custom = get_post_custom($post->ID); ?>
								
						<?php if($jw_portfolio_thickbox_p3 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; } ?>
						
						<li>
						
							<?php if($count != 1){ ?><div class="hr noline"></div><?php } ?>
							
							<?php if(has_post_thumbnail()){ ?>
								<div class="one-half portfolio-list <?php echo $fancybox_class; ?>">
									<?php if(isset($c_post_custom['jw_portfolio_images'][0]) && $jw_portfolio_thickbox_p3 == 'on'){ ?>
										<a class="folio-zoom" rel="folio-zoom" href="<?php preg_match('!http://.+\.(?:jpe?g|png|gif)!Ui', $c_post_custom['jw_portfolio_images'][0],$matches); echo $matches[0]; ?>">
									<?php }elseif(isset($c_post_custom['jw_portfolio_video'][0]) && $jw_portfolio_thickbox_p3 == 'on'){ ?>
										<a href="<?php echo $c_post_custom['jw_portfolio_video'][0]; ?>">
									<?php }else{ ?>
										<a href="<?php the_permalink(); ?>">
									<?php } ?>
											<?php the_post_thumbnail('jw_half'); ?>
										</a>
									<?php
										if(isset($c_post_custom['jw_portfolio_images'][0])){
											$jw_portfolio_images = preg_replace('/\[portfolio_image/', '[portfolio_image show="no"', $c_post_custom['jw_portfolio_images'][0], 1);
											echo do_shortcode($jw_portfolio_images);
										}
									?>
								</div>
							<?php } ?>
							
							<div class="one-half last portfolio-list">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
								<p>
									<a class="btn grey" href="<?php the_permalink(); ?>"><span><?php _e('View project', $domain); ?></span></a>
									<?php if(isset($c_post_custom['jw_portfolio_website'][0])){ ?>
										<a class="btn black" href="<?php echo $c_post_custom['jw_portfolio_website'][0]; ?>"><span><?php _e('Go to website', $domain); ?></span></a>
									<?php } ?>
								</p>
							</div>
							
						</li>
					
					<?php endwhile; else: /* If no posts found */ ?>
						
						<p><?php _e('The portfolio is empty', $domain); ?></p>
					
					<?php endif; /* End if have posts */ ?>
				
				</ul>
				
			<?php } ?>
				
			<?php wp_reset_query(); ?>
				
			<div class="hr"></div>
			
			<?php 
				
				/* Pagination */
				$num_pages = $jw_query->max_num_pages;
				jw_pagination($num_pages);
				
			?>
			
		</div><!-- #content -->
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->

	<?php get_footer(); ?>