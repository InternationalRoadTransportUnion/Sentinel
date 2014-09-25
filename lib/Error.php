<?php

namespace Sentinel;

/**
 * Sentinel error class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.0.3 24.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class Error {
	
	const ERR_UNKNOWN = '';
	const ERR_CONFIG_FILE_NOT_FOUND = 'ERR_CONFIG_FILE_NOT_FOUND';
	const ERR_CONFIG_LOAD_FAILED = 'ERR_CONFIG_LOAD_FAILED';
	const ERR_READ_CHECKERS = 'ERR_READ_CHECKERS';
	const ERR_BAD_APIKEY = 'ERR_BAD_APIKEY';
	const ERR_ACCESS_DENIED = 'ERR_QACCESS_DENIED';
	const ERR_REQUEST_FAILED = 'ERR_REQUEST_FAILED';
	
	/**
	 *
	 * @var array
	 */
	private static $errors = array (
		self::ERR_CONFIG_FILE_NOT_FOUND => self::ERR_CONFIG_FILE_NOT_FOUND
	);
	
	/**
	 *
	 * @var string
	 */
	private static $error = '';
	
	/**
	 *
	 * @var string
	 */
	private static $message = '';

	/**
	 * 
	 * @return string
	 */
	public static function get_error_message () {
		
		$return = self::$message;
		self::reset ();
		return $return;
	}
	
	/**
	 * 
	 * @param string $code
	 * @param string $message
	 */
	public static function set ($code, $message = '') {
		
		self::$error = array_key_exists ($code, self::$errors) ? $code : self::ERR_UNKNOWN;
		self::$message = $message;
	}
	
	/**
	 * 
	 */
	public static function reset () {
		
		self::$error = self::$message = '';
	}
}