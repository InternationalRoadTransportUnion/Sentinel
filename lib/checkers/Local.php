<?php

namespace sentinel;

/**
 * Local Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 22.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class Local extends Checker {
	
	/**
	 * 
	 * @param string $ip
	 * @param string $email
	 * @param strim=ng $username
	 * @return array
	 */
	public function validate ($ip, $email = '', $username = '') {
		
		return array ('spammer_found' => $this->validate_ip ($ip) || $this->validate_email ($email) || $this->validate_username ($username));
	}

	/**
	 * 
 	 * @param string $ip
	 * @return boolean
	 */
	protected function validate_ip ($ip) {
		
		if ($ip) {
			$return = \Item::is_blocked_ip ($ip);
		} else {
			$return = false;
		}
		return $return;
	}

	/**
	 * 
	 * @param string $email
	 * @return boolean
	 */
	protected function validate_email ($email) {
		
		if ($email) {
			$return = \Item::is_blocked_email ($email);
		} else {
			$return = false;
		}
		return $return;
	}

	/**
	 * 
	 * @param string $username
	 * @return boolean
	 */
	protected function validate_username ($username) {
		
		if ($username) {
			$return = \Item::is_blocked_username ($username);
		} else {
			$return = false;
		}
		return $return;
	}
}