<?php
namespace cecilia\core;

class ResponseFilterIterator extends \FilterIterator {
	
	public function __construct(\Iterator $iterator,$filter=''){
		parent::__construct($iterator);
	}
	
	public function accept() {
		if($this->current()->popularity<0.0001){return false;}else{return true;}
	}
	
	/**
	 * @param unknown_type $threshold
	 */
	private function _filter_popularity($threshold){
		
	}
	
	/**
	 * 
	 */
	private function _filter_words_blacklist(){
		
	}
	
}

?>