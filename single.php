<?php get_header(); ?>

<?php get_sidebar(); ?>

<section id="content">
	<?php /* Initialize The Loop */ if (have_posts()) :  ?>

	<section id="breadcrumbs">
		<h3><?php breadcrumbs(); ?></h3>
	</section>

	<?php /* Start The Loop */ while (have_posts()) : the_post(); ?>
	<article>
	<?php
	$nouncethis = get_post_meta( get_the_ID(), 'SFMTBX_announce', true );	
	$meta = get_post_meta( get_the_ID(), 'SFMTBX_archives', true );
	if ($meta == "yes"):
	?>
	<div class="archivepost">&nbsp;</div>
	<?php endif; ?>

		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php if ($nouncethis == "yes"): ?>Анонс: <?php endif; ?><?php the_title(); ?></a></h1>

		<?php if ( is_search() ) { ?>
			<?php the_excerpt(); ?>		
		<?php } else { ?>
			<?php the_content('Продолжить чтение &#8674;'); ?>	
		<?php } ?>

		<div class="clear"></div>
		
		<?php if (is_single() || is_page()) { ?>
			<?php link_pages('<p><strong>Страницы:</strong>', '</p>', 'number'); ?>
			<?php edit_post_link('Редактировать', '<h3 class="editlink">', '</h3>'); ?>		
		<?php } ?>


		<?php if (is_singular()): ?>
		<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
		<script type="text/javascript">
		new Ya.share({
			elementID: 'ya_share1',
			style: {
				'button': true,
				'link': true,
				'icon': true,
				'border': false
			},
			services: ['yaru', 'vkontakte', 'facebook', 'twitter', 'lj'],
			popup: {
				input: true
			},
		 });
		</script>
		<div id="ya_share1"></div>

		<p class="singlepostmeta">
			Запись была опубликована <?php the_time('F jS, Y') ?> в категории(ях) "<?php the_category(', '); ?>".
		</p>	
			<div class="clear"></div>
		<?php endif; ?>	

		<!--
			<?php trackback_rdf(); ?>
		-->

		<?php include (TEMPLATEPATH . '/navigation.php'); ?>
	</article> 
	<?php endwhile; # end of loop ?>

	<?php /* Insert Paged Navigation */ 
		if ( (is_home() or is_archive()) or (is_search()) or (is_paged()) or (is_category()) ) { 
			include (TEMPLATEPATH . '/navigation.php'); 
		}
	?>

	<?php else: ?>

		<article>
			<h1>Ошибочка</h1>
			<p>Вы попали на страницу, на которой ничего нет. Скорее всего вы пытались найти что-то, о чем еще не написано на этом сайте. Если эта тема вас очень интересует, то напишите мне на почту.</p>
		</article>

	<?php endif; # ( if (have_posts()) ) ?>
</section><!--section#content-->

<?php get_footer(); ?>