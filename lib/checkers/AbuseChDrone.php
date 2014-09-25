<?php

namespace Sentinel;

/**
 * AbuseChDrone Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.0.1 24.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class AbuseChDrone extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.drone.abuse.ch.';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'127.0.0.2' => 'DRONE, Spam',
		'127.0.0.3' => 'DRONE, Malware',
		'127.0.0.4' => 'DRONE, Phish',
		'127.0.0.5' => 'DRONE, Scam'
	);
	
	/**
	 * 
 	 * @param string $lookup
	 * @return boolean false means no bad entries found
	 */
	public function validate_do ($lookup) {
		
		if ($this->errors[$lookup]) {
			$return = array ('spammer_found' => true, 'message' => $this->errors[$lookup]);
		} else {
			$return = array ('spammer_found' => false);
		}
		return $return;
	}
}