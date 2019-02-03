<?php
/*
Plugin Name: SM Posts Widget
*/
class SM_Posts_Widget extends WP_Widget {
    function SM_Posts_Widget() {
        parent::WP_Widget(false, $name = 'SM Posts Widget');	
    }

    function widget($args, $instance) {		
        extract( $args );
		
		$widget_link = $instance['widget_link'];
		if ($instance['widget_link_title'] != "" && $widget_link != "") {
			$widget_link = '<span class="widget_link">&nbsp;&mdash;&nbsp;<a href="'.$widget_link.'" title="'.$instance['widget_link_title'].'">'.$instance['widget_link_title'].'</a></span>';
		}

		$title = $instance['title']; if ($title != "") $title = $before_title.$title.$widget_link.$after_title;
		$post_type = "post";
		
		$category = "category";
		$cat_id = $instance['cat_id']; if ($cat_id == "") $cat_id = "";
		$post_id = $instance['post_id']; if ($post_id == "") $post_id = "";
		$view = $instance['view']; if ($view == "") $view = "posts";
		$count = $instance['count']; if ($count == 0) $count = -1;
		
		$widget_id = $instance['widget_id'];
		if ($widget_id != "") $widget_id = ' id="'.$widget_id.'"'; ?>
		
            <div<?php echo $widget_id; ?> class="sm_content-widget">
            <?php echo $title; ?>
            
<?php
				switch($view) {
					case "li":
						global $post;
						
						$args = array(
							'category' => $cat_id,
							'numberposts'     => $count,
							'offset'          => 0,
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							'post_type'       => $post_type,
							'post_status'     => 'publish'
						);
						
						$posts = get_posts($args);
?>
						<ul>
<?php						
						foreach($posts as $post){ setup_postdata($post);
?>
							<li id="post-<?php the_ID(); ?>">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </li>
<?php
						}
?>
						</ul>
<?php						
						wp_reset_postdata();
					break;
					case "posts":
						global $post;
						
						$args = array(
							'category' => $cat_id,
							'numberposts'     => $count,
							'offset'          => 0,
							'orderby'         => 'post_date',
							'order'           => 'DESC',
							'post_type'       => $post_type,
							'post_status'     => 'publish'
						);
						
						$posts = get_posts($args);			





						foreach($posts as $post): setup_postdata($post); $custom = get_post_custom($post->ID); ?>
							<div id="post-<?php the_ID(); ?>" class="hentry">   
						        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						        <?php $date = sm_date("post-date-month-full"); if ($date != ""): ?>
				                <div class="entry_date"><?php echo $date; ?></div>
				                <?php endif; ?>
						        <div class="entry-content"><?php the_excerpt(); ?></div>						        
							</div>
<?php 					endforeach;

						wp_reset_postdata();
					break;
					case "post":
						$post = get_post($post_id);
						if ($post): ?>							
					        <h2 class="page-title"><?php echo $post->post_title; ?></h2>
							<div class="page-content"><?php echo $post->post_content; ?></div>
<?php 					endif;
					break;
				}
?>                        
            </div>        
<?php		
    }
			
	function update($new_instance, $old_instance) {
		return $new_instance;
    }

    function form($instance) {
		$title = esc_attr($instance['title']);
		echo '<p><label for="'.$this->get_field_id('title').'">Заголовок:
		<input class="widefat" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.$title.'" />
		</label></p>';
						
		$ch_li = "";
		$ch_posts = "";
		$view = esc_attr($instance['view']);
		if ($view != "") {
			switch ($view){
				case "li":
					$ch_li = " checked";
				break;
				case "posts":
					$ch_posts = " checked";
				break;
			}
		} else {
			$view = "posts";
			$ch_posts = " checked";
			$ch_li = "";
		}
			
		echo '<p><label for="'.$this->get_field_id('view').'">
		<input name="'.$this->get_field_name('view').'" type="radio" value="li"'.$ch_li.' /> — В виде списка ссылок<br />
		<input name="'.$this->get_field_name('view').'" type="radio" value="posts"'.$ch_posts.' /> — В виде записей<br />
		<input name="'.$this->get_field_name('view').'" type="radio" value="post"'.$ch_posts.' /> — Одну запись
		</label></p>';

		$post_id = esc_attr($instance['post_id']);
		if ($post_id == "") $post_id = 0;
		echo '<p><label for="'.$this->get_field_id('post_id').'">ID записи:
		<input id="'.$this->get_field_id('post_id').'" name="'.$this->get_field_name('post_id').'" size="10" type="text" value="'.$post_id.'" />
		</label></p>';

		$cat_id = esc_attr($instance['cat_id']);
		if ($cat_id == "") $cat_id = 0;
		echo '<p><label for="'.$this->get_field_id('cat_id').'">ID категории:
		<input id="'.$this->get_field_id('cat_id').'" name="'.$this->get_field_name('cat_id').'" size="10" type="text" value="'.$cat_id.'" />
		</label></p>';
		
		$count = esc_attr($instance['count']);
		if ($count == "") $count = 0;
		echo '<p><label for="'.$this->get_field_id('count').'">Количество записей:
		<input id="'.$this->get_field_id('count').'" name="'.$this->get_field_name('count').'" size="10" type="text" value="'.$count.'" />
		</label></p>';
		
		$widget_link = esc_attr($instance['widget_link']);
		echo '<p><label for="'.$this->get_field_id('widget_link').'">Ссылка под виджетом: 
		<input id="'.$this->get_field_id('widget_link').'" name="'.$this->get_field_name('widget_link').'" type="text" value="'.$widget_link.'" />
		</label></p>';
		
		$widget_link_title = esc_attr($instance['widget_link_title']);
		echo '<p><label for="'.$this->get_field_id('widget_link_title').'">Заголовок ссылки: 
		<input id="'.$this->get_field_id('widget_link_title').'" name="'.$this->get_field_name('widget_link_title').'" type="text" value="'.$widget_link_title.'" />
		</label></p>';
		
		$widget_id = esc_attr($instance['widget_id']);
		echo '<p><label for="'.$this->get_field_id('widget_id').'">ID виджета: 
		<input id="'.$this->get_field_id('widget_id').'" name="'.$this->get_field_name('widget_id').'" type="text" value="'.$widget_id.'" />
		</label></p>';
	}
}

add_action('widgets_init', create_function('', 'return register_widget("SM_Posts_Widget");'));
?>