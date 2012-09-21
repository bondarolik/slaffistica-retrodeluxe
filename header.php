<?php
load_theme_textdomain('slaffistica');
$options = get_option('slaffistica_options');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php wp_title(); ?></title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
	<!-- Google Fonts
  ================================================== -->  	
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic-ext,cyrillic'  />
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic&subset=cyrillic' />
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold&subset=cyrillic' />	
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Tenor+Sans&subset=latin,cyrillic' />

	<!-- Main stylesheet & IE fixes for CSS3
  ================================================== -->	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
	
  
  <link rel="stylesheet" href="/libs/v6/fancybox/jquery.fancybox.css" />
	<script src="/libs/v6/js/jquery-latest.js"></script>
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
	# show be in theme options
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
	<meta name='copyright' content='&copy; Lipresso Networks' />

	<?php include (TEMPLATEPATH . '/includes/personalized-metas.php'); ?>

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
	</script>	
</head>
<body>
<header>
  <hgroup>
		<a id="slaffistica" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/slaffistica.png" alt="Slaffistica Retro Deluxe Logo" width="250" height="100" /></a>    
  </hgroup>
</header>

<section class="container">