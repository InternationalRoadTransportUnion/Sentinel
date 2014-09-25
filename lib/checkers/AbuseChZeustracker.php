<?php

namespace Sentinel;

/**
 * AbuseChZeustracker Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.0.0 23.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class AbuseChZeustracker extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.ipbl.zeustracker.abuse.ch.';
	
	/**
	 * 
 	 * @param string $lookup
	 * @return boolean false means no bad entries found
	 */
	public function validate_do ($lookup) {
		
		return array ('spammer_found' => ($lookup == '127.0.0.2'));
	}
}