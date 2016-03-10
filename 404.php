<?php

/* ------------------------------------------------------------------------------------------------------------

	Page template - 404
	
------------------------------------------------------------------------------------------------------------ */

?>

	<?php get_header(); ?>
	
	<?php global $domain; ?>
	
	<?php jw_breadcrumbs(); /* Show breadcrubs */ ?>
	
	<div id="contentWrap">
		
		<div id="content">
			
			<h4><?php _e('Not found', $domain); ?></h4>
			<?php _e('Sorry, what you are looking for was not found.', $domain); ?>
			
		</div><!-- #content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clearfix"></div>
	
	</div> <!-- #contentWrap -->
	
	<?php get_footer(); ?>