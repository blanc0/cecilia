<?php
namespace cecilia\core;

/**
 *
 * @author blanc0
 *        
 */
interface StorageAdapter {
	
	function init();
	
	function get($key);
	
	function set($key,$value);
	
	function remove($key);
	
}

?>