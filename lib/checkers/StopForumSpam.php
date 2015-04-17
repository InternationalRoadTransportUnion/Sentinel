<?php

namespace sentinel;

/**
 * StopForumSpam Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class StopForumSpam extends Checker {
	
	/**
	 *
	 * @var string
	 */
	protected $url = 'http://www.stopforumspam.com/api?f=serial{{spammer_data}}';
	
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
		
		$result = unserialize (Sentinel::get_url (
			str_replace (
				array ('{{spammer_data}}'),
				array ($spammer_data),
				$this->url
			)
		));
		
		if ($result['success']) {
			$return = array (
				'spammer_found' => $result[self::KEY_IP]['appears'] || $result[self::KEY_EMAIL]['appears'] || $result[self::KEY_USERNAME]['appears']
			);
		} else {
			$return = array ('spammer_found' => false, 'error' => __ ('Request failed'));
		}
			
		return $return;
	}
	
	/**
	 * 
	 * @param string $ip
	 * @return array
	 */
	public function validate_ip ($ip) {
		
		return $this->validate ($ip, '', '');
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
	 * @param string $email
	 * @return array
	 */
	public function validate_email ($email) {
		
		return $this->validate ('', $email, '');
	}
}