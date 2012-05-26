<?php
namespace cecilia\model;
/**
 *
 * The Model for Artists
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\model
 * @package cecilia
 * @subpackage model
 * 
 *
 */

use cecilia\core\Model;

class Artist extends Model{
	/**
	 * The Artist's name
	 * @var string
	 */
	public $name;
	/**
	 * The Popularity
	 */
	public $popularity;
	public $href;
	
	function __construct($item){
	 	$this->name=$item->name;
	 	$this->popularity=(int)$item->popularity;
	 	$this->href=$item->href;
	}
}