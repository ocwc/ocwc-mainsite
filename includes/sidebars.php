<?php

function register_mainsite_sidebars() {
	register_sidebar( array(
	   'name' => __( 'General sidebar'),
	   'id' => 'sidebar-general',
	   'description' => __( 'General sidebar that is used on most inside pages', 'mainsite' ),
	   'before_widget' => '<div class="large-12 columns"><aside id="%1$s" class="widget %2$s">',
	   'after_widget' => "</aside></div>",
	   'before_title' => '<h3 class="footer-title">',
	   'after_title' => '</h3>',
	) );

	register_sidebar( array(
	   'name' => __( 'Courses sidebar'),
	   'id' => 'sidebar-courses',
	   'description' => __( 'Courses sidebar', 'mainsite' ),
	   'before_widget' => '<div class="large-12 columns"><aside id="%1$s" class="widget %2$s">',
	   'after_widget' => "</aside></div>",
	   'before_title' => '<h3 class="footer-title">',
	   'after_title' => '</h3>',
	) );

	register_sidebar( array(
	   'name' => __( 'Footer'),
	   'id' => 'footer',
	   'description' => __( 'Footer area', 'mainsite' ),
	   'before_widget' => '<div class="large-3 columns"><aside id="%1$s" class="widget %2$s">',
	   'after_widget' => "</aside></div>",
	   'before_title' => '<h3 class="footer-title">',
	   'after_title' => '</h3>',
	) );
}

function register_mainsite_nav_menu() {
  register_nav_menu('navigation-menu',__( 'Navigation Menu' ));
}

?>