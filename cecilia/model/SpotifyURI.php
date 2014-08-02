<?php
namespace cecilia\model;

use cecilia\core\CeciliaError,
    cecilia\core\Model;

class SpotifyURI extends Model
{
    /**
	 * The open.spotify base URI
	 * @var string
	 */
    private static $_SPOTIFY_OPEN_URI='http://open.spotify.com/';

    /**
	 * The type of URI
	 * @var string
	 */
    public $type;

    /**
	 * The URI namespace ( spotify is default )
	 * @var string
	 */
    public $ns='spotify';

    /**
	 * The ID for the URI
	 * @var string
	 */
    public $id;

    /**
	 * The User
	 * @var string
	 */
    public $user;

    /**
	 * The title ( for custom playlists only )
	 * @var string
	 */
    public $title;

    /**
	 * The URI String
	 * @var string
	 */
    public $uri;

    /**
	 * Is the URI a valid Spotify URI?
	 * @var boolean
	 */
    public $is_valid=true;

    /**
	 * The open.spotify.com link built from the spotify uri passed to the constructor.
	 * @example
	 */
    public $open_uri;

    /**
	 * Parses the URI string into member variables.
	 * @param string $uri_string
	 * @throws CeciliaError
	 */
    public function __construct($uri_string)
    {
        // we've received a Spotify URI
        if (preg_match('/:/',$uri_string)) {
            $this->uri = $uri_string;
            $parts = explode(':',$uri_string);
            $count = count($parts);
            if ($count==5) {
                //we have a playlist
                // spotify:user:theblanc0:playlist:4PifJYMf3fygUiXUKWbZzm
                $this->type = 'playlist';
                $this->user = $parts[2];
                $this->id   = $parts[4];

            } elseif ($count==3) {
                // count is equivelent to 3
                $this->type = $parts[1];
                $this->id   = $parts[2];
            } else {
                $this->is_valid=false;
                throw new CeciliaError('Invalid Spotify URI passed to SpotifyURI Model : '  . $uri_string);
            }

        } else {
            $this->is_valid=false;
            throw new CeciliaError();
        }
        $this->_build_open_link();
    }

    /**
	 * http://open.spotify.com/track/1YE2HalJn98YIGgrPqenC6
	 * http://open.spotify.com/user/theblanc0/playlist/4PifJYMf3fygUiXUKWbZzm
	 */
    private function _build_open_link()
    {
        $this->open_uri = (
            (isset($this->type) && $this->type!='playlist')
            ?  self::$_SPOTIFY_OPEN_URI.$this->type.'/'.$this->id
            :  self::$_SPOTIFY_OPEN_URI.'user/'.$this->user.'/'.$this->type.'/'.$this->id
        );

        return false;
    }

    public function uri_to_string()
    {
        return $this->uri;
    }
}
