<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
		
		<h1 class="page-title">Страница не найдена</h1>
		<div class="page-content">
			<p>Запрошенная вами страница не найдена. Попробуйте воспользоваться поиском.</p>
			<div class="searchform">
				<form action="/" id="searchform" method="get" role="search">			
				<input type="text" id="s" name="s" value="Поиск по сайту">
				<input type="submit" value=" ">			
				</form>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	document.getElementById('s') && document.getElementById('s').focus();
</script>

<?php get_footer(); ?>