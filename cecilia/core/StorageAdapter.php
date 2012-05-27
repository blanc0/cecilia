<?php
namespace cecilia\core;

/**
 *
 * @author blanc0
 *        
 */
interface StorageAdapter {
	
	public $type;
	
	function __construct($type);
	
	function init();
	
	function get($key);
	
	function set($key,$value);
	
	function remove($key);
	
//	function update($key,$value);
}

?>