<?php

function register_mainsite_sidebars() {
	register_sidebar( array(
	   'name' => __( 'General sidebar'),
	   'id' => 'sidebar-general',
	   'description' => __( 'General sidebar that is used on most inside pages', 'mainsite' ),
	   'before_widget' => '<div class="large-12 columns"><aside id="%1$s" class="widget %2$s">',
	   'after_widget' => "</aside></div>",
	   'before_title' => '<h3 class="sidebar-title">',
	   'after_title' => '</h3>',
	) );

	register_sidebar( array(
	   'name' => __( 'Courses sidebar'),
	   'id' => 'sidebar-courses',
	   'description' => __( 'Courses sidebar', 'mainsite' ),
	   'before_widget' => '<div class="large-12 columns"><aside id="%1$s" class="widget %2$s sidebar">',
	   'after_widget' => "</aside></div>",
	   'before_title' => '<h3 class="sidebar-title">',
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

	register_sidebar( array(
	   'name' => __( 'Members sidebar'),
	   'id' => 'sidebar-members',
	   'description' => __( 'Members sidebar', 'mainsite' ),
	   'before_widget' => '<div class="large-3 columns"><aside id="%1$s" class="widget %2$s">',
	   'after_widget' => "</aside></div>",
	   'before_title' => '<h3 class="sidebar-title">',
	   'after_title' => '</h3>',
	) );

}

function register_mainsite_nav_menu() {
  register_nav_menu('navigation-menu',__( 'Navigation Menu' ));
}

class PageTitleWalker extends Walker_page {
	function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';

		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);

		if ( get_field('sidebar_hide', $page->ID) ) {
			return;
		}

		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		if ( '' === $page->post_title )
			$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );

		if ( get_field('sidebar_label', $page->ID) ) {
			$title = get_field('sidebar_label', $page->ID);
		} else {
			$title = apply_filters( 'the_title', $page->post_title, $page->ID );
		}

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . $title . $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}
	}
}

?>