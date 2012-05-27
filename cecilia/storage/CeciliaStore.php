<?php
namespace cecilia\storage;
/**
 *
 * The Defualt, Built-In StorageAdapter for Cecilia
 *
 * Stores results as json into files, seperated by directory of types.
 * The filenames are as follows:
 * 
 *  Search Results
 *  - /cache_dir/search/the_hashed_key.json
 *  
 *  Lookup Results
 *  - /cache_dir/artist/the_hashed_key.json
 *  - /cache_dir/album/the_hashed_key.json
 *  - /cache_dir/track/the_hashed_key.json
 *  
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 *
 */

use cecilia\core\CeciliaError;

use cecilia\core\StorageAdapter;

class CeciliaStore implements StorageAdapter {
	
	const EXT='.json';
	
	private $_cache_dir='';

	function __construct($type){
		
		$this->type=$type;
		$this->_cache_dir = CECILIA_STORAGE_CS_CACHEDIR.$this->type.DIRECTORY_SEPARATOR;
		
	}
	
	function __destruct(){
		if($this->_file){
			fclose($this->_file);
		}
	}
	
	public function remove($key) {
		if($this->_set_filename($key)){
			fclose($this->_file);
			$this->_file=false;
			if(is_file($this->_cache_dir.$this->_filename)){
				unlink($this->_cache_dir.$this->_filename);
			}
		}else{
			return false;
		}
		
	}
	
	public function get($key) {
		if($this->_set_filename($key)){
			return json_decode(file_get_contents($this->_cache_dir.$this->_filename));
		}
		return false;
	}
	
	public function set($key, $value) {
		if($this->_set_filename($key)){
			if(fwrite($this->_file,json_encode($value))){
				return true;
			}
		}else{
			$this->_file = fopen($this->_cache_dir.$this->_filename,'w');
			if($this->_file){
				if(fwrite($this->_file,json_encode($value))){
					return true;
				}else{
					throw new CeciliaError('Could Not Write To Cache File!');
				}
			}else{
				throw new CeciliaError('Could Not Open Cache File.');
			}
		}
		return false;
	}
	
	public function init() {
		
	}
	
	private function _set_filename($key){
		$this->_filename = $key;
		if(!file_exists($this->_filename)){
			$this->_file = fopen($this->_cache_dir.$this->_filename,'w');
			if($this->_file){
				return false;
			}else{
				throw new CeciliaError('Error Creating Cache File!');
			}
			return true;
		}
		
	}
}

?>