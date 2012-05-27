<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	require_once 'build/cecilia.phar';
	$c = new cecilia\core\Cecilia();
	
	$results = $c->search('sand',['type'=>'track','page'=>44]);
	var_dump($results);
	
	
	
/* 	$playlist = $c->get_playlist('uri');
	
	$track = $c->get_track('uri');
	
	$artist = $c->get_artist('uri');
	
	$album = $c->get_album('');
	 */
	
	
	// get_all_albums();
	
	// get_all_tracks();
	
	
?>
