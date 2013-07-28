<?php

require_once('includes/custom_post_types.php');
require_once('includes/widgets.php');
require_once('includes/sidebars.php');

add_theme_support( 'post-thumbnails' );

function mainsite_init() {
	mainsite_slideshow();

	register_mainsite_nav_menu();
	register_mainsite_sidebars();
	
	add_image_size( 'slideshow-image-large', 820, 420, true);
}
add_action( 'init', 'mainsite_init' );


function get_slideshow_posts() {
	$query = new WP_Query( array( 
				'post_type' => 'slideshow', 
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 1
			));

	return $query;
}

?>