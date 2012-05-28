<?php
namespace cecilia\model;
/**
 *
 * The Album model.
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\model
 * @package cecilia
 * @subpackage model
 *
 */
class Album extends \cecilia\core\Model{
	
	private $_type='album';
	/**
	 * The artist ID
	 * @var string 
	 */
	public $artist_id;
	/**
	 * The name of the album
	 * @var string
	 */
	public $name;
	/**
	 * The Album's Artist or Artists
	 * @var array of cecilia\model\Artist
	 */
	public $artist=array();
	/**
	 * External ID's for the album.
	 * @var array
	 */
	public $external_ids;
	/**
	 * The Year Released
	 * @var int
	 */
	public $released;
	/**
	 * The tracks on the album
	 * @var cecilia\model\Track
	 */
	public $tracks=array();
	/**
	 * The album popularity
	 * @var float
	 */
	public $popularity;
	/**
	 * The album's spotify URI
	 * @var string
	 */
	public $href;
	/**
	 * The Album's Artist or Artists
	 * @var array of cecilia\model\Artist
	 */	
	public $artists;
	/**
	 * Populates member variables from Spotify API Call.
	 * @param object $album
	 */
	function __construct($album){
		parent::__construct($album->album);
	}
	
}