<?php

use sentinel\Sentinel;
use sentinel\Error;

$sentinel = new Sentinel;

if (! $sentinel->can_run (substr (filter_input (INPUT_GET, 'apikey', FILTER_SANITIZE_STRING), 0, Sentinel::APIKEY_LENGTH))) {

	$result = array (
		'score' => -1,
		'error' => Error::get_error_message ()
	);
	
} else {

	$ip = substr (filter_input (INPUT_GET, 'ip', FILTER_SANITIZE_STRING), 0, 15);
	$email = filter_input (INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
	$username = substr (filter_input (INPUT_GET, 'username', FILTER_SANITIZE_STRING), 0, Sentinel::USERNAME_LENGTH);
	
	if (! filter_var ($ip, FILTER_VALIDATE_IP)) {
		$ip = '';
	}
	if (! filter_var ($email, FILTER_VALIDATE_EMAIL)) {
		$email = '';
	}
	
	if ($ip || $email || $username) {		
		$result = $sentinel->validate ($ip);
		if (($error = Error::get_error_message ())) {
			$result = array (
				'score' => -1,
				'error' => $error
			);
		}
	} else {
		$result = array (
			'score' => -1,
			'error' => __ ('No IP, email or username specified')
		);
	}
}

switch (strtolower (filter_input (INPUT_GET, 'format', FILTER_SANITIZE_STRING))) {
	case Sentinel::FORMAT_JSON:
		$header = "Content-type: application/json";
		$output = json_encode ($result);
		if (filter_input (INPUT_GET, 'debug', FILTER_SANITIZE_NUMBER_INT)) {
			$output = Sentinel::pretty_json ($output);
		}
		break;
	case Sentinel::FORMAT_TEXT:
	case '':
	default:
		$header = 'Content-type: text/plain';
		$output = $result['score'];
}

header ($header);
echo $output;
exit;