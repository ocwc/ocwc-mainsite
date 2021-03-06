<?php

/* Setup Wordpress URLs */

function mainsite_courses_query_vars($query_vars){
    /* courses */
    $query_vars[] = 'course_id';
    $query_vars[] = 'course_search';
    $query_vars[] = 'provider_id';
    $query_vars[] = 'member_id';
    $query_vars[] = 'language_name';
    $query_vars[] = 'search';
    $query_vars[] = 'legacy';

    /* members */
    $query_vars[] = 'members_country_name';

    return $query_vars;
}

function mainsite_url_rewrite_templates() {
    global $wp_query;

    if ( get_query_var( 'course_id' ) ) {
        global $course;


        $course = get_course_detail();
        if ( $course->detail === 'Not found.' ) {
            $wp_query->is_404 = true;
            status_header( '404' );
        } else {
            status_header( '200' );
            $wp_query->is_404 = false;

            add_filter( 'template_include', function() {
                return get_template_directory() . '/courses/course_detail.php';
            });
        }
    }
    if ( get_query_var( 'provider_id' ) ) {
        $wp_query->is_404 = false;
        status_header( '200' );

        add_filter( 'template_include', function() {
            return get_template_directory() . '/courses/provider_detail.php';
        });
    }
    if ( get_query_var( 'language_name' ) ) {
        $wp_query->is_404 = false;
        status_header( '200' );

        add_filter( 'template_include', function() {
            return get_template_directory() . '/courses/course_language_list.php';
        });
    }
    if ( get_query_var( 'category_name' ) ) {
        $wp_query->is_404 = false;
        status_header( '200' );

        add_filter( 'template_include', function() {
            return get_template_directory() . '/courses/course_category_list.php';
        });
    }

    if ( ( array_key_exists('pagename', $wp_query->query) AND
            $wp_query->query['pagename'] === 'courses/search' ) OR ( get_query_var('course_search') )
        ) {
            $wp_query->is_404 = false;
            status_header( '200' );

            add_filter( 'template_include', function() {
                return get_template_directory() . '/courses/search.php';
            });
    }

    if ( get_query_var( 'member_id' ) ) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/members/member_detail.php';
        });
    }

    if ( get_query_var( 'members_country_name' ) ) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/members/country_list.php';
        });
    }

    if ( array_key_exists('pagename', $wp_query->query) AND
         $wp_query->query['pagename'] === 'members/member-list' ) {
        add_filter( 'template_include', function() {
            return get_template_directory() . '/members/member-list.php';
        });
    }
}

function mainsite_courses_rewrites_init() {
    /* don't forget to register new query_var on top */
    add_rewrite_rule(
        'courses/view/(\w+)/?$',
        'index.php?course_id=$matches[1]',
        'top' );
    add_rewrite_rule(
        'courses/language/([\w|\W]+)/?$',
        'index.php?language_name=$matches[1]',
        'top' );
    add_rewrite_rule(
        'courses/category/([\w|\W]+)/?$',
        'index.php?category_name=$matches[1]',
        'top' );
    add_rewrite_rule(
        'courses/search/?$',
        'index.php?course_search=1',
        'top' );
    add_rewrite_rule(
        'providers/(\w+)/?$',
        'index.php?provider_id=$matches[1]',
        'top' );
    add_rewrite_rule(
        'members/view/(\w+)/?$',
        'index.php?member_id=$matches[1]',
        'top' );
    add_rewrite_rule(
        'members/country/([\w|\W]+)/?$',
        'index.php?members_country_name=$matches[1]',
        'top' );
}

/* Queries */

function get_latest_courses() {
    $url = DATA_API_URL.'/courses/latest/?format=json';
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    $object = json_decode($response);
    return $object;
}

function get_course_detail() {
    $course_id = get_query_var('course_id');
    $url = DATA_API_URL."/courses/view/$course_id/?format=json";
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode($response);
}

function get_provider_detail() {
    $provider_id = get_query_var('provider_id');
    $url = DATA_API_URL."/providers/$provider_id/?format=json";
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode($response);
}

function get_provider_courses() {
    $provider_id = get_query_var('provider_id');
    $page = (get_query_var('page')) ? get_query_var('page') : 1;
    $url = DATA_API_URL."/providers/$provider_id/courses/?page=$page&format=json";
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode($response);
}

function get_language_courses() {
    $language_name = get_query_var('language_name');
    $page = (get_query_var('page')) ? get_query_var('page') : 1;

    $url = DATA_API_URL."/languages/$language_name/courses/?page=$page&format=json";
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode($response);
}

function get_category_courses() {
    $category_name = get_query_var('category_name');
    $page = (get_query_var('page')) ? get_query_var('page') : 1;

    $url = DATA_API_URL."/categories/$category_name/?page=$page&format=json";
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode($response);
}

function get_search_results() {
    if ( get_query_var('search') ) {

        $page = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
        $query = get_query_var('search');

        $data = array(
            'q' => $query,
            'page' => $page,
            DATA_API_EXTRA_ARG => 1
        );

        $url = DATA_API_URL."/courses/search/?" . http_build_query($data);

        $result = wp_remote_get( $url, array( 'timeout' => 120, 'httpversion' => '1.1' ) );
        $response = wp_remote_retrieve_body( $result );

        $object = json_decode( $response );

        $data = array(
                    'results' => $object->documents,
                    'count' => sizeof($object),
                    'query' => wp_kses($query, '')
                );

        if ( array_key_exists('next_page', $object) ) {
            $data['next_page'] = str_replace('q=', 'search=', $object->next_page);
        }

        if ( array_key_exists('previous_page', $object) ) {
            $data['previous_page'] = str_replace('q=', 'search=', $object->previous_page);
        }

        return $data;
    }
}

function get_api_results($endpoint) {
    $url = DATA_API_URL.$endpoint;
    $result = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode($response);
}
