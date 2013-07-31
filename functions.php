<?php

require('includes/custom_post_types.php');
require('includes/widgets.php');
require('includes/sidebars.php');
require('courses/functions.php');

add_theme_support( 'post-thumbnails' );

function mainsite_init() {
	mainsite_slideshow();
	mainsite_newslink();

	register_mainsite_nav_menu();
	register_mainsite_sidebars();
	
	add_image_size( 'slideshow-image-large', 820, 420, true);
}
add_action( 'init', 'mainsite_init' );

/* courses hooks */

add_action( 'init', 'mainsite_courses_rewrites_init' );
add_action( 'template_redirect', 'mainsite_url_rewrite_templates' );
add_filter( 'query_vars', 'mainsite_courses_query_vars' );

function get_slideshow_posts() {
	$query = new WP_Query( array( 
				'post_type' => 'slideshow', 
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 1
			));

	return $query;
}

?>