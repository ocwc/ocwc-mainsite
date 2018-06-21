<?php

acf_add_options_page(array(
    'page_title'    => 'Home page',
    'menu_title'    => 'Home page',
    'menu_slug'     => 'theme-homepage-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
));

acf_add_options_sub_page(array(
    'page_title'    => '10th Anniversary',
    'menu_title'    => '10th Anniversary',
    'menu_slug'     => 'theme-anniversary-settings',
    'capability'    => 'edit_posts',
    'parent_slug'   => 'theme-homepage-settings'
));
