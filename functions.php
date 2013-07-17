<?php

add_theme_support( 'post-thumbnails' ); 

function mainsite_init() {
	register_mainsite_nav_menu();
	register_mainsite_slideshow();

	add_image_size( 'slideshow-image-large', 820, 420, true);
}
add_action( 'init', 'mainsite_init' );

function register_mainsite_nav_menu() {
  register_nav_menu('navigation-menu',__( 'Navigation Menu' ));
}

function register_mainsite_slideshow() {
	register_post_type( 'mainsite_slideshow',
		array(
			'labels' => array(
				'name' => __( 'Slideshow' ),
				'singular_name' => __( 'Slideshow' )
			),
		'public' => true,
		'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
		)
	);
}

function get_slideshow_posts() {
	$query = new WP_Query( array( 
				'post_type' => 'mainsite_slideshow', 
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 1
			));

	return $query;
}

?>