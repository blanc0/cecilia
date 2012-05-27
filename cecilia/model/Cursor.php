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
	/**
	 * Total Results for the response from Spotify for this single call.
	 * @var int
	 */
	public $total;
	/**
	 * Total Results for the response from Spotify for this single call.
	 * @var int
	 */
	public $offset;
	/**
	 * Total Results for the response from Spotify for this single call.
	 * @var int
	 */	
	public $has_next=false;
	/**
	 * Total Results for the response from Spotify for this single call.
	 * @var int
	 */	
	public $next;
	/**
	 * Link to the previous page of results from Spotify for given query.
	 * 
	 * if $this->has_prev is TRUE, this will be a link to the next set of results.
	 * @var mixed
	 */	
	public $prev;
	/**
	 * Does this have a previous
	 * @var boolean
	 */	
	public $has_prev=false;
	/**
	 * The total pages of results from Spotify for given query.
	 * @var int
	 */	
	public $total_pages;
	/**
	 * The page number requested
	 * @var int
	 */	
	public $page;
	/**
	 * The data type, one of : artist, album, track
	 * @var string
	 */	
	public $type;
	
	
	
	function __construct($response){
		// do math and other things to populate member variables.
		
		if($response->info->num_results>$response->info->limit){
			$this->total_pages = ceil($response->info->num_results/$response->info->limit);
		}else{
			$this->total_pages=1;
		}
		
		
		$this->total = $response->info->num_results;
		$this->offset = $response->info->offset;
		$this->page = $response->info->page;
		$this->type = $response->info->type;
		
		
		
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