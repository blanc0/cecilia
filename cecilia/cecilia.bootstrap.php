<?php
/**	
 * 
 * 
 * 
 * 
 * 
 */

/*******************************************************************************
 * CECILA GLOBAL CONFIGURATION 
*******************************************************************************/


/**
 * @var string CECILIA_DS The Directory Seperator Constant.
 */
define ("CECILIA_DS",DIRECTORY_SEPERATOR);
/**
 * @var string CECILIA_BASE_PATH The base path of the library.
 */
define("CECILIA_BASE_PATH",dir(__FILE__).CECILIA_DS);


define("CECILIA_HTTP_TIMEOUT",1);

/*******************************************************************************
 * CECILIA CACHING CONFIGURATION (DISABLED BY DEFAULT) - 
 * 
 * Should be used for high-traffic websites in order to prevent exceeding rate-limits
 * 
 *******************************************************************************/
/**
 * @var unknown_type
 * options: 0 = disabled, 1 = enabled
 */
define("CECILIA_CACHE_ENABLED",0);
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

