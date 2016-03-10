<?php

/* ------------------------------------------------------------------------------------------------------------

	Functions - Sidebars
	
	Description: Register sidebars, widgets, add filters, actions...
	
------------------------------------------------------------------------------------------------------------ */
	
	/* Actions and filters */
	add_action('widgets_init', 'jw_register_sidebars');
	add_action('widgets_init', 'jw_unregister_widgets');
	add_action('widgets_init', 'jw_register_widgets');
	
	
	/* -----------------------------------------------------------------
		
		Name: jw_register_sidebars
		
	----------------------------------------------------------------- */
	function jw_register_sidebars(){
		
		global $domain; /* The unique string used for translation */
		
		/* Page sidebar (left and right) */
		register_sidebar(
			array(
				'id' => 'sidebar_page',
				'name' => __('Page Widgets', $domain),
				'description' => __('Widgets inserted here will show up in the sidebar sections for pages.', $domain),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><div class="hr"></div>',
				'before_title' => '<h4>',
				'after_title' => '</h4>'
			)
		);
		
		/* Blog sidebar (both listing and detailed view) */
		register_sidebar(
			array(
				'id' => 'sidebar_blog',
				'name' => __('Blog Widgets', $domain),
				'description' => __('Widgets inserted here will show up in the sidebar sections for the blog.', $domain),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><div class="hr"></div>',
				'before_title' => '<h4>',
				'after_title' => '</h4>'
			)
		);
		
		/* Portfolio sidebar (both listing and detailed view) */
		register_sidebar(
			array(
				'id' => 'sidebar_portfolio',
				'name' => __('Portfolio Widgets', $domain),
				'description' => __('Widgets inserted here will show up in the sidebar sections for the portfolio.', $domain),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><div class="hr"></div>',
				'before_title' => '<h4>',
				'after_title' => '</h4>'
			)
		);
		
		/* User made sidebars */
		$w_count = 0;
		
		global $wpdb;
		
		$widgetized_pages = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'jw_sidebar'"));
		
		if($widgetized_pages){
			
			foreach($widgetized_pages as $w_page){
				
				$w_count++;
				
				if(is_active_sidebar('jw_widgetsection_'.$w_count)){
					$widget_id = $w_count;
				}else{
					$widget_id = strtolower(str_replace(' ', '_', $w_page));
				}
				
				register_sidebar(array(
					'name' => $w_page,
					'id'   => 'jw_widgetsection_'.$widget_id,
					'description'   => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div><div class="hr"></div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>'
				));
				
			}/* For each user created widget END */
 			
		}/* If there are user created widgets END */
		
		
	} /* jw_register_sidebars() END */	

	
	/* -----------------------------------------------------------------
		
		Name: jw_register_widgets
		
		Register custom WordPress widgets
		
	----------------------------------------------------------------- */
	function jw_register_widgets(){
	
			
	
	}
	
	/* -----------------------------------------------------------------
		
		Name: jw_unregister_widgets
		
		Unregister default WordPress widgets
		
	----------------------------------------------------------------- */
	function jw_unregister_widgets(){
	
			
	
	}
	
?>