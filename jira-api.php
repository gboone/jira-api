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

class Base {
    public $jira_auth;
    public $jira_domain;

    function __construct() {
	$this->jira_auth = getenv(JIRA_USER) . ':' . getenv(JIRA_PASS);
	$this->jira_domain = getenv(JIRA_DOMAIN);    
    }
}

$comments = new \gboone\JIRA\Comments();

?>
