<?php
/*
	Admin Options
*/

				
$themename = 'Brainstorm';
$shortname = 'jw';

$options = array();

// General options

$options[] = array( 'title' => 'General',
					'type'  => 'open' );

$options[] = array( 'title' => 'Logo - Upload Image',
					'desc'  => 'Upload the logo image.',
					'id'    => $shortname.'_logo_image',
					'std'   => '',
					'type'  => 'upload' );
					
$options[] = array( 'title' => 'Logo - Textual',
					'desc'  => 'If you want a textual logo turn this on. The name of your blog will be shown in text format instead of a logo.',
					'id'    => $shortname.'_logo_textual',
					'std'   => 'off',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Favicon - Upload Image',
					'desc'  => 'Upload the favicon image.',
					'id'    => $shortname.'_favicon',
					'std'   => '',
					'type'  => 'upload' );

$options[] = array( 'title' => 'Comments',
					'desc'  => 'Enable or disable the comments feature on pages. <em>Added in v1.2</em>',
					'id'    => $shortname.'_pages_comments',
					'std'   => 'off',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Analytics code',
					'desc'  => 'Insert the google analytics or any other analytics code here. It will be placed before the closing body tag.',
					'id'    => $shortname.'_analytics',
					'std'   => '',
					'type'  => 'textarea' );

$options[] = array( 'title' => 'Email Address',
					'desc'  => 'Emails from the contact form shortcode and the contact form module (content composer) will be sent to this email.',
					'id'    => $shortname.'_email',
					'std'   => get_option('admin_email'),
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Footer copyright',
					'desc'  => 'The copyright text in the footer.',
					'id'    => $shortname.'_footer_copyright',
					'std'   => '&copy; 2011 Brainstorm',
					'type'  => 'text' );
					
$options[] = array( 'type'  => 'close' );


// Portfolio options

$options[] = array( 'title' => 'Portfolio',
					'type'  => 'open' );

$options[] = array( 'title' => 'Comments',
					'desc'  => 'Enable or disable the comments feature on portfolio posts. <em>Added in v1.2</em>',
					'id'    => $shortname.'_portfolio_comments',
					'std'   => 'off',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Items Per Page (Portfolio Grid v1)',
					'desc'  => 'How many portfolio items to show per page.',
					'id'    => $shortname.'_portfolio_per_page_p1',
					'std'   => '6',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Items Per Page (Portfolio Grid v2)',
					'desc'  => 'How many portfolio items to show per page.',
					'id'    => $shortname.'_portfolio_per_page_p2',
					'std'   => '6',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Items Per Page (Portfolio List)',
					'desc'  => 'How many portfolio items to show per page.',
					'id'    => $shortname.'_portfolio_per_page_p3',
					'std'   => '6',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Lightbox (Portfolio Grid v1)',
					'desc'  => 'Enable or disable the lightbox feature. If disabled clicking the images will take to the portfolio post.',
					'id'    => $shortname.'_portfolio_thickbox_p1',
					'std'   => 'on',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Lightbox (Portfolio Grid v2)',
					'desc'  => 'Enable or disable the lightbox feature. If disabled clicking the images will take to the portfolio post.',
					'id'    => $shortname.'_portfolio_thickbox_p2',
					'std'   => 'on',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Lightbox (Portfolio List)',
					'desc'  => 'Enable or disable the lightbox feature. If disabled clicking the images will take to the portfolio post.',
					'id'    => $shortname.'_portfolio_thickbox_p3',
					'std'   => 'on',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Slug',
					'desc'  => 'When using permalinks the url of a portfolio post will be like http://website.com/portfolio-view/title-of-portfolio-post, if you want to change that <strong>portfolio-view</strong> you can change it here. <strong>IMPORTANT:</strong> Can\'t be same as a post/page name. <strong>IMPORTANT:</strong> After changing visit Settings &rarr; Permalinks in order for WordPress to refresh permalinks.',
					'id'    => $shortname.'_portfolio_slug',
					'std'   => 'portfolio-view',
					'type'  => 'text' );

$options[] = array( 'type' => 'close' );


// Blog options
$options[] = array( 'title' => 'Blog',
					'type'  => 'open' );

$options[] = array( 'title' => 'Posts Per Page',
					'desc'  => 'How many blog posts to show per page.',
					'id'    => $shortname.'_posts_per_page',
					'std'   => '5',
					'type'  => 'text' );

