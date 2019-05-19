<?php 

/**
* Template name: Home Template
*/
get_header();?>

        <div class="main">

            <div class="title">
                <img src="<?php bloginfo('template_directory') ?>/img/home-headline.png" width="850" alt="hhead">
                
                <div class="content">

                <?php  
                wp_reset_query();
                $resent_list = new WP_Query(array('post_type'=> 'post', 'post_per_page'=>5)); 

                        if ( $resent_list->have_posts() ) :
                            while ( $resent_list->have_posts() ) :
                        $resent_list->the_post(); ?>

                    <div class="user card">
                        
                        <?php the_post_thumbnail(); ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>

                    </div>
                <?php  endwhile; endif;  wp_reset_query(); ?>
            </div>

        </div>


 <?php get_footer(); ?>