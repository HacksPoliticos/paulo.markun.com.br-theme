<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Page template - Blog single post page
	
------------------------------------------------------------------------------------------------------------ */
?>

	<?php include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php'; ?>

	<?php get_header(); ?>
	
	<?php jw_breadcrumbs(); /* Show breadcrubs */ ?>
	
	<?php 
		
		/* Get the custom fields values */
		$post_custom = get_post_custom($post->ID); 
		
		/* Get the post/page */
		the_post();
	
	?>
	
	<div id="contentWrap" <?php if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_c'){ ?>class="full-width"<?php } ?>>
		
		<?php 
		if(isset($post_custom['jw_show_intro'][0]) && $post_custom['jw_show_intro'][0] == 'yes'){
			include TEMPLATEPATH.'/content-parts/page-intro.php'; /* Show title and tagline */ 
		}	
		?>
		
		<?php if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_sc'){ get_sidebar('blog'); } /* If sidebar + content layout get the left sidebar */ ?>
		
		<div id="content" <?php if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_sc'){ ?>class="right-content"<?php } ?>>
		
			<div class="blog-item">
				
				<!-- Title -->
				<?php if(!isset($post_custom['jw_show_intro'][0]) || $post_custom['jw_show_intro'][0] == 'no'){ ?>
					<h1><?php the_title(); ?></h1>	
				<?php } ?>
				
				<!-- Info -->
				<?php jw_post_meta(); ?>
				
				<!-- Thumbnail -->
				<div class="image">
					<?php
						if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_c'){
							if(has_post_thumbnail()){ the_post_thumbnail('jw_full'); } /* Show the "full size" post thumbail if there is one */ 
						}else{
							if(has_post_thumbnail()){ the_post_thumbnail(); } /* Show the "one third size" post thumbail if there is one */ 
						}
					?>
				</div>
				
				<?php if(isset($post_custom['jw_composer'][0]) && $post_custom['jw_composer'][0] == 'active'){ ?>
			
					<?php echo do_shortcode($post_custom['jw_composer_front'][0]); ?>
				
				<?php }else{ ?>
					
					<?php the_content(); /* Show the post/page content */ ?>
					
				<?php } ?>
				
				<div class="hr"></div>
				
				<?php 
				if($jw_blog_about_author == 'on'){
					jw_about_author();
				}
				?>
				
				<!-- Comments -->
				<?php comments_template(); ?>
				
			</div> <!-- .blog-item -->
			
		</div><!-- #content -->
		
		<?php if(!isset($post_custom['jw_layout'][0]) || $post_custom['jw_layout'][0] == 'layout_cs'){ get_sidebar('blog'); } /* If sidebar + content layout get the left sidebar */ ?>
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->
	
	<?php get_footer(); ?>