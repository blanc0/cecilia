<?php
namespace cecilia\model;
/**
 *
 * The Pager used as part of the Response when calling Cecilia::search()
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\model
 * @package model
 * @subpackage model
 *
 */
use cecilia\core\Constants;

use cecilia\core\Iterator;

class Pager {
	/**
	 * Does the query have a next page of results?
	 * @var boolean
	 */
	public $has_next;
	/**
	 * Does the query have a previous page of results?
	 * @var boolean
	 */
	public $has_prev;
	/**
	 * How many total pages exist for this query?
	 * @var int
	 */	
	public $total_pages;
	/**
	 * The total items returned from the query.
	 * @var int
	 */	
	public $total_items;
	/**
	 * Current offset of the last item in the returned list.
	 * @var int
	 */	
	public $offset;
	/**
	 * The URL to call for the next set of results.
	 * @var string
	 */	
	public $next;
	/**
	 * The URL to call for the previous set of results.
	 * @var string
	 */
	public $prev;
	/**
	 * The current page number.
	 * @var int
	 */
	public $page_number;
	
	
	function __construct(SpotifyResult $result){
		$it = new Iterator($result->data);
		$this->total_items=$result->cursor->total;
		
		$this->offset = $result->cursor->offset;
		
		$this->total_pages = ceil($result->cursor->total / Constants::PAGER_MAX_ITEMS);
		$this->page_number = ceil($result->cursor->offset / Constants::PAGER_MAX_ITEMS);
		
		if($this->page_number==0){
			$this->page_number=1;
		}
		
		if(count($result->data) < Constants::SPOTIFY_RESULTS_PER_PAGE){
			$this->page_number -=1;
		}
		
		// next page
		$this->has_next=(
		    $result->cursor->has_next
		  ?	true
		  :	false
		);
		
		$this->next=(
		 ($this->has_next) 
		  ? ''
		  : false
		);
		
		
		
		// previous page
		$this->has_prev=(
		 ($this->total_pages - $this->page_number > 1) 
		  ? true
		  : false
		);
		
		$this->prev=(
	     ($this->has_prev)
		  ? ''
		  : false
		);
		
	} 
}

?>