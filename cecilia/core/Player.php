<?php
namespace cecilia\core;
/**
 *
 * Cecilia's Player Generator.  
 * 
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

use cecilia\model\SpotifyURI,
    cecilia\error\CeciliaError;

class Player {
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */
	const MAX_HEIGHT=720;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */
	const MAX_WIDTH=640;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const MIN_HEIGHT=80;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const MIN_WIDTH=250;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const TRACK_HEIGHT=60;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const FIT_PLAYER=true;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const U_HEIGHT=0;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const U_WIDTH=240;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const U_MAX_HEIGHT=false;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const U_MIN_HEIGHT=false;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const U_MAX_WIDTH=false;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	const U_MIN_HEIGHT=false;
	
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */	
	
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
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */
	public $theme;
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */
	public $type;
	/**
	 * The maximum height of the player, as defined by Spotify.
	 */
	public $view;
	
	function __construct(){}
	
	function get_player_size(){}
	
	function get_player(SpotifyURI $uri,$options){
		
	}
	
	private function _parse_options(){}
	
	private function _parse_uri(){}
	
}

?>