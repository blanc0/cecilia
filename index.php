<?php
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	require_once 'cecilia/cecilia.bootstrap.php';
	$c = new cecilia\core\Cecilia();
	
	$results = $c->search('mf doom',['type'=>'artist','page'=>44]);
	var_dump($results);
	
	//$c->play('spotify:user:theblanc0:playlist:7mi74nC0yHshw3ZB8T4DOJ',['w'=>250,'h'=>640,'theme'=>'light']);
	
//	$c->play('spotify:track:3gpZMQJkS373g7Os0P9qRr',['w'=>240,'h'=>120]);
	
	
	
	
/* 	$playlist = $c->get_playlist('uri');
	
	$track = $c->get_track('uri');
	
	$artist = $c->get_artist('uri');
	
	$album = $c->get_album('');
	 */
	
	
	// get_all_albums();
	
	// get_all_tracks();
	
	
?>
