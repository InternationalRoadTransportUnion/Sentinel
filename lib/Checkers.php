<?php

namespace Sentinel;

require_once 'Checker.php';

/**
 * Checkers class.
 * 
 * @package Sentinel
 * @access public
 * @since 05.01.2014
 * @version 0.0.2 25.09.2014
 * @author Oleg Ivanchenko <oleg.ivanchenko@iru.org>
 * @copyright Copyright (C) 2014, IRU
 */
class Checkers {
	
	const DIR_CHECKERS = 'checkers';
	
	/**
	 *
	 * @var array
	 */
	protected $checkers = array ();

	/**
	 * 
	 * @return boolean
	 */
	public function load () {
		
		$this->reset ();
		$dir = __DIR__ . '/' . self::DIR_CHECKERS;
		if (($files = array_diff (scandir ($dir), array ('..', '.')))) {
			foreach ($files as $filename) {
				$classname = basename ($filename, '.php');
				if (\Appconf::get ($GLOBALS['controller']->app, $classname, 'is_active')) {
					require_once $dir . '/' . $filename;
					$classname = 'Sentinel\\' . $classname;
					$this->checkers[] = new $classname ();
				}
			}
			$return = true;
		} else {
			Error::set (Error::ERR_READ_CHECKERS, $dir);
			$return = false;
		}
		return $return;
	}
	
	/**
	 * 
	 */
	private function reset () {
		
		$this->checkers = array ();
	}
	
	/**
	 * 
	 * @return array
	 */
	public function get () {
		
		return $this->checkers;
	}
}