<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Page template - Full width page.
	
------------------------------------------------------------------------------------------------------------ */
?>

	<?php include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php'; ?>

	<?php get_header(); ?>

	<?php 
		
		/* Get the custom fields values */
		$post_custom = get_post_custom($post->ID);
		
		/* Get the post/page */
		the_post();
		
	?>
	
	<?php jw_breadcrumbs(); /* Show breadcrubs */ ?>
	
	<div id="contentWrap" <?php if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_c'){ ?>class="full-width"<?php } ?>>
		
		<?php include TEMPLATEPATH.'/content-parts/page-intro.php'; /* Show title and tagline */ ?>
		
		<?php if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_sc'){ get_sidebar(); } /* If sidebar + content layout get the left sidebar */ ?>
		
		<div id="content" <?php if(isset($post_custom['jw_layout'][0]) && $post_custom['jw_layout'][0] == 'layout_sc'){ ?>class="right-content"<?php } ?>>
			
			<?php if(isset($post_custom['jw_composer'][0]) && $post_custom['jw_composer'][0] == 'active'){ ?>
			
				<?php echo do_shortcode($post_custom['jw_composer_front'][0]); ?>
			
			<?php }else{ ?>
				
				<?php the_content(); /* Show the post/page content */ ?>
				
			<?php } ?>
			
			<?php 
			if($jw_pages_comments == 'on'){
				?><div class="hr"></div><?php
				comments_template(); 
			}
			?>
			
		</div> <!-- #content -->
		
		<?php if(!isset($post_custom['jw_layout'][0]) || $post_custom['jw_layout'][0] == 'layout_cs'){ get_sidebar(); } /* If content + sidebar layout get the right sidebar */ ?>
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->

	<?php get_footer(); ?>