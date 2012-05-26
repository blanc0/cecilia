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
	 * 
	 */
	public $artist_id;
	public $name;
	public $artist;
	public $external_ids;
	public $released;
	public $tracks=array();
	public $popularity;
	public $href;
	public $artists;
	
	function __construct($album){
		parent::__construct($album->album);
	}
	
}