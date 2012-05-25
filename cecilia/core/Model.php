<?php
namespace cecilia\core;

class Model {
	private $_type='none';
	function get_type(){
		return $this->_type;
	}
	
	function parse_spotify_availability($countries){
		if($countries=='worldwide'){
			return 'Worldwide';
		}else{
			$countries = explode(' ',$countries);
		}
		
	}
	
}

?>