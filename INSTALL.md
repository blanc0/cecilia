Installation
=========


Composer
---------
You'll need to check out [Composer](http://getcomposer.org/) if you have never used it before.  

To Install the Latest Version:  

	{
		"require":{"blanc0/cecilia":"master-dev"
	}


PHAR
---------
You can either create your own .phar archive by running the bundled build_phar.php, then simply include it to your project:  
	
	require '/path/to/cecilia.phar';


Bootstrap
---------
You can alternatively require just the Cecilia bootstrap file as follows:  
	
	require '/path/to/cecilia.bootstrap.php';



Configuration
=============




Storage
=============

Cecilia provides a robust storage interface to allow for caching of responses. See [Spotify ]


APC
------

Requires the [APC](http://php.net/manual/en/book.apc.php) Extension

Memcache
--------

Requires the [Memcache](http://php.net/manual/en/book.memcache.php) Extension and [memcached server](http://memcached.org/)

XCache
-------

Requires the [xcache](xcache.lighttpd.net) PHP Extension


WinCache
-------

Requires the [WinCache](http://www.php.net/manual/en/book.wincache.php) PHP Extension

Redis
------

Requires the [Redis](https://github.com/nicolasff/phpredis) PHP Extension and [Redis Server](http://redis.io)

