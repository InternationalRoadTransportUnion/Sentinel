<?php

namespace sentinel;

/**
 * BlocklistDe Checker class.
 * 
 * @package Sentinel
 * @access public
 * @since 24.09.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class BlocklistDe extends Lookup {
	
	/**
	 *
	 * @var string
	 */
	protected $url = '.all.bl.blocklist.de';
	
	/**
	 *
	 * @var array
	 */
	protected $errors = array (
		'127.0.0.2' => 'Amavis',
		'127.0.0.3' => 'Apache ddos',
		'127.0.0.4' => 'Asterisk',
		'127.0.0.5' => 'Bad bots',
		'127.0.0.6' => 'FTP attacks',
		'127.0.0.7' => 'IMAP attacks',
		'127.0.0.8' => 'IRC Bot',
		'127.0.0.9' => 'Mail attacks',
		'127.0.0.10' => 'POP3 attacks',
		'127.0.0.11' => 'Regbot',
		'127.0.0.12' => 'RFI attacks',
		'127.0.0.13' => 'SASL',
		'127.0.0.14' => 'SSH attacks',
		'127.0.0.15' => 'w00tw00t',
		'127.0.0.16' => 'Known portscanner'
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