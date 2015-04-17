<?php

namespace sentinel;

/**
 * Botscout Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 23.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class FSpamlist extends Checker {
	
	/**
	 *
	 * @var string
	 */
	protected $url = 'http://www.fspamlist.com/xml.php?key={{apikey}}&spammer={{spammer_data}}';
	
	/**
	 * 
	 * @param string $ip
 	 * @param string $email
	 * @param string $username
	 * @return array
	 */
	public function validate ($ip, $email, $username) {
		
		$return = array ('spammer_found' => false);
		$spammer_data = '';		
		if ($ip) {
			$spammer_data .= $ip . ',';
		}
		if ($email) {
			$spammer_data .= $email . ',';
		}
		if ($username) {
			$spammer_data .= $username;
		}
		if ($spammer_data) {
			$result = Sentinel::get_url (
				str_replace (
					array ('{{apikey}}', '{{spammer_data}}'),
					array ($this->config['apikey'], trim ($spammer_data, ',')),
					$this->url)
			);
			if (is_array ($result)) {
				$return = array (
					'spammer_found' => $result[0]['isspammer'] || $result[1]['isspammer'] || $result[2]['isspammer']
				);
			} else {
				$return = array ('spammer_found' => false, 'error' => __ ('Request failed'));
			}
		}
		return $return;		
	}
	
	/**
	 * 
	 * @param string $ip
	 * @return boolean
	 */
	public function validate_ip ($ip) {
		
		return $this->validate ($ip, '', '');
	}

	/**
	 * 
	 * @param string $username
	 * @return boolean
	 */
	public function validate_username ($username) {
		
		return $this->validate ('', '', $username);
	}

	/**
	 * 
	 * @param string $email
	 * @return boolean
	 */
	public function validate_email ($email) {
		
		return $this->validate ('', $email, '');
	}
}