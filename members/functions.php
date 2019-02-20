<?php

function get_member_country_list() {
    $url      = MEMBERS_API_URL . "/country/list/?format=json";
    $response = wp_remote_retrieve_body( wp_remote_get( $url ) );

    return json_decode( $response );
}

function get_country_members() {
    $country_name = get_query_var( 'members_country_name' );
    $url          = MEMBERS_API_URL . "/organization/by_country/" . $country_name . "/list/?format=json";

    $response = wp_remote_retrieve_body( wp_remote_get( $url ) );

    return json_decode( $response );
}

function get_member_list() {
    $url      = MEMBERS_API_URL . "/organization/group_by/membership_type/list/?format=json";
    $response = wp_remote_retrieve_body( wp_remote_get( $url ) );

    return json_decode( $response );
}

function get_member_detail() {
    $member_id = get_query_var( 'member_id' );

    $url      = MEMBERS_API_URL . "/organization/view/$member_id/?format=json";
    $result   = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode( $response );
}

function get_election_candidates() {
    global $post;

    $key = get_post_meta( $post->ID, 'election_view_key', true );
    $url = ELECTIONS_API_URL . "/candidate/list/$key/?format=json";

    $result   = wp_remote_get( $url );
    $response = wp_remote_retrieve_body( $result );

    return json_decode( $response );
}

?>
