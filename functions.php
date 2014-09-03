<?php

function oec_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	add_filter( 'https_local_ssl_verify', '__return_false' );
	add_filter( 'block_local_requests', '__return_false' );

	// add_filter('show_admin_bar', '__return_false');
	add_filter('the_generator', '__return_false');

	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');

	add_image_size( 'slideshow-image-large', 1050, 420, true);
	add_image_size( 'header-image', 1080, 130, true);
}
add_action( 'after_setup_theme', 'oec_setup' );

function mainsite_scripts() {
	if ( !is_admin() ) {
		if ( WP_LIVERELOAD === true ) {
			wp_enqueue_script('livereload', WP_LIVERELOAD_URL, false, '', false);
		}

		if ( is_home() ) {
			wp_enqueue_script('responsiveslides', get_template_directory_uri().'/lib/javascripts/plugins/responsiveslides.min.js', array('jquery'), '', true);
		}

		wp_enqueue_style( 'op-style', get_template_directory_uri().'/css/style.css' );
		wp_enqueue_script( 'op-script', get_template_directory_uri() . '/js/script.min.js', array('jquery'), '20140815', false );
	}
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
				'posts_per_page' => 5,
				'orderby' => 'rand'
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
				'posts_per_page' => 8
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
	return $form_class . "col-xs-8";
}
add_filter('ninja_forms_form_class', 'mainsite_ninja_forms_form_class');

function filter_wp_title( $title ) {
	global $page, $paged, $custom_title;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );
	$name = get_bloginfo( 'name' );

	if ( get_query_var('search') ) {
		$filtered_title = 'Search results for: ' . get_query_var('search') . ' | ' . $name;
	} elseif ( get_query_var('course_id') ) {
		$filtered_title = $custom_title . ' | ' . $name;
	} else {

		$filtered_title = $title . $name;
		$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
		$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

	}

	return $filtered_title;
}
add_filter( 'wp_title', 'filter_wp_title' );
add_filter('widget_text', 'do_shortcode');

require get_template_directory() . '/includes/custom_post_types.php';
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/sidebars.php';
require get_template_directory() . '/includes/images.php';

require get_template_directory() . '/courses/functions.php';
require get_template_directory() . '/members/functions.php';

/**
 * Custom Menu Walker for Bootstrap 3
 */
require get_template_directory() . '/lib/wp_bootstrap_navwalker.php';
