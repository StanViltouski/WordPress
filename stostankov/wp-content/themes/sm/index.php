<?php get_header(); ?>

<div id="container">	
	
	<div id="promo">
		<div class="promo">
			<?php
				$terms = get_terms('catalog', array(
					'taxonomy' => 'catalog',
					'orderby' => 'id',
					'order' => 'ASC',
					'hide_empty' => false,
					'fields' => 'all',
					'parent' => 7
				));
				
				if (count($terms) > 0):
			?>

			<ul id="carousel" class="jcarousel-skin-tango">		

			<?php					
			    foreach ($terms as $term) {			
			    	$termD = "/wp-content/themes/sm/images/promo_default.jpg";	    	
			    	if ($term->description != "") $termD = $term->description;
			        echo '<li><div class="tax"><img src="'.$termD.'" alt="'.$term->name.'" /><p><a href="/catalog/'.$term->slug.'" title="'.$term->name.'">'.$term->name.'</a></p></div></li>';
			    }
			?>

			</ul>

			<?php endif; ?>	
		</div>
		<div class="promo_footer">

			<div class="searchform">
				<form action="/" id="searchform" method="get" role="search">			
				<input type="text" id="s" name="s" value="Поиск по сайту">
				<input type="submit" value=" ">			
				</form>
			</div>

			<div class="fast_term_form">
				<?php
					$terms = get_terms('catalog', array(
						'taxonomy' => 'catalog',
						'orderby' => 'id',
						'order' => 'ASC',
						'hide_empty' => false,
						'fields' => 'all'
					));
					
					if (count($terms) > 0):
				?>

				<select>
					<option class="f" selected="selected">Быстрый переход</option>

					<?php					
					    foreach ($terms as $term) {			
					    	$termD = "/wp-content/themes/sm/images/promo_default.jpg";	    	
					    	if ($term->description != "") $termD = $term->description;
					    	

					    	$p = '';
					    	if($term->parent != 0) $p = ' style="padding-left:20px;"';
					        echo '<option'.$p.' onclick="location.href=\'/catalog/'.$term->slug.'\';">'.$term->name.'</option>';
					    }
					?>

				</select>

				<?php endif; ?>	

			</div>

			<div class="go_catalog"><a href="/catalog/all/">Перейти в каталог</a></div>

			<div class="order_b">
		        <div class="b"><a onclick="javascript:showElement('feedback_3'); hideElement('feedback_2'); hideElement('feedback_1'); hideElement('feedback_res');" href="#fb1">Сделать заказ</a></div>
		    </div>

		    <div class="order_b">
		        <div class="b"><a title="Задать вопрос" onclick="javascript:showElement('feedback_1'); hideElement('feedback_3'); hideElement('feedback_2'); hideElement('feedback_res');" href="#fb1">Задать вопрос</a></div>
		    </div>
		</div>
	</div>
	
	<div id="sidebar_i1">
		<?php dynamic_sidebar( 'sb_i1' ); ?>
	</div>

	<div id="sidebar_i2">
		<div class="s1"><?php dynamic_sidebar( 'sb_i2l' ); ?></div>
		<div class="s2"><?php dynamic_sidebar( 'sb_i2r' ); ?></div>
	</div>

	<div id="sidebar_i3"><?php dynamic_sidebar( 'sb_i3' ); ?></div>

</div>

<?php get_footer(); ?>