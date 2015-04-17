<?php

namespace sentinel;

/**
 * Botscout Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 22.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class BotScout extends Checker {
	
	/**
	 * &format=xml - does not work (2014-09-23) - thus using plain text output
	 * @var string
	 */
	protected $url = 'http://botscout.com/test/?&multi&key={{apikey}}{{spammer_data}}';
	
	const KEY_IP = 'ip';
	const KEY_EMAIL = 'email';
	const KEY_USERNAME = 'username';
	
	/**
	 * 
	 * @param string $ip
 	 * @param string $email
	 * @param string $username
	 * @return array
	 */
	public function validate ($ip, $email, $username) {
		
		$spammer_data = '';		
		if ($ip) {
			$spammer_data .= '&' . self::KEY_IP . '=' . $ip;
		}
		if ($email) {
			$spammer_data .= '&' . self::KEY_EMAIL . '=' . $email;
		}
		if ($username) {
			$spammer_data .= '&' . self::KEY_USERNAME . '=' . $username;
		}
		
		$result = trim (Sentinel::get_url (
			str_replace (
				array ('{{apikey}}', '{{spammer_data}}'),
				array ($this->config['apikey'], $spammer_data),
				$this->url
			)
		));
		
		if (strpos ($result, '! ') === 0) {
			// error in request
			// ! Sorry, but that doesn't appear to be a valid API key.
			$return = array ('spammer_found' => false, 'error' => __ ('Bad API key'));
		} else if (strpos ($result, 'Y|') === 0) {
			// Y|MULTI|IP|5|MAIL|0|NAME|0
			$return = array ('spammer_found' => true);
		} else {
			$return = array ('spammer_found' => false);
		}
	
		return $return;
	}
	
	/**
	 * 
	 * @return boolean
	 */
	protected function validate_ip () {
		
		return false;
	}

	/**
	 * 
	 * @return boolean
	 */
	protected function validate_username () {
		
		return false;
	}

	/**
	 * 
	 * @param string $email
	 * @return boolean
	 */
	protected function validate_email ($email) {
		
		return $this->validate ($email);
	}
}