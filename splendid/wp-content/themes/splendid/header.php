<?php  global $splendid_option; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo();?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">  
    <?php wp_head(); ?>

</head>
<body>
  <div class="container">

      <?php $custom_logo = ($splendid_option['splendid-logo']['url']); ?>
         <div class="top">

            <div class="logo"><a href="<?php echo home_url('/'); ?>">
                <?php if($custom_logo){ ?>
                    <img src="<?php echo esc_url($custom_logo); ?>" title="splendid" width="200" alt="logo">
                    <?php } else {
                        echo "No image";
                        } ?> 
                </a></div>
            
            <div class="nav">
                <ul>
                    <?php wp_nav_menu(array('theme_location' => 'menu')); ?>
                </ul>
            </div>
             
        </div>

        <div class="header_option">
            <?php echo get_breadcrumbs(); ?>

            <form method=GET"" action="<?php echo home_url('/'); ?>" class="search-form">
                <input type="text" name="s" id="search-input" placeholder="Keywords">
            </form>

            
        <form class="form_filter" action="<?php echo home_url('/deals'); ?>" method="POST">
        
                    <?php $current_location = get_terms('location'); ?>
                    
                    <select name="location" id="location">
                    <?php foreach ($current_location as $location) { ?>
                        <option><?php echo $location->name; ?></option>
                   <?php } ?>
                   </select>

                   <?php $current_price = get_terms('price'); ?>
                   <select name="price" id="coast">
                    <?php foreach ($current_price as $price) { ?>
                        <option><?php echo $price->name; ?></option>
                   <?php } ?>
                   </select>
                   <button>quick search</button>
        </form>

        </div>
   