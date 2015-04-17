<?php

namespace sentinel;

/**
 * EfnetRbl Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 24.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class EfnetRbl extends Checker {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.rbl.efnetrbl.org';
	
	/**
	 * 
 	 * @param string $ip
	 * @return array
	 */
	public function validate ($ip) {
		
		$return = array ('spammer_found' => false);
		if ($ip) {
			$lookup = Sentinel::get_reverse_ip ($ip) . $this->url;
			if ($lookup != gethostbyname ($lookup)) {
				$return = array ('spammer_found' => true);
			}
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