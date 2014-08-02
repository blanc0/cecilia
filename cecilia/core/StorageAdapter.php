<?php
namespace cecilia\core;

/**
 *
 * @author blanc0
 *
 */
interface StorageAdapter
{
    public function __construct();

    public function init($type);

    public function get($key);

    public function set($key,$value);

    public function remove($key);

//	function update($key,$value);
}
