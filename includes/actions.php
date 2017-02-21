<?php

function oec_hide_infocenter_add_new() {
  global $submenu;
  unset($submenu['edit.php?post_type=info_audience'][10]);
}
add_action('admin_menu', 'oec_hide_infocenter_add_new');

/**
* Truncates text.
*
* Cuts a string to the length of $length and replaces the last characters
* with the ending if the text is longer than length.
*
* @param string  $text String to truncate.
* @param integer $length Length of returned string, including ellipsis.
* @param string  $ending Ending to be appended to the trimmed string.
* @param boolean $exact If false, $text will not be cut mid-word
* @param boolean $considerHtml If true, HTML tags would be handled correctly
* @return string Trimmed string.
*/
function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
    if ($considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }

        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);

            $total_length = strlen($ending);
            $open_tags = array();
            $truncate = '';

        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                // if tag is a closing tag (f.e. </b>)
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                        unset($open_tags[$pos]);
                    }
                // if tag is an opening tag (f.e. <b>)
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }

            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length> $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }

            // if the maximum length is reached, get off the loop
            if($total_length>= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }

    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }

    // add the defined ending to the text
    $truncate .= $ending;

    if($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }

    return $truncate;

}

function oeic_save_event ( $entry=null, $form=null ) {
    global $post;

    $post_entry = array(
                    'post_title'    => $entry[9],
                    'post_status'   => 'draft',
                    'post_author'   => 1,
                    'post_content'  => $entry[10],
                    'post_type'     => 'event',

    );

    $post_id = wp_insert_post( $post_entry, true );

    $start_date = date_create_from_format( 'Y-m-d', $entry[3] );
    $end_date = date_create_from_format( 'Y-m-d', $entry[4] );

    update_field( 'event_startdate', $start_date->format('Ymd'), $post_id );
    update_field( 'event_enddate', $end_date->format('Ymd'), $post_id );
    update_post_meta( $post_id, 'event_url', $entry[5] );

    update_post_meta( $post_id, 'event_contact_name', $entry['6.3'] . ' ' . $entry['6.6']  );
    update_post_meta( $post_id, 'event_contact_email', $entry[7] );
    update_post_meta( $post_id, 'event_country', $entry[11] );
    update_post_meta( $post_id, 'event_city', $entry[12] );
}

add_action('gform_post_submission_10', 'oeic_save_event', 10, 2);
