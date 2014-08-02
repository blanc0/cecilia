<?php
namespace cecilia\model;
/**
 *  The Player Model Returned when calling Cecilia::play()
 *
 *  ...
 *
 *
 * @copyright  Charlie Parks 2012
 * @author 	   Charlie Parks <charlie@blanc0.net>
 * @license    MIT
 * @package    cecilia
 * @subpackage model
 */
class Player
{
    /**
	 * The HTML for the player ( iframe )
	 * @var string
	 */
    public $html;
    /**
	 * The height of the player
	 * @var int
	 */
    public $height;
    /**
	 * The width of the player
	 * @var int
	 */
    public $width;
    /**
	 * The player theme
	 * Options: "black","white"
	 * @var string
	 */
    public $theme;
    /**
	 * The View to use
	 * Options: "list","view"
	 * @var string
	 */
    public $view;
    /**
	 * The Spotify URI
	 * Ex:
	 * @var string
	 */
    public $uri;

}
