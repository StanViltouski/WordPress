<?php
if ( ! function_exists( 'sm_setup' ) ):
function sm_setup() {
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	load_theme_textdomain( 'sm', get_template_directory() . '/languages' );
	add_theme_support('menus');

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'product-thumb', 250, 250, false );
	}
}
endif;
add_action( 'after_setup_theme', 'sm_setup' );

function sm_excerpt_length( $length ) { return 30; }
add_filter( 'excerpt_length', 'sm_excerpt_length' );

function sm_auto_excerpt_more( $more ) {
	return '&nbsp;&hellip;';
}
add_filter( 'excerpt_more', 'sm_auto_excerpt_more' );

/* SM ---------------------------------- */
/* ------------------------------------- */

function sm_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Верхний правый блок', 'sm' ),
		'id' => 'sb_i0',
		'description' => __( '', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-container">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Главная. Блок 1', 'sm' ),
		'id' => 'sb_i1',
		'description' => __( 'Линия под промо-блоком', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-container">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Главная. Блок 2. Левый блок', 'sm' ),
		'id' => 'sb_i2l',
		'description' => __( 'Под блоком 1', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-container">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Главная. Блок 2. Правый блок', 'sm' ),
		'id' => 'sb_i2r',
		'description' => __( 'Под блоком 1', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-container">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Главная. Блок 3', 'sm' ),
		'id' => 'sb_i3',
		'description' => __( 'Под блоком 2', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-container">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Нижний левый блок', 'sm' ),
		'id' => 'sb_i4l',
		'description' => __( '', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-ontainer">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Нижний правый блок', 'sm' ),
		'id' => 'sb_i4r',
		'description' => __( '', 'sm' ),
		'before_widget' => '<div id="%1$s" class="w-container">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="w-title">',
		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'sm_widgets_init' );

add_action('init', 'create_post_type_product');
function create_post_type_product() {
	$labels = array(
		'name' => 'Оборудование',
		'singular_name' => 'Оборудование',
		'add_new' => 'Добавить товар',
		'add_new_item' => 'Добавить товар',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новый',
		'view_item' => 'Посмотреть',
		'search_items' => 'Поиск',
		'not_found' => 'Поиск не дал результатов',
		'not_found_in_trash' => 'Корзина пуста',
		'parent_item_colon' => '',
		'menu_name' => 'Оборудование'
	);
	
	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);
	
	$taxonomies = array(
		'catalog'
	);
	
	register_post_type('product', array(
		'labels' => $labels,
		'description' => 'Оборудование',
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'supports' => $supports,
		'can_export' => true,
		'hierarchichal' => false,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'product'),
		'taxonomies' => $taxonomies,
		'query_var' => true,
		'has_archive' => false
	));
}

add_action('init', 'create_taxonomy_catalog_types');
function create_taxonomy_catalog_types() {
	$labels = array(
		'name' => 'Рубрики оборудования',
		'singular_name' => 'Рубрика',
		'search_items' => 'Поиск',
		'all_items' => 'Все рубрики',
		'parent_item' => 'Родительская',
		'parent_item_colon' => 'Родительская:',
		'edit_item' => 'Редактировать', 
		'update_item' => 'Обновить',
		'add_new_item' => 'Добавить',
		'new_item_name' => 'Наименование',
		'menu_name' => 'Рубрики оборудования'
	);
	
	register_taxonomy('catalog', array ('product'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'catalog' )
	));
}

add_action('init', 'create_post_type_part');
function create_post_type_part() {
	$labels = array(
		'name' => 'Зачасти',
		'singular_name' => 'Зачасти',
		'add_new' => 'Добавить товар',
		'add_new_item' => 'Добавить товар',
		'edit_item' => 'Редактировать',
		'new_item' => 'Новый',
		'view_item' => 'Посмотреть',
		'search_items' => 'Поиск',
		'not_found' => 'Поиск не дал результатов',
		'not_found_in_trash' => 'Корзина пуста',
		'parent_item_colon' => '',
		'menu_name' => 'Зачасти'
	);
	
	$supports = array(
		'title',
		'editor',
		'thumbnail'
	);
	
	$taxonomies = array(
		'parts'
	);
	
	register_post_type('part', array(
		'labels' => $labels,
		'description' => 'Зачасти',
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'supports' => $supports,
		'can_export' => true,
		'hierarchichal' => false,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'part'),
		'taxonomies' => $taxonomies,
		'query_var' => true,
		'has_archive' => false
	));
}

add_action('init', 'create_taxonomy_parts_types');
function create_taxonomy_parts_types() {
	$labels = array(
		'name' => 'Рубрики запчастей',
		'singular_name' => 'Рубрика',
		'search_items' => 'Поиск',
		'all_items' => 'Все рубрики',
		'parent_item' => 'Родительская',
		'parent_item_colon' => 'Родительская:',
		'edit_item' => 'Редактировать', 
		'update_item' => 'Обновить',
		'add_new_item' => 'Добавить',
		'new_item_name' => 'Наименование',
		'menu_name' => 'Рубрики запчастей'
	);
	
	register_taxonomy('parts', array ('part'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'parts' )
	));
}


