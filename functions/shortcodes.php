<?php

/* ------------------------------------------------------------------------------------------------------------

	Functions - Shortcodes

------------------------------------------------------------------------------------------------------------ */
	
	/* Columns */
	add_shortcode('one_fourth', 'jw_one_fourth');
	add_shortcode('one_fourth_last', 'jw_one_fourth_last');
	add_shortcode('one_third', 'jw_one_third');
	add_shortcode('one_third_last', 'jw_one_third_last');
	add_shortcode('two_third', 'jw_two_third');
	add_shortcode('two_third_last', 'jw_two_third_last');
	add_shortcode('one_half', 'jw_one_half');
	add_shortcode('one_half_last', 'jw_one_half_last');
	
	/* Notifications */
	add_shortcode('error', 'jw_error_box');
	add_shortcode('notification', 'jw_notification_box');
	add_shortcode('information', 'jw_information_box');
	add_shortcode('download', 'jw_download_box');
	
	/* Quoteboxes */
	add_shortcode('quote', 'jw_quote');
	
	/* Buttons */
	add_shortcode('button', 'jw_button');
	
	/* Other */
	add_shortcode('slider_posts', 'jw_slider_posts');
	add_shortcode('recent_tweets', 'jw_recent_tweets');
	add_shortcode('recent_posts', 'jw_recent_posts');
	add_shortcode('separator', 'jw_separator');
	add_shortcode('bullets', 'jw_bullets');
	add_shortcode('highlight', 'jw_highlight');
	add_shortcode('toggle', 'jw_toggle');
	add_shortcode('toggles', 'jw_toggles');
	add_shortcode('galleria', 'jw_galleria');
	add_shortcode('galleria_slide', 'jw_galleria_slide');
	add_shortcode('contact_form', 'jw_contact_form');
	
	/* Images */
	add_shortcode('slide', 'jw_slide');
	add_shortcode('slide_piecemaker', 'jw_slide_piecemaker');
	add_shortcode('slide_admin', 'jw_slide_admin');
	add_shortcode('portfolio_image', 'jw_portfolio_image');
	add_shortcode('portfolio_image_admin', 'jw_portfolio_image_admin');
	add_shortcode('img', 'jw_image');
	
	/* Blank (from the composer) */
	add_shortcode('blank', 'jw_blank');
	
	add_shortcode('ltweet', 'jw_ltweet');
	add_shortcode('service', 'jw_service');
	
	/* Posts */
	add_shortcode('portfolio_posts', 'jw_portfolio_posts');
	add_shortcode('blog_posts', 'jw_blog_posts');
	add_shortcode('testimonials', 'jw_testimonials');
	
	
	/* -----------------------------------------------------------------
	
		Columns shortcodes
	
	----------------------------------------------------------------- */
	
	function jw_one_fourth($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 202;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="one-fourth">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function jw_one_fourth_last($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 202;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="one-fourth last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function jw_one_third($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 280;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="one-third">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function jw_one_third_last($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 280;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="one-third last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function jw_two_third($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 590;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="two-third">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function jw_two_third_last($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 590;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="two-third last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function jw_one_half($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 435;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="one-half">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}

	function jw_one_half_last($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$width = 435;
		$content = preg_replace('/\[galleria/', '[galleria width="'.$width.'"', $content);
		
		$output = '<div class="one-half last">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	/* -----------------------------------------------------------------
	
		Posts Slider
	
	----------------------------------------------------------------- */
	function jw_slider_posts($atts, $content = null) {
		
		/* The attributes */
		extract(shortcode_atts(array(
			'post_type' => 'post',
			'amount' => 5,
			'tag' => '',
			'thumbnail' => 'yes',
			'title' => 'yes',
			'excerpt' => 'yes',
			'order' => 'regular'
		), $atts));
		
		if($post_type == 'portfolio'){ $post_type = 'jw_portfolio'; }
		if($post_type == 'blog'){ $post_type = 'post'; };
		
		if($post_type == 'jw_portfolio' && !empty($tag)){
			$portfolio_tags = explode(',', $tag);
		}
		
		if($order == 'regular'){ $orderby = 'date'; }else{ $orderby = 'rand'; }
		
		/* Get the posts */
		if($post_type == 'post' || empty($tag)){
			$args=array(
			   'post_type' => $post_type,
			   'showposts' => $amount,
			   'tag' => $tag,
			   'orderby' => $orderby
			);
		}elseif($post_type == 'jw_portfolio'){
			$args=array(
			   'post_type' => $post_type,
			   'showposts' => $amount,
			   'tax_query' => array(
					array(
						'taxonomy' => 'jw_portfolio_categories',
						'field' => 'slug',
						'terms' => $portfolio_tags
					)
				),
				'orderby' => $orderby
			);
		}
		$jw_query = new WP_Query($args);

		/* The output */
		$output = '<div class="container">
				<ul class="slides">';
					if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post();
						
						if($thumbnail == 'yes' && has_post_thumbnail()){
							$post_thumb = '<a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'jw_third').'</a>';
						}else{
							$post_thumb = '';
						}
						
						if($title == 'yes'){
							$post_title = '<h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>';
						}else{
							$post_title = '';
						}
						
						if($excerpt == 'yes'){
							$post_excerpt = '<p>'.get_the_excerpt().'</p>';
						}else{
							$post_excerpt = '';
						}
						
						$output .= '
						<li>
							'.$post_thumb.'
							'.$post_title.'
							'.$post_excerpt.'
						</li>';
					endwhile; endif;
				$output .= '
				</ul>
			</div>
		</div>';
		
		/* Reset Query */
		wp_reset_query();
		
		return do_shortcode($output);
	
	} /* jw_slider_posts() END */
	
	
	/* -----------------------------------------------------------------
	
		Recent Posts
	
	----------------------------------------------------------------- */
	function jw_recent_posts($atts, $content = null) {
	
		/* The attributes */
		extract(shortcode_atts(array(
			'post_type' => 'blog',
			'amount' => 5
		), $atts));
			
		if($post_type == 'portfolio'){ $post_type = 'jw_portfolio'; }	
		if($post_type == 'blog'){ $post_type = 'post'; }	
		
		/* Get the posts */
		$args=array(
		   'post_type' => $post_type,
		   'posts_per_page' => $amount
		);
		$jw_query = new WP_Query($args);

		/* The Output */
		$output = '<div class="latest blog posts">
			<ul>';
				
				if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post();
					
					if(has_post_thumbnail()){ $output_img = '<div class="img">'.get_the_post_thumbnail(get_the_ID(), 'jw_58').'</div>'; }else{ $output_img = ''; }
					
					$output .= '
					<li>
						'.$output_img.'
						<div class="content">
							<h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>
							<span class="date">'.get_the_time('F j, Y').'</span>
						</div>
					</li>';
					
				endwhile;
				
				else :
				// do stuff for no results
				endif;
			
			$output .= '
			</ul>
		</div> <!-- end latest blog posts -->';
		
		/* Reset Query */
		wp_reset_query();
			
		return do_shortcode($output);
		
	} /* jw_recent_posts() END */
	
	
	/* -----------------------------------------------------------------
	
		Recent Tweets
	
	----------------------------------------------------------------- */
	function jw_recent_tweets($atts, $content = null) {
		
		global $domain;
		
		/* The attributes */
		extract(shortcode_atts(array(
			'profile' => 'jvanoel',
			'amount' => 5
		), $atts));
	
		$output = '<div class="message">
			<input type="hidden" class="twitter-username" value="'.$profile.'" />
			<input type="hidden" class="twitter-amount" value="'.$amount.'" />
			<div class="twitterStatus"></div>
		</div>';
		
		return do_shortcode($output);
		
	} /* jw_recent_posts() END */
	
	
	/* -----------------------------------------------------------------
	
		Separator
	
	----------------------------------------------------------------- */
	function jw_separator($atts, $content = null) {
	
		extract(shortcode_atts(array(
			'line' => 'no',
		), $atts));
		
		if($line == 'no'){ $line_output = ' noline'; }else{ $line_output = ''; }
		
		$output = '<div class="hr'.$line_output.'"></div>';
		
		return do_shortcode($output);
		
	}/* jw_separator() END */
	
	
	/* -----------------------------------------------------------------
	
		Bullets
	
	----------------------------------------------------------------- */
	function jw_bullets($atts, $content = null) {
	
		extract(shortcode_atts(array(
			'type' => 'arrow'
		), $atts));
		
		$output = '<ul class="bullets '.$type.'">' . $content . '</ul>';
		
		return do_shortcode($output);
		
	}/* jw_bullets() END */
	
	
	/* -----------------------------------------------------------------
	
		Notifications
	
	----------------------------------------------------------------- */
	function jw_download_box($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$output = '<div class="box-download">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function jw_information_box($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$output = '<div class="box-information">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function jw_notification_box($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$output = '<div class="box-notification">' . $content . '</div>';
		
		return do_shortcode($output);
		
	}
	
	function jw_error_box($atts, $content = null) {
		
		$content = jw_remove_autop($content);
		
		$output = '<div class="box-error">' . $content . '</div>';
		
		return do_shortcode($output);

	}
	
	
	/* -----------------------------------------------------------------
	
		Quoteboxes
	
	----------------------------------------------------------------- */
	function jw_quote($atts, $content = null) {
	
		extract(shortcode_atts(array(
			'align' => 'left'
		), $atts));
		
		$content = jw_remove_autop($content);
		
		$output = '<span class="quotebox-'.$align.'">' . $content . '</span>';
		
		return do_shortcode($output);
		
	}/* jw_quote() END */
	
	
	/* -----------------------------------------------------------------
	
		Slider
	
	----------------------------------------------------------------- */
	function jw_slide($atts, $img = null){
		
		global $domain;
		
		extract(shortcode_atts(array(
			'link' => '',
			'title' => '',
			'description' => '',
			'height' => 250,
			'show' => 'no',
			'type' => 'regular'
		), $atts));
		
		$img_id = jw_get_attachment_id('url', $img);
		$resized = jw_resize( $img_id, '', 960, $height, true );
		$img = $resized['url'];
		
		if($show == 'no'){ $show = 'display:none;'; }else{ $show = ''; }
		
		$output  = '<li style="background-image: url('.$img.'); height:'.$height.'px; '.$show.'">';
			
			if($type == 'regular' && !empty($title) && !empty($description)){
			
				$output .= '
				<div class="content">
						<h2>'.$title.'</h2>
						<p>'.$description.'</p>
				</div>';
				
				if(!empty($link)){
					$output .= '<div class="readmore">
					<a href="'.$link.'">'.__('Read more', $domain).'<span class="arrow"></span></a>
				</div>';
				}
				
				$output .= '
				<div class="rightside"></div>
				<span class="corner"></span>';
			
			}
			
			if($type == 'simple' && !empty($link)){
				
				$output .= '<a href="'.$link.'" class="header-big-link"></a>';
				
			}
		
		$output .= '</li>';
		
		return do_shortcode($output);
	}
	
	
	/* -----------------------------------------------------------------
	
		Slider Piecemaker
	
	----------------------------------------------------------------- */
	function jw_slide_piecemaker($atts, $img = null){
		
		global $domain;
		
		extract(shortcode_atts(array(
			'link' => '',
			'title' => '',
			'description' => '',
			'height' => 250,
			'show' => 'no'
		), $atts));
		
		$img_id = jw_get_attachment_id('url', $img);
		$resized = jw_resize( $img_id, '', 960, $height, true );
		$img = $resized['url'];
		
		if($show == 'no'){ $show = 'display:none;'; }else{ $show = ''; }
		
		$output  = '<Image Source="'.$img.'" Title="'.$title.'">';
		
			if(!empty($description) && !empty($description)){ $output .= '<Text>&lt;h1&gt;'.$title.'&lt;/h1&gt;&lt;p&gt;'.$description.'</Text>'; }
			if(!empty($link)){ $output .= '<Hyperlink URL="'.$link.'" Target="_blank" />'; }
		
		$output .= '</Image>';			
		
		return do_shortcode($output);
	}
	
	
	/* -----------------------------------------------------------------
	
		Slider ADMIN
	
	----------------------------------------------------------------- */
	function jw_slide_admin($atts, $img = null){
		
		extract(shortcode_atts(array(
			'link' => '',
			'title' => '',
			'description' => ''
		), $atts));
		
		$img_id = jw_get_attachment_id('url', $img);
		
		$thumb_src = wp_get_attachment_image_src($img_id, 'jw_100');
		$thumb_src = $thumb_src[0];
		
		$output = '
		<li>
			<img src="'.$thumb_src.'" alt="'.$img.'" />
			<a class="metabox-slider-show-edit"></a><a class="metabox-slider-remove-slide"></a>
			<input type="hidden" class="slider-title" value="'.esc_attr($title).'" />
			<input type="hidden" class="slider-link" value="'.$link.'" />
			<input type="hidden" class="slider-description" value="'.esc_attr($description).'" />
		</li>';
		
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Portfolio images
	
	----------------------------------------------------------------- */
	function jw_portfolio_image($atts, $img = null){
		
		extract(shortcode_atts(array(
			'show' => 'yes'
		), $atts));
		
		if($show == 'yes'){
			$output = '<a class="folio-zoom" rel="folio-zoom" href="'.$img.'"></a>';
		}else{
			$output = '';
		}
		
		return do_shortcode($output);
		
	}
	
	/* -----------------------------------------------------------------
	
		Portfolio images ADMIN
	
	----------------------------------------------------------------- */
	function jw_portfolio_image_admin($atts, $img = null){
		
		$img_id = jw_get_attachment_id('url', $img);
		
		$thumb_src = wp_get_attachment_image_src($img_id, 'jw_100');
		$thumb_src = $thumb_src[0];
		
		$output = '
		<li>
			<img src="'.$thumb_src.'" alt="'.$img.'" />
			<a class="metabox-slider-remove-slide"></a>
		</li>';
		
		return do_shortcode($output);
		
	}
	
	/* -----------------------------------------------------------------
	
		Blank
	
	----------------------------------------------------------------- */
	function jw_blank($atts, $content){
		
		extract(shortcode_atts(array(
			'width' => 'one-third',
			'last' => 'false'
		), $atts));
		
		$content = jw_remove_autop($content);
		
		if($last == 'true'){ $last = '_last'; }else{ $last = ''; }
		
		switch ($width) {
			
			case 'full-width':
				$output = '<div>'.$content.'</div>';
				break;
			case 'two-third':
				$output = '[two_third'.$last.']'.$content.'[/two_third'.$last.']';
				break;
			case 'one-half':
				$output = '[one_half'.$last.']'.$content.'[/one_half'.$last.']';
				break;
			case 'one-third':
				$output = '[one_third'.$last.']'.$content.'[/one_third'.$last.']';
				break;
			case 'one-fourth':
				$output = '[one_fourth'.$last.']'.$content.'[/one_fourth'.$last.']';
				break;

		}
		
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Latest Tweet
	
	----------------------------------------------------------------- */
	function jw_ltweet($atts, $content = null){
		
		global $domain;
		
		extract(shortcode_atts(array(
			'width' => 'one-third',
			'last' => 'false',
			'profile' => 'jvanoel'
		), $atts));
		
		if($last == 'true'){ $last = ' last'; }else{ $last = ''; }
		
		$output = '
				<div class="twitterfeed">
					<div class="message">
						<input type="hidden" class="twitter-username" value="'.$profile.'" />
						<input type="hidden" class="twitter-amount" value="1" />
						<div class="twitterStatus"></div>
					</div>
				   <!-- Twitter --> 
				</div>';
		
		$output = '<div class="'.$width.$last.'">'.$output.'</div>';
		
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Services
	
	----------------------------------------------------------------- */
	function jw_service($atts, $content){
		
		extract(shortcode_atts(array(
			'width' => 'one-third',
			'last' => 'false',
			'icon' => 'books_01.png'
		), $atts));
		
		if($last == 'true'){ $last = ' last'; }else{ $last = ''; }
		
		$content = '<img src="'.get_bloginfo('template_url').'/images/icons/'.$icon.'" alt=""/>'.$content;
		
		switch ($width) {
			
			case 'full-width':
				$output = '<div class="services">'.$content.'</div>';
				break;
			case 'two-third':
				$output = '<div class="two-third services'.$last.'">'.$content.'</div>';
				break;
			case 'one-half':
				$output = '<div class="one-half services'.$last.'">'.$content.'</div>';
				break;
			case 'one-third':
				$output = '<div class="one-third services'.$last.'">'.$content.'</div>';
				break;
			case 'one-fourth':
				$output = '<div class="one-fourth services'.$last.'">'.$content.'</div>';
				break;

		}
		
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Button
	
	----------------------------------------------------------------- */
	function jw_button($atts, $content){
		
		extract(shortcode_atts(array(
			'color' => 'black',
			'tooltip' => '',
			'link' => '#'
		), $atts));
		
		$ttip_class = '';
		
		if($tooltip != ''){ $ttip_class = ' ttip'; $tooltip = 'title="'.$tooltip.'"'; }
		
		$output = '<a class="btn '.$color.$ttip_class.'" '.$tooltip.' href="'.$link.'">'.$content.'</a>';
		
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Highlight
	
	----------------------------------------------------------------- */
	function jw_highlight($atts, $content){
		
		$output = '<span class="highlight">'.$content.'</span>';
		
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Toggle
	
	----------------------------------------------------------------- */
	function jw_toggle($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'title' => 'Unnamed'
		), $atts));
		
		$output = '<h6 class="toggle"><span class="indicator"></span><a href="#">'.$title.'</a></h6>
				<div class="toggle_div">
					<div class="block">'.jw_remove_wpautop($content).'</div>
				</div>';
			
		return do_shortcode($output);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Toggles container
	
	----------------------------------------------------------------- */
	function jw_toggles($atts, $content = null) {
		
		return jw_remove_wpautop($content);
		
	}
	
	
	/* -----------------------------------------------------------------
	
		Portfolio posts
	
	----------------------------------------------------------------- */
	function jw_portfolio_posts($atts, $content = null) {
		
		global $domain; /* The unique string used for translation */
		
		include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php';
		
		extract(shortcode_atts(array(
			'amount' => 5,
			'show_thumbnail' => 'yes',
			'show_title' => 'no',
			'show_excerpt' => 'no',
			'show_meta' => 'no',
			'width' => 'two-third',
			'type' => 'grid_1',
			'last' => 'false',
			'category' => 'all'
		), $atts));
		
		$parent_size = $width;
		
		if($last == 'true') { $last_class = ' last'; }else{ $last_class = ''; }
		
		if($parent_size == 'full-width'){
			$count_last = 3;
		}else if($parent_size == 'two-third'){
			$count_last = 2;
		}else if($parent_size == 'one-third'){
			$count_last = 1;
		}else if($parent_size == 'one-half'){
			$count_last = 1;
		}else if($parent_size == 'one-fourth'){
			$count_last = 1;
		}
		
		if($category == 'all'){
		
			$args = array(
				'post_type'			=> 'jw_portfolio',
				'posts_per_page'	=> $amount,
			);
		
		}else{
			
			$args = array(
				'post_type'			=> 'jw_portfolio',
				'posts_per_page'	=> $amount,
				'tax_query' => array(
					array(
						'taxonomy' => 'jw_portfolio_categories',
						'field' => 'id',
						'terms' => $category
					)
				)
			);
			
		}
		$jw_query = new WP_Query($args); 
		
		$count = 0;
		
		if($type == 'grid_1'){
		
			$output = '
			<div class="'.$width.$last_class.' portfolio grid-2">
						
				<ul>';
				
					if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */
						
						$c_post_custom = get_post_custom(get_the_ID());
						
						if($jw_portfolio_thickbox_p2 == 'on'){ include TEMPLATEPATH.'/functions/fancybox-type.php'; }else{ $fancybox_class = 'blank'; $fancybox_type = 'blank'; }
						
							$li_class = '';
							$li_clear = false;
							
							/* Add the last class to every 3rd */
							if($count == $count_last){ $li_class .= 'last '; $count = 0; $li_clear = true;  }
					
						$output .= '<li class="'.$li_class.$fancybox_class.'">';
							
							if(has_post_thumbnail(get_the_ID()) && $show_thumbnail == 'yes'){
								
								$output .= '<div>';
									if(isset($c_post_custom['jw_portfolio_images'][0]) && $jw_portfolio_thickbox_p2 == 'on'){
										$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), "original");
										$output .= '<a class="folio-zoom" rel="folio-zoom" href="'.$thumbnail[0].'">';
									}elseif(isset($c_post_custom['jw_portfolio_video'][0]) && $jw_portfolio_thickbox_p2 == 'on'){
										$output .= '<a href="'.$c_post_custom['jw_portfolio_video'][0].'">';
									}else{
										$output .= '<a href="'.get_permalink().'">';
									}
											$output .= get_the_post_thumbnail(get_the_ID(), 'jw_third');
										$output .= '</a>';
										
										if(isset($c_post_custom['jw_portfolio_images'][0])){
											$output .= do_shortcode($c_post_custom['jw_portfolio_images'][0]);
										}
								$output .= '</div>';
							
							}
							
							if($show_title == 'yes'){
								$output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
							}
							if($show_excerpt == 'yes'){
								$output .= '<p>'.get_the_excerpt().'</p>';
							}
							if($show_meta == 'yes'){
							$output .= '
								<span class="info">
									<span class="date">'.get_the_time('F j Y').'</span>';
									$portfolio_cats = get_the_terms(get_the_ID(), 'jw_portfolio_categories');
									if(!empty($portfolio_cats)){
									
										$output .= '
										<span class="tags">';
											$cat_count = 0;
											foreach($portfolio_cats as $portfolio_cat){
												$cat_count++;
												if($cat_count > 1){ $output .= ', '.$portfolio_cat->name; }else{ $output .= $portfolio_cat->name; }
											}
									$output .= '
									</span>';
										
									}
								$output .= '
								</span>';
							}
							
						$output .= '</li>';
					
						if($li_clear == true){ $output .= '<div class="clear"></div>'; }
					
					endwhile; else: /* If no posts found */
						
						$output .= '<p>'.__('The portfolio is empty', $domain).'</p>';
					
					endif; /* End if have posts */
				
				$output .= '
				</ul>
				
			</div><!-- .portfolio.grid-2 -->';
		
		}elseif($type == 'grid_2'){
			
			$output = '<div class="hr noline"></div>
			<div class="portfolio grid">
					
				<ul>';
				
					if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */
					
						$c_post_custom = get_post_custom(get_the_ID());
					
						include TEMPLATEPATH.'/functions/fancybox-type.php';
					
						$output .= '<li class="'.$fancybox_class.'">';
							if(has_post_thumbnail()){
								$output .= '<span class="grid-img">'.get_the_post_thumbnail(get_the_ID(), 'jw_portfolio_grid').'</span>';
							}
							$output .='
							<div class="content">
								
								<h5>'.get_the_title().'</h5>
								
								<p>'.jw_text_excerpt(get_the_excerpt(), 120).'</p>';
								
								if(isset($c_post_custom['jw_portfolio_client'][0])){
									$output .= '
									<div class="row">
										<span class="name">'.__('Client', $domain).'</span>
										<span class="detail">'.$c_post_custom['jw_portfolio_client'][0].'</span>
									</div> <!-- end row -->';
								}
								
								$output .= '
								<div class="row">
									<span class="name">'.__('Date', $domain).'</span>
									<span class="detail">'.get_the_time('F j Y').'</span>
								</div> <!-- end row -->';
								
								$portfolio_cats = get_the_terms(get_the_ID(), 'jw_portfolio_categories');
								if(!empty($portfolio_cats)){
								
									$output .= '
									<div class="row">
										<span class="name">'.__('Tags', $domain).'</span>';
										
											foreach($portfolio_cats as $portfolio_cat){
												$output .= '<span class="detail">'.$portfolio_cat->name.'</span>';
											}
										
									$output .= '</div> <!-- end row -->';
								
								}
								
								if(isset($c_post_custom['jw_portfolio_author'][0])){
								
									$output .='
									<div class="row">
										<span class="name">'.__('Author', $domain).'</span>
										<span class="detail">'.$c_post_custom['jw_portfolio_author'][0].'</span>
									</div><!-- end row -->';
								
								}
								
								$output .= '<a class="folio-more" href="'.get_permalink().'"></a>';
								
								if(isset($c_post_custom['jw_portfolio_images'][0]) && $c_post_custom['jw_portfolio_images'][0] != '' && $jw_portfolio_thickbox_p1 == 'on'){
									preg_match('!http://.+\.(?:jpe?g|png|gif)!Ui', $c_post_custom['jw_portfolio_images'][0],$matches); 
									$output .= '<a class="folio-zoom" rel="folio-zoom" href="'.$matches[0].'">';
								}elseif(isset($c_post_custom['jw_portfolio_video'][0]) && $jw_portfolio_thickbox_p1 == 'on'){
									$output .= '<a class="folio-zoom" href="'.$c_post_custom['jw_portfolio_video'][0].'">';
								}
								$output .= '</a>';

								if(isset($c_post_custom['jw_portfolio_images'][0])){
									$jw_portfolio_images = preg_replace('/\[portfolio_image/', '[portfolio_image show="no"', $c_post_custom['jw_portfolio_images'][0], 1);
									$output .= do_shortcode($jw_portfolio_images);
								}
								
							$output .= '
							</div> <!-- end portfolio content -->
						</li> <!-- end portfolio item -->';
					
					endwhile; else: /* If no posts found */
						
						$output .= '<p>'.__('The portfolio is empty', $domain).'</p>';
					
					endif; /* End if have posts */
				
				$output .= '
				</ul>
				
			</div><!-- .portfolio.grid -->';
			
		}
		
		return do_shortcode($output);
		
	}
	
	/* -----------------------------------------------------------------
	
		Blog posts
	
	----------------------------------------------------------------- */
	function jw_blog_posts($atts, $content = null) {
		
		global $domain; /* The unique string used for translation */
		
		include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php';
		
		extract(shortcode_atts(array(
			'type' => 'list',
			'amount' => 5,
			'item_width_value' => 'one_third',
			'show_thumbnail' => 'yes',
			'show_title' => 'no',
			'show_excerpt' => 'no',
			'show_meta' => 'no',
			'width' => 'two-third',
			'last' => 'false',
			'category' => 'all'
		), $atts));
		
		$content_before = do_shortcode($content_before);
		$content_after = do_shortcode($content_after);
		
		if($content_before == 'undefined'){ $content_before = ''; }
		if($content_after == 'undefined'){ $content_after = ''; }
		
		$parent_size = $width;
		
		if($last == 'true') { $last_class = ' last'; }else{ $last_class = ''; }
		
		if($parent_size == 'full-width'){
			$count_last = 3;
		}else if($parent_size == 'two-third'){
			$count_last = 2;
		}else if($parent_size == 'one-third'){
			$count_last = 1;
		}else if($parent_size == 'one-half'){
			$count_last = 1;
		}else if($parent_size == 'one-fourth'){
			$count_last = 1;
		}else if($parent_size == 'three-fourth'){
			$count_last = 2;
		}
		
		if($type == 'grid'){

			if($category == 'all'){
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page'	=> $amount,
				);
			}else{
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page'	=> $amount,
					'cat'				=> $category
				);
			}
			$jw_query = new WP_Query($args); 
			
			$count = 0;
			
			if($item_width_value == 'one_fourth'){
				$item_class = 'one-fourth';
				if($parent_size == 'full-width'){
					$count_last = 4;
				}else if($parent_size == 'two-third'){
					$count_last = 2;
				}else if($parent_size == 'one-third'){
					$count_last = 1;
				}else if($parent_size == 'one-half'){
					$count_last = 2;
				}else if($parent_size == 'one-fourth'){
					$count_last = 1;
				}else if($parent_size == 'three-fourth'){
					$count_last = 3;
				}
				$item_thumbnail_id = 'jw_third';
			}else{
				$item_class = 'one-third';
				$item_thumbnail_id = 'jw_third';
			}
		
			$output = '
			<div class="'.$width.$last_class.' portfolio grid-2">
				<ul class="col-clear">';
				
					if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */
						
						$c_post_custom = get_post_custom(get_the_ID());					
						
							$li_class = '';
							$li_clear = false;
							
							/* Add the last class to every 3rd */
							if($count == $count_last){ $li_class .= 'last '; $count = 0; $li_clear = true;  }
					
						$output .= '<li class="'.$item_class.' '.$li_class.'">';
						
							if(has_post_thumbnail(get_the_ID()) && $show_thumbnail == 'yes'){
								
								$output .= '<div><a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_id(), $item_thumbnail_id).'</a></div>';
							
							}/* Post thumbnail */
							
							if($show_title == 'yes'){
								$output .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
							}
							if($show_excerpt == 'yes'){
								$output .= '<p>'.jw_text_excerpt(get_the_excerpt(), 90).'</p>';
							}
							
						$output .= '</li>';
					
						if($li_clear == true){ $output .= '<div class="clear"></div>'; }
					
					endwhile; else: /* If no posts found */
						
						$output .= '<p>'.__('The blog is empty', $domain).'</p>';
					
					endif; /* End if have posts */
				
				$output .= '
				</ul>
			</div><!-- .portfolio.grid-2 -->';
		
		}else{
			
			$output = '<div class="'.$width.$last_class.'">'.$content_before.do_shortcode('[recent_posts amount="'.$amount.'" post_type="blog"]').$content_after.'</div>';
			
		}
		
		return do_shortcode($output);
		
	}
	
	/* -----------------------------------------------------------------
	
		Galleria
	
	----------------------------------------------------------------- */
	function jw_galleria($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'width' => 900,
			'height' => '',
			'autoplay' => 'false'
		), $atts));
		
		$galleria_classes = '';
		
		if($autoplay == 'true'){ $galleria_classes .= 'galleria-autoplay '; }
		
		include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php';
		
		//Only the first one should show by default (no js fix)
		$content = preg_replace('/\[galleria_slide/', '[galleria_slide show="yes"', $content, 1);
		
		$style_attr = 'style="';
		
		if($height != ''){
			$height = str_replace('px', '', $height);
			$content = preg_replace('/\[galleria_slide/', '[galleria_slide height="'.$height.'"', $content);
			$height += 70;
			$style_attr .= 'height: '.$height.'px;';
		}
		
		$style_attr .= '"';
		
		$output = '
		<div class="galleria '.$galleria_classes.'" '.$style_attr.'>
			'.do_shortcode($content).'
		</div>';
		
		return do_shortcode($output);
			
	}
	
	
	/* -----------------------------------------------------------------
	
		Galleria Slide
	
	----------------------------------------------------------------- */
	function jw_galleria_slide($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'caption' => '',
			'show' => 'no',
			'width' => '',
			'height' => ''
		), $atts));		
		
		$image_url = $content;
		
		if($width != '' || $height != ''){
		
			$image_url = jw_resize('', $image_url, $width, $height, true);
			$image_url = $image_url['url'];
		
		}
			
		$output = '<img src="'.$image_url.'" alt="'.$caption.'" style="'.$show.'" />';
		
		return do_shortcode($output);
			
	}
	
	
	/* -----------------------------------------------------------------
	
		Image
	
	----------------------------------------------------------------- */
	function jw_image($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'width' => '',
			'height' => '',
			'crop' => true,
			'tooltip' => '',
			'alt' => ''
		), $atts));
		
		$image_url = $content;
		
		/* Resize */
		if($width != '' || $height != ''){
			
			$image_url = jw_resize('', $image_url, $width, $height, $crop);
			$image_url = $image_url['url'];
			
		}
		
		$output = '<img'; 
		
		$output .= ' src = '.$image_url;
		
		if($tooltip != ''){
			$output .= ' class="ttip" title="'.$tooltip.'"';
		}
		
		if($alt != ''){
			$output .= ' alt="'.$alt.'"';
		}
		
		$output .= ' />';
		
		return do_shortcode($output);
			
	}
	
	
	/* -----------------------------------------------------------------
	
		Testimonials
	
	----------------------------------------------------------------- */
	function jw_testimonials($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'amount' => 5,
			'type' => 'scroller',
			'columns' => 3,
			'width' => 'one-third',
			'last' => 'false'
		), $atts));
		
		if($last == 'true'){ $last = ' last'; }else{ $last = ''; }
		
		$args = array(
			'post_type' => 'jw_testimonials',
			'posts_per_page' => $amount,
		);
		$jw_query = new WP_Query($args); 
		
		if($type == 'scroller'){
		
			$output = '<div class="'.$width.$last.'"><ul class="quotes">';
				
				if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); /* Loop the posts */
					
					$c_post_custom = get_post_custom(get_the_ID());
					$output .= '<li><blockquote><p>&#8220;'.$c_post_custom['jw_testimonial_content'][0].'&#8221; <cite>&ndash; '.$c_post_custom['jw_testimonial_author'][0].'</cite></p></blockquote></li>';
				
				endwhile; endif;
				
			$output .= '</ul></div>';
		
		}else if($type == 'list'){
			
			switch ($columns) {
				case 4:
					$column = 'one-fourth';
					break;
				case 3:
					$column = 'one-third';
					break;
				case 2:
					$column = 'one-half';
					break;
				case 1:
					$column = '';
			}
				
			$output = '';
			
			$count = 0;
			
			$output .= '<div class="'.$width.$last.'">';
			
			if ($jw_query->have_posts()) : while ($jw_query->have_posts()) : $jw_query->the_post(); $count++; /* Loop the posts */
				
				if($width == 'full-width'){
					if($column == 'one-half'){ $count_max = 2; }
					elseif($column == 'one-third'){ $count_max = 3; }
					elseif($column == 'one-fourth'){ $count_max = 4; }
					elseif($column == ''){ $count_max = 1; }
				}else if($width == 'two-third'){
					if($column == 'one-half'){ $count_max = 1; }
					elseif($column == 'one-third'){ $count_max = 2; }
					elseif($column == 'one-fourth'){ $count_max = 1; }
					elseif($column == ''){ $count_max = 1; }
				}else if($width == 'one-half'){
					if($column == 'one-half'){ $count_max = 1; }
					elseif($column == 'one-third'){ $count_max = 1; }
					elseif($column == 'one-fourth'){ $count_max = 2; }
					elseif($column == ''){ $count_max = 1; }
				}else if($width == 'one-third'){
					if($column == 'one-half'){ $count_max = 1; }
					elseif($column == 'one-third'){ $count_max = 1; }
					elseif($column == 'one-fourth'){ $count_max = 1; }
					elseif($column == ''){ $count_max = 1; }
				}else if($width == 'one-fourth'){
					if($column == 'one-half'){ $count_max = 1; }
					elseif($column == 'one-third'){ $count_max = 1; }
					elseif($column == 'one-fourth'){ $count_max = 1; }
					elseif($column == ''){ $count_max = 1; }
				}
				
				if($count == $count_max){ $last = ' last'; $count = 0; }else{ $last = ''; }
					$output .= '<div class="'.$column.$last.'">';
						$output .= '<div class="testimonial">';
							$c_post_custom = get_post_custom(get_the_ID());
							$output .= '<h4>'.$c_post_custom['jw_testimonial_author'][0].'</h4>';
							if(isset($c_post_custom['jw_testimonial_author_position'][0])){
								$output .= '<p class="position">'.$c_post_custom['jw_testimonial_author_position'][0].'</p>';
							}
							$output .= '<p>'.$c_post_custom['jw_testimonial_content'][0].'</p>';
						$output .= '</div>';
					$output .= '</div>';
				
				if($last == ' last'){ $output .= '<div class="hr noline"></div>'; }
			
			endwhile; endif;
			
			$output .= '</div>';
			
		}
		
		return do_shortcode($output);
		
	}
	

	/* -----------------------------------------------------------------
	
		Contact Form
	
	----------------------------------------------------------------- */
	function jw_contact_form($atts, $content = null) {
		
		global $domain;
		
		extract(shortcode_atts(array(
			'width' => 'one-third',
			'last' => 'false'
		), $atts));
		
		if($last == 'true'){ $last_class = ' last'; }else{ $last_class = ''; }
		
		$output = '
		<div class="'.$width.$last_class.'">
		<form class="cmxform contactForm" id="contactForm" method="post" action="'.get_bloginfo('template_url').'/content-parts/contact-send.php">
			<fieldset>
				<p>
					<input type="text" onfocus="if(this.value==\''.__('Name', $domain).'\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\''.__('Name', $domain).'\';" name="cname" class="required" value="'.__('Name', $domain).'" id="cname" />
				</p>
				<p>
					<input type="text" onfocus="if(this.value==\''.__('Email', $domain).'\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\''.__('Email', $domain).'\';" name="cemail" class="required email" value="'.__('Email', $domain).'" id="cemail" />
				</p>
				<p>
					<textarea cols="30" rows="10" class="required" name="ccomment" id="ccomment"></textarea>
				</p>
			</fieldset>
			<p><button class="submit btn skin" type="submit" name="sendmail">Send</button></p>
		</form>
		</div>
		<script type="text/javascript">
			//<![CDATA[
			var cname = new LiveValidation(\'cname\', {onlyOnSubmit: false, validMessage: " "});
			var cemail = new LiveValidation(\'cemail\', {onlyOnSubmit: false, validMessage: " "});
			var ccomment = new LiveValidation(\'ccomment\', {onlyOnSubmit: false, validMessage: " "});

			cname.add( Validate.Presence,{failureMessage: " "});
			cname.add( Validate.Exclusion, { within: [ \'First Name\' ] } );
			cemail.add( Validate.Email,{failureMessage: " "});
			cemail.add( Validate.Presence,{failureMessage: " "});							  					  
			ccomment.add( Validate.Presence,{failureMessage: " "});
			ccomment.add( Validate.Exclusion, { within: [ \'Message\' ] } );
			//]]>
		</script>';
		
		return do_shortcode($output);
			
	}
?>