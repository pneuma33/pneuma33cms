<?php
/*
Plugin Name: Pneuma33 CMS
Plugin URI: https://github.com/pneuma33/pneuma33cms
Description: Custom settings for Pneuma33 CMS
Version: 2.0.2
Author: Pneuma33
Author URI: http://pneuma33.com
License: GPL2
*/

include_once '_/inc/cabbagecms-settings.php';
include_once '_/inc/analyticstracking.php';
include_once '_/inc/email.php';
include_once '_/inc/googleplus.php';
include_once '_/inc/gravityforms-goodies.php';
include_once '_/inc/pinterest.php';
include_once '_/inc/social.php';
include_once '_/inc/contact-fields.php';
include_once '_/inc/browser-body-class.php';
include_once '_/inc/helper-functions.php';

function cabbagecms_settings_link($links) { // Add settings link on plugin page
    
    global $cabbagecms_options_page;
    $settings_link = '<a href="' . $cabbagecms_options_page . '">Settings</a>'; 
    array_unshift($links, $settings_link); 
    return $links; 
}
 
$plugin = plugin_basename(__FILE__); 

add_filter("plugin_action_links_$plugin", 'cabbagecms_settings_link' );

function cabbagecms_plugin_updater() { // enable updates from Github - https://github.com/jkudish/WordPress-GitHub-Plugin-Updater

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'pneuma33cms',
			'api_url' => 'https://api.github.com/repos/pneuma33/pneuma33cms',
			'raw_url' => 'https://raw.github.com/pneuma33/pneuma33cms/master',
			'github_url' => 'https://github.com/pneuma33/pneuma33cms',
			'zip_url' => 'https://github.com/pneuma33/pneuma33cms/archive/master.zip',
			'sslverify' => true,
			'requires' => '3.9',
			'tested' => '4.5.3',
			'readme' => 'README.md',
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

}

add_action( 'init', 'cabbagecms_plugin_updater' );