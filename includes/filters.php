<?php

function exclude_category( $query ) {
    if ( ! is_admin() && $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '-557' );
    }
}
add_action( 'pre_get_posts', 'exclude_category' );
