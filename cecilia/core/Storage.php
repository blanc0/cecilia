<?php
namespace cecilia\core;
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * @author blanc0
 *
 *
 *
 *  Available Storage Mehtods:
 *  - memcache
 *  - apc
 *  - xcache
 *  - mongodb
 *  - redis
 *  - cecilia ( file based cache )
 *
 */
class Storage{

	/**
	 * @param unknown_type $key
	 * @param unknown_type $data
	 */
	abstract public function set($key,$data);
	
	/**
	 * 
	 * @param unknown_type $data
	 */
	abstract public function get($data);
	
	
	/**
	 * 
	 */
	abstract public function flush($type=false);
	
	
}