<?php
/* ------------------------------------------------------------------------------------------------------------
	
	Page part template - Footer
	
------------------------------------------------------------------------------------------------------------ */
?>
	
	<?php global $domain; /* The unique string used for translation */ ?>
	
	<?php include TEMPLATEPATH.'/functions/jwpanel/jwpanel-get.php'; ?>

	<div id="footer">
		<div class="two-third">
			<p><?php echo $jw_footer_copyright; ?></p>
		</div>
		<div class="one-third" style="float:right;">
			<span class="backtotop">Design por <a href='http://sbvirtual.com.br' target='_blank'><img src='http://paulo.markun.com.br/wp-content/uploads/2011/11/sb40.png' alt='SB Virtual' width='32'/></a></span>
		</div>
		<!--<div class="one-third"><span class="backtotop"><?php //_e('To top', $domain); ?></span></div>-->
	</div>
	
	<div class="social">
		
		<ul>
			<?php
			$output = '';
			global $domain; /* The unique string used for translation */
			
			if(isset($jw_social_facebook) && $jw_social_facebook != ''){
				$output .= '<li><a href="'.$jw_social_facebook.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-fb.png" alt="Facebook" title="'.__('Our Facebook fan page!', $domain).'" /></a></li>';
			}

			if(isset($jw_social_twitter) && $jw_social_twitter != ''){
				$output .= '<li><a href="'.$jw_social_twitter.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-twitter.png" alt="Follow us onTwitter" title="'.__('Follow us on Twitter', $domain).'" /></a></li>';
			}
			
			if(isset($jw_social_rss) && $jw_social_rss != ''){
				$output .= '<li><a href="'.$jw_social_rss.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-rss.png" alt="RSS" title="'.__('Subscribe to RSS', $domain).'" /></a></li>';
			}
			
			if(isset($jw_social_youtube) && $jw_social_youtube != ''){
				$output .= '<li><a href="'.$jw_social_youtube.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-youtube.png" alt="Youtube" title="'.__('Youtube profile', $domain).'" /></a></li>';
			}

			if(isset($jw_social_linkedin) && $jw_social_linkedin != ''){
				$output .= '<li><a href="'.$jw_social_linkedin.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-linkedin.png" alt="Our Linkedin account" title="'.__('Our Linkedin account', $domain).'" /></a></li>';
			}

			if(isset($jw_social_flickr) && $jw_social_flickr != ''){
				$output .= '<li><a href="'.$jw_social_flickr.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-flickr.png" alt="Our Flickr images" title="'.__('Our Flickr images', $domain).'" /></a></li>';
			}

			if(isset($jw_social_vimeo) && $jw_social_vimeo != ''){
				$output .= '<li><a href="'.$jw_social_vimeo.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-vimeo.png" alt="Our Vimeo videos" title="'.__('Our Vimeo videos', $domain).'" /></a></li>';
			}

			if(isset($jw_social_dfloat) && $jw_social_dfloat != ''){
				$output .= '<li><a href="'.$jw_social_dfloat.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-designfloat.png" alt="Designfloat" title="'.__('Our DesignFloat profile', $domain).'" /></a></li>';
			}

			if(isset($jw_social_friendfeed) && $jw_social_friendfeed != ''){
				$output .= '<li><a href="'.$jw_social_friendfeed.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-friendfeed.png" alt="Friendfeed" title="'.__('Friendfeed', $domain).'" /></a></li>';
			}

			if(isset($jw_social_myspace) && $jw_social_myspace != ''){
				$output .= '<li><a href="'.$jw_social_myspace.'"><img class="ttip" src="'.get_bloginfo('template_url').'/images/icons/social-myspace.png" alt="MySpace" title="'.__('Myspace', $domain).'" /></a></li>';
			}
			
			echo $output;
			?>
		</ul>
		
	</div> <!-- #social -->

	<!-- end wrapper / end of document -->
	</div>
	
	<?php wp_footer(); ?>
	
	<script>
		Galleria.loadTheme('<?php echo get_bloginfo('template_url'); ?>/js/galleria.classic.js');
		jQuery(window).load(function(){
			jQuery('.galleria').show();
			var galleria_autoplay = false;
			jQuery('.galleria').each(function(){
				if(jQuery(this).hasClass('galleria-autoplay')){ galleria_autoplay = 5000; }else{ galleria_autoplay = false; }
				var the_height = jQuery(this).find('img').height() + 70;
				jQuery(this).galleria({
					height: the_height,
					autoplay: galleria_autoplay,
					transition: "fade",
					image_crop: true
				});
			});
		});
	</script>
	
	<?php if($jw_analytics != ''){ echo $jw_analytics; } ?>
	
</body>
</html>	