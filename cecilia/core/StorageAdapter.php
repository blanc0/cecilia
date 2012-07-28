<?php
namespace cecilia\core;

/**
 *
 * @author blanc0
 *        
 */
interface StorageAdapter {
	
	
	function __construct();
	
	function init($type);
	
	function get($key);
	
	function set($key,$value);
	
	function remove($key);
	
//	function update($key,$value);
}

?>