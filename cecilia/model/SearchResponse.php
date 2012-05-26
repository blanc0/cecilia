<?php
namespace cecilia\model;
/**
 * The Model Returned when calling Cecilia->search()
 * 
 * @author blanc0
 *
 */
class SearchResponse {
	/**
	 * 
	 * @type boolean
	 */
	public $success;
	/**
	 * @type array
	 */
	public $artists;
	/**
	 * @type array
	 */
	public $albums;
	/**
	 * @type array
	 */
	public $tracks;
	public $pager;
	
	
}

?>