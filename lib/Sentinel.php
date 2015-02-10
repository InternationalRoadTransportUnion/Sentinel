<?php

namespace Sentinel;

require_once 'Error.php';
require_once 'Checkers.php';

/**
 * Sentinel base class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.0.7 10.02.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
abstract class Sentinel {
	
	const FORMAT_JSON = 'json';
	const FORMAT_TEXT = 'text';
	
	const APIKEY_LENGTH = 16;
	const USERNAME_LENGTH = 64;
	
	/**
	 *
	 * @var array
	 */
	private $checkers = array ();
	
	/**
	 * 
	 */
	public function __construct () {
		
		$this->checkers = new Checkers ();
		$this->checkers->load ();	
	}
	
	/**
	 * 
 	 * @param string $ip
 	 * @param string $email
	 * @param string $username
	 * @return array
	 */
	public function validate ($ip = '', $email = '', $username = '') {
		
		$spammers = $count = 0;
		$return = array ('checkers' => array ());
		$blocked_by_local = false;
		
		foreach ($this->checkers->get () as $checker) {
			$result = $checker->validate ($ip, $username, $email);
			if (($checker_name = basename (str_replace ('\\', '/', get_class ($checker))))) {
				$blocked_by_local = $result['spammer_found'];
			}
			$return['checkers'][] = array (
				'name' => $checker_name,
				'spammer_found' => $result['spammer_found'],
				'message' => $result['message'],
				'error' => $result['error']
			);
			if ($result['spammer_found']) {
				$spammers ++;
			}
			$count ++;
		}
		if (! $count) {
			$return['score'] = 0;
		} else if ($blocked_by_local) {
			$return['score'] = 100; // Blocked by Local
		} else {
			$return['score'] = round (($spammers / $count) * 100, 0);
		}
		return $return;
	}
	
	/**
	 * 
	 * @param string $ip
	 * @return array
	 */
	public function validate_ip ($ip) {
		
		return $this->validate ($ip);
	}
	
	/**
	 * 
	 * @param string $email
	 * @return array
	 */
	public function validate_email ($email) {
		
		return $this->validate ('', $email);
	}
	
	/**
	 * 
	 * @param string $username
	 * @return array
	 */
	public function validate_username ($username) {
		
		return $this->validate ('', '', $username);
	}
	
	/**
	 * 
	 * @param string $api_key
	 * @return boolean
	 */
	public function can_run ($api_key) {
		
		if ($api_key) {
			if (! ($return = $this->is_allowed_apikey ($api_key))) {
				Error::set (Error::ERR_BAD_APIKEY, __ ('Bad API key'));
			}
		} else {
			if (! ($return = $this->is_allowed_ip ())) {
				Error::set (Error::ERR_ACCESS_DENIED, __('Access denied'));
			}
		}
		return $return;
	}
	
	/**
	 * 
	 * @param string $api_key
	 * @return boolean
	 */
	private function is_allowed_apikey ($api_key) {
		
		if ($api_key) {
			$return = in_array ($api_key, explode (',', \Appconf::get ($GLOBALS['controller']->app, 'Global', 'api_keys'))) ||
								(\Appconf::get ($GLOBALS['controller']->app, 'Global', 'api_key_local') == $api_key);
		} else {
			$return = true;
		}
		return $return;
	}
	
	/**
	 * 
	 * @return boolean
	 */
	private function is_allowed_ip () {
		
		if (php_sapi_name () !== 'cli') {
			if (('127.0.0.1' === ($ip = getenv ('REMOTE_ADDR')))) {
				$return = true;
			} else {
				$return = in_array ($ip, explode (',', \Appconf::get ($GLOBALS['controller']->app, 'Global', 'ips_allowed')));
			}
		} else {
			$return = true;
		}
		return $return;
	}

	/**
	 * 
	 * @param string $ip
	 * @return boolean
	 */
	public static function is_valid_ip_format ($ip){
		
		return preg_match ("'\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b'", $ip);		
	}
	
	/**
	 * 
	 * @param string $name
	 * @return string
	 */
	public static function sanitize_name ($name) {
		
		return urlencode (addslashes (htmlentities ($name)));
	}
	
	/**
	 * Gets a URL's content
	 * If curl is available, use it, otherwise use file_get_contents ()
	 *
	 * @param type $url
	 * @return string
	 */
	public static function get_url ($url) {
		
		if (extension_loaded ('curl')) {
			$curl = @curl_init ();
			curl_setopt ($curl, CURLOPT_URL, $url);
			curl_setproxy ($curl, $url);
			curl_setopt ($curl, CURLOPT_VERBOSE, 0);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($curl, CURLOPT_HEADER, 0);
			$return = @curl_exec ($curl);
			curl_close ($curl);
		}	else {
			// TODO: Add proxy if needed.
			$return = @file_get_contents ($url);
		}
		return $return;
	}
	
	/**
	 * 
	 * @param string $ip
	 * @return string
	 */
	public static function get_reverse_ip ($ip) {
		
		return implode ('.', array_reverse (explode ('.', $ip)));
	}
	
	/**
	 * Returns pretty formatted JSON encoded data.
	 * 
	 * @param array $json
	 * @return string
	 */
	public static function pretty_json ($json) {

		$result = '';
		$pos = 0;
		$strLen = strlen ($json);
		$indentStr = '  ';
		$newLine = "\n";
		$prevChar = '';
		$outOfQuotes = true;

		for ($i = 0; $i <= $strLen; $i ++) {

			// Grab the next character in the string.
			$char = substr ($json, $i, 1);

			// Are we inside a quoted string?
			if ($char == '"' && $prevChar != '\\') {
				$outOfQuotes = ! $outOfQuotes;

				// If this character is the end of an element, 
				// output a new line and indent the next line.
			} else if (($char == '}' || $char == ']') && $outOfQuotes) {
				$result .= $newLine;
				$pos --;
				for ($j = 0; $j < $pos; $j ++) {
					$result .= $indentStr;
				}
			}

			// Add the character to the result string.
			$result .= $char;

			// If the last character was the beginning of an element, 
			// output a new line and indent the next line.
			if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
				$result .= $newLine;
				if ($char == '{' || $char == '[') {
					$pos ++;
				}

				for ($j = 0; $j < $pos; $j ++) {
					$result .= $indentStr;
				}
			}

			$prevChar = $char;
		}

		return $result;
	}
}