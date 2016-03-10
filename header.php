<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Page part template - Header
	
------------------------------------------------------------------------------------------------------------ */
?>

	<!DOCTYPE html >
	<html <?php language_attributes(); ?>>
	
	<head>
		
		<?php include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php'; ?>
		
		<meta charset="<?php bloginfo('charset'); ?>" />
		
		<?php if (is_search()) { ?>
		   <meta name="robots" content="noindex, nofollow" /> 
		<?php } ?>

		<title>
		
			<?php
				
				/* First part of title */
				if (is_tag()){
				
					single_tag_title("Tag Archive for &quot;"); echo '&quot; - ';
					
				}elseif (is_archive()){
				
					wp_title(''); echo ' Archive - ';
					
				}elseif (is_search()){
				
					echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
					
				}elseif (!(is_404()) && (is_single()) || (is_page()) && !is_front_page()) {
				
					wp_title(''); echo ' - ';
					
				}elseif (is_404()){
				
					echo 'Not Found - ';
					
				}
				
				/* Second part of title */
				if (is_home() || is_front_page()){
				
					bloginfo('name'); echo ' - '; bloginfo('description');
					
				}else{
				
					bloginfo('name'); 
					
				}
				
				/* Third part of title */
				if ($paged > 1) {
				
					echo ' - page '. $paged; 
					
				}
			?>
			
		</title>
		
		<!-- Favicon -->
		<?php if($jw_favicon != ''){ ?>
	
			<link rel="shortcut icon" href="<?php echo $jw_favicon; ?>" type="image/x-icon" />
			
		<?php }else{ ?>
		
			<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		
		<?php } ?>
		
		<!-- Main stylesheet (style.css) -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
		
		<!-- Skin -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/<?php echo $jw_style; ?>.css" type="text/css" />
		
		<link href='http://fonts.googleapis.com/css?family=<?php echo $jw_heading_font; ?>:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>
		<style type="text/css">
			h1, h2, h3, h4, h5, h6 { font-family:"<?php echo str_replace('+', ' ', $jw_heading_font); ?>" !important; }
			#fancybox-loading.fancybox-ie div	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_loading.png', sizingMethod='scale'); }
			.fancybox-ie #fancybox-close		{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_close.png', sizingMethod='scale'); }

			.fancybox-ie #fancybox-title-over	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_title_over.png', sizingMethod='scale'); zoom: 1; }
			.fancybox-ie #fancybox-title-left	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_title_left.png', sizingMethod='scale'); }
			.fancybox-ie #fancybox-title-main	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_title_main.png', sizingMethod='scale'); }
			.fancybox-ie #fancybox-title-right	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_title_right.png', sizingMethod='scale'); }

			.fancybox-ie #fancybox-left-ico		{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_nav_left.png', sizingMethod='scale'); }
			.fancybox-ie #fancybox-right-ico	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_nav_right.png', sizingMethod='scale'); }

			.fancybox-ie .fancy-bg { background: transparent !important; }

			.fancybox-ie #fancy-bg-n	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_n.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-ne	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_ne.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-e	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_e.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-se	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_se.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-s	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_s.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-sw	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_sw.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-w	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_w.png', sizingMethod='scale'); }
			.fancybox-ie #fancy-bg-nw	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_url'); ?>/images/fancybox/fancy_shadow_nw.png', sizingMethod='scale'); }
		</style>
		
		<!-- Lightbox -->
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fancybox-1.3.1.css" type="text/css" />
		
		<!-- Pingback -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<?php wp_head(); ?>
		
		<?php if(isset($post)){ $post_custom = get_post_custom($post->ID); } /* Get the custom fields values */ ?>
		
		<?php 
			if(isset($post_custom['jw_slider_delay'])){
				$slider_delay = $post_custom['jw_slider_delay'][0];
			}else{
				$slider_delay = 10;
			}
		?>
		
		<script type="text/javascript">

			jQuery(window).load(function(){
				if(jQuery('.jquery-cycle').length){
			
					jQuery('.jquery-cycle').cycle({ 
						timeout: <?php $slider_delay = $slider_delay * 1000; echo $slider_delay; ?>,
						speed:  1000,
						prev:   '.prevslide', 
						next:   '.nextslide'
					}); 
					
				}
			});
		
			var flashvars = {};
			flashvars.cssSource = "<?php echo get_bloginfo('template_url').'/scripts/piecemaker/piecemaker.css' ?>";
			flashvars.xmlSource = "<?php echo get_bloginfo('template_url').'/scripts/piecemaker/piecemaker-xml.php?post_id='.$post->ID; ?>";

			var params = {};
			params.play = "true";
			params.menu = "false";
			params.scale = "showall";
			params.wmode = "transparent";
			params.allowfullscreen = "true";
			params.allowscriptaccess = "always";
			params.allownetworking = "all";
			
			<?php
				function getAttribute($attrib, $tag){
					//get attribute from html tag
					$re = '/' . preg_quote($attrib) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is';
					if (preg_match($re, $tag, $match)) {
						return urldecode($match[2]);
					}
					return false;
				}

				$subject = $post_custom['jw_slider'][0];
				$height = getAttribute('height', $subject);
				if(empty($height)){ $height = 250; }
				$height += 150;
			?>
			
			swfobject.embedSWF('<?php echo get_bloginfo('template_url').'/scripts/piecemaker/piecemaker.swf' ?>', 'piecemaker', '1060', '<?php echo $height; ?>', '10', null, flashvars, params, null);

		</script>
		
		<link href='http://fonts.googleapis.com/css?family=Andika' rel='stylesheet' type='text/css'>
		
	</head>
	
	<?php $body_class = ''; /* For additional body classes */ ?>

	<body <?php body_class($body_class); ?>>
		
		<div id="wrapper">

			<div id="top">
				
				<div id="logo">
				
					<?php if($jw_logo_textual == 'on'){ ?>
						
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						
					<?php }else{ ?>
					
						<?php if($jw_logo_image != ''){ $logo_img = $jw_logo_image; }else{ $logo_img = get_bloginfo('template_url').'/images/general/logo.png'; } ?> 
						<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo_img; ?>" alt="" /></a>
						
					<?php } ?>
				
				</div>
				
				<div id="novonosite">
					<h2>Novo no Site</h2>
					<?php do_shortcode('[rss feed="http://paulo.markun.com.br/feed" num="1"]'); ?>
				</div>
				
				
			</div><!-- #top -->
			
			<?php if($jw_header_nav == 'on'){ ?>
				
					<div id="nav">
						<?php wp_nav_menu(array('container_class' => '', 'menu_class' => '', 'theme_location' => 'main_navigation', 'link_before' => '', 'link_after' => '')); ?>
					</div>
				
			<?php } ?>
			
			<?php if(isset($post_custom['jw_slider'][0]) && !empty($post_custom['jw_slider'][0])){ ?>
				
				<?php if(!isset($post_custom['jw_slider_type'][0]) || $post_custom['jw_slider_type'][0] == 'regular'){ ?>
					<div id="header">
						<ul class="jquery-cycle" style="height:<?php echo $post_custom['jw_slider_height'][0]; ?>px;">
							
							<?php
								//Only the first one should show by default (no js fix)
								$jw_slider_content = preg_replace('/\[slide/', '[slide show="yes"', $post_custom['jw_slider'][0], 1);
							?>
							<?php echo do_shortcode($jw_slider_content); ?>
							
						</ul>
						
						<div id="headernav">
							<a class="prevslide" href="#"></a>
							<a class="nextslide" href="#"></a>
						</div>
					</div> <!-- end header -->
				<?php }elseif($post_custom['jw_slider_type'][0] == 'simple'){ ?>
					
					<div id="header">
						<ul class="jquery-cycle" style="height:<?php echo $post_custom['jw_slider_height'][0]; ?>px;">
							
							<?php
								//Only the first one should show by default (no js fix)
								$jw_slider_content = preg_replace('/\[slide/', '[slide type="simple"', $post_custom['jw_slider'][0]);
								$jw_slider_content = preg_replace('/\[slide/', '[slide show="yes"', $jw_slider_content, 1);
							?>
							<?php echo do_shortcode($jw_slider_content); ?>
							
						</ul>
						
						<div id="headernav">
							<a class="prevslide" href="#"></a>
							<a class="nextslide" href="#"></a>
						</div>
					</div> <!-- end header -->
					
				<?php }else{ ?>
					
					<div id="piecemaker"></div>
					
				<?php } ?>
			
			<?php } ?>