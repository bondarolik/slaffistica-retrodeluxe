<?php
# l10n
function theme_init() {
	load_theme_textdomain('slaffistica', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');

include "includes/metabox.php";


if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}

# Rewrite <title> tag for better SEO
function seo_title() {
	global $post, $page, $paged;
	$sep = " | "; # Separator
	$newtitle = get_bloginfo('name'); # Default
	
	# Single page ########################################
	if (is_single() || is_page()) {
		$newtitle = single_post_title("", false); # default title 
	}
		
			
	# Category ########################################
	if (is_category())
		$newtitle = single_cat_title("", false);

	# Tag ########################################
	if (is_tag())
	 $newtitle = single_tag_title("", false);
	
	# Search results ########################################
	if (is_search())
	 $newtitle = "Результаты поиска: " . $s;
	
	# Taxonomy page ########################################
	if (is_tax()) { 
		$curr_tax = get_taxonomy(get_query_var('taxonomy'));
		$curr_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); # current term data
		# if it's term 
		if (!empty($curr_term)) {
			$newtitle = $curr_tax->label . $sep . $curr_term->name;
		} else {
			$newtitle = $curr_tax->label;
		}
	}

	# Add page number if necesary
	if ($paged >= 2 || $page >= 2)
			$newtitle .= $sep . sprintf('Страница %s', max($paged, $page));
			
	# Home & Front Page ########################################	
	if (is_home() || is_front_page()) {
		$newtitle = get_bloginfo('name') . $sep . get_bloginfo('description');
	} else {
		$newtitle .= " | " . get_bloginfo('name');
	}
	
	return $newtitle;
}

add_filter('wp_title', 'seo_title');


add_action('init', 'register_my_menus');
function register_my_menus() {
	register_nav_menus(
		array(
			'home-menu' => 'Главное меню',
			'index-menu' => 'Оглавление',
		)
	);
}


if(!function_exists('_log')){
  function _log( $message ) {
    if( WP_DEBUG === true ){
      if( is_array( $message ) || is_object( $message ) ){
        error_log( print_r( $message, true ) );
      } else {
        error_log( $message );
      }
    }
  }
}

add_filter( 'wp_get_attachment_link', 'add_fancybox_rel');
function add_fancybox_rel ($content) {

	// add checks if you want to add prettyPhoto on certain places (archives etc).

	return str_replace('<a', '<a rel="fancygallery"', $content);

}

# widgets
if ( function_exists('register_sidebar') )
{
 	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));
}

function breadcrumbs() {
	#### Пример: 
	#### <a href="#">Главная</a> » <a href="#">Название Категории</a> » Название записи
	# Predefined variables
	#global $wp, $post;

	$link_EOS = '<a href="';
	$link_CON = '">';
	$link_EOF = '</a>';	
	$sep = " » "; # important to put it between two spaces
	$homelink = $link_EOS . get_bloginfo('url') . $link_CON . 'Главная'  . $link_EOF;
	
	# Category archive
	if (is_category()) {
		echo $homelink . $sep; single_cat_title();
	}
	# Tag archive
	elseif (is_tag()) {
		echo $homelink . $sep; single_tag_title();
	}
	# Daily archive
	elseif (is_day()) {
		echo $homelink . $sep . "Архивы за "; the_time('F jS, Y');
	}
	# Monthly archive
	elseif (is_month()) {
		echo $homelink . $sep . "Архивы за "; the_time('F, Y');
	}
	# Yearly archive
	elseif (is_year()) {
		echo $homelink . $sep . "Архивы за "; the_time('Y');
	}
	# Author archive
	elseif (is_author()) {
		echo $homelink . $sep . "Архивы "; is_author();
	}
	# Paged archive
	elseif (is_paged()) {
		echo $homelink . $sep . "Архивы блога";
	}
	# Single post
	elseif (is_single()) {
		echo $homelink . $sep;
		the_category('title_li=');
		echo $sep;
		the_title();
	}
	
	# Single page
	elseif (is_page()) {
		echo $homelink . $sep;
		if ( $post->post_parent != 0) {
			echo $link_EOS . get_page_link($post->post_parent) . $link_CON . get_the_title($post->post_parent) . $link_EOF . $sep;
		}
		echo the_title();		
	} else {}
}
?>