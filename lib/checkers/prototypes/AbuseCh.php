<?php

namespace sentinel;

/**
 * AbuseCh Generic Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
abstract class AbuseCh extends Checker {
	
	/**
	 * 
 	 * @param string $ip
	 * @return array
	 */
	public function validate ($ip) {
		
		$return = array ('spammer_found' => false);
		if ($ip) {
			$return = $this->validate_do (gethostbyname (Sentinel::get_reverse_ip ($ip) . $this->url));			
		}		
		return $return;			
	}
	
	/**
	 * 
 	 * @param string $ip
	 * @return boolean
	 */
	protected function validate_ip ($ip) {
		
		return $this->validate ($ip);
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
	 * @return boolean
	 */
	protected function validate_email () {
		
		return false;
	}
}