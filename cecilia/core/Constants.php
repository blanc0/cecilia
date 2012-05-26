<?php
namespace cecilia\core;

class Constants {
	/**
	 * @var int HTTP_TIMEOUT the max number of seconds for a round-trip HTTP request to execute.
	 */
	const HTTP_TIMEOUT=1;
	
	/**
	 * The max number of results per page.
	 */
	const PAGER_MAX_PER_PAGE=CECILIA_PAGER_MAX_PER_PAGE;
	
	/**
	 * 
	 */
	const PAGER_MAX_PAGES=CECILIA_PAGER_MAX_PAGES;
	
	/**
	 * 
	 * @var int
	 */
	const PAGER_MAX_ITEMS=CECILIA_PAGER_MAX_ITEMS;
	
	
	const COUNTRY_CODE="US";
	
	
	/**
	 * @var int CECILICA_DETAILED_INFO Should we use only the extended info methods when using the lookup API?
	 * @see
	 */
	const DETAILED_INFO=true;
	
	
	const SEARCH_DEFAULT='track';
	
	/*******************************************************************************
	 * CECILIA STORAGE CONFIGURATION (ENABLED BY DEFAULT) -
	*
	* Should be used for high-traffic websites in order to prevent exceeding rate-limits
	*
	*******************************************************************************/
	
	
	const DEFAULT_TRACKSET_TITLE="Playlist by Cecilia...";
	
	/**
	 * @var unknown_type
	 * options: 0 = disabled, 1 = enabled
	 */
	const STORAGE_ENABLED=1;
	
	const STORAGE_DRIVER="file";
	
	const STORAGE_TTL=48600;
	
}

?>