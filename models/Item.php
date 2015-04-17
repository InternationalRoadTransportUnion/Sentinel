<?php

/**
 * Sentinel item model class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.1.0 17.04.2015
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014 - 2015, IRU
 */
class Item extends Model {
	
	const FLD_IP = 'ip';
	const FLD_EMAIL = 'email';
	const FLD_USERNAME = 'username';
	
	/**
	 *
	 * @var string
	 */
	public $table = '#prefix#sentinel_item';
	
	/**
	 * 
	 * @return boolean
	 */
	public function put () {
		
		$this->data['id2_country'] = $this->data['id2_country'] ? $this->data['id2_country'] : null;
		$this->data['ip'] = $this->data['ip'] ? $this->data['ip'] : null;
		$this->data['email'] = $this->data['email'] ? $this->data['email'] : null;
		$this->data['username'] = $this->data['username'] ? $this->data['username'] : null;
		return parent::put ();
	}
	
	/**
	 * 
	 * @param string $ip
	 * @return boolean
	 */
	public static function is_blocked_ip ($ip) {
		
		return self::is_blocked (self::FLD_IP, $ip);
	}
	
	/**
	 * 
	 * @param string $email
	 * @return boolean
	 */
	public static function is_blocked_email ($email) {
		
		return self::is_blocked (self::FLD_EMAIL, $email);
	}
	
	/**
	 * 
	 * @param string $username
	 * @return boolean
	 */
	public static function is_blocked_username ($username) {
		
		return self::is_blocked (self::FLD_USERNAME, $username);
	}
	
	/**
	 * 
	 * @param string $key
	 * @param string $val
	 * @return boolean
	 */
	private static function is_blocked ($key, $val) {
		
		$exists = self::query ('id')
			->where ($key, $val)
			->where ('action', 1)
			->fetch (1, 0);
		return ! empty ($exists);
	}
}