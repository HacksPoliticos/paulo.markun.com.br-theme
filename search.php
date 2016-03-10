<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Page template - Search
	
------------------------------------------------------------------------------------------------------------ */
?>

	<?php get_header(); ?>

	<?php jw_breadcrumbs(); /* Show breadcrubs */ ?>

	<div id="contentWrap">
		
		<div id="content">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); $count++; /* Loop the posts */ ?>
			
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
					
					<!-- Link -->
					<p><a href="<?php the_permalink(); ?>" class="more">Read more</a></p>
					
				</div> <!-- .blog-item -->
			
			<?php endwhile; else: /* If no posts found */ ?>
				
				<p>No posts found</p>
			
			<?php endif; /* End if have posts */ ?>
			
			<?php wp_reset_query(); ?>
			
			<div class="hr"></div>
			
			<?php 
				
				/* Pagination */
				$num_pages = $wp_query->max_num_pages;
				jw_pagination($num_pages);
				
			?>
			
		</div><!-- #content -->
		
		<?php get_sidebar('blog'); ?>
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->

	<?php get_footer(); ?>