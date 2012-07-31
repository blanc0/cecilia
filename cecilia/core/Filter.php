<?php
namespace cecilia\core;

use cecilia\core\CeciliaError;

/**
 *
 * The Filter Iterator For Cecilia.
 * 
 * This Class will allow for a record set to be filitered by given set of parameters.
 * 
 * <code>
 *   $it = new Iterator($rs)
 *   new Filter($it,array('released','before:2010'));
 * </code>
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 * @internal
 *
 */

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
					return 1;
				}
				
			}catch(\Exception $e){
				return 1;
			}
	}
	/**
	 * Filters List By date the item was released.
	 * 
	 * @param string $args The Arguments
	 * 
	 * is:2001 			- would return all items released in 2001.
	 * after:2005 		- would return all items release after 2005
	 * before:1998 		- would return all items released before 1998
	 * 
	 * @return number
	 */
	function released($args){
		$parts = explode(':',$args);
		
		$year = (int)$parts[1];
		
		switch($parts[0]){
			case 'before':
				return(
						isset($this->current()->released) && $this->current()->released < $year
						// return 1
						? 1
						// return -1
						: -1
					);
				break;
			case 'after':
				return(
						isset($this->current()->released) && $this->current()->released > $year
						? 1
						: -1
				);				
				break;
			case 'is':
				return(
						isset($this->current()->released) && $this->current()->released == $year
						? 1
						: -1
				);				
				break;
			default:
				return 1;
		}
		return 1;
	}
	/**
	 * 
	 * Filters items in result list by duration.
	 * 
	 * @param string $args The arguments to use
	 * 
	 * gt:120 		- Filter Items That are at least 2 minutes in length.
	 * lt:180  		- Filter Items That are Less than 3 minutes in length.
	 *  
	 * @return number
	 * 
	 */
	function duration($args){
		$parts = explode(':',$args);
		$s = (int)$parts[1];
		if($parts[0]=='gt'){
			return(
					isset($this->current()->length) && $this->current()->length > $s
					? 1
					: -1
					);
		}elseif($parts[0]=='lt'){
			return(		
					isset($this->current()->length) && $this->current()->length < $s
					? 1
					: -1);
		}
		return 1;
	}
	/**
	 * Filters Items by Popularity.
	 * 
	 * @param string $args
	 * 
	 * gt:0.2  		- Only return items with popularity greater than 0.2
	 * lt:0.4       - Only return items with popularity less than 0.4
	 * 
	 * @return number
	 */
	function popularity($args){
		$parts = explode(':',$args);
		$p = (int)$parts[1];
		if($parts[0]=='gt'){
			return(
					isset($this->current()->popularity) && $this->current()->popularity > $p
					? 1
					: -1
					);
		}elseif($parts[0]=='lt'){
			return(		
					isset($this->current()->popularity) && $this->current()->popularity < $p
					? 1
					: -1);
		}
		return 1;	
	}
}

?>