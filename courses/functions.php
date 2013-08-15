<?php

/* Setup Wordpress URLs */

function mainsite_url_rewrite_templates() {
	if ( get_query_var( 'course_id' ) ) {
		add_filter( 'template_include', function() {
			return get_template_directory() . '/courses/detail.php';
		});
	}
}

function mainsite_courses_rewrites_init() {
    add_rewrite_rule(
        'courses/view/(\w+)/?$',
        'index.php?course_id=$matches[1]',
    	'top' );
}

function mainsite_courses_query_vars($query_vars){
	$query_vars[] = 'course_id';
	return $query_vars;
}

/* Queries */

function get_course_detail() {
	$course_id = get_query_var('course_id');
	$url = DATA_API_URL.'/course/view/'.$course_id.'/?format=json';
	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
	
	$object = json_decode($response);
	return $object;
}

?>