<?php
namespace cecilia\core;
/**
 *
 * The Base Model Object.
 *
 *  This class is extended by the individual response objects, Artist, Album and Track.
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
class Model
{
    /**
	 * @var boolean
	 */
    public $availability;

    public function __construct($item)
    {
        foreach ($item as $k=>$v) {
            $this->$k=$v;
        }
        (isset($this->availability->territories)  ? $this->check_availability($this->availability->territories) : false );
    }

    public function get_type()
    {
        return $this->_type;
    }

    /**
	 * Checks to see if the item is available in the default locale.
	 * @param string $countries
	 * @return boolean
	 */
    public function check_availability($countries)
    {
        if (strlen($countries)>0) {
            if ($countries=='worldwide' ||  $countries===true) {
                $this->is_available=true;
            } else {
                $countries = explode(' ',$countries);
                if (in_array(Constants::COUNTRY_CODE,$countries)) {
                    $this->is_available=true;
                } else {
                    $this->is_available=false;
                }
            }
        } else {
            $this->is_available=true;
        }

        return false;
    }

}