add_action('add_meta_boxes', 'add_meta_box_product');
function add_meta_box_product(){
	add_meta_box('product_tech', 'Технические параметры', 'product_tech', 'product');
	add_meta_box('product_video', 'Видео работы', 'product_video', 'product');
	add_meta_box('product_gallery', 'Галерея', 'product_gallery', 'product');
	add_meta_box('product_docs', 'Документы', 'product_docs', 'product');	
	add_meta_box('product_bu', 'Товар б.у.?', 'product_bu', 'product', 'side');
	add_meta_box('product_price', 'Стоимость', 'product_price', 'product', 'side');

	add_meta_box('product_tech', 'Технические параметры', 'product_tech', 'part');
	add_meta_box('product_video', 'Видео работы', 'product_video', 'part');
	add_meta_box('product_gallery', 'Галерея', 'product_gallery', 'part');
	add_meta_box('product_docs', 'Документы', 'product_docs', 'part');	
	add_meta_box('product_bu', 'Товар б.у.?', 'product_bu', 'part', 'side');
	add_meta_box('product_price', 'Стоимость', 'product_price', 'part', 'side');
}

function product_tech() {
	global $post;
	$custom = get_post_custom($post->ID);
	
	$product_tech = $custom['product_tech'][0];
	
	echo '<p>Номера изображений из "Медиафайлы" (через запятую, без пробелов)</p><input name="product_tech" style="width:90%;" value="'.$product_tech.'" />';
}

function product_video() {
	global $post;
	$custom = get_post_custom($post->ID);
	
	$product_video = $custom['product_video'][0];
	
	echo '<p>Видео работы (код для вставки, например с youtube.com)</p><textarea name="product_video" style="width:90%; height:100px;">'.$product_video.'</textarea>';
}

function product_gallery() {
	global $post;
	$custom = get_post_custom($post->ID);
	
	$product_gallery = $custom['product_gallery'][0];
	
	echo '<p>Номера изображений из "Медиафайлы" (через запятую, без пробелов)</p><input name="product_gallery" style="width:90%;" value="'.$product_gallery.'" />';
}

function product_docs() {
	global $post;
	$custom = get_post_custom($post->ID);
	
	$product_docs = $custom['product_docs'][0];
	
	echo '<p>Номера документов из "Медиафайлы" (через запятую, без пробелов)</p><input name="product_docs" style="width:90%;" value="'.$product_docs.'" />';
}

function product_price() {
	global $post;
	$custom = get_post_custom($post->ID);
	
	$product_price = $custom['product_price'][0];
	
	echo '<p>Стоимость товара</p><input name="product_price" style="width:90%;" value="'.$product_price.'" /><p><i>В ЕВРО, например 685000<br />(без пробелов и наименования валюты)</i></p>';
}

function product_bu() {
	global $post;
	$custom = get_post_custom($post->ID);
	
	$product_bu = $custom['product_bu'][0];	
	
	if ($product_bu == '1') { $checked = ' checked'; } else { $checked = ""; }
	
	echo '<p><input name="product_bu" type="checkbox" value="1"'.$checked.' />&nbsp;-&nbsp;Поставьте галочку если товар б.у.</p>';
}

add_action('save_post', 'product_save');
function product_save() {
	global $post;
	update_post_meta($post->ID, 'product_tech', $_POST['product_tech']);
	update_post_meta($post->ID, 'product_video', $_POST['product_video']);
	update_post_meta($post->ID, 'product_gallery', $_POST['product_gallery']);
	update_post_meta($post->ID, 'product_docs', $_POST['product_docs']);
	update_post_meta($post->ID, 'product_price', $_POST['product_price']);
	update_post_meta($post->ID, 'product_bu', $_POST['product_bu']);
}

