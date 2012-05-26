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
	
	/*$sort = $options['sort'];
	$sort_items = explode(':',$sort);
		
	 switch($sort){
		case 'alpha:desc':
		case 'alpha:asc':
		case 'popularity:asc':
		case 'popularity:desc':
		case 'length:desc':
		case 'length:asc':
			usort($data->data,function($a,$b) use ($sort_items) {
				switch($sort_items[0]){
					case "popularity":
						if($sort_items[1]=='asc'){
							return ($a->popularity > $b->popularity ? 1 : -1);
						}else{
							return ($a->popularity < $b->popularity ? 1 : -1);
						}
	
						break;
				}
			});
			break;
		default:
			throw new \Exception('You Must Pass a Valid Sort Parameter!');
	} */
		
}

?>