<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
		
		<h1 class="page-title"><?php echo single_cat_title( '', false ); ?></h1>		
		<?php get_template_part( 'loop', 'category' ); ?>
		
		<?php
			$page = get_query_var('paged');
			if ($page == 0) $page++;

			$nav_pr = get_previous_posts_link( __( '<img src="/wp-content/themes/sm/images/catalog_e3l.gif" />', 'sm' ) );
			if ($nav_pr == "") $nav_pr = '<img src="/wp-content/themes/sm/images/catalog_e3lh.gif" />';

			$nav_n = get_next_posts_link( __( '<img src="/wp-content/themes/sm/images/catalog_e3r.gif" />', 'sm' ) );
			if ($nav_n == "") $nav_n = '<img src="/wp-content/themes/sm/images/catalog_e3rh.gif" />';

			if ($wp_query->max_num_pages > 1): ?>
			
		<div id="content-footer">
			<div id="nav" class="navigation">
				<div class="nav-pages"><?php echo 'Страница&nbsp;'.$page.'&nbsp;из&nbsp;'.$wp_query->max_num_pages; ?></div>	
				<div class="nav-previous"><?php echo $nav_pr; ?></div>
				<div class="nav-next"><?php echo $nav_n; ?></div>
			</div>
		</div>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>