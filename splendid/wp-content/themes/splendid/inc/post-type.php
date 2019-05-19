<?php

function splendid_custompost_type_deals() {
	$labels = array(
		'name'                  => 'Deals',
		'singular_name'         => 'Deal',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'deals' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail',   ),
	);

	register_post_type( 'deals', $args );
}

add_action( 'init', 'splendid_custompost_type_deals' );


function custom_taxonomy_for_splendid() {
	$args = array(
		'label'        => __( 'Location', 'textdomain' ),
		'public'       => true,
		'rewrite'      => false,
		'hierarchical' => true
	);
	$args_price = array(
		'label'        => __( 'Price', 'textdomain' ),
		'public'       => true,
		'rewrite'      => false,
		'hierarchical' => true
	);

	register_taxonomy( 'location', 'deals', $args );

	register_taxonomy( 'price', 'deals', $args_price );

}
add_action( 'init', 'custom_taxonomy_for_splendid', 0 );


function splendid_custompost_type_works() {
	$labels = array(
		'name'                  => 'Works',
		'singular_name'         => 'work',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'works' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail',   ),
	);

	register_post_type( 'works', $args );
}

add_action( 'init', 'splendid_custompost_type_works' );