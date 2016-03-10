// #################################
/* Twitter JS v1.13.1 */
// #################################
if(typeof renderTwitters!='function')(function(){var j=(function(){var b=navigator.userAgent.toLowerCase();return{webkit:/(webkit|khtml)/.test(b),opera:/opera/.test(b),msie:/msie/.test(b)&&!(/opera/).test(b),mozilla:/mozilla/.test(b)&&!(/(compatible|webkit)/).test(b)}})();var k=0;var n=[];var o=false;var p=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];window.ify=function(){var c={'"':'&quot;','&':'&amp;','<':'&lt;','>':'&gt;'};return{"link":function(t){return t.replace(/[a-z]+:\/\/[a-z0-9-_]+\.[a-z0-9-_:~%&\?\/.=]+[^:\.,\)\s*$]/ig,function(m){return'<a href="'+m+'">'+((m.length>25)?m.substr(0,24)+'...':m)+'</a>'})},"at":function(t){return t.replace(/(^|[^\w]+)\@([a-zA-Z0-9_]{1,15})/g,function(m,a,b){return a+'@<a href="http://twitter.com/'+b+'">'+b+'</a>'})},"hash":function(t){return t.replace(/(^|[^\w'"]+)\#([a-zA-Z0-9_]+)/g,function(m,a,b){return a+'#<a href="http://search.twitter.com/search?q=%23'+b+'">'+b+'</a>'})},"clean":function(a){return this.hash(this.at(this.link(a)))}}}();window.renderTwitters=function(a,b){function node(e){return document.createElement(e)}function text(t){return document.createTextNode(t)}var c=document.getElementById(b.twitterTarget);var d=null;var f=node('ul'),li,statusSpan,timeSpan,i,max=a.length>b.count?b.count:a.length;for(i=0;i<max&&a[i];i++){d=getTwitterData(a[i]);if(b.ignoreReplies&&a[i].text.substr(0,1)=='@'){max++;continue}li=node('li');if(b.template){li.innerHTML=b.template.replace(/%([a-z_\-\.]*)%/ig,function(m,l){var r=d[l]+""||"";if(l=='text'&&b.enableLinks)r=ify.clean(r);return r})}else{statusSpan=node('span');statusSpan.className='twitterStatus';timeSpan=node('span');timeSpan.className='twitterTime';statusSpan.innerHTML=a[i].text;if(b.enableLinks==true){statusSpan.innerHTML=ify.clean(statusSpan.innerHTML)}timeSpan.innerHTML=relative_time(a[i].created_at);if(b.prefix){var s=node('span');s.className='twitterPrefix';s.innerHTML=b.prefix.replace(/%(.*?)%/g,function(m,l){return a[i].user[l]});li.appendChild(s);li.appendChild(text(' '))}li.appendChild(statusSpan);li.appendChild(text(' '));li.appendChild(timeSpan)}if(b.newwindow){li.innerHTML=li.innerHTML.replace(/<a href/gi,'<a target="_blank" href')}f.appendChild(li)}if(b.clearContents){while(c.firstChild){c.removeChild(c.firstChild)}}c.appendChild(f);if(typeof b.callback=='function'){b.callback()}};window.getTwitters=function(e,f,g,h){k++;if(typeof f=='object'){h=f;f=h.id;g=h.count}if(!g)g=1;if(h){h.count=g}else{h={}}if(!h.timeout&&typeof h.onTimeout=='function'){h.timeout=10}if(typeof h.clearContents=='undefined'){h.clearContents=true}if(h.withFriends)h.withFriends=false;h['twitterTarget']=e;if(typeof h.enableLinks=='undefined')h.enableLinks=true;window['twitterCallback'+k]=function(a){if(h.timeout){clearTimeout(window['twitterTimeout'+k])}renderTwitters(a,h)};ready((function(c,d){return function(){if(!document.getElementById(c.twitterTarget)){return}var a='http://www.twitter.com/statuses/'+(c.withFriends?'friends_timeline':'user_timeline')+'/'+f+'.json?callback=twitterCallback'+d+'&count=20&cb='+Math.random();if(c.timeout){window['twitterTimeout'+d]=setTimeout(function(){if(c.onTimeoutCancel)window['twitterCallback'+d]=function(){};c.onTimeout.call(document.getElementById(c.twitterTarget))},c.timeout*1000)}var b=document.createElement('script');b.setAttribute('src',a);document.getElementsByTagName('head')[0].appendChild(b)}})(h,k))};DOMReady();function getTwitterData(a){var b=a,i;for(i in a.user){b['user_'+i]=a.user[i]}b.time=relative_time(a.created_at);return b}function ready(a){if(!o){n.push(a)}else{a.call()}}function fireReady(){o=true;var a;while(a=n.shift()){a.call()}}function DOMReady(){if(document.addEventListener&&!j.webkit){document.addEventListener("DOMContentLoaded",fireReady,false)}else if(j.msie){document.write("<scr"+"ipt id=__ie_init defer=true src=//:><\/script>");var a=document.getElementById("__ie_init");if(a){a.onreadystatechange=function(){if(this.readyState!="complete")return;this.parentNode.removeChild(this);fireReady.call()}}a=null}else if(j.webkit){var b=setInterval(function(){if(document.readyState=="loaded"||document.readyState=="complete"){clearInterval(b);b=null;fireReady.call()}},10)}}function relative_time(c){var d=c.split(" "),parsed_date=Date.parse(d[1]+" "+d[2]+", "+d[5]+" "+d[3]),date=new Date(parsed_date),relative_to=(arguments.length>1)?arguments[1]:new Date(),delta=parseInt((relative_to.getTime()-parsed_date)/1000),r='';function formatTime(a){var b=a.getHours(),min=a.getMinutes()+"",ampm='AM';if(b==0){b=12}else if(b==12){ampm='PM'}else if(b>12){b-=12;ampm='PM'}if(min.length==1){min='0'+min}return b+':'+min+' '+ampm}function formatDate(a){var b=a.toDateString().split(/ /),mon=p[a.getMonth()],day=a.getDate()+'',dayi=parseInt(day),year=a.getFullYear(),thisyear=(new Date()).getFullYear(),th='th';if((dayi%10)==1&&day.substr(0,1)!='1'){th='st'}else if((dayi%10)==2&&day.substr(0,1)!='1'){th='nd'}else if((dayi%10)==3&&day.substr(0,1)!='1'){th='rd'}if(day.substr(0,1)=='0'){day=day.substr(1)}return mon+' '+day+th+(thisyear!=year?', '+year:'')}delta=delta+(relative_to.getTimezoneOffset()*60);if(delta<5){r='less than 5 seconds ago'}else if(delta<30){r='half a minute ago'}else if(delta<60){r='less than a minute ago'}else if(delta<120){r='1 minute ago'}else if(delta<(45*60)){r=(parseInt(delta/60)).toString()+' minutes ago'}else if(delta<(2*90*60)){r='about 1 hour ago'}else if(delta<(24*60*60)){r='about '+(parseInt(delta/3600)).toString()+' hours ago'}else{if(delta<(48*60*60)){r=formatTime(date)+' yesterday'}else{r=formatTime(date)+' '+formatDate(date)}}return r}})();

// #################################
/*loopedSlider 0.5.6 - jQuery plugin */
// #################################
if(typeof jQuery!='undefined'){jQuery(function($){$.fn.extend({loopedSlider:function(options){var settings=$.extend({},$.fn.loopedSlider.defaults,options);return this.each(function(){if($.fn.jquery<'1.3.2'){return}var $t=$(this);var o=$.metadata?$.extend({},settings,$t.metadata()):settings;var distance=0;var times=1;var slides=$(o.slides,$t).children().size();var width=$(o.slides,$t).children().outerWidth();var position=0;var active=false;var number=0;var interval=0;var restart=0;var pagination=$("."+o.pagination+" li a",$t);if(o.addPagination&&!$(pagination).length){var buttons=slides;$($t).append("<ul class="+o.pagination+">");$(o.slides,$t).children().each(function(){if(number<buttons){$("."+o.pagination,$t).append("<li><a rel="+(number+1)+" href=\"#\" >"+(number+1)+"</a></li>");number=number+1}else{number=0;return false}$("."+o.pagination+" li a:eq(0)",$t).parent().addClass("active")});pagination=$("."+o.pagination+" li a",$t)}else{$(pagination,$t).each(function(){number=number+1;$(this).attr("rel",number);$(pagination.eq(0),$t).parent().addClass("active")})}if(slides===1){$(o.slides,$t).children().css({position:"absolute",left:position,display:"block"});return}$(o.slides,$t).css({width:(slides*width)});$(o.slides,$t).children().each(function(){$(this).css({position:"absolute",left:position,display:"block"});position=position+width});$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:-width});if(slides>3){$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:-width})}if(o.autoHeight){autoHeight(times)}$(".next",$t).click(function(){if(active===false){animate("next",true);if(o.autoStart){if(o.restart){autoStart()}else{clearInterval(sliderIntervalID)}}}return false});$(".previous",$t).click(function(){if(active===false){animate("prev",true);if(o.autoStart){if(o.restart){autoStart()}else{clearInterval(sliderIntervalID)}}}return false});if(o.containerClick){$(o.container,$t).click(function(){if(active===false){animate("next",true);if(o.autoStart){if(o.restart){autoStart()}else{clearInterval(sliderIntervalID)}}}return false})}$(pagination,$t).click(function(){if($(this).parent().hasClass("active")){return false}else{times=$(this).attr("rel");$(pagination,$t).parent().siblings().removeClass("active");$(this).parent().addClass("active");animate("fade",times);if(o.autoStart){if(o.restart){autoStart()}else{clearInterval(sliderIntervalID)}}}return false});if(o.autoStart){sliderIntervalID=setInterval(function(){if(active===false){animate("next",true)}},o.autoStart);function autoStart(){if(o.restart){clearInterval(sliderIntervalID);clearInterval(interval);clearTimeout(restart);restart=setTimeout(function(){interval=setInterval(function(){animate("next",true)},o.autoStart)},o.restart)}else{sliderIntervalID=setInterval(function(){if(active===false){animate("next",true)}},o.autoStart)}}}function current(times){if(times===slides+1){times=1}if(times===0){times=slides}$(pagination,$t).parent().siblings().removeClass("active");$(pagination+"[rel='"+(times)+"']",$t).parent().addClass("active")};function autoHeight(times){if(times===slides+1){times=1}if(times===0){times=slides}var getHeight=$(o.slides,$t).children(":eq("+(times-1)+")",$t).outerHeight();$(o.container,$t).animate({height:getHeight},o.autoHeight)};function animate(dir,clicked){active=true;switch(dir){case"next":times=times+1;distance=(-(times*width-width));current(times);if(o.autoHeight){autoHeight(times)}if(slides<3){if(times===3){$(o.slides,$t).children(":eq(0)").css({left:(slides*width)})}if(times===2){$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:width})}}$(o.slides,$t).animate({left:distance},o.slidespeed,function(){if(times===slides+1){times=1;$(o.slides,$t).css({left:0},function(){$(o.slides,$t).animate({left:distance})});$(o.slides,$t).children(":eq(0)").css({left:0});$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:-width})}if(times===slides)$(o.slides,$t).children(":eq(0)").css({left:(slides*width)});if(times===slides-1)$(o.slides,$t).children(":eq("+(slides-1)+")").css({left:(slides*width-width)});active=false});break;case"prev":times=times-1;distance=(-(times*width-width));current(times);if(o.autoHeight){autoHeight(times)}if(slides<3){if(times===0){$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:(-width)})}if(times===1){$(o.slides,$t).children(":eq(0)").css({position:"absolute",left:0})}}$(o.slides,$t).animate({left:distance},o.slidespeed,function(){if(times===0){times=slides;$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:(slides*width-width)});$(o.slides,$t).css({left:-(slides*width-width)});$(o.slides,$t).children(":eq(0)").css({left:(slides*width)})}if(times===2)$(o.slides,$t).children(":eq(0)").css({position:"absolute",left:0});if(times===1)$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:-width});active=false});break;case"fade":times=[times]*1;distance=(-(times*width-width));current(times);if(o.autoHeight){autoHeight(times)}$(o.slides,$t).children().fadeOut(o.fadespeed,function(){$(o.slides,$t).css({left:distance});$(o.slides,$t).children(":eq("+(slides-1)+")").css({left:slides*width-width});$(o.slides,$t).children(":eq(0)").css({left:0});if(times===slides){$(o.slides,$t).children(":eq(0)").css({left:(slides*width)})}if(times===1){$(o.slides,$t).children(":eq("+(slides-1)+")").css({position:"absolute",left:-width})}$(o.slides,$t).children().fadeIn(o.fadespeed);active=false});break;default:break}}})}});$.fn.loopedSlider.defaults={container:".container",slides:".slides",pagination:"pagination",containerClick:false,autoStart:0,restart:0,slidespeed:300,fadespeed:200,autoHeight:0,addPagination:false}})}

