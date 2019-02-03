<?php get_header(); ?>

<div id="container">
	<div id="content_left">
		<?php wp_nav_menu(array('menu' => 'catalog3')); ?>
		<div class="searchform">
			<form action="/" id="searchform" method="get" role="search">			
			<input type="text" id="s" name="s" value="Поиск по сайту">
			<input type="submit" value=" ">			
			</form>
		</div>
	</div>
	<div id="content" class="right" role="main">

		<?php get_template_part( 'loop', 'part' ); ?>
		
	</div>
</div>

<?php get_footer(); ?>