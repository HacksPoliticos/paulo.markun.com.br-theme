<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Template Name: Blog
	
	Custom page template - Blog
	
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
		
		/* Query posts from blog */
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'paged' 			=> $paged, 
			'post_type' 		=> 'post',
			'posts_per_page'	=> $jw_posts_per_page
		);
		$jw_query = new WP_Query($args);

		$count = 0;
		
	?>
	
	<div id="contentWrap" <?php if($post_custom['jw_layout'][0] == 'layout_c'){ ?>class="full-width"<?php } ?>>
		
		<?php if($post_custom['jw_layout'][0] == 'layout_sc'){ get_sidebar('blog'); } /* If sidebar + content layout get the left sidebar */ ?>
		
		<div id="content" <?php if($post_custom['jw_layout'][0] == 'layout_sc'){ ?>class="right-content"<?php } ?>>
			
			<?php if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */ ?>
			
				<?php if($count > 1){ ?><div class="hr"></div><?php } ?>
		
				<div class="blog-item">
					
					<!-- Title -->
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
					
					<!-- Info -->
					<?php jw_post_meta(); ?>
					
					<!-- Thumbnail -->
					<?php if($jw_blog_thumbnails == 'on'){ ?>
						<div class="image">
							<?php
								if($post_custom['jw_layout'][0] == 'layout_c'){
									if(has_post_thumbnail()){ the_post_thumbnail('jw_full'); } /* Show the "full size" post thumbail if there is one */ 
								}else{
									if(has_post_thumbnail()){ the_post_thumbnail(); } /* Show the "one third size" post thumbail if there is one */ 
								}
							?>
						</div>
					<?php } ?>
					
					<!-- Excerpt -->
					<?php if($count == 1 && $jw_blog_first_full == 'on'){ 
						the_content(); 
					}else{ ?>
						<p><?php the_excerpt(); ?></p>
					<?php } ?>
					
					<?php if($jw_blog_read_more == 'on'){ ?>
						<p><a href="<?php the_permalink(); ?>" class="more">Leia mais</a></p>
					<?php } ?>
					
				</div> <!-- .blog-item -->
			
			<?php endwhile; else: /* If no posts found */ ?>
				
				<p>No posts found</p>
			
			<?php endif; /* End if have posts */ ?>
			
			<?php wp_reset_query(); ?>
			
			<div class="hr"></div>
			
			<?php 
				
				/* Pagination */
				$num_pages = $jw_query->max_num_pages;
				jw_pagination($num_pages);
				
			?>
			
		</div><!-- #content -->
		
		<?php if($post_custom['jw_layout'][0] == 'layout_cs'){ get_sidebar('blog'); } /* If sidebar + content layout get the left sidebar */ ?>
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->
	
	<?php get_footer(); ?>