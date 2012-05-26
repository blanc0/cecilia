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
		
	}
}

?>