<?php

namespace sentinel;

/**
 * AbuseChHttpbl Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class AbuseChHttpbl extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.httpbl.abuse.ch.';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'127.0.0.2' => 'HTTPBL, Hacking',
		'127.0.0.3' => 'HTTPBL, Hijacked Server',
		'127.0.0.4' => 'HTTPBL, Referer Spam',
		'127.0.0.5' => 'HTTPBL, Auto Scan Drone'
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