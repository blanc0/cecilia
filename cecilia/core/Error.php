<?php 
namespace cecilia\core;

class Error extends \Exception{
	
	public $messages=array();
	
	function __construct($message = null, $code = null, $previous = null){
		parent::__construct($message,$code,$previous);
	}
	
	function get_messages(){
		return $this->messages;
	}
}