<?php if ( ! have_posts() ) : ?>
<div class="page-content">
    <p>Здесь ничего нет. Попробуйте воспользоваться поиском.</p>
    <div class="searchform">
        <form action="/" id="searchform" method="get" role="search">            
        <input type="text" id="s" name="s" value="Поиск по сайту">
        <input type="submit" value=" ">         
        </form>
    </div>
</div>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); $custom = get_post_custom($post->ID); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
    <?php if ( has_post_thumbnail() ): ?>
        <table>
          <tr>
            <td class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => '', 'title' => get_the_title())); ?></a></td>
            <td>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <?php $date = sm_date("post-date-month-full"); if ($date != "" && !is_tax() && !is_search()): ?>
                <div class="entry_date"><?php echo $date; ?></div>
                <?php endif; ?>
                <div class="entry-content"><?php the_excerpt(); ?></div>
                <div class="entry-footer">                    
                    <?php if ($custom['product_price'][0] != ""): ?>
                    <div class="product_price"><?php echo number_format($custom['product_price'][0], 0,'',' '); ?><span>&nbsp;&#128;</span></div>
                    <?php endif; ?>
                    <?php if ($custom['product_bu'][0] != 0): ?>
                    <div class="product_bu">б.у.</div>
                    <?php endif; ?>
                    <div class="cont_read"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
                </div>
            </td>
          </tr>
        </table>
    <?php else: ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php $date = sm_date("post-date-month-full"); if ($date != "" && !is_tax() && !is_search()): ?>
        <div class="entry_date"><?php echo $date; ?></div>
        <?php endif; ?>
        <div class="entry-content"><?php the_excerpt(); ?></div>
        <div class="entry-footer">
            <?php if ($custom['product_price'][0] != ""): ?>
            <div class="product_price"><?php echo number_format($custom['product_price'][0], 0,'',' '); ?><span>&nbsp;&#128;</span></div>
            <?php endif; ?>
            <?php if ($custom['product_bu'][0] != 0): ?>
            <div class="product_bu">б.у.</div>
            <?php endif; ?>
            <div class="cont_read"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
        </div>
    <?php endif; ?>
</div>

<?php endwhile; ?>