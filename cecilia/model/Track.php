<?php
namespace cecilia\model;
/**
 * 
 * 
 * {
	album: {
		released: "2011",
		href: "spotify:album:3nQpe4V5rvpPtGFTi7YOrV",
		name: "This Is Our Science",
		availability: {
			territories: "worldwide"
		}
	},
	name: "Contrails (feat. Tegan Quin)",
	popularity: "0.40011",
	external-ids: [
		{
			type: "isrc",
			id: "QMYFP1100065"
		}
	],
	length: 178,
	href: "spotify:track:390gABOSoevIo2J9g9JAWw",
	artists: [
		{
			href: "spotify:artist:6PWRJs1FosHp8Cqx0Nmswj",
			name: "Astronautalis"
		}
	],
	track-number: "7"
	}
 * 
 * 
 * 
 */
class Track extends \cecilia\core\Model{
	private $_type='track';
	
	function __construct(){
		
	}
	
	
	/**
	 * @param int $length the length of the track.
	 */
	private function _get_track_length($length){
		(int)$length;
		return (strlen()>0 ? $length / 60 :  0);
		
	}
}