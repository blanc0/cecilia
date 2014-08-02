<?php
namespace cecilia\core;
/**
 *
 * The Constants for Cecilia
 *
 * Just a class with constants for use throughtout the application.
 *
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 *
 */
class Constants
{
    /**
	 * @var unknown_type
	 * options: 0 = disabled, 1 = enabled
	 */
    const STORAGE_ENABLED=1;

    const STORAGE_DRIVER="Memcache";

    const STORAGE_TTL=48600;
    /**
	 * The max number of seconds for a round-trip HTTP request to execute.
	 * @var int
	 */
    const HTTP_TIMEOUT=1;

    /**
	 * The max number of results per page.
	 * @var int
	 */
    const PAGER_MAX_PER_PAGE=CECILIA_PAGER_MAX_PER_PAGE;

    /**
	 * The max number of pages.
	 * @var int
	 */
    const PAGER_MAX_PAGES=CECILIA_PAGER_MAX_PAGES;

    /**
	 * The max number of items for the internal spotify pager
	 * @var int
	 */
    const PAGER_MAX_ITEMS=CECILIA_PAGER_MAX_ITEMS;

    /**
	 * The 2-letter country code used to check availability.
	 * @see cecilia\util\CountryMappings
	 * @var string
	 */
    const COUNTRY_CODE="US";

    /**
	 * @var int CECILICA_DETAILED_INFO Should we use only the extended info methods when using the lookup API?
	 * @see
	 */
    const DETAILED_INFO=true;

    /**
	 * @var unknown_type
	 */
    const SPOTIFY_RESULTS_PER_PAGE=100;

    const CUSTOM_PLAYLIST_MAX_TRACKS=10;

    const SEARCH_DEFAULT='track';

    const DEFAULT_TRACKSET_TITLE="Playlist by Cecilia...";

    /*******************************************************************************
	 * CECILIA STORAGE CONFIGURATION (ENABLED BY DEFAULT) -
	*
	* Should be used for high-traffic websites in order to prevent exceeding rate-limits
	*
	*******************************************************************************/

}
