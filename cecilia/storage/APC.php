<?php
namespace cecilia\storage;
/**
 *
 * The APC StorageAdapter for Cecilia
 *
 * Uses APC to store and retrieve data.
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 * @link http://www.php.net/manual/en/book.apc.php
 * 
 */

use cecilia\core\CeciliaError,
	cecilia\core\StorageAdapter;

class APC implements StorageAdapter {

	function __construct($type){
		$this->type=$type;
	}
		
	public function remove($key) {
		return(
				apc_delete($this->type . '_' . $key)
				? true
				: false 
		);		
	}
	
	public function get($key) {
		$data = apc_fetch($this->type . '_' . $key);
		return(
				$data
				? $data
				: false
			   );
	}
	
	public function set($key, $value) {
		return(
				apc_store($this->type . '_' . $key,$value)
				? true
				: false
		);	
	}
	
	public function init() {
		if(!function_exists('apc_store')){
			throw new CeciliaError('APC Functions Do Not Exist! Please check to make sure you have APC installed.');
		}
	}
}

?>