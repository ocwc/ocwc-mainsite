<?php

require_once('color.php');
use phpColors\Color;

// http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb; // returns an array with the rgb values
}

function hex2rgba_str($hex) {
	$rgb = hex2rgb($hex);
	return "rgba($rgb[0], $rgb[1], $rgb[2], 0)";
}

function get_linear_gradient($hex, $first_stop = "30%", $second_stop = "70%", $right_offset = "0%") {
	$rgba = hex2rgba_str($hex);
	$style = '';

  	// $style .= "background-image: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, $hex), color-stop($first_stop, rgba(151, 78, 58, 0)), color-stop($second_stop, rgba(151, 78, 58, 0)), color-stop(100%, $hex));";
  	$style .= " background-image: -webkit-linear-gradient(left, $hex $right_offset, $rgba $first_stop, $rgba $second_stop, $hex 100%);";
  	$style .= "    background-image: -moz-linear-gradient(left, $hex $right_offset, $rgba $first_stop, $rgba $second_stop, $hex 100%);";
  	$style .= "      background-image: -o-linear-gradient(left, $hex $right_offset, $rgba $first_stop, $rgba $second_stop, $hex 100%);";
  	$style .= "      background-image: linear-gradient(to left, $hex $right_offset, $rgba $first_stop, $rgba $second_stop, $hex 100%);";

  return $style;
}

function the_linear_gradient($hex, $first_stop = "30%", $second_stop = "70%", $right_offset = "0%") {
	echo get_linear_gradient($hex, $first_stop, $second_stop, $right_offset);
}

function get_box_background($hex, $transparency) {
  $color = new Color($hex);
  $rgb = hex2rgb($color->lighten(10));
  
  
  $style =  "background-color: rgb($rgb[0], $rgb[1], $rgb[2]);";
  $style .= "background-color: rgba($rgb[0], $rgb[1], $rgb[2], $transparency);";

  return $style;
}

?>