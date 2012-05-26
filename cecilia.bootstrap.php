<?php
/*******************************************************************************
 * CECILA GLOBAL CONFIGURATION 
*******************************************************************************/
date_default_timezone_set('GMT');
// 1 enabled, 0 disabled.
define("CECILIA_DEBUG_MODE",FALSE);


// 1 enabled, 0 disabled.
define("CECILIA_LOGGING_ENABLED",FALSE);
// first, call the init() function to ensure that we have all required components.

/**
 * CECILIA_DS The Directory Seperator Constant.
 */
define ("CECILIA_DS",DIRECTORY_SEPARATOR);

/**
 * The base path of the library.
 */
define("CECILIA_BASE_PATH",dirname(__FILE__).CECILIA_DS);

/**
 *
 */
define("CECILIA_PAGER_MAX_PER_PAGE",100);

/**
 * 
 */
define("CECILIA_PAGER_MAX_PAGES",3);


/**
 * 
 */
define("CECILIA_PAGER_MAX_ITEMS",CECILIA_PAGER_MAX_PAGES*CECILIA_PAGER_MAX_PER_PAGE);


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