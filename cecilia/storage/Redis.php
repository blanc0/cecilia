<?php
namespace cecilia\storage;

use cecilia\core\CeciliaError,
    cecilia\core\Constants,
    cecilia\core\StorageAdapter;

/**
 *
 * The Redis StorageAdapter for Cecilia
 *
 * Stores API Results into the Redis Database.
 *
 * Long Desc
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\storage
 * @package cecilia
 * @subpackage storage
 *
 * @uses Redis
 * @link https://github.com/nicolasff/phpredis
 * @link http://redis.io
 *
 */
class Redis implements StorageAdapter
{
    /**
	 * The Redis Connection
	 * @var resource
	 */
    private $_conn;
    /**
	 * The Prefix for the cache key, prepended to all keys passed in.
	 * ex: cecilia_artist_
	 * @var string
	 */
    private $prefix;
    /**
	 * Closes the connection oto the Redis Server.
	 */

    public $type;

    public function __destruct()
    {
        if ($this->_conn!==FALSE) {
            $this->_conn->close();
        }
    }
    /**
	 * Removes the item from the Redis server.
	 * @see cecilia\core.StorageAdapter::remove()
	 */
    public function remove($key)
    {
        return(
                $this->_conn->delete($this->prefix.$key)
                ? true
                : false
        );
    }
    /**
	 * Fetches the data associated with the key passed from the Redis server.
	 * @see cecilia\core.StorageAdapter::get()
	 */
    public function get($key)
    {
        $data = $this->_conn->get($this->prefix.$key);

        return (
                $data
                ? $data
                : false
                );
    }
    /**
	 * Stores data as key in Redis server.
	 * @see cecilia\core.StorageAdapter::set()
	 */
    public function set($key, $value)
    {
        return(
                $this->_conn->set($this->prefix.$key,$value)
                ? true
                : false
                );

    }
    /**
	 * Sets prefix and type.
	 * @param string $type
	 */
    public function __construct()
    {
    }
    /**
	 * Initializes the connection to the Redis Database.
	 *
	 * @see cecilia\core.StorageAdapter::init()
	 */
    public function init($type)
    {
        if (!class_exists('Redis')) {
            throw new CeciliaError('The Redis PHP Extension is not Installed!');
        }
        $this->type=$type;
        $this->prefix = CECILIA_STORAGE_REDIS_PREFIX . $this->type.'_';
        $this->type=$type;

        if (CECILIA_STORAGE_REDIS_SOCKET) {
            $this->_conn = new Redis(CECILIA_STORAGE_REDIS_SOCKET);
        } else {
            $this->_conn = new Redis(CECILIA_STORAGE_REDIS_HOST,CECILIA_STORAGE_REDIS_PORT);
        }

        if (!$this->_conn) {
            throw new CeciliaError('Could not Connect to the Redis Server at: ' . (CECILIA_STORAGE_REDIS_SOCKET ? CECILIA_STORAGE_REDIS_SOCKET : CECILIA_STORAGE_REDIS_HOST . ' port: ' . CECILIA_STORAGE_REDIS_PORT));
        }

        return true;
    }
}
