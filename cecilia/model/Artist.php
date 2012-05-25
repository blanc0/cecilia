<?php
namespace cecilia\model;
/**
 * 
 * @author blanc0
 *
 *
 *
 *
 *
	{
		href: "spotify:artist:2pAWfrd7WFF3XhVt9GooDL",
		name: "MF Doom",
		popularity: "0.44859"
	},
 *
 *
 */
class Artist extends \cecilia\core\Model{
	
	private $_type='artist';
	
	public $name;
	public $popularity;
	public $href;
	
	function __construct($item){
	 	$this->name=$item->name;
	 	$this->popularity=(int)$item->popularity;
	 	$this->href=$item->href;
	}
}