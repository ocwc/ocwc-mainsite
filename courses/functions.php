<?php

/* Setup Wordpress URLs */

function mainsite_courses_query_vars($query_vars){
	$query_vars[] = 'course_id';
	$query_vars[] = 'q';
	return $query_vars;
}

function mainsite_url_rewrite_templates() {
	global $wp_query;

	if ( get_query_var( 'course_id' ) ) {
		add_filter( 'template_include', function() {
			return get_template_directory() . '/courses/detail.php';
		});
	}
	if ( $wp_query->query['pagename'] === 'courses/search' ) {
		add_filter( 'template_include', function() {
			return get_template_directory() . '/courses/search.php';
		});
	}
}

function mainsite_courses_rewrites_init() {
    add_rewrite_rule(
        'courses/view/(\w+)/?$',
        'index.php?course_id=$matches[1]',
    	'top' );
    add_rewrite_rule(
    	'courses/search/$',
    	'index.php?course_search=1',
    	'top' );
}

/* Queries */

function get_course_detail() {
	$course_id = get_query_var('course_id');
	$url = DATA_API_URL.'/course/view/'.$course_id.'/?format=json';
	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
	
	$object = json_decode($response);
	return $object;
}

function get_search_results() {
	if ( get_query_var('q') ) {
		$q = get_query_var('q');
		$url = DATA_API_URL.'/course/search/?q='.$q;
		$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
		
		$object = json_decode($response);
		return array(
			'results' => $object,
			'count' => sizeof($object),
			'query' => wp_kses($q)
		);
	}
}

?>