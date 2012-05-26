<?php
namespace cecilia\core;

class SearchFilter extends \FilterIterator {
	
	
	public function __construct(\Iterator $iterator,$filter=''){
		parent::__construct($iterator);
	}
	
	public function accept() {
		
		if($this->current()->popularity<0.0001){return false;}else{return true;}
		
	}
	
	/**
	 * @param unknown_type $threshold
	 */
	private function _f_popularity($threshold){
		
	}
	
	/**
	 * 
	 */
	private function _f_blacklist(){
			
	}
}

?>