<?php
namespace cecilia\model;
/**
 *
 * The Cecilia Internal Cursor - This is not exposed typically and is only used for internal iteration, for example
 * in the main SpotifyResult model, Cursor.
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
class Cursor {
	
	public $total;
	public $offset;
	public $has_next=false;
	public $next;
	public $prev;
	public $has_prev=false;
	public $total_pages;
	public $page;
	public $type;
	public $aggregate=false;
	
	
	
	function __construct($item){

		// do math and other things to populate member variables.
		
		if($item->num_results>$item->limit){
			$this->total_pages = ceil($item->num_results/$item->limit);
		}else{
			$this->total_pages=1;
		}
		
		
		$this->total = $item->num_results;
		$this->offset = $item->offset;
		$this->page = $item->page;
		$this->type = $item->type;
		
		
		
		if($this->total_pages - $this->page > 1){
			$this->has_prev=true;
			$this->prev = '';
		}else{
			$this->has_prev=false;
			$this->prev=false;
		}
		
		if($this->total_pages > 1 && $this->total_pages > $this->page){
			$this->has_next=true;
			$this->next='';			
		}else{
			$this->has_next=false;
			$this->next=false;			
		}
		
	}
}

?>