/* Functions */

/* FEEDBACK */
function feedbackForm($formName) {		
	$form = '';
	switch($formName) {
		case "feedback_1":
			$form = '
				<p class="title">Задать вопрос</p>
				<form action="" method="POST" enctype="multipart/form-data">
				
				<p><label>Ваше имя:<span>*</span></label><br />
				<input name="f_f" size="50" type="text" />
				<br /><label class="label">Иванов Иван Иванович</label>
				</p>
				
				<p><label>Электронная почта:<span>*</span></label><br />
				<input name="f_ep" size="50" type="text" />
				<br /><label class="label">name@domain.com</label>
				</p>
				
				<p><label>Контактный телефон:</label><br />
				<input name="f_kt" size="50" type="text" />
				<br /><label class="label">+375 17 222-22-22</label>
				</p>
				
				<p><label>Сообщение:<span>*</span></label><br />
				  <textarea name="f_s" cols="40" rows="5"></textarea>
				</p>
				
				<input name="email" style="display:none;" type="text" />
				
				<p><input type="submit" name="fb_1" onClick="javascript:hideElement(\'feedback_1\');" value="Отправить" />
				<input type="button" onClick="javascript:hideElement(\'feedback_1\');" value="Отмена" /></p>
				<label class="note"><span>*</span>Обязательные поля</label>
				</form>';
		break;
		case "feedback_2":
			$form = '
				<p class="title">Бесплатный звонок</p>
				<form action="" method="POST" enctype="multipart/form-data">
				
				<p><label>Ваше имя:<span>*</span></label><br />
				<input name="fio" size="35" type="text" />
				<br /><label class="label">Иванов Иван Иванович</label>
				</p>
				
				<p><label>Номер телефона с кодом:<span>*</span></label><br />
				<input name="telephone" size="35" type="text" />
				<br /><label class="label">+375 17 222-22-22</label>
				</p>
				
				<p><label>Время и дата звонка:</label><br />
				<input name="date" size="35" type="text" />
				<br /><label class="label">15:00, завтра</label>
				</p>
				
				<p><input type="submit" name="fb_2" onClick="javascript:hideElement(\'feedback_2\');" value="Заказать" />
				<input type="button" onClick="javascript:hideElement(\'feedback_2\');" value="Отмена" /></p>
				<label class="note"><span>*</span>Обязательные поля</label>
				</form>';
		break;
		case "feedback_3":
			$form = '
				<p class="title">Сделать заказ</p>
				<form action="" method="POST" enctype="multipart/form-data">
				
				<p><label>Организация:<span>*</span></label><br />
				<input name="f_org" size="50" type="text" />
				<br /><label class="label">ООО "Компания"</label>
				</p>

				<p><label>Контактное лицо:<span>*</span></label><br />
				<input name="f_f" size="50" type="text" />
				<br /><label class="label">Иванов Иван Иванович</label>
				</p>
				
				<p><label>Электронная почта:</label><br />
				<input name="f_ep" size="50" type="text" />
				<br /><label class="label">name@domain.com</label>
				</p>
				
				<p><label>Контактный телефон:<span>*</span></label><br />
				<input name="f_kt" size="50" type="text" />
				<br /><label class="label">+375 17 222-22-22</label>
				</p>

				<p><label>Оборудование / Запчасть:<span>*</span></label><br />
				<input name="f_ob" size="50" type="text" />
				<br /><label class="label">Токарный станок CS6140</label>
				</p>
				
				<p><label>Пояснения к заказу:</label><br />
				  <textarea name="f_s" cols="40" rows="5"></textarea>
				</p>
				
				<input name="email" style="display:none;" type="text" />
				
				<p><input type="submit" name="fb_3" onClick="javascript:hideElement(\'feedback_3\');" value="Отправить" />
				<input type="button" onClick="javascript:hideElement(\'feedback_3\');" value="Отмена" /></p>
				<label class="note"><span>*</span>Обязательные поля</label>
				</form>';
		break;
	}
	return $form;
}
function feedbackSend($formName) {
	switch($formName) {
		case "feedback_1":
			if ($_POST["f_f"] == "") return FALSE;			
			if ($_POST["f_kt"] != "" && !preg_match('/([0-9- ()+]{5,})$/',$_POST["f_kt"])) return FALSE;
			if (strip_tags($_POST["f_s"]) == "" || strlen($_POST["f_s"]) < 10) return FALSE;
			if(!checkEmail($_POST["f_ep"])) return FALSE;			
			if ($_POST["email"] != "") return FALSE;
			
			$subject = "Вопрос с сайта";
			$message = '<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>'.$subject.'</title>
			</head>
			<body>
			<h2>'.$subject.'</h2>
			<p><b>Имя:</b><br />
			'.strip_tags($_POST["f_f"]).'
			</p>
			<p><b>Электронная почта:</b><br />
			'.$_POST["f_ep"].'
			</p>
			<p><b>Контактный телефон:</b><br />
			'.strip_tags($_POST["f_kt"]).'
			</p>
			<p><b>Сообщение:</b><br />
			'.strip_tags($_POST["f_s"]).'
			</p>
			</body>
			</html>';
			
			return sendMail($subject, $message);
		break;
		case "feedback_2":			
			if ($_POST["fio"] == "") return FALSE;
			if ($_POST["telephone"] == "") return FALSE;
	
			$subject = "Бесплатный звонок с сайта";
			$message = '<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>'.$subject.'</title>
			</head>
			<body>
			<h2>'.$subject.'</h2>
			<p><b>Имя:</b><br />
			'.strip_tags($_POST["fio"]).'
			</p>
			<p><b>Номер телефона:</b><br />
			'.strip_tags($_POST["telephone"]).'
			</p>
			<p><b>Время звонка:</b><br />
			'.strip_tags($_POST["date"]).'
			</p>
			</body>
			</html>';	
			
			return sendMail($subject, $message);
		break;
		case "feedback_3":
			if ($_POST["f_org"] == "") return FALSE;
			if ($_POST["f_f"] == "") return FALSE;			
			if ($_POST["f_kt"] != "" && !preg_match('/([0-9- ()+]{5,})$/',$_POST["f_kt"])) return FALSE;			
			if ($_POST["f_ob"] == "") return FALSE;
			if ($_POST["email"] != "") return FALSE;
			
			$subject = "Сделать заказ";
			$message = '<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>'.$subject.'</title>
			</head>
			<body>
			<h2>'.$subject.'</h2>
			<p><b>Организация:</b><br />
			'.strip_tags($_POST["f_org"]).'
			</p>
			<p><b>Контактное лицо:</b><br />
			'.strip_tags($_POST["f_f"]).'
			</p>
			<p><b>Электронная почта:</b><br />
			'.strip_tags($_POST["f_ep"]).'
			</p>
			<p><b>Контактный телефон:</b><br />
			'.strip_tags($_POST["f_kt"]).'
			</p>
			<p><b>Оборудование / Запчасть:</b><br />
			'.strip_tags($_POST["f_ob"]).'
			</p>
			<p><b>Пояснения к заказу:</b><br />
			'.strip_tags($_POST["f_s"]).'
			</p>
			</body>
			</html>';
			
			return sendMail($subject, $message);
		break;
	}
		
	return FALSE;
}
function checkEmail($email) {
	if (!preg_match('/^(([^<>()[\]\\.,;:\s@"\']+(\.[^<>()[\]\\.,;:\s@"\']+)*)|("[^"\']+"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\d\-]+\.)+[a-zA-Z]{2,}))$/', $email)) return FALSE;
	return TRUE;
}
function sendMail($subject, $message) {
	$HEADERS = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
	$TO = "info@stostankov.com";

	if (($TO == "" || $subject == "" || $message == "" || $HEADERS == "") || !mail($TO, $subject, $message, $HEADERS)) return FALSE;
	return TRUE;	
}

