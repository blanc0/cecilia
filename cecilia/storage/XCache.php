<?php
namespace cecilia\storage;
/**
 *
 * Desc
 *
 * Long Desc
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 * 
 * @uses XCache
 * @link http://xcache.lighttpd.net/
 *
 */

use cecilia\core\CeciliaError,
	cecilia\core\StorageAdapter;

class XCache implements StorageAdapter {
	
	public $type;
	
	public function remove($key) {
		if(xcache_isset($this->type.'_'.$key))
			xcache_unset($this->type.'_'.$key);
	}
	
	public function get($key) {
		$data = xcache_get($this->type.'_'.$key);
		return(
				$data
				? $data
				: false
				);
		
	}
	
	public function set($key, $value) {
		return(
				xcache_set($this->type.'_'.$key,$value)
				? true
				: false
				);
	}
	
	public function init($type) {
		if(!function_exists('xcache_set')){
			throw new CeciliaError('Xcache Extension Not Installed!');
		}
		$this->type=$type;
	}
	
	function __construct(){
	}
}

?>