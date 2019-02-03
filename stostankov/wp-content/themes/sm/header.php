<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
	<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'sm' ), max( $paged, $page ) );
	?>
</title>
<link href="/wp-content/themes/sm/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/sm/jcarousel.css" />

<?php wp_head(); ?>

<script type="text/javascript" src="/wp-content/themes/sm/show_hide_el.js"></script>
<script type="text/javascript" src="/wp-content/themes/sm/jquery.jcarousel.js"></script>
<script type="text/javascript">jQuery(document).ready( function() { jQuery('#carousel').jcarousel(); } );</script>
</head>

<body <?php body_class(); ?>>

<a name="fb1"></a>
<a name="fb2"></a>
<a name="fb3"></a>
<?php
	if (isset($_POST['fb_1'])) {
		if (feedbackSend('feedback_1')) {
			echo '<div id="feedback_res" style="display:block;" onclick="javascript:hideElement(\'feedback_res\');"><p><span>Сообщение отправлено!</span></p><p>В ближайшее время мы с Вами свяжемся.<br />Спасибо!</p><p><a href="#" onclick="javascript:hideElement(\'feedback_res\');">Закрыть</a></p></div>';
		} else {
			echo '<div id="feedback_res" style="display:block;" onclick="javascript:hideElement(\'feedback_res\');"><p><span class="err">Сообщение не отправлено!</span></p><p>Проверьте правильность заполнения полей либо попробуйте отправить сообщение позже!</p><p><a href="#" onclick="javascript:hideElement(\'feedback_res\');">Закрыть</a></p></div>';
		}
	}
	if (isset($_POST['fb_2'])) {
		if (feedbackSend('feedback_2')) {
			echo '<div id="feedback_res" style="display:block;" onclick="javascript:hideElement(\'feedback_res\');"><p><span>Ваша заявка на звонок отправлена!</span></p><p>В ближайшее время мы с Вами свяжемся.<br />Спасибо!</p><p><a href="#" onclick="javascript:hideElement(\'feedback_res\');">Закрыть</a></p></div>';
		} else {
			echo '<div id="feedback_res" style="display:block;" onclick="javascript:hideElement(\'feedback_res\');"><p><span class="err">Заявка на звонок не отправлена!</span></p><p>Проверьте правильность заполнения полей либо попробуйте отправить заявку позже!</p><p><a href="#" onclick="javascript:hideElement(\'feedback_res\');">Закрыть</a></p></div>';
		}
	}
	if (isset($_POST['fb_3'])) {
		if (feedbackSend('feedback_3')) {
			echo '<div id="feedback_res" style="display:block;" onclick="javascript:hideElement(\'feedback_res\');"><p><span>Ваш заказ отправлен!</span></p><p>В ближайшее время мы с Вами свяжемся.<br />Спасибо!</p><p><a href="#" onclick="javascript:hideElement(\'feedback_res\');">Закрыть</a></p></div>';
		} else {
			echo '<div id="feedback_res" style="display:block;" onclick="javascript:hideElement(\'feedback_res\');"><p><span class="err">Заказ не может быть отправлен!</span></p><p>Проверьте правильность заполнения полей либо попробуйте отправить заказ позже!</p><p><a href="#" onclick="javascript:hideElement(\'feedback_res\');">Закрыть</a></p></div>';
		}
	}
?>
<div id="feedback_1" style="display:none;"><?php echo feedbackForm('feedback_1'); ?></div>
<div id="feedback_2" style="display:none;"><?php echo feedbackForm('feedback_2'); ?></div>
<div id="feedback_3" style="display:none;"><?php echo feedbackForm('feedback_3'); ?></div>

<div id="wrapper" class="hfeed">
	<div id="header">
		<div class="b">
			<div class="b1"><a href="/" title="Перейти на главную страницу сайта"><img src="/wp-content/themes/sm/images/logo.gif" alt="<?php bloginfo("name"); ?>"></a></div>
			<div class="b2">
				<p><?php bloginfo("description"); ?></p>

				<?php if (is_nav_menu("company")): ?>
				<div id="company_menu"><?php wp_nav_menu( array('menu' => 'company') ); ?></div>
				<?php endif; ?>
			</div>
			<div class="b3"><?php dynamic_sidebar( 'sb_i0' ); ?></div>
		</div>
		<?php if (is_nav_menu("catalog1")): ?>
		<div id="catalog_menu">
			<?php wp_nav_menu(array('menu' => 'catalog1', 'before' => '<div class="l"></div><div class="a">', 'after' => '</div><div class="r"><img src="/wp-content/themes/sm/images/promo_e1.gif"></div>')); ?>
		</div>
		<?php endif; ?>
	</div>

	<div<?php if(is_home()){ echo ' class="promo_bg"'; } else { echo ' class="promo_bg2"'; } ?> id="main">