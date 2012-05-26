<?php
namespace cecilia\model;

class Album extends \cecilia\core\Model{
	
	private $_type='album';
	
	public $artist_id;
	public $name;
	public $artist;
	public $external_ids;
	public $released;
	public $tracks=array();
	public $popularity;
	public $href;
	public $artists;
	
	function __construct($album){
		parent::__construct($album->album);
	}
	/**
	 * 
	 * {
			name: "Wasting Light",
			popularity: "0.81020",
			external-ids: [
				{
					type: "upc",
					id: "884977880991"
				}
			],
			href: "spotify:album:5lnQLEUiVDkLbFJHXHQu9m",
			artists: [
				{
					href: "spotify:artist:7jy3rLJdDQY21OgRLCZ9sD",
					name: "Foo Fighters"
				}
			],
			availability: {
				territories: "AD AE AF AG AI AL AM AN AO AQ AR AT AU AZ BA BB BD BE BF BG BH BI BJ BM BN BO BR BS BT BW BY BZ CA CD CF CG CH CI CK CL CM CN CO CR CU CV CY CZ DE DJ DK DM DO DZ EC EG EH ER ES ET FJ FK FM FO FR GA GB GD GE GF GH GI GL GM GN GP GQ GR GT GU GW GY HK HN HR HT HU ID IE IL IN IO IQ IR IS IT JM JO KE KG KH KI KM KN KP KR KW KY KZ LA LB LC LI LK LR LS LU LY MA MC MD ME MG MH MK ML MM MN MO MP MQ MR MS MT MU MV MW MX MY MZ NA NC NE NG NI NL NO NP NR NU NZ OM PA PE PF PG PH PK PL PM PN PR PS PT PW PY QA RE RO RS RU RW SA SB SC SD SG SH SI SK SL SM SN SO SR ST SV SY SZ TC TD TF TG TH TJ TK TL TM TN TO TR TT TV TW TZ UA UG US UY UZ VA VC VE VG VN VU WF WS YE YT ZA ZM ZW ZZ"
			}
		}
	 * 
	 * 
	 * 
	 * 
	 */
}