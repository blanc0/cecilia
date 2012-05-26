<?php
namespace cecilia\model;
/**
 * 
 * http://ws.spotify.com/lookup/1/.json?uri=spotify:album:6G9fHYDCoyEErUkHrFYfs4&extras=trackdetail
{
available: true,
track-number: "1",
popularity: "0.37271",
external-ids: [
{
type: "isrc",
id: "GBBKS9900090"
}
],
length: 345,
href: "spotify:track:3zBhJBEbDD4a4SO1EaEiBP",
artists: [
{
href: "spotify:artist:4YrKBkKSVeqDamzBPWVnSJ",
name: "Basement Jaxx"
}
],
disc-number: "1",
name: "Rendez-vu"
},
 * 
 * 
 * 
 */
class Track extends \cecilia\core\Model{
	
	private $_type='track';
	
	public $available;
	
	public $track_number;
	
	public $popularity;
	
	public $external_ids;
	
	public $length;
	
	public $href;
	
	public $artists;
	
	public $disc_number;
	
	public $name;
	
	function __construct($track){
		parent::_construct($track);
	}
	
	
	/**
	 * @param int $length the length of the track.
	 */
	private function _get_track_length($length){
		(int)$length;
		return (strlen()>0 ? $length / 60 :  0);
		
	}
}