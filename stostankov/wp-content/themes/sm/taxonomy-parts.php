<?php get_header(); ?>

<div id="container">
	<?php if (is_nav_menu("catalog3")): ?>
	<div id="content_left">
		<?php wp_nav_menu(array('menu' => 'catalog3')); ?>
		<div class="searchform">
			<form action="/" id="searchform" method="get" role="search">			
			<input type="text" id="s" name="s" value="Поиск по сайту">
			<input type="submit" value=" ">			
			</form>
		</div>
	</div>
	<?php endif; ?>
	<div id="content"<?php if (is_nav_menu("catalog3")): ?> class="right"<?php endif; ?> role="main">
		
		<div id="content-header" class="right">	
			<div class="title">
				<h1 class="page-title"><?php echo single_cat_title( '', false ); ?></h1>
			</div>
			<div class="order_b">
				<div class="b"><a onclick="javascript:showElement('feedback_3'); hideElement('feedback_2'); hideElement('feedback_1'); hideElement('feedback_res');" href="#fb1">Сделать заказ</a></div>
			</div>
		</div>
		
		<?php get_template_part( 'loop', 'catalog' ); ?>

		<?php
		    $page = get_query_var('paged');
		    if ($page == 0) $page++;

		    $nav_pr = get_previous_posts_link( __( '<img src="/wp-content/themes/sm/images/catalog_e3l.gif" />', 'sm' ) );
		    if ($nav_pr == "") $nav_pr = '<img src="/wp-content/themes/sm/images/catalog_e3lh.gif" />';

		    $nav_n = get_next_posts_link( __( '<img src="/wp-content/themes/sm/images/catalog_e3r.gif" />', 'sm' ) );
		    if ($nav_n == "") $nav_n = '<img src="/wp-content/themes/sm/images/catalog_e3rh.gif" />';
		?>
		    
		<div id="content-footer">
		    <?php if ($wp_query->max_num_pages > 1): ?>
		    <div id="nav" class="navigation">
		        <div class="nav-pages"><?php echo 'Страница&nbsp;'.$page.'&nbsp;из&nbsp;'.$wp_query->max_num_pages; ?></div>    
		        <div class="nav-previous"><?php echo $nav_pr; ?></div>
		        <div class="nav-next"><?php echo $nav_n; ?></div>
		    </div>
		    <?php endif; ?>
		    <div class="order_b">
		        <div class="b"><a onclick="javascript:showElement('feedback_3'); hideElement('feedback_2'); hideElement('feedback_1'); hideElement('feedback_res');" href="#fb1">Сделать заказ</a></div>
		    </div>
		</div>

	</div>
</div>

<?php get_footer(); ?>