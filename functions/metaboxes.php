<?php

/* ------------------------------------------------------------------------------------------------------------

	Functions - Metaboxes
	
	Description: Declaring custom meta boxes.
	
------------------------------------------------------------------------------------------------------------ */

	/* -----------------------------------------------------------------
		
		Create metaboxes
		
	----------------------------------------------------------------- */
	
	$jw_metabox[] = array(
		'id'		=> 'jw_page_metabox_compose',
		'title'		=> __('Content composer', $domain),
		'post_type'	=> 'page',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	$jw_metabox[] = array(
		'id'		=> 'jw_page_metabox_layout',
		'title'		=> __('Layout & Other Settings', $domain),
		'post_type'	=> 'page',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	$jw_metabox[] = array(
		'id'		=> 'jw_page_metabox_compose',
		'title'		=> __('Content composer', $domain),
		'post_type'	=> 'post',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	$jw_metabox[] = array(
		'id'		=> 'jw_post_metabox_layout',
		'title'		=> __('Layout & Other Settings', $domain),
		'post_type'	=> 'post',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	$jw_metabox[] = array(
		'id'		=> 'jw_page_metabox_compose',
		'title'		=> __('Content composer', $domain),
		'post_type'	=> 'jw_portfolio',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	$jw_metabox[] = array(
		'id'		=> 'jw_portfolio_metabox_layout',
		'title'		=> __('Layout & Other Settings', $domain),
		'post_type'	=> 'jw_portfolio',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	$jw_metabox[] = array(
		'id'		=> 'jw_testimonial',
		'title'		=> __('Testimonial Information', $domain),
		'post_type'	=> 'jw_testimonials',
		'position'	=> 'normal',
		'priority'	=> 'high'
	);
	
	
	/* -----------------------------------------------------------------
		
		COMPOSER
		PAGE
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_page_metabox_compose'][] = array( 
		'type'	=> 'open', 		
	);
		
		$jw_metabox_fields['jw_page_metabox_compose'][] = array(
			'name'		=> 'jw_composer',
			'type'		=> 'composer',
			'default'	=> 'inactive',
		);
	
	$jw_metabox_fields['jw_page_metabox_compose'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		Layout options
		PAGE
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 
		'type' => 'open', 
		'size' => 'one-half', 
		'title'		=> __('Layout', $domain),
		'descr'		=> __('Choose the layout for this page. The options for portfolio and other page types is different.', $domain),
		'style_att'	=> 'height:240px;'
	);
	
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_layout',
			'type'		=> 'layout',
			'default'	=> 'layout_cs',
		);
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Sidebar options
		PAGE
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'		=> __('Custom sidebar', $domain),
		'descr'		=> __('Bellow you can create a new "widgets section" for the sidebar or select one that you previously made. To create a new one just type in the name (ex. My Widgets). The default "widget section" is "Page Widgets".', $domain),
	);
	
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_sidebar',
			'type'		=> 'sidebar',
			'default'	=> '',
		);
		
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');	
	
	
	/* -----------------------------------------------------------------
		
		Title&Description options
		PAGE
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half',
		'title'	=> __('Title&Description', $domain),
		'descr'	=> __('If you don\'t want the title on the page to be the same as the page title enter it here. Description in optional.', $domain),
	);
	
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_show_intro',
			'title'		=> __('Enabled', $domain),
			'descr'		=> __('If you don\'t want to show the title and description on this page you can disable it by selecting no.', $domain),
			'type'		=> 'radio',
			'default'	=> 'yes',
		);
	
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_title',
			'title'		=> __('Title', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_description',
			'title'		=> __('Description', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Slider options
		PAGE
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'	=> __('Slider', $domain),
		'descr'	=> __('The slider that appears at the very top of the page.', $domain),
		
	);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_slider_type',
			'title'		=> __('Slider type', $domain),
			'descr'		=> __('Choose between a regular and a 3D slider.', $domain),
			'type'		=> 'select',
			'default'	=> 'regular',
			'options'	=> array( 'Regular' => 'regular', 'Simple' => 'simple', '3D - Piecemaker' => 'piecemaker' ),
		);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_slider_height',
			'title'		=> __('Slider height', $domain),
			'descr'		=> __('Width is 960px and can\'t be changed, but height is not specific. Enter the amount of pixels you want the images to be resized to. Default: 250.', $domain),
			'type'		=> 'text',
			'default'	=> '250',
		);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_slider_delay',
			'title'		=> __('Slides delay', $domain),
			'descr'		=> __('The amount of seconds between 2 slides. Default: 10.', $domain),
			'type'		=> 'text',
			'default'	=> '10',
		);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_slider',
			'title'		=> __('Slider images', $domain),
			'descr'		=> __('Images that will apear in the slider. Use "Add slides +" link to add images(only images wider or equal 960px will show). You can drag&amp;drop the added images to change the order.', $domain),
			'type'		=> 'slider',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		Portfolio categories
		PAGE
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'	=> __('Portfolio categories', $domain),
		'descr'	=> __('From which categories to show the portfolio posts. Important: If none selected it will show from all categories.', $domain),
		
	);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_categories',
			'title'		=> __('Categories', $domain),
			'descr'		=> __('Which categories to show on this portfolio.', $domain),
			'type'		=> 'portfolio_categories',
			'default'	=> 'show_all',
		);
		
		$jw_metabox_fields['jw_page_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_filter',
			'title'		=> __('Enable Filter', $domain),
			'descr'		=> __('Enable or disable the categories filter which will show on top of the listing.', $domain),
			'type'		=> 'radio',
			'default'	=> 'no',
		);
	
	$jw_metabox_fields['jw_page_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		COMPOSER
		POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_post_metabox_compose'][] = array( 
		'type'	=> 'open', 	
	);
		
		$jw_metabox_fields['jw_post_metabox_compose'][] = array(
			'name'		=> 'jw_composer',
			'type'		=> 'composer',
			'default'	=> 'inactive',
		);
	
	$jw_metabox_fields['jw_post_metabox_compose'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		Layout options
		POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 
		'type' => 'open', 
		'size' => 'one-half', 
		'title'		=> __('Layout', $domain),
		'descr'		=> __('Choose the layout for this page. The options for portfolio and other page types is different.', $domain),
		'style_att'	=> 'height:240px;'
	);
	
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_layout',
			'type'		=> 'layout',
			'default'	=> 'layout_cs',
		);
	
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Sidebar options
		POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'		=> __('Custom sidebar', $domain),
		'descr'		=> __('Bellow you can create a new "widgets section" for the sidebar or select one that you previously made. To create a new one just type in the name (ex. My Widgets). The default "widget section" is "Blog Widgets".', $domain),
	);
	
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_sidebar',
			'type'		=> 'sidebar',
			'default'	=> '',
		);
		
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		Slider options
		POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half',
		'title'	=> __('Slider', $domain),
		'descr'	=> __('The slider that appears at the very top of the page.', $domain),
		
	);
		
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_slider_type',
			'title'		=> __('Slider type', $domain),
			'descr'		=> __('Choose between a regular and a 3D slider.', $domain),
			'type'		=> 'select',
			'default'	=> 'regular',
			'options'	=> array( 'Regular' => 'regular', 'Simple' => 'simple', '3D - Piecemaker' => 'piecemaker' ),
		);
		
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_slider_height',
			'title'		=> __('Slider height', $domain),
			'descr'		=> __('Width is 960px and can\'t be changed, but height is not specific. Enter the amount of pixels you want the images to be resized to. Default: 250.', $domain),
			'type'		=> 'text',
			'default'	=> '250',
		);
		
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_slider_delay',
			'title'		=> __('Slides delay', $domain),
			'descr'		=> __('The amount of seconds between 2 slides. Default: 10.', $domain),
			'type'		=> 'text',
			'default'	=> '10',
		);
		
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_slider',
			'title'		=> __('Slider images', $domain),
			'descr'		=> __('Images that will apear in the slider. Use "Add slides +" link to add images(only images wider or equal 960px will show). You can drag&amp;drop the added images to change the order.', $domain),
			'type'		=> 'slider',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Title&Description options
		POST
		
	----------------------------------------------------------------- */
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'	=> __('Title&Description', $domain),
		'descr'	=> __('If you want the title and description on the post to be custom enter them here here. Description in optional.', $domain),
	);
	
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_show_intro',
			'title'		=> __('Enabled', $domain),
			'descr'		=> __('If you want to show the title and description on this page you can enable it by selecting yes.', $domain),
			'type'		=> 'radio',
			'default'	=> 'no',
		);
	
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_title',
			'title'		=> __('Title', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_post_metabox_layout'][] = array(
			'name'		=> 'jw_description',
			'title'		=> __('Description', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_post_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');
	
	/* -----------------------------------------------------------------
		
		COMPOSER
		PORTFOLIO POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_compose'][] = array( 
		'type'	=> 'open', 
	);
		
		$jw_metabox_fields['jw_portfolio_metabox_compose'][] = array(
			'name'		=> 'jw_composer',
			'type'		=> 'composer',
			'default'	=> 'inactive',
		);
	
	$jw_metabox_fields['jw_portfolio_metabox_compose'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		Layout options
		PORTFOLIO POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 
		'type' => 'open', 
		'size' => 'one-half', 
		'title'		=> __('Layout', $domain),
		'descr'		=> __('Choose the layout for this page. The options for portfolio and other page types is different.', $domain),
		'style_att'	=> 'height:240px;'
	);
	
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_layout',
			'type'		=> 'layout',
			'default'	=> 'layout_cs',
		);
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Sidebar options
		PORTFOLIO POST
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'		=> __('Custom sidebar', $domain),
		'descr'		=> __('Bellow you can create a new "widgets section" for the sidebar or select one that you previously made. To create a new one just type in the name (ex. My Widgets). The default "widget section" is "Portfolio Widgets".', $domain),
	);
	
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_sidebar',
			'type'		=> 'sidebar',
			'default'	=> '',
		);
		
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');	
	
	
	/* -----------------------------------------------------------------
		
		Portfolio item info options
		PORTFOLIO
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half',
		'title'	=> __('Project info', $domain),
	);
	
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_author',
			'title'		=> __('Author name', $domain),
			'descr'		=> __('Shown in the portfolio information.', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_client',
			'title'		=> __('Client name', $domain),
			'type'		=> 'text',
			'descr'		=> __('Shown in the portfolio information.', $domain),
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_website',
			'title'		=> __('Website URL', $domain),
			'type'		=> 'text',
			'descr'		=> __('Outside link to the project.', $domain),
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_video',
			'title'		=> __('Video URL', $domain),
			'descr'		=> __('If you want to show a video in the lightbox instead of images enter the url here (ex. http://www.youtube.com/watch?v=nU5pRGd5caQ)', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Lightbox images
		PORTFOLIO
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'	=> __('Lighbox images', $domain),
	);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_portfolio_images',
			'title'		=> __('Portfolio images', $domain),
			'type'		=> 'portfolio_images',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');
	
	/* -----------------------------------------------------------------
		
		Slider options
		PORTFOLIO
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half',
		'title'	=> __('Slider', $domain),
		'descr'	=> __('The slider that appears at the very top of the page.', $domain),
		
	);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_slider_type',
			'title'		=> __('Slider type', $domain),
			'descr'		=> __('Choose between a regular and a 3D slider.', $domain),
			'type'		=> 'select',
			'default'	=> 'regular',
			'options'	=> array( 'Regular' => 'regular', 'Simple' => 'simple', '3D - Piecemaker' => 'piecemaker' ),
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_slider_height',
			'title'		=> __('Slider height', $domain),
			'descr'		=> __('Width is 960px and can\'t be changed, but height is not specific. Enter the amount of pixels you want the images to be resized to. Default: 250.', $domain),
			'type'		=> 'text',
			'default'	=> '250',
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_slider_delay',
			'title'		=> __('Slides delay', $domain),
			'descr'		=> __('The amount of seconds between 2 slides. Default: 10.', $domain),
			'type'		=> 'text',
			'default'	=> '10',
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_slider',
			'title'		=> __('Slider images', $domain),
			'descr'		=> __('Images that will apear in the slider. Use "Add slides +" link to add images(only images wider or equal 960px will show). You can drag&amp;drop the added images to change the order.', $domain),
			'type'		=> 'slider',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Title&Description options
		PORTFOLIO
		
	----------------------------------------------------------------- */
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 
		'type'	=> 'open', 
		'size'	=> 'one-half last',
		'title'	=> __('Title&Description', $domain),
		'descr'	=> __('If you don\'t want the title on the page to be the same as the page title enter it here. Description in optional.', $domain),
	);
	
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_show_intro',
			'title'		=> __('Enabled', $domain),
			'descr'		=> __('If you don\'t want to show the title and description on this page you can disable it by selecting no.', $domain),
			'type'		=> 'radio',
			'default'	=> 'yes',
		);
	
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_title',
			'title'		=> __('Title', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array(
			'name'		=> 'jw_description',
			'title'		=> __('Description', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_portfolio_metabox_layout'][] = array( 'type' => 'close', 'size' => 'last');
	
	
	/* -----------------------------------------------------------------
		
		Testimonial info
		TESTIMONIAL
		
	----------------------------------------------------------------- */
	$jw_metabox_fields['jw_testimonial'][] = array( 
		'type'	=> 'open', 
		'size'	=> '',
		'title'	=> __('Testimonial info', $domain),
	);
	
		$jw_metabox_fields['jw_testimonial'][] = array(
			'name'		=> 'jw_testimonial_author',
			'title'		=> __('Author', $domain),
			'descr'		=> __('Name of the testimonial author.', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_testimonial'][] = array(
			'name'		=> 'jw_testimonial_author_position',
			'title'		=> __('Position', $domain),
			'descr'		=> __('For example "CEO of Google" and such.', $domain),
			'type'		=> 'text',
			'default'	=> '',
		);
		
		$jw_metabox_fields['jw_testimonial'][] = array(
			'name'		=> 'jw_testimonial_content',
			'title'		=> __('Testimonial', $domain),
			'type'		=> 'textarea',
			'descr'		=> __('The content of the testimonial.', $domain),
			'default'	=> '',
		);
	
	$jw_metabox_fields['jw_testimonial'][] = array( 'type' => 'close');
	
	
	/* -----------------------------------------------------------------
		
		Include the metaboxes framework to handle everything
		
	----------------------------------------------------------------- */
	include TEMPLATEPATH.'/functions/metaboxes-framework.php';
	
	
?>