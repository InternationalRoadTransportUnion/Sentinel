<?php

namespace sentinel;

/**
 * AbusiveHostsBlockingList Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 24.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class AbusiveHostsBlockingList extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.dnsbl.ahbl.org';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'127.0.0.2' => 'Open Relay',
		'127.0.0.3' => 'Open Proxy',
		'127.0.0.4' => 'Spam Source',
		'127.0.0.5' => 'Provisional Spam Source Listing block (will be removed if spam stops)',
		'127.0.0.6' => 'Formmail Spam',
		'127.0.0.7' => 'Spam Supporter',
		'127.0.0.8' => 'Spam Supporter (indirect)',
		'127.0.0.9' => 'End User (non mail system)',
		'127.0.0.10' => 'Shoot On Sight',
		'127.0.0.11' => 'Non-RFC Compliant (missing postmaster or abuse)',
		'127.0.0.12' => 'Does not properly handle 5xx errors',
		'127.0.0.13' => 'Other Non-RFC Compliant',
		'127.0.0.14' => 'Compromised System - DDoS',
		'127.0.0.15' => 'Compromised System - Relay',
		'127.0.0.16' => 'Compromised System - Autorooter/Scanner',
		'127.0.0.17' => 'Compromised System - Worm or mass mailing virus',
		'127.0.0.18' => 'Compromised System - Other virus',
		'127.0.0.19' => 'Open Proxy',
		'127.0.0.20' => 'Blog/Wiki/Comment Spammer',
		'127.0.0.127' => 'Other'
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