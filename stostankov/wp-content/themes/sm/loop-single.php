<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<h1 class="page-title"><?php the_title(); ?></h1>
<div class="page-content"><?php the_content(); ?></div>
<?php $date = sm_date("post-date-month-full"); if ($date != ""): ?>
<div class="page_date"><?php echo $date; ?></div>
<?php endif; ?>

<?php endwhile; ?>