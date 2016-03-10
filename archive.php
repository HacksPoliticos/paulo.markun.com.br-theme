<?php

/* ------------------------------------------------------------------------------------------------------------

	Page template - Archives
	
------------------------------------------------------------------------------------------------------------ */

?>

	<?php get_header(); ?>
	
	<?php jw_breadcrumbs(); /* Show breadcrubs */ ?>
	
	<div id="contentWrap">
		
		<div id="content">
			
			<?php $count = 0; ?>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $count++; ?>
			
				<?php if($count > 1){ ?><div class="hr"></div><?php } ?>
		
				<div class="blog-item">
					
					<!-- Title -->
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>	
					
					<!-- Info -->
					<?php jw_post_meta(); ?>
					
					<!-- Thumbnail -->
					<div class="image">
						<?php if(has_post_thumbnail()){ the_post_thumbnail(); } /* Show the "one third size" post thumbail if there is one */ ?>
					</div>
					
					<!-- Excerpt -->
					<p><?php the_excerpt(); ?></p>
					
					<!-- Link -->
					<p><a href="<?php the_permalink(); ?>" class="more">Leia mais</a></p>
					
				</div> <!-- .blog-item -->
			
			<?php endwhile; else: /* If no posts found */ ?>
				
				<p>No posts found</p>
			
			<?php endif; /* End if have posts */ ?>
			
		</div><!-- #content -->
		
		<?php get_sidebar('blog'); ?>
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->