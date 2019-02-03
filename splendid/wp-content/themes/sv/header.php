<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name') ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/media-queries.css">
</head>
<body>
  <div class="container">
      
         <div class="top">

            <div class="logo">
			<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url') ?>/img/logo-retina.png" title="splendid" width="200" alt="logo"></a>
			</div>
 
			
			
			   
            <div class="nav">
                <?php
			wp_nav_menu( array(
	          'theme_location'  => '',
	          'menu'            => '', 
	          'container'       => 'ul', 
	          'container_class' => '', 
	          'container_id'    => '',
	          'menu_class'      => '', 
	          'menu_id'         => '',
	          'echo'            => true,
	          'fallback_cb'     => 'wp_page_menu',
	          'before'          => '',
	          'after'           => '',
	          'link_before'     => '',
	          'link_after'      => '',
	          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	          'depth'           => 0,
	          'walker'          => '',
               ) );
			   ?>
            </div>

        </div>