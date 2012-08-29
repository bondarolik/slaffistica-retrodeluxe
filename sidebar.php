<nav id="sidebar">
	<?php wp_nav_menu(array(
		'theme-location' => 'navigation',
		'container' => false
	)) ?>
</nav>

<nav id="dynamic" class="clearfix">
	<a id="home" class="menubuttons home" href="<?php bloginfo('url'); ?>">&nbsp;</a>
	<a id="rss" class="menubuttons rss" href="<?php bloginfo('rss2_url'); ?>">&nbsp;</a>
	<a id="email" class="menubuttons email" href="http://www.slaff.net/feedback/">&nbsp;</a>
	
	<a class="backtotop" href="#header">&#8673;<br/>Прокрутить наверх</a>
</nav>