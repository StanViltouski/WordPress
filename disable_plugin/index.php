<?php

add_filter( 'option_active_plugins', 'disable_plugin' );

function disable_plugin ( $active_plugins ){
	$pageuri = '/';

    // Examples for check

    //strpos( $_SERVER['REQUEST_URI'], $pageuri) == true;   // Only this page $pageuri;
    //strpos( $_SERVER['REQUEST_URI'], $pageuri) == false;  // All pages except $pageuri;
    //$_SERVER['REQUEST_URI'] == $pageuri                   // Only this page ('/');

	if( $_SERVER['REQUEST_URI'] == $pageuri ){
		$disable = 'redux-framework/redux-framework.php';

		if( $ind = array_search($disable, $active_plugins) ) unset($active_plugins[$ind]);
	}

	return $active_plugins;
}