function sm_date($case) {
	$sm_date = "";
	switch($case) {
		case "today":
			$monthArr = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
			$weekArr = array("воскресенье","понедельник","вторник","среда","четверг","пятница","суббота");
			$day = date("d");
			$month = $monthArr[date("n")-1];
			$week = $weekArr[date("w")];
			$sm_date = $day."&nbsp;".$month.",&nbsp;".$week;
		break;
		case "post-date":
			$post_date = get_the_date();
			$dateArr = explode(".",$post_date);
			$sm_date = $dateArr[0].".".$dateArr[1];
		break;
		case "post-date-month":
			$monthArr = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
			$post_date = get_the_date();
			$dateArr = explode(".",$post_date);
			$sm_date = $dateArr[0]."&nbsp;".$monthArr[$dateArr[1]-1];
		break;
		case "post-date-month-full":
			$monthArr = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
			$post_date = get_the_date();
			$dateArr = explode(".",$post_date);
			$sm_date = $dateArr[0]."&nbsp;".$monthArr[$dateArr[1]-1]."&nbsp;".$dateArr[2]."г.";
		break;
		case "post-date-full":
			$post_date = get_the_date();
			$sm_date = $post_date;
		break;
	}
	
	return $sm_date;
}

function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="first menu-item', $output, 1);
  $output = substr_replace($output, 'class="last menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');

