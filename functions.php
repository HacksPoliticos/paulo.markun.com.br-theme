<?php
/* ------------------------------------------------------------------------------------------------------------

	Functions - Main functions file
	
	Description: The main functions file
	
------------------------------------------------------------------------------------------------------------ */

	$domain = 'brainstorm';

	add_action('after_setup_theme', 'jw_theme_setup');
	
	/*-----------------------------------------------------------------
	
		Name: jw_theme_setup
		
		Adding theme-supported features, actions and filters.
	
	-----------------------------------------------------------------*/
	function jw_theme_setup(){
	
		global $domain; /* The unique string used for translation */
	
		/* Add theme-supported features. */
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		
		/* Add post thumbnail sizes */
		set_post_thumbnail_size(570, 194, true);
		add_image_size('jw_full', 880, 303, true);
		add_image_size('jw_third', 270, 170, true);
		add_image_size('jw_half', 425, 232, true);
		add_image_size('jw_portfolio_grid', 241, 180, true);
		
		/* Don't change the sizes bellow */
		add_image_size('jw_58', 58, 43, true);
		add_image_size('jw_100', 100, 100, true);
		
		/* Localization */
		load_theme_textdomain($domain, TEMPLATEPATH . '/lang');
		
	}
	
	include TEMPLATEPATH.'/functions/jwpanel/jwpanel-framework.php';
	include TEMPLATEPATH.'/functions/jwpanel/jwpanel-options.php';
	
	include TEMPLATEPATH.'/functions/core.php';
	include TEMPLATEPATH.'/functions/common.php';
	include TEMPLATEPATH.'/functions/shortcodes.php';
	include TEMPLATEPATH.'/functions/menus.php';
	include TEMPLATEPATH.'/functions/sidebars.php';
	include TEMPLATEPATH.'/functions/metaboxes.php';
	include TEMPLATEPATH.'/functions/post-types.php';
	
	/* Include widgets */
	include TEMPLATEPATH.'/functions/widgets/widget.recent-posts.php';
	include TEMPLATEPATH.'/functions/widgets/widget.slider-posts.php';
	include TEMPLATEPATH.'/functions/widgets/widget.recent-tweets.php';
	include TEMPLATEPATH.'/functions/widgets/widget.testimonials.php';
	
	/*-----------------------------------------------------------------
	
		Name: Custom Post Types in RSS Feed
		
		Adds custom post types to WordPress default RSS Feed.
	  
	   Source: http://www.wpbeginner.com/wp-tutorials/how-to-add-custom-post-types-to-your-main-wordpress-rss-feed/
	
	-----------------------------------------------------------------*/
	
	function myfeed_request($qv) {
	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'sp_events', 'jw_portfolio');
	return $qv;
	}
	
	add_filter('request', 'myfeed_request');
	
	/*-----------------------------------------------------------------
	
		Name: Fetch Any RSS Feed
		
		Adds shortcode to fetch any RSS Feed.
	  
	   Source: escolawp
	
	-----------------------------------------------------------------*/
	
	include_once(ABSPATH.WPINC.'/rss.php');

	function cwc_readRss($atts) {
	    extract(shortcode_atts(array(
		"feed" => 'http://',
	      "num" => '1',
	    ), $atts));
	
	    return wp_rss($feed, $num);
	}
	
	add_shortcode('rss', 'cwc_readRss');
	
	
?>
