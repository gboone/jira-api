<?php
namespace gboone\JIRA;
use \gboone\JIRA\Base;
use \gboone\JIRA\Comment;
use \gboone\JIRA\Issues;

class Shortcode extends Base {

    public function __construct() {
        parent::__construct();
    }

    public function do_jira($atts, $content = null) {
    	extract( shortcode_atts( array(
    	    'issue' => null,
    	    'update' => null,
    	), $atts ) );
        $base = $this->jira_domain;
    	$url = "{$base}browse/{$issue}";
    	return "<a href='{$url}' id='jira-{$issue}' class='{$update}'>$content</a>";
    }

    public function js_support() {
        wp_enqueue_scripts('jira', plugins_url() . 'jira-api/js/functions.js', 'jquery', '1.0');
    }
}
