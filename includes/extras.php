<?php

function _inline( $svg_filename ) {
    echo file_get_contents( get_stylesheet_directory() . "/images/$svg_filename" );
}
