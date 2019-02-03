<?php
require_once('./admin.php');

wp_enqueue_script( 'dashboard' );
if ( current_user_can( 'edit_theme_options' ) )
	wp_enqueue_script( 'customize-loader' );
if ( current_user_can( 'install_plugins' ) )
	wp_enqueue_script( 'plugin-install' );
if ( current_user_can( 'upload_files' ) )
	wp_enqueue_script( 'media-upload' );
add_thickbox();

if ( wp_is_mobile() )
	wp_enqueue_script( 'jquery-touch-punch' );

$title = __('Dashboard');
$parent_file = 'index.php';

include (ABSPATH . 'wp-admin/admin-header.php');
?>

<div class="wrap">
<?php screen_icon(); ?>
<h2>Управление сайтом stostankov.com</h2>

</div><!-- wrap -->

<?php require(ABSPATH . 'wp-admin/admin-footer.php'); ?>