jQuery(document).ready(function($) {
	
	$('.twitterStatus').each(function(){
		var twitter_username = $(this).parents('.message').find('input.twitter-username').val();
		var twitter_amount = $(this).parents('.message').find('input.twitter-amount').val();
		$(this).tweet({
			join_text: "auto",
			username: twitter_username,
			avatar_size: 48,
			count: twitter_amount,
			auto_join_text_default: "",
			auto_join_text_ed: "",
			auto_join_text_ing: "",
			auto_join_text_reply: "",
			auto_join_text_url: "",
			loading_text: "Loading tweets...",
			template: "{text} {time}"
		});
	});
	
	if($('#header .jquery-cycle li').length > 1){
		$('#headernav').show();
	}
	
	function generate_lightbox(){
		// Lightbox for images
		$("li.image a:has(img), a.fancy, .portfolio.grid li a.folio-zoom, .portfolio-list.image a:has(img)").fancybox({
			'titlePosition'		: 'over',
			'padding' : 0
		});

		// Lightbox for vimeo videos
		$("li.vimeo a:has(img), div.portfolio-list.vimeo a:has(img), li.vimeo a.folio-zoom").click(function() {
			$.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none',
				'title'			: this.title,
				'width'			: 600,
				'height'		: 398,
				'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
				'type'			: 'swf'
			});
				return false;
		});

		// Lightbox for YouTube videos
		$("li.youtube a:has(img), div.portfolio-list.youtube a:has(img), li.youtube a.folio-zoom").click(function() {
			$.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'none',
					'transitionOut'	: 'none',
					'title'			: this.title,
					'width'		: 680,
					'height'		: 495,
					'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
					'type'			: 'swf',
					'swf'			: {
						 'wmode'		: 'transparent',
						'allowfullscreen'	: 'true'
					}
				});

			return false;
		});
		
		// IMAGE GALLERY FADE OPACITY WHEN HOVER
	
		$(".gallery img, .portfolio img, .portfolio-list img, a.fancy").css("opacity", "1");
			
		// ON MOUSE OVER
		$(".gallery img, .portfolio img, .portfolio-list img, a.fancy").hover(function () {

			// SET OPACITY TO 100%
			$(this).stop().animate({
			opacity: 0.5
			}, "fast");
		},

		// ON MOUSE OUT
		function () {

			// SET OPACITY BACK TO 100%
			$(this).stop().animate({
			opacity: 1
			}, "fast");
		});

		$('.portfolio.grid li').each(function(){
			$(this).find('a.folio-zoom:first').show();	
		});
		
	}
	
	$('#quicksand-nav a.btn').click(function(e) {
		e.preventDefault();  
		$.get( $(this).attr('href'), function(data) {
			$('.portfolio-ul').quicksand( $(data).find('li'), { adjustHeight: 'dynamic' }, function(){
				generate_lightbox();
			});
		});  
	});
	
	$('.contactForm').submit(function(e){

		//prevent the normal processing
		e.preventDefault();

		//delete the errors (so we don't get duplicates)
		$(this).find('.LV_invalid_field').removeClass('LV_invalid_field');

		//declaring and setting vars
		var value, theID, error, emailReg;
		var submit_path = $(this).attr('action');
		error = false;
		emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;				

		//validating
		$(this).find('textarea, input[type=text]').each(function(){
			value = $(this).val();
			theID = $(this).attr('id');
			if(value == ''){
				$(this).addClass('LV_invalid_field');
				error = true;
			}
			if(theID == 'cemail' && (value == '' || value == 'Email' || !emailReg.test(value))){
				$(this).addClass('LV_invalid_field');
				error = true;
			}
		});

		//send email and loaded message
		if(error == false){
			$(this).load(submit_path, $(this).serialize());
		}

	});
	
	$('.innerfade').innerfade({
		speed: 1000,
		timeout: 50000,
		type: 'sequence',
		containerheight: '250px'
	});
	
	$('.innerfade').each(function(){
		$(this).height($(this).children().height());
	});
	
	// Quotes fader
	$('.quotes').each(function(){
		
		var tallest_height = 50;
		
		$(this).children().each(function(){
			if($(this).height() > tallest_height){
				tallest_height = $(this).height();
			}
		});
		
		$(this).innerfade({
			speed: 500,
			timeout: 12000,
			type: 'sequence',
			containerheight: tallest_height + 'px'
		});
	});
	
	//  Featured work slider
	$('.loopedSlider').loopedSlider({
		autoHeight: 300
	});
	
	// #################################
	// MENU ANIMATING
	// #################################
	$(" #nav ul ul ").css({display: "none"});
	
	$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(200);
		
		},function(){
		
			$(this).find('ul:first').css({visibility: "hidden"});
	});

	// #################################
	// MENU ACTIVE ON SUBMENU HOVER
	// #################################
	$("#nav ul ul").hover(function () {
		$(this).parent().addClass("hover");
		},
		function() {
			$("#nav ul li").removeClass("hover");
		});
		
	// #################################
	// PORTFOLIO GRID
	// #################################
	$(".portfolio.grid li").live('mouseenter', function(){
		$(this).find('div.content').fadeIn("fast");
	});
	
	$(".portfolio.grid li").live('mouseleave',function(){
		$(this).find('div.content').fadeOut("fast");
	});

	// #################################
	// TOOLTIP
	// #################################
	$('.ttip').tipsy({delayIn: 0, delayOut: 0});

	$('.latest.blog ul li').hover(function() { 
			$(this).stop().animate({ paddingLeft: '10px' }, 300);
		}, function() {
			$(this).stop().animate({ paddingLeft: 0 }, 300);
	});

	// #################################
	// CONTENT TOGGLE
	// #################################
	$(".toggle_div").hide(); 
			
	$("h6.toggle").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});

	$("h6.toggle").click(function(){
		$(this).next(".toggle_div").slideToggle();
	});
	
	$("#tabs").tabs();

	// #################################
	// LOGIN SLIDE
	// #################################
	$("#login-slider").hide(); 
			
	$("a.login").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});

	$("a.login, #login-slider a.close").click(function(){
		$("#login-slider").slideToggle();
	});
	
	// #################################
	// PAGENAV CLICK
	// #################################
	$(".submenu li").click(function () {
		$(".submenu li").removeClass("current", 1000);
		$(this).addClass("current", 1000);
     });

	// #################################
	// Lightbox for images
	// #################################
	$("li.image a:has(img), a.fancy, .portfolio.grid li a.folio-zoom, .portfolio-list.image a:has(img)").fancybox({
		'titleShow' : false,
		'padding' : 0
	});

	// #################################
	// Lightbox for vimeo videos
	// #################################
	$("li.vimeo a:has(img), div.portfolio-list.vimeo a:has(img), li.vimeo a.folio-zoom").click(function() {
		$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'			: 600,
			'height'		: 398,
			'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
			'type'			: 'swf',
			'titleShow' : false
		});
			return false;
	});

	// #################################
	// Lightbox for YouTube videos
	// #################################
	$("li.youtube a:has(img), div.portfolio-list.youtube a:has(img), li.youtube a.folio-zoom").click(function() {
		$.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none',
				'title'			: this.title,
				'width'		: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					 'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				},
				'titleShow' : false
			});

		return false;
	});

	// #################################
	// IMAGE GALLERY FADE OPACITY WHEN HOVER
	// #################################
	$(function() {
	
		$(".gallery img, portfolio.list img, .portfolio.grid-2 div img, a.fancy, ul.screens img").css("opacity", "1");

		// ON MOUSE OVER
		$(".gallery img, .portfolio-list img, .portfolio.grid-2 div img, a.fancy, ul.screens img").hover(function () {

			// SET OPACITY TO 100%
			$(this).stop().animate({
			opacity: 0.5
			}, "fast");
		},

		// ON MOUSE OUT
		function () {

			// SET OPACITY BACK TO 100%
			$(this).stop().animate({
			opacity: 1
			}, "fast");
		});	
	});
	
	$('.portfolio .content').hover(function() {
	  $(this).parents('.portfolio').find('img').not(this).stop().animate({opacity: 0.6}, 300);
	}, function() {
	  $(this).parents('.portfolio').find('img').not(this).stop().animate({opacity: 1}, 200);      
	});
  
  
	// #################################
	// TO TOP BUTTON
	// #################################
	jQuery('.backtotop').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');
	});
	
	// Show first folio zoom in portfolio grid v1
	$('.portfolio.grid li').each(function(){
		$(this).find('a.folio-zoom:first').show();	
	});

		
}); // END OF DOCUMENT READY