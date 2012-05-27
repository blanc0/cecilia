<?php

if(!date_default_timezone_get()){
	date_default_timezone_set('GMT');
}



/*******************************************************************************
 * CECILA GLOBAL CONFIGURATION 
*******************************************************************************/

// 1 enabled, 0 disabled.
define("CECILIA_DEBUG_MODE",FALSE);


// 1 enabled, 0 disabled.
define("CECILIA_LOGGING_ENABLED",FALSE);
// first, call the init() function to ensure that we have all required components.

/**
 *  The Directory Seperator Constant.
 *  @var string
 */
define ("CECILIA_DS",DIRECTORY_SEPARATOR);

/**
 *  The Base Path of the Library
 *  @var string
 */
define("CECILIA_BASE_PATH",dirname(__FILE__).CECILIA_DS);



/******************************************************************
 * PAGER
 ******************************************************************/

/**
 * The Max Results Per Page
 *  @var int
 */
define("CECILIA_PAGER_MAX_PER_PAGE",100);

/**
 *  The Max Pages Per Request
 *  @var int
 */
define("CECILIA_PAGER_MAX_PAGES",3);

/**
 *  The Max Items calculated by max pages and total per page.
 *  @var int
 */
define("CECILIA_PAGER_MAX_ITEMS",CECILIA_PAGER_MAX_PAGES*CECILIA_PAGER_MAX_PER_PAGE);



/******************************************************************
 * PLAYER
******************************************************************/


/**
 *  The Default Player Height
 *  @var int
 */
define("U_PLAYER_HEIGHT",240);
/**
 *  The Default Player Width
 *  @var int
 */
define("U_PLAYER_WIDTH",240);
/**
 *  The Default Player Max Height
 *  @var string
 */
define("U_PLAYER_HEIGHT_MAX",240);





/******************************************************************
 * CECILIA STORAGE - MONGO
******************************************************************/
/**
 * The Mongo User
 * @var string
 */
define("CECILIA_STORAGE_MONGO_USER","");
/**
 * The Mongo Pass
 * @var string
 */
define("CECILIA_STORAGE_MONGO_PASS","");
/**
 * The Mongo Host
 * @var int
 */
define("CECILIA_STORAGE_MONGO_HOST","localhost");
/**
 * The Mongo Port
 * @var int
 */
define("CECILIA_STORAGE_MONGO_PORT",11211);
/**
 * The Mongo DB Name
 * @var string
 */
define("CECILIA_STORAGE_MONGO_NAME","myapp");
/**
 * The Mongo Collection Prefix
 * @var string
 */
define("CECILIA_STORAGE_MONGO_COLLECTION","cecilia");



/******************************************************************
 * CECILIA STORAGE - MEMCACHE
******************************************************************/
/**
 * The Memcache Host
 * @var string
 */
define("CECILIA_STORAGE_MEMCACHE_HOST","localhost");
/**
 * The Memcache Port
 * @var int
 */
define("CECILIA_STORAGE_MEMCACHE_PORT",11211);


/************************************************************************************
 * CECILIA AUTOLOADER 
 **********************************************************************************/


spl_autoload_register(null,false);

function cecilia_autoload($className){
	if(!class_exists($className)):
		if(!file_exists(CECILIA_BASE_PATH.str_replace("\\","/",$className).'.php')):
			return false;
		endif;
	require_once CECILIA_BASE_PATH.str_replace("\\","/",$className).'.php';
	endif;
}

spl_autoload_register('cecilia_autoload');