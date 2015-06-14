<?php

function oec_posttype_slideshow() {
	$labels = array(
		'name'                => 'Slideshows',
		'singular_name'       => 'Slideshow',
		'menu_name'           => 'Slideshow',
		'parent_item_colon'   => 'Parent Slideshow:',
		'all_items'           => 'All Slideshows',
		'view_item'           => 'View Slideshow',
		'add_new_item'        => 'Add New Slideshow',
		'add_new'             => 'New Slideshow',
		'edit_item'           => 'Edit Slideshow',
		'update_item'         => 'Update Slideshow',
		'search_items'        => 'Search slideshows',
		'not_found'           => 'No slideshows found',
		'not_found_in_trash'  => 'No slideshows found in Trash',
	);
	$args = array(
		'label'               => 'slideshow',
		'description'         => 'Home page slideshow',
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-feedback',
		'can_export'          => false,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'slideshow', $args );
}
add_action( 'init', 'oec_posttype_slideshow', 0 );


/*
function oec_posttype_newslink() {
	$labels = array(
		'name'                => 'News links',
		'singular_name'       => 'Newslink',
		'menu_name'           => 'Newslink',
		'parent_item_colon'   => 'Parent Newslink:',
		'all_items'           => 'All Newslinks',
		'view_item'           => 'View Newslink',
		'add_new_item'        => 'Add New Newslink',
		'add_new'             => 'New Newslink',
		'edit_item'           => 'Edit Newslink',
		'update_item'         => 'Update Newslink',
		'search_items'        => 'Search newslinks',
		'not_found'           => 'No newslinks found',
		'not_found_in_trash'  => 'No newslinks found in Trash',
	);
	$args = array(
		'label'               => 'newslink',
		'description'         => 'Home page newslinks',
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'newslink', $args );	
}
add_action( 'init', 'oec_posttype_newslink', 0 );
*/

function oec_posttype_infoaudience() {

	$labels = array(
		'name'                => 'Audiences',
		'singular_name'       => 'Audience',
		'menu_name'           => 'Info Center',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Audiences',
		'view_item'           => 'View Audience',
		'add_new_item'        => 'Add New Audience',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Audience',
		'update_item'         => 'Update Audience',
		'search_items'        => 'Search Audience',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'audience',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'info_audience',
		'description'         => 'Audience',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'info_audience', $args );

}
add_action( 'init', 'oec_posttype_infoaudience', 0 );


function oec_posttype_infotopic() {

	$labels = array(
		'name'                => 'Topics',
		'singular_name'       => 'Topic',
		'menu_name'           => 'Topic',
		'parent_item_colon'   => 'Parent Topic:',
		'all_items'           => 'All Topics',
		'view_item'           => 'View Topic',
		'add_new_item'        => 'Add New Topic',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Topic',
		'update_item'         => 'Update Topic',
		'search_items'        => 'Search Topic',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'topic',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'info_topic',
		'description'         => 'Topic',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=info_audience',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'info_topic', $args );

}
add_action( 'init', 'oec_posttype_infotopic', 0 );

function oec_posttype_infoquestion() {

	$labels = array(
		'name'                => 'Questions',
		'singular_name'       => 'Question',
		'menu_name'           => 'Question',
		'parent_item_colon'   => 'Parent Question:',
		'all_items'           => 'All Questions',
		'view_item'           => 'View Question',
		'add_new_item'        => 'Add New Question',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Question',
		'update_item'         => 'Update Question',
		'search_items'        => 'Search Question',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'question',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'info_question',
		'description'         => 'Question',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'edit.php?post_type=info_audience',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'info_question', $args );

}
add_action( 'init', 'oec_posttype_infoquestion', 0 );



function oec_posttype_event() {
	$labels = array(
		'name'                => 'Events',
		'singular_name'       => 'Event',
		'menu_name'           => 'Events',
		'parent_item_colon'   => 'Parent Event:',
		'all_items'           => 'All Events',
		'view_item'           => 'View Event',
		'add_new_item'        => 'Add New Event',
		'add_new'             => 'New Event',
		'edit_item'           => 'Edit Event',
		'update_item'         => 'Update Event',
		'search_items'        => 'Search Events',
		'not_found'           => 'No Events found',
		'not_found_in_trash'  => 'No Events found in Trash',
	);
	$args = array(
		'label'               => 'event',
		'description'         => '',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tickets-alt',
		'can_export'          => false,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'event', $args );
}
add_action( 'init', 'oec_posttype_event', 0 );