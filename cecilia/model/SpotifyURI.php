<?php
namespace cecilia\model;

use cecilia\core\CeciliaError;

use cecilia\core\Model;

class SpotifyURI extends Model {
	/**
	 * The type of URI
	 * @type string
	 */
	public $type;
	
	/**
	 * The URI namespace ( spotify is default )
	 * @type string
	 */
	public $ns='spotify';
	
	/**
	 * The ID for the URI
	 * @type string
	 */
	public $id;
	
	/**
	 * The User
	 * @type string
	 */
	public $user;
	
	/**
	 * The title ( for custom playlists only )
	 * @type string
	 */
	public $title;
	
	/**
	 * The URI String
	 * @type string
	 */
	public $uri;
	
	/**
	 * Is the URI a valid Spotify URI?
	 * @type string
	 */
	public $is_valid=true;
	
	/**
	 * Parses the URI string into member variables.
	 * @param string $uri_string
	 * @throws CeciliaError
	 */
	function __construct($uri_string){
		if(preg_match('/:/',$uri_string)){
			$parts = explode(':',$uri_string);
			$count = count($parts);
			if($count==5){
				//we have a playlist
				// spotify:user:theblanc0:playlist:4PifJYMf3fygUiXUKWbZzm
				$this->type = 'playlist';
				$this->user = $parts[2];
				$this->id   = $parts[4];
				
			}else if ($count==3){
				// count is equivelent to 3
				$this->type = $parts[1];
				$this->id   = $parts[2];
			}else{
				$this->is_valid=false;
				throw new CeciliaError();
			}
		
		}else{
			$this->is_valid=false;
			throw new CeciliaError();
		}
	}
}

?>