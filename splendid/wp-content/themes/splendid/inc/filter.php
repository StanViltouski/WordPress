<?php
function filter_deals_example($data){
	$args = array(
		'posts_per_page' => '5',
		'tax_query' => array(
			'relation' => 'AND'
		)
	);

	if(isset($data['location']) && isset($data['location']) !== '') {
		array_push($args['tax_query'], array(
			'taxonomy'=>'location',
			'field'=> 'name',
			'terms' => array($data['location'])
		));
	}

	if(isset($data['price']) && isset($data['price']) !== '') {
		array_push($args['tax_query'], array(
			'taxonomy'=>'price',
			'field'=> 'name',
			'terms' => array($data['price'])
		));
	}


	//print_r($args);

	$custom_filter = new WP_Query($args);


	if(!empty($_POST)){
		/* вывод результатов поиска*/
		if ( $custom_filter->have_posts() ) :


		/* Start the Loop */
		while ( $custom_filter->have_posts() ) :
			$custom_filter->the_post();

			the_content();

		endwhile;


	else : echo "no find posts";

	endif;
	} else {
				/* Вывод по умолчанию */
		$default_query = new WP_Query(array('post_type'=>'deals', 'posts_per_page'=>5));

		$i=0;
		if ( $default_query->have_posts() ) :


		/* Start the Loop */
		while ( $default_query->have_posts() ) :
			$default_query->the_post();

			$i++;

			if ($i == 1) {
				
				echo "<strong>";
				the_content(); 
				echo "</strong>";

		} else {
		
			the_content();
		}

		endwhile;

	else : echo "no find posts";

	endif;
	}

}