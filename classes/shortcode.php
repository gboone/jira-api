<?php
namespace gboone\JIRA;
use \gboone\JIRA\Comment;
use \gboone\JIRA\Issues;

class Shortcode {
    public function do_jira($atts, $content = null) {
	extract( shortcode_atts( array(
	    'issue' => null,
	    'update' => null,
	), $atts ) );
	
	$Issues = new Issues();
	$url = $Issues->get_issue($issue);
	return "<a href='{$url}'>$content</a>
    }
}
