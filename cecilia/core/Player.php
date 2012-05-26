<?php
namespace cecilia\core;
/**
 *
 * Cecilia's Player Generator.  
 * Generates a Player based on the user specified requirements.
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 * @see 	https://developer.spotify.com/technologies/web-api/
 *
 */
use cecilia\model\SpotifyURI;

use cecilia\error\CeciliaError;

class Player {
	
	const MAX_HEIGHT=720;
	const MAX_WIDTH=640;
	const MIN_HEIGHT=80;
	const MIN_WIDTH=250;
	
	const TRACK_HEIGHT=60;
	
	const FIT_PLAYER=true;
	
	const U_HEIGHT=0;
	const U_WIDTH=240;
	const U_MAX_HEIGHT=false;
	const U_MIN_HEIGHT=false;
	const U_MAX_WIDTH=false;
	const U_MIN_HEIGHT=false;
	
	const VIEW='list';
	/**
	 * The height of the player
	 * @type int
	 */
	public $height;
	
	/**
	 * The width of the player
	 * @type int
	 */
	public $width;
	
	/**
	 * @var unknown_type
	 */
	public $uri;
	
	public $theme;
	
	public $type;
	
	public $view;
	
	function __construct(){}
	
	function get_player_size(){}
	
	function get_player(SpotifyURI $uri,$options){
		
	}
	
	private function _parse_options(){}
	
	private function _parse_uri(){}
	
}

?>