/* Settings ---------------------------- */
/* ------------------------------------- */

function column_id($columns) {
    $columns['colID'] = __('Номер');
    return $columns;
}
add_filter( 'manage_media_columns', 'column_id' );
function column_id_row($columnName, $columnID){
    if($columnName == 'colID'){ echo $columnID; }
}
add_filter( 'manage_media_custom_column', 'column_id_row', 10, 2 );

function my_remove_type_support() {
	remove_post_type_support('page', 'comments');
	remove_post_type_support('page', 'author');
	remove_post_type_support('page', 'trackbacks');
	remove_post_type_support('page', 'custom-fields');
	remove_post_type_support('page', 'revisions');
	remove_post_type_support('page', 'excerpt');
	
	remove_post_type_support('post', 'comments');
	remove_post_type_support('post', 'author');
	remove_post_type_support('post', 'trackbacks');
	remove_post_type_support('post', 'custom-fields');	
	remove_post_type_support('post', 'revisions');
	remove_post_type_support('post', 'excerpt');
}

function remove_menus() {
	global $menu;
	global $submenu;

	$restricted = array(
		//__('Dashboard'),
		//__('Posts'),
		//__('Media'), 
		__('Links'), 
		//__('Pages'), 
		__('Comments'), 
		//__('Appearance'),
		//__('Plugins'), 
		//__('Users'), 
		__('Tools'), 
		//__('Settings'),
		__('Separator 1'),
		__('Separator 2'),
		__('Separator last')
		);
	
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)) { unset($menu[key($menu)]); }
	}
	
	unset($submenu['index.php'][0]);
	unset($submenu['index.php'][10]);
	unset($submenu['edit.php'][16]);
	unset($submenu['themes.php'][5]);
	//unset($submenu['themes.php'][7]);
	unset($submenu['plugins.php'][15]);	
	unset($submenu['options-general.php'][25]);	
	//unset($submenu['options-general.php'][30]);	
	//unset($submenu['options-general.php'][35]);	
	//unset($submenu['options-general.php'][40]);	
}

function remove_img_titles($text) {
    $result = array();
    preg_match_all('|title="[^"]*"|U', $text, $result);
    foreach($result[0] as $img_tag) {
        $text = str_replace($img_tag, '', $text);
    } return $text;
}

function hide_admin_bar_settings() {
	echo '
	<style type="text/css">
		html.wp-toolbar { padding-top:0 !important; }		
		#wpadminbar { display: none !important; }
	</style>';
}
function disableAutoSave(){ wp_deregister_script('autosave'); }
function remove_x_pingback($headers) { unset($headers['X-Pingback']); return $headers; }
function remove_media_link( $form_fields, $post ) { unset( $form_fields['url'] ); return $form_fields; }
function delete_code_editor_item() { remove_action('admin_menu', '_add_themes_utility_last', 101); }

add_action('admin_menu', 'remove_menus');
add_action('init', 'my_remove_type_support');
add_action('admin_menu', 'delete_code_editor_item', 1);

add_action( 'admin_head', 'hide_admin_bar_settings' );
add_filter('the_content', 'remove_img_titles');
add_action( 'wp_print_scripts', 'disableAutoSave' );
add_filter( 'attachment_fields_to_edit', 'remove_media_link', 10, 2 );

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
add_filter('wp_headers', 'remove_x_pingback');
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', '_ak_framework_meta_tags');
?>