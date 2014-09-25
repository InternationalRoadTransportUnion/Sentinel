<?php

namespace Sentinel;

require_once 'checkers/prototypes/Lookup.php';
require_once 'checkers/prototypes/Sorbs.php';

/**
 * Checker abstract class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.0.4 25.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
abstract class Checker {
	
	const IP = 'IP';
	const EMAIL = 'EMAIL';
	const USERNAME = 'USERNAME';
	
	/**
	 *
	 * @var string
	 */
	protected $classname;
	
	/**
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * 
	 */
	public function __construct () {
		
		$class = explode ('\\', get_called_class ());
		$this->classname = array_pop ($class);
		$this->load_config ();
	}
	
	/**
	 * 
	 */
	private function load_config () {
		
		$this->config = \Appconf::get ($GLOBALS['controller']->app, $this->classname);
	}
}