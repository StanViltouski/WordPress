<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package splendid
 */

?>

<article style="text-align: center" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header style="text-align: center;" class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>

	</header><!-- .entry-header -->
	
	<?php echo get_the_post_thumbnail() ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->