$options[] = array( 'title' => 'About The Author',
					'desc'  => 'Enable or disable the "About author" section.',
					'id'    => $shortname.'_blog_about_author',
					'std'   => 'on',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Thumbnails',
					'desc'  => 'Enable or disable the thumbnails.',
					'id'    => $shortname.'_blog_thumbnails',
					'std'   => 'on',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Full First Post',
					'desc'  => 'Show the full content of the first post.',
					'id'    => $shortname.'_blog_first_full',
					'std'   => 'off',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Read More Link',
					'desc'  => 'Show the read more link on the blog listing for each post.',
					'id'    => $shortname.'_blog_read_more',
					'std'   => 'on',
					'type'  => 'switch' );

$options[] = array( 'type' => 'close' );


// Social options

$options[] = array( 'title' => 'Social',
					'type'  => 'open' );

$options[] = array( 'title' => 'Facebook',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_facebook',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Twitter',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_twitter',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'RSS',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_rss',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Youtube',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_youtube',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'LinkedIn',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_linkedin',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Flickr',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_flickr',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Vimeo',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_vimeo',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'Design Float',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_dfloat',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'FriendFeed',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_friendfeed',
					'std'   => '',
					'type'  => 'text' );
					
$options[] = array( 'title' => 'MySpace',
					'desc'  => 'Insert full url.',
					'id'    => $shortname.'_social_myspace',
					'std'   => '',
					'type'  => 'text' );

$options[] = array( 'type' => 'close' );

$options[] = array( 'title' => 'Appearance',
					'type'  => 'open' );
				
$options[] = array( 'title' => 'Style',
					'type'	=> 'select',
					'id'	=> $shortname.'_style',
					'std'	=> 'skin-1',
					'desc'	=> 'Select the color style you want. Default: Orange.',
					'optns' => array('Orange' => 'skin-1', 'Blue' => 'skin-2', 'Green' => 'skin-3', 'Black' => 'skin-4', 'Pink' => 'skin-5', 'Purple' => 'skin-6', 'Light Blue' => 'skin-7', 'Soft Red' => 'skin-8', 'Special Skin 1' => 'skin-9', 'Special Skin 2' => 'skin-10') );
					
$options[] = array( 'title' => 'Headings Font',
					'desc'  => 'Please select the font you want for the headings.',
					'id'    => $shortname.'_heading_font',
					'std'   => 'PT Sans',
					'type'  => 'select',
					'optns' => array('PT Sans' => 'PT+Sans',
									 'PT Sans Narrow' => 'PT+Sans+Narrow',
									 'PT Sans Caption' => 'PT+Sans+Caption',
									 'Droid Sans' => 'Droid+Sans',
									 'Droid Serif' => 'Droid+Serif',
									 'Nobile' => 'Nobile',
									 'Molengo' => 'Molengo',
									 'OFL Sorts Mill Goudy TT' => 'OFL+Sorts+Mill+Goudy+TT',
									 'Vollkorn' => 'Vollkorn',
									 'Cantarell' => 'Cantarell',
									 'Ubuntu' => 'Ubuntu',
									 'Crimson Text' => 'Crimson+Text',
									 'Cuprum' => 'Cuprum',
									 'Cardo' => 'Cardo',
									 'Avro' => 'Avro',
									 'Neuton' => 'Neuton',
									 'Philosopher' => 'Philosopher',
									 'Old Standard TT' => 'Old+Standard+TT',
									 'Arimo' => 'Arimo',
									 'Allerta' => 'Allerta',
									 'Tinos' => 'Tinos',
									 'Orbitron' => 'Orbitron',
									 'Puritan' => 'Puritan',
									 'Cabin' => 'Cabin',
									 'Copse' => 'Copse',
									 'Lato' => 'Lato',
									 'Allerta Stencil' => 'Allerta+Stencil',
									 'Yanone Kaffeesatz' => 'Yanone+Kaffeesatz',
									 'Lobster' => 'Lobster'
									));

$options[] = array( 'title' => 'Navigation',
					'desc'  => 'If you don\'t want the header navigation you can simply turn it off.',
					'id'    => $shortname.'_header_nav',
					'std'   => 'on',
					'type'  => 'switch' );
					
$options[] = array( 'title' => 'Breadcrumbs bar on homepage',
					'desc'  => 'If you want to show the breacrumbs bar on the homepage turn this on. <em>Added in v1.1</em>',
					'id'    => $shortname.'_homepage_breadcrumbs',
					'std'   => 'off',
					'type'  => 'switch' );
									
$options[] = array( 'type' => 'close' );
?>