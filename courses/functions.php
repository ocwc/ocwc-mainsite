<?php

/* Setup Wordpress URLs */

function mainsite_courses_query_vars($query_vars){
	$query_vars[] = 'course_id';
	$query_vars[] = 'provider_id';
	$query_vars[] = 'search';
	return $query_vars;
}

function mainsite_url_rewrite_templates() {
	global $wp_query;

	if ( get_query_var( 'course_id' ) ) {
		add_filter( 'template_include', function() {
			return get_template_directory() . '/courses/course_detail.php';
		});
	}
	if ( get_query_var( 'provider_id' ) ) {
		add_filter( 'template_include', function() {
			return get_template_directory() . '/courses/provider_detail.php';
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
        'providers/(\w+)/?$',
        'index.php?provider_id=$matches[1]',
    	'top' );
    add_rewrite_rule(
    	'courses/search/$',
    	'index.php?course_search=1',
    	'top' );
}

/* Queries */

function get_latest_courses() {
	$url = DATA_API_URL.'/courses/latest/?format=json';
	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
	
	$object = json_decode($response);
	return $object;
}

function get_course_detail() {
	$course_id = get_query_var('course_id');
	$url = DATA_API_URL."/courses/view/$course_id/?format=json";
	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
	
	return json_decode($response);
}

function get_provider_detail() {
	$provider_id = get_query_var('provider_id');
	$url = DATA_API_URL."/providers/$provider_id/?format=json";
	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );

	return json_decode($response);
}

function get_provider_courses() {
	$provider_id = get_query_var('provider_id');
	$url = DATA_API_URL."/providers/$provider_id/courses/?format=json";
	$response = wp_remote_retrieve_body( wp_remote_get( $url ) );

	return json_decode($response);	
}

function get_search_results() {
	if ( get_query_var('search') ) {
		$q = get_query_var('search');
		$url = DATA_API_URL."/courses/search/?q=$q";
		$response = wp_remote_retrieve_body( wp_remote_get( $url ) );
		
		$object = json_decode($response);
		return array(
			'results' => $object,
			'count' => sizeof($object),
			'query' => wp_kses($q, '')
		);
	}
}

?>
