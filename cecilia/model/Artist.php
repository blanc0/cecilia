<?php
namespace cecilia\model;
/**
 *
 * The Artist Model
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

class Artist extends Model
{
    /**
	 * The Artist's name
	 * @var string
	 */
    public $name;
    /**
	 * The Popularity
	 * @var float
	 */
    public $popularity;
    /**
	 * The artist Spotify URI
	 * @var string
	 */
    public $href;
    /**
	 * Populates the member variables with values from spotify api response
	 * @param object $item
	 */
    public function __construct($item)
    {
        $this->name=$item->name;
        $this->popularity=(int) $item->popularity;
        $this->href=$item->href;
    }
}
