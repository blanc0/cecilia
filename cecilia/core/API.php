<?php
namespace cecilia\core;
/**
 *
 * The Cecilia API wrapper.
 *
 * Examples of API calls:
 *
 * search
 * /search/blah
 *
 * lookup
 * /lookup/blah
 *
 * play
 * /play/spotify:artist:amsdifndfnsd
 *
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
use cecilia\model\Response;

class API
{
    /**
	 * An instance of Cecilia
	 * @var Cecilia
	 */
    private $_cecilia;
    /**
	 * The method to call
	 * @var string
	 */
    public $method;
    /**
	 * The query to pass to the Cecilia method being called.
	 * @var unknown_type
	 */
    public $query;
    /**
	 * Instantiate an instance of Cecilia and extract arguments from request.
	 * @throws CeciliaError
	 */
    public function __construct()
    {
        try {
            $this->_cecilia= new Cecilia();
            $this->get_args();
        } catch (\Exception $e) {
            throw new CeciliaError();
        }
    }

    /**
	 *  Extracts the arguments to be used in the api call from the URI and QUERY STRING
	 *
	 */
    public function get_args()
    {
        $tmp = explode('/',$_SERVER['REQUEST_URI']);

        if (isset($_GET)) {

            $options = array();

            if (isset($_GET['type'])) {
                $options['type']=$_GET['type'];
            }

            if (isset($_GET['w'])) {
                $options['w']=$_GET['w'];
            }

            if (isset($_GET['h'])) {

            }

            if (isset($_GET['h'])) {

            }

            if (isset($_GET['h'])) {

            }
        }
    }

    /**
	 * Attempt to call Cecilia for the data requested.
	 * @return \cecilia\model\Response
	 */
    public function call()
    {
        try {
            $data = $this->_cecilia->$method($args);
        } catch (\Exception $e) {
             return new Response(0,null);
        }

        return(
                $data instanceof Response
                ? $data
                : new Response(0,null)
                );
    }
}
