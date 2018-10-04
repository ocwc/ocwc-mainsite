<?php

function _inline( $svg_filename ) {
    echo file_get_contents( get_stylesheet_directory() . "/images/$svg_filename" );
}

function responsive_embed($html, $url, $attr) {
    return $html!=='' ? '<div class="embed-container">'.$html.'</div>' : '';
}

