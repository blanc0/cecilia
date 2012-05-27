<?php
namespace cecilia\core;

/**
 *
 * The Cecilia Storage Class.
 * 
 * This class is just a wrapper for the StorageAdapter stored in _adapter.
 * It implements all of the methods of the StorageAdapter interface except for init()
 *
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */


use cecilia\core\CeciliaError;

class Storage{
	
	public static $_PREPEND='';
	
	private $_adapter;
	
	function __construct(){
		$adapter_name = 'storage\\'.Constants::STORAGE_DRIVER;
		try{
			$this->_adapter = new $adapter_name;
			$this->_adapter->init();
		}catch(CeciliaError $e){
			throw new CeciliaError('Sorry, failed to initialize the Storage Adapter. : ' . $e->getMessage());
		}
	}
	
	/**
	 * @param unknown_type $key
	 * @param unknown_type $data
	 */
	public function set($key,$data,$expires){
		try{
			return (
					  $this->_adapter->set($key,$data,$expires)
					? true
					: false
			);
		}catch(\Exception $e){
			throw new CeciliaError('Failed to call set()');
		}
	}
	
	/**
	 * @param unknown_type $data
	 */
	public function get($key){
		try{
			$data = $this->_adapter->get($key);
			return (
					 !isset($data->expired) && isset($data->data)
					? true
					: false
			);
		}catch(\Exception $e){
			throw new CeciliaError('Failed to call get()');
		}		
	}
	
	/**
	 * @param 
	 */
	public function remove($key){
		try{
			return (
					$this->_adapter->remove($key)
					? true
					: false
			);
		}catch(\Exception $e){
			throw new CeciliaError('Failed to call set()');
		}		
	}
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