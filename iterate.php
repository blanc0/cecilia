<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

class A extends ArrayIterator{

}

class F extends FilterIterator{
	
	  function __construct(A $it ){
	  	parent::__construct($it);
	  }
	
	   public function accept() {
	   		
		   	if($this->current()->name=='Pomegranate'){
		   		return false;
		   	}else{
		   		return true;
		   	}
		
		}

	
}
$items = json_decode(file_get_contents('http://ws.spotify.com/search/1/album.json?q=astronautalis'));
var_dump($items);
$sorted = new A($items->albums);
var_dump($sorted);

$sorted->uasort(array(new Sorter(),'sort'));

var_dump($sorted);

class Sorter{
	function sort($a,$b){
		if($a->popularity > $b->popularity){
			return 1;
		}else{
			return -1;
		}
	}
}