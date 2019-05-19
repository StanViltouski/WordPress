<?php 

/**
* Template name: Work Template
*/
get_header();?>


	<div class="work">
		<h2 class="page_title">My works</h2>
		  <?php

		   wp_reset_query();
		   $works_list = new WP_Query(array('post_type'=> 'works', 'post_per_page'=>-1));   
			if ( $works_list->have_posts() ) :
                            while ( $works_list->have_posts() ) :
                        $works_list->the_post(); ?>

		<div class="work_block">
			 <?php the_post_thumbnail(); ?>
			<a href="<?php  the_field('link')?>"><h3><?php the_title(); ?></h3></a>
		</div>
		<?php  endwhile; endif;  wp_reset_query(); ?>

</div>

 <?php get_footer(); ?>