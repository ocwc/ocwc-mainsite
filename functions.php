<?php

require('includes/custom_post_types.php');
require('includes/widgets.php');
require('includes/sidebars.php');
require('courses/functions.php');
require('members/functions.php');

add_theme_support( 'post-thumbnails' );
add_filter( 'https_local_ssl_verify', '__return_false' );
add_filter( 'block_local_requests', '__return_false' );

// add_filter('show_admin_bar', '__return_false');
add_filter('the_generator', '__return_false');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

function mainsite_init() {
	mainsite_slideshow();
	mainsite_newslink();

	register_mainsite_nav_menu();
	register_mainsite_sidebars();
	
	add_image_size( 'slideshow-image-large', 1050, 420, true);
}
add_action( 'init', 'mainsite_init' );

function mainsite_scripts() {
	if ( is_home() ) {
		wp_enqueue_script('responsiveslides', get_template_directory_uri().'/lib/javascripts/plugins/responsiveslides.min.js', array('jquery'), '', false);
	}
	wp_enqueue_script('script', get_template_directory_uri().'/lib/javascripts/script.js', array('jquery'), '', false);
}
add_action( 'wp', 'mainsite_scripts');

/* courses hooks */

add_action( 'init', 'mainsite_courses_rewrites_init' );
add_action( 'template_redirect', 'mainsite_url_rewrite_templates' );
add_filter( 'query_vars', 'mainsite_courses_query_vars' );

function get_slideshow_posts() {
	$query = new WP_Query( array( 
				'post_type' => 'slideshow', 
				'ignore_sticky_posts' => 1,
				'posts_per_page' => 3
			));

	return $query;
}

function get_newslink_posts() {
	$query = new WP_Query( array(
				'post_type' => 'newslink',
				'posts_per_page' => 5
		));
	return $query;
}

function get_announcements_posts() {
	$query = new WP_Query( array(
				'post_type' => 'post',
				'posts_per_page' => 5
		));
	return $query;
}

if(!function_exists('get_post_top_ancestor_id')){
	/**
	 * Gets the id of the topmost ancestor of the current page. Returns the current
	 * page's id if there is no parent.
	 * 
	 * @uses object $post
	 * @return int 
	 */
	function get_post_top_ancestor_id(){
	    global $post;
	    
	    if($post->post_parent){
	        $ancestors = array_reverse(get_post_ancestors($post->ID));
	        return $ancestors[0];
	    }
	    
	    return $post->ID;
	}
}

/* styling ninja forms */
function mainsite_ninja_forms_form_class($form_class) {
	return $form_class . "large-8 columns";
}
add_filter('ninja_forms_form_class', 'mainsite_ninja_forms_form_class')

?>