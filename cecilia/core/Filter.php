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
use cecilia\core\CeciliaError;

class Filter extends \FilterIterator {
	/**
	 * The method to call.
	 * @type string
	 */
	private $_filter;
	/**
	 * @type mixed
	 */
	private $_params;
	
	/**
	 * Instantiates the Filter and sets the filter and paramters to be performed on the iterator.
	 * @param \Iterator $iterator
	 * @param array $filter
	 */
	public function __construct(\Iterator $iterator,$filter=null){
		if(is_array($filter) && count($filter)==2){
			$this->_filter=$filter[0];
		}else{
			$this->_filter=null;
			$this->_params=null;
		}
		
		parent::__construct($iterator);
	}
	
	/**
	 * This method attempts to filter the Iterator based on the parameters passed in the constructor.
	 * @see FilterIterator::accept()
	 * @return void
	 */
	public function accept() {
			try{
				if(is_callable(array($this,$this->_filter))){
					call_user_func_array(array($this,$this->_filter),$this->_params);
				}else{
					//
				}
				
			}catch(\Exception $e){
				throw new CeciliaError('');
			}
	}
	
	function released(){
		
	}
	
	function duration(){
		
	}
	
	function blacklist(){}
	
	function locale(){}
	
	
	
	
}

?>