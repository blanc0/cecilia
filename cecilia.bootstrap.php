<?php
/*******************************************************************************
 * CECILA GLOBAL CONFIGURATION 
*******************************************************************************/


/**
 * @var string CECILIA_DS The Directory Seperator Constant.
 */
define ("CECILIA_DS",DIRECTORY_SEPARATOR);
/**
 * @var string CECILIA_BASE_PATH The base path of the library.
 */
define("CECILIA_BASE_PATH",dirname(__FILE__).CECILIA_DS);

/**
 * @var unknown_type
 */
define("CECILIA_HTTP_TIMEOUT",1);

/**
 * @var unknown_type
 */
define("CECILIA_USE_AGGREGATOR",1);

/**
 * @var unknown_type
 */
define("CECILIA_PAGER_MAX_PER_PAGE",100);

/**
 * 
 */
define("CECILIA_PAGER_MAX_PAGES",5);

/**
 * @var unknown_type
 */
define("CECILIA_PAGER_MAX_ITEMS",CECILIA_PAGER_MAX_PAGES*CECILIA_PAGER_MAX_PER_PAGE);

define("CECILIA_SEARCH_ALL","all");

define("CECILIA_SEARCH_ARTIST","artist");


/*******************************************************************************
 * CECILIA STORAGE CONFIGURATION (DISABLED BY DEFAULT) - 
 * 
 * Should be used for high-traffic websites in order to prevent exceeding rate-limits
 * 
 *******************************************************************************/

/**
 * @var unknown_type
 * options: 0 = disabled, 1 = enabled
 */
define("CECILIA_STORAGE_ENABLED",0);

define("CECILIA_STORAGE_DRIVER","mongodb");

define("CECILIA_STORAGE_TTL",48600);


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