<?php
namespace cecilia\storage;
/**
 *
 * The WinCache StorageAdapter for Cecilia 
 * 
 * Stores API Results into the User Cache using the WInCache extension.
 *
 * Long Desc
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 * 
 * @uses WinCache
 * @link http://www.php.net/manual/en/book.wincache.php
 * 
 */

use cecilia\core\CeciliaError,
	cecilia\core\StorageAdapter;

class WinCache implements StorageAdapter {
	public $type;
	function __construct(){
	}
		
	public function remove($key) {
		if($key=='all'){
			return(
					wincache_ucache_clear()
					? true
					: false
					);
		}else{
			if(wincache_ucache_exists($this->type.'_'.$key)){
				return(
						wincache_ucache_delete($this->type.'_'.$key)
						? true
						: false
						);
			}
			return false;
		}
		return false;
	}
	
	public function get($key) {
		if(wincache_ucache_exists($this->type.'_'.$key)){
			$data = wincache_ucache_get($this->type.'_'.$key);
			return $data;
		}
		return false;
	}
	
	public function set($key, $value) {
		return(
				wincache_ucache_set($this->type.'_'.$key,$value)
				? true
				: false
				);
	}
	
	public function init($type) {
		
		if(!function_exists('wincache_ucache_set')){
			throw new CeciliaError('Wincache Extension Not Installed!');
		}

		$this->type=$type;
	}
}

?>