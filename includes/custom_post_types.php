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
		'menu_icon'           => '',
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

?>