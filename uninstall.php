<?php

if (!defined('WP_UNINSTALL_PLUGIN')) :
    exit();
endif;

function cabbagecms_delete_options_prefixed( $prefix ) {
    
    global $wpdb;
    $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '{$prefix}%'" );

}

cabbagecms_delete_options_prefixed( 'cabbagecms_' );