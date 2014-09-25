<?php

namespace Sentinel;

/**
 * Project Honey Pot Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.0.5 24.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class ProjectHoneyPot extends Checker {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.dnsbl.httpbl.org';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'0' => 'Search Engine',
		'1' => 'Suspicious',
		'2' => 'Harvester',
		'3' => 'Suspicious & Harvester',
		'4' => 'Comment Spammer',
		'5' => 'Suspicious & Comment Spammer',
		'6' => 'Harvester & Comment Spammer',
		'7' => 'Suspicious &amp; Harvester & Comment Spammer'
	);
	
	/**
	 * 
 	 * @param string $ip
	 * @return boolean false means no bad entries found
	 */
	public function validate ($ip) {
		
		$return = array ('spammer_found' => false);		
		if ($ip) {		
			$rev = Sentinel::get_reverse_ip ($ip);
			$lookup = $this->config['apikey'] . '.' . $rev . $this->url;			
			if ($lookup != gethostbyname ($lookup)) {
				$sTempArr = explode ('.', gethostbyname ($lookup));
				if ($sTempArr[0] == '127') {
					if ($this->errors[$sTempArr[3]]) {
						$return = array ('spammer_found' => true, 'message' => $this->errors[$sTempArr[3]]);
					} else {
						$return = array ('spammer_found' => false);
					}
				}
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