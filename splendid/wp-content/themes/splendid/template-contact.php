<?php 

/**
* Template name: Contact Template
*/
get_header();?>



<div class="contact">
	<?php while ( have_posts() ) :
			the_post(); ?>
	<h2 class="page_title" style="text-align: center;"><?php the_title(); ?></h2>

	<div class="map">
			<iframe style="border: 0;" src="<?php if(get_post_meta($post->ID, $key = 'ale_map', $single = true)){ ?>
			<?php echo esc_attr(get_post_meta($post->ID, $key = 'ale_map', $single = true)); ?>
		<?php }  ?>" allowfullscreen="allowfullscreen" frameborder="0"> </iframe> 
	</div>

	<address>
		<h3>Our address:</h3>
		<p><?php if(get_post_meta($post->ID, $key = 'ale_address', $single = true)){ ?>
			<span><?php echo esc_attr(get_post_meta($post->ID, $key = 'ale_address', $single = true)); ?></span>
		<?php }  ?>
		<br><?php if(get_post_meta($post->ID, $key = 'ale_phone', $single = true)){ ?>
			<span><?php echo esc_attr(get_post_meta($post->ID, $key = 'ale_phone', $single = true)); ?></span>
		<?php }  ?>
		<?php if(get_post_meta($post->ID, $key = 'ale_phone-two', $single = true)){ ?>
			<span><?php echo esc_attr(get_post_meta($post->ID, $key = 'ale_phone-two', $single = true)); ?></span>
		<?php }  ?></p>

			<?php echo esc_attr(get_post_meta($post->ID, $key = 'ale_map2', $single = true)); ?>

		<div class="socialNet">
			<h3>We are in social networks:</h3>
			<p><a href="https://vk.com"><img title="vkontakte" src="<?php bloginfo('template_directory') ?>/img/vk.png" alt="vkontakte" width="59" height="59"></a></p>
			<p><a href="https://facebook.com"><img title="facebook" src="<?php bloginfo('template_directory') ?>/img/fb.png" alt="facebook" width="59" height="59"></a></p>
			<p><a href="https://twitter.com"><img  title="twitter" src="<?php bloginfo('template_directory') ?>/img/tw.png" alt="twitter" width="59" height="59"></a></p>
		</div>

		<?php $form=get_post_meta( get_the_ID(), $key = 'ale_formcode', $single = true );

			echo do_shortcode($form); ?>
	</address>
 	<?php endwhile; // End of the loop.?>	
		
</div>

 <?php get_footer(); ?>