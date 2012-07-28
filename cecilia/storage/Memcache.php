<?php
namespace cecilia\storage;
/**
 *
 * The Memcache StorageAdapter for Cecilia
 * 
 * 
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 *
 */

use cecilia\core\CeciliaError,
    cecilia\core\StorageAdapter;

class Memcache implements StorageAdapter {
	
	private $_host='localhost';
	private $_port='11211';
	private $_conn;
	public $type;
	
	function __construct(){
	}
		
	function __destruct(){
		if($this->_conn!==FALSE){
			$this->_conn->close();
		}
	}
	
	public function remove($key) {
		if($key!='all'){
			$key = $this->type.'_'.$key;
		}
		$method = ( 
					$key=='all'
					? 'flush'
					: 'delete'
				  );
		return(
				$this->_conn->$method($key)
				? true
				: false
		);		
	}
	
	public function get($key) {
		$data = $this->_conn->get($this->type.'_'.$key);
		return(
				$data
				? $data
				: false
				);
	}
	
	public function set($key, $value) {
		return(
				$this->_conn->set($this->type.'_'.$key,$value)
				? true
				: false
		);	
	}
	
	/**
	 * (non-PHPdoc)
	 * @see cecilia\core.StorageAdapter::init()
	 */
	public function init($type) {
		if(!class_exists('Memcache')){
			throw new CeciliaError('Memcache Extension not installed!');
		}
		$this->type=$type;
		$this->_conn = new \Memcache($this->_host,$this->_port);
		if($this->_conn===FALSE){
			throw new CeciliaError('Could not connect to memcache server!');
		}
	}
}

?>