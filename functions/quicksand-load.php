<?php

define('WP_USE_THEMES', false);
require('../../../../wp-load.php');

include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php';

$p_cat_id = $_GET['cat_id'];
$last = $_GET['last'];
$type = $_GET['type'];

if($p_cat_id != '' && strpos($p_cat_id, ',') === false){ 

	$catdetails = get_term_by('id', $p_cat_id, 'jw_portfolio_categories');
	$catid = $catdetails->term_id;
	$catids = get_objects_in_term($catid, 'jw_portfolio_categories');
	
}else if($p_cat_id != '' && strpos($p_cat_id, ',') !== false){
	
	$catids = get_objects_in_term(explode(",", $p_cat_id), 'jw_portfolio_categories');
	
}else{

	$catids = '';
	
}

?>

<?php 

$args = array(
	'post_type'			=> 'jw_portfolio',
	'showposts'			=> '-1',
	'post__in'			=> $catids
);
//Query the portfolio posts (custom post type named jw_portfolio).
$jw_query = new WP_Query($args); 

$count = 0;

?>

<?php if($type == 'layout_p1'){ ?>

	<ul class="portfolio-ul">		
		
		<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
						
			<?php $c_post_custom = get_post_custom($post->ID); ?>
			
			<?php if($jw_portfolio_thickbox_p3 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; } ?>
			
			<li class="<?php echo $fancybox_class; if($count == 1){ echo " clear"; } ?>" data-id="quicksand-id-<?php echo $post->ID; ?>">
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

<?php }elseif($type == 'layout_p2'){ ?>

	<ul class="portfolio-ul">
		
		<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
							
			<?php $c_post_custom = get_post_custom($post->ID); ?>
			
			<?php if($jw_portfolio_thickbox_p2 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; } ?>
			
			<?php
			
				$li_class = '';
				$li_clear = false;
				
				/* Add the last class to every 3rd */
				if($count == 3){ $li_class .= 'last '; $count = 0; $li_clear = true; }
				
			?>
		
			<li class="<?php echo $li_class.$fancybox_class; if($count == 1){ echo " clear"; } ?>" data-id="quicksand-id-<?php echo $post->ID; ?>">
				
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

<?php }elseif($type == 'layout_p3'){ ?>
	
	<ul class="portfolio-ul">
				
		<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
		
			<?php $c_post_custom = get_post_custom($post->ID); ?>
					
			<?php if($jw_portfolio_thickbox_p3 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; } ?>
			
			<li data-id="quicksand-id-<?php echo $post->ID; ?>">
			
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
				
				<div class="clear"></div>
				
			</li>
		
		<?php endwhile; else: /* If no posts found */ ?>
			
			<p><?php _e('The portfolio is empty', $domain); ?></p>
		
		<?php endif; /* End if have posts */ ?>
	
	</ul>
	
<?php } ?>