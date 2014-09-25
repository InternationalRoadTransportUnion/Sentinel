<?php

namespace Sentinel;

/**
 * Spamhaus Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.0.1 24.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class Spamhaus extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.zen.spamhaus.org';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'127.0.0.2' => '(SBL)',
		'127.0.0.4' => '(CBL)',
		'127.0.0.5' => '(NJABL)',
		'127.0.0.6' => '(XBL)',
		'127.0.0.7' => '(XBL)',
		'127.0.0.8' => '(XBL)',
		'127.0.0.10' => '(PBL - ISP Maintained)',
		'127.0.0.11' => '(PBL - Spamhaus Maintained)'		
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