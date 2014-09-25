<?php

namespace Sentinel;

/**
 * AbuseChSpam Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.0.1 24.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class AbuseChSpam extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.spam.abuse.ch.';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'127.0.0.2' => 'Spam, honeypot',
		'127.0.0.3' => 'Spam, Pushdo',
		'127.0.0.4' => 'Spam, Ozdok'
	);
	
	/**
	 * 
 	 * @param string $lookup
	 * @return array
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