<?php
load_theme_textdomain('slaffistica');
$options = get_option('slaffistica_options');
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8" />
	<title><?php wp_title(); ?></title>
	
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic-ext,cyrillic'  />
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic&subset=cyrillic' />
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold&subset=cyrillic' />	
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Tenor+Sans&subset=latin,cyrillic' />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->
	<link rel="stylesheet" href="/libs/v6/fancybox/jquery.fancybox.css" />
	
	<script src="/libs/v6/js/jquery-latest.js"></script>
	<script src="/libs/v6/js/html5/modernizr.js"></script>
	<script src="/libs/v6/js/html5/EventHelpers.js"></script>
	<script src="/libs/v6/js/html5/html5Widgets.js"></script>
	<!--[if IE]>
		<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
	<script src="/libs/v6/js/retrodeluxe.js"></script>	
	<script src="/libs/v6/js/cufon/cufon-yui.js"></script>
	<script src="/libs/v6/js/cufon/Cuprum.font.js"></script>
	<script src="/libs/v6/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('a.fancy').fancybox();
$('.gallery a').fancybox();
		hover_links("a.socialicons");
		hover_links("nav a");
		hover_links("table.instafeed a img");
		
		var pxShow = 300;//height on which the button will show
		var fadeInTime = 1000;//how slow/fast you want the button to show
		var fadeOutTime = 1000;//how slow/fast you want the button to hide
		var scrollSpeed = 800;//how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'
		$(window).scroll(function(){
			if($(window).scrollTop() >= pxShow){
				$("nav#dynamic").fadeIn(fadeInTime);
			}else{
				$("nav#dynamic").fadeOut(fadeOutTime);
			}
		});

		$('nav#dynamic a.backtotop').click(function(){
			$('html, body').animate({scrollTop:0}, scrollSpeed); 
			return false; 
		});			
	})
	</script>
				
	<?php
	$keywords = "slaff, slaffistica, вячеслав бондарук, slaffster, блог о латинской америке, сайты про южную америку, сайты про чили, жизнь в чили, иммиграция в чили, как открыть бизнес в чили, тур гиды в южной америке, работа в чили, работа в аргентине, как уехать в чили, русская община в чили, русские в чили, русские в южной америке, голые латинки";

	if (is_home()) { 
		$description = get_bloginfo('description');
	} else if (is_single()) {
		$description =  $post->post_title;
		$tags = wp_get_post_tags($post->ID);

		foreach ($tags as $tag ) {
			$tagslist .= $tag->name . ", ";
		}

		$keywords = $keywords.", ".$tagslist;
	} 
	else if (is_category()) {
		$description = category_description();
	}
	?>
	
	<meta name="robots" content="index,follow" />
	<meta name='keywords' content='<?php echo $keywords; ?>' />
	<meta name='description' content='<?php echo $description; ?>' />
	<meta name='template' content='Slaffistica Retro Deluxe' />
	<meta name='copyright' content='&copy; Вячеслав Бондарук. Lipresso Networks' />

	<meta name="verify-v1" content="D9DQKQ06MlNxd+gWv+l1jOdmhqPvcW6r4VLm2JHH7Lc=" />
	<meta name="google-site-verification" content="0Q7keW5ssc5uVVxu0YxABSH8Miu3FjZ4k5VdmQFYOno" />
	<meta name="webmoney.attestation.label" content="webmoney attestation label#24511A97-0BCF-4C91-9FC1-F72D486A96B5" /> 
	<meta name="msvalidate.01" content="92080B5AA64C7A5C06F8AFBA0F95F1CE" />
	<meta content='890ab442' name='verification-key' />

	<link rel="index" href="http://www.slaff.net/">
	<link rel="alternate" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="rsd" type="application/rsd+xml" href="<?php bloginfo('url') ?>/xmlrpc.php?rsd" />
	
	<?php wp_head(); ?>
	<script type="text/javascript">
	<?php if (is_page(9)) { ?>
	function sendFeedback() {
		$.post('http://www.slaff.net/libs/v6/php/doFeedback.php', 
			$('#feedback').serialize(), function(data) {	
				var datamsg = data.split('!');
				$('#message-area').hide();
				if (datamsg[0] != 'Ошибка') {			
					// messages
					$('#message-area').removeClass('error');
					$('#message-area').addClass('success').fadeIn();			
				} else {
					$('#message-area').removeClass('success');
					$('#message-area').addClass('error').fadeIn();
				}
			$('#message-area').html(data).fadeIn();
		});
	}		
	<?php } ?>

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-31004705-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>	
</head>
<body>
<header class="gradient">
	<div class="bg-top">
		<a id="slaffistica" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/slaffistica.png" alt="Slaffistica Retro Deluxe Logo" width="250" height="100" /></a>
	</div>
</header>

<!--[if lt IE 8]>
<div style='margin: 0 auto; margin: 10px 0 20px 0; border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
  <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
  <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
    <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
    <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
      <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>Ваш броузер очень устарел.</div>
      <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>Извините, но мой сайт больше не поддерживает устарелые броузеры. Большинство эффектов в оформлении и часть функциональности сайта будет доступна только, когда вы обновите свой броузер.</div>
    </div>
    <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
    <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
    <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
    <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
  </div>
</div>
<![endif]-->