<?php
namespace cecilia\core;
/**
 *
 * Description Here
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
class Storage{
	
	public static $_PREPEND='';
	
	private $_adapter;
	
	function __construct(){
		
	}
	
	/**
	 * @param unknown_type $key
	 * @param unknown_type $data
	 */
	abstract public function set($key,$data,$expires);
	
	/**
	 * @param unknown_type $data
	 */
	abstract public function get($data);
	
	/**
	 * @param 
	 */
	abstract public function flush($type=false);
	/**
	 * Determines the ttl that should be set along with the 
	 * @param unknown_type $expires
	 */
	private function _get_ttl($expires){
		
		$stamp=time();
		
		$expires = strtotime($expires,$stamp);
		
		if($stamp > $expires){
			return false;
		}
		return $expires - $stamp;
	}
}