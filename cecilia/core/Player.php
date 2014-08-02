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

class Player
{
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

    const VIEW='list';


    /**
	 *
	 */
     const PLAYER_STRING='<iframe src="https://embed.spotify.com/?uri=%s&theme=white&view=coverart" width="%d" height="%d"  frameborder="0" allowtransparency="true"></iframe>';
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

    public function __construct() {}

    public function get_player_size() {}

    public function get_player($uri,$options)
    {
        if ($uri instanceof SpotifyURI) {
            return $this->_build_player_from_uri($uri,$options);
        } else {
            return $this->_build_player_from_list($uri,$options);
        }
        //a spotify uri
    }

    private function _parse_options() {}

    private function _parse_uri() {}
    /**
	 *
	 */
    private function _build_player_from_uri($uri,$options)
    {
        return sprintf(
                        self::PLAYER_STRING,
                        $uri->uri_to_string(),
                        (isset($options['w']) ? $options['w'] : self::MIN_WIDTH),
                        (isset($options['h']) ? $options['h'] : self::MIN_HEIGHT)
                       );
    }
}
