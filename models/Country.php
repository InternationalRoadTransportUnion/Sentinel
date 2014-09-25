<?php

/**
 * Country model class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.0.1 25.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class Country extends \Model {
	
	const FLD_NAME = 'en_country';
	
	/**
	 *
	 * @var string
	 */
	public $table = '#prefix#sentinel_countries';
	
	/**
	 * 
	 * @return array
	 */
	public static function get_list () {
		
		return self::query (parent::key () . ',' . self::FLD_NAME)
			->order (self::FLD_NAME)
			->fetch_assoc (parent::key (), self::FLD_NAME);
	}
}