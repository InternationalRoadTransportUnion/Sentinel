<?php

namespace sentinel;

/**
 * Spamhaus Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class SpamCop extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.bl.spamcop.net';
	
	/**
	 * 
 	 * @param string $lookup
	 * @return boolean false means no bad entries found
	 */
	public function validate_do ($lookup) {
		
		return array ('spammer_found' => ($lookup == '127.0.0.2'));
	}
}