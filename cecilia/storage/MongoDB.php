<?php
namespace cecilia\storage;
/**
 *
 * The Mongo StorageAdapter for Cecilia
 *
 * Stores data retreived from hte Spotify API into a MongoDB database.
 * Collections are as follows:
 *
 * Search API Results
 *
 * - dbname->search = {'key':'thekey','data',$data}
 *
 *
 * Lookup API Results
 * - dbname->artist = {'key':'spotify:artist:ase0990as0dk','data',$data}
 * - dbname->album = {'key':'spotify:album:3423nf4334','data':$data }
 * - dbname->track = {'key':'spotify:track:3423nf4334','data':$data }
 *
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 *
 * @uses Mongo
 * @link http://www.php.net/manual/en/book.mongo.php
 * @link http://www.mongodb.org/
 *
 */

use cecilia\core\Constants,
    cecilia\core\CeciliaError,
    cecilia\core\StorageAdapter;

class MongoDB implements StorageAdapter
{
    private $_host;

    private $_port;

    private $_conn;

    private $_db;

    private $_collection;

    private $_coll;

    private $_user=false;

    private $_pass=false;

    public $type;

    public function __construct()
    {
    }

    public function remove($key)
    {
        return(
                $this->_coll->remove(array('key'=>$key))
                ? true
                : false
               );
    }

    public function get($key)
    {
        $cursor = $this->_coll->findOne(array('key'=>$key));

        if ($cursor) {

            $cursor->rewind();

            if ($cursor->valid()) {
                return $cursor;
            } else {
                return false;
            }

        }
    }

    public function set($key, $value)
    {
        return(
                 $this->_coll->update(array('key'=>$key),array('$set' => array('data'=>$value)),array('upsert'=>true))
                 ? true
                 : false
                );

    }
    /**
	 * Initializes the connection to the MongoDB
	 *
	 * Will attempt to mongo database specified in configuration file if it does in fact exist.
	 * Otherwise, it will attempt to connect with defaults.
	 *
	 * @link http://us.php.net/manual/en/mongo.connecting.php
	 * @see cecilia\core.StorageAdapter::init()
	 */
    public function init($type)
    {
        if (!class_exists('Mongo')) {
            throw new CeciliaError('MongoDB Extension Not Installed!');
        }

        $this->type=$type;
        $this->_user = ( CECILIA_STORAGE_MONGO_USER!='' ? CECILIA_STORAGE_MONGO_USER : false );
        $this->_pass = ( CECILIA_STORAGE_MONGO_PASS!='' ? CECILIA_STORAGE_MONGO_PASS : false );
        $this->_host = ( CECILIA_STORAGE_MONGO_HOST!='' ? CECILIA_STORAGE_MONGO_HOST : $this->_host );
        $this->_port = ( CECILIA_STORAGE_MONGO_PORT!='' ? CECILIA_STORAGE_MONGO_PORT : $this->_port );
        $this->_collection = ( CECILIA_STORAGE_MONGO_COLLECTION!='' ? CECILIA_STORAGE_MONGO_COLLECTION : $this->_collection );
        $this->_db = ( CECILIA_STORAGE_MONGO_NAME!='' ? CECILIA_STORAGE_MONGO_NAME : $this->_db );

        if ($this->_user !== FALSE && $this->_pass !== FALSE) {
            $connection_string = 'mongodb://'.$this->_user . ":" . $this->_pass.'@'.$this->_host;

        } else {
            $connection_string = $this->_host.':'.$this->_port;
        }
        try {
            $this->_conn = ( $this->_persist!==false
                            ? new \Mongo($connection_string)
                            : new \Mongo($connection_string,array('persist'=>'x'))
                            );
            $db = $this->_conn->$this->_db;
            $this->_coll = $this->_conn->$this->_collection;
        } catch (\MongoConnectionException $e) {
            throw new CeciliaError('Mongo Connection Failed: ' . $e->getMessage() . ' | Code: ' . $e->getCode());
        }

    }
}
