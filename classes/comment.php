<?php
namespace gboone\JIRA;

class Comment extends Base {

    function __construct() {
	parent::construct();
    }
    
    public function add_comment($issue, $body) {
	$post_to = $this->jira_url . '/issue/' . $issue . '/comment';
	$json_array = array('body' => $body);
	$json = json_encode($json_array);
	$curl_url = curl_init( $post_to; );
	$curl_opts = array(
	    'CURLOPT_USERPWD' => $this->jira_auth,
	    'CURLOPT_HTTP_HEADER' => array('Content-Type: application/json'),
	    'CURLOPT_CUSTOMREQUEST' => "POST",
	    'CURLOPT_POST_FIELDS' => $json,
	    'CURLOPT_RETURNTRANSFER' => true
	);
	foreach ( $curl_opts as $c => $v ) {
	    curl_setopt($curl_url, $c, $v);
	}
	$result = curl_exec($curl_url);
	return $result;
    }
}
