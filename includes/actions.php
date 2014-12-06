<?php

function oec_hide_infocenter_add_new() {
  global $submenu;
  unset($submenu['edit.php?post_type=info_audience'][10]);
}
add_action('admin_menu', 'oec_hide_infocenter_add_new');
