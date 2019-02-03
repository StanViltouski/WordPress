<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">

		<h1 class="page-title">Поиск по сайту</h1>
		
		<p class="search-query">Вы искали: <?php echo get_search_query(); ?></p>
		
		<div class="searchform">
			<form action="/" id="searchform" method="get" role="search">			
			<input type="text" id="s" name="s" value="Поиск по сайту">
			<input type="submit" value=" ">			
			</form>
		</div>

		<?php if ( have_posts() ) : ?>
			<?php get_template_part( 'loop', 'search' ); ?>
		<?php else : ?>
			<div class="page-content">
				<p>Извините, по вашему запросу ничего не найдено.</p>
			</div>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>