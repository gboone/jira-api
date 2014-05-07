<?php
namespace gboone\JIRA;

class Issues extends Base {
    function __construct() {
    	parent::__construct();
    }

    public function transition($issue, $transition, $message) {
    	$url_prep = parent::jira_url . '/issue/' . $issue . 'transitions';
    	$ID = $this->parse_transition($transition);
    	if ( $ID == null ) {
    	    return false;
        }
    	$json_array = array(
    	    'update' => array(
    		'comment' => array(
    		    'add' => array('body' => $message,)
    		    )
    		),
    	    'fields' => array(
        		'resolution' => array('name' => $transition),
    	    ),
    	    'transition' => array( 'id' => $ID ),
    	);
    	$json = json_encode( $json_array );
    	$curl_opts = array(
    	    'CURLOPT_USERPWD' => $this->jira_auth,
    	    'CURLOPT_HTTP_HEADER' => array('Content-Type: application/json'),
    	    'CURLOPT_CUSTOMREQUEST' => "POST",
    	    'CURLOPT_POST_FIELDS' => $json,
    	    'CURLOPT_RETURNTRANSFER' => true
    	);
    	$result = $this->do_curl( $url_prep, $curl_opts );
    	return $result;
    }

    public function get_issue($issue) {
        $url = "{parent::jira_url}/issue/{$issue}";
        return $this->do_curl($url);
    }

    public function get_transitions($issue) {
    	$url = "{parent::jira_url}/issue/{$issue}/transitions?expand=transitions.fields";
    	return $this->do_curl($url);
    }

    public function parse_transition($transition) {
    	$transitions = $this->get_transitions($issue);
    	$transitions = json_decode( $transitions );
    	if ( array_key_exists( $transition, $transitions ) ) {
    	    return $transitions[$transition];
    	} else {
    	    return null;
    	}
    }
}
