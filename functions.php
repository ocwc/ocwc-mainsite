<?php

function mainsite_init() {
	register_mainsite_nav_menu();
}
add_action( 'init', 'mainsite_init' );

function register_mainsite_nav_menu() {
  register_nav_menu('navigation-menu',__( 'Navigation Menu' ));
}


?>