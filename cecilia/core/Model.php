<?php
namespace cecilia\core;
/**
 *
 * Description Here
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
class Model {
	
	private $_type='none';
	
	function __construct($item){
		foreach($item as $k=>$v){
			$this->$k=$v;
		}
	}
	
	function get_type(){
		return $this->_type;
	}
	
	/**
	 * 
	 * @param unknown_type $countries
	 * @return boolean
	 */
	function check_availability($countries){
		if($countries=='worldwide'){
			return true;
		}else{
			
				$countries = explode(' ',$countries);
			
		}
		
	}
	
}

?>