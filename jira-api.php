<?php
/*
Plugin Name: JIRA API Integration
Plugin URI: http://github.com/gboone/jira-api
Description: Adds hooks to comments and posts to integrate with JIRA

With this plugin active, use the [jira] shortcode to add comments to an issue in
a connected JIRA installation.

Version: 1.0
Author: Greg Boone
Author URI: http://greg.harmsboone.org
License: Public Domain Work of the Federal Government
*/
namespace gboone\JIRA;
require_once('classes/shortcode.php');
require_once('classes/issues.php');
use \gboone\JIRA\Shortcode;

class Base {
    public $jira_auth;
    public $jira_domain;

    function __construct() {
    	//$this->jira_auth = getenv(JIRA_USER) . ':' . getenv(JIRA_PASS);
        $this->jira_domain = 'http://jira.example.com/';

    }

    public function do_curl( $url, $curl_opts = null ) {
        $curl_url = curl_init( $url );
        if ( $curl_opts != null ) {
            foreach ( $curl_opts as $c => $v ) {
                curl_setopt($curl_url, $c, $v);
            }
        }
        $result = curl_exec( $curl_url );
    }
}

add_filter('the_content', 'do_shortcode', 11);
$S = new Shortcode();
add_action('wp_enqueue_scripts', $S, 'js_support');
add_shortcode( "jira", array( $S, 'do_jira' ) );


?>
