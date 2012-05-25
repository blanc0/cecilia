<?php
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	require_once 'cecilia.bootstrap.php';
	$c = new \cecilia\core\Cecilia();
	
	$results = $c->search('doom',['type'=>'artist','filter'=>'popularity:desc']);
	var_dump($results);
	foreach($results->cursor as $k=>$v){
		echo $k .  ' | ' . $v."<hr/>";
		//each item should have the following:
		// type:
		// data: 
	}
	
	
	
/* 	$playlist = $c->get_playlist('uri');
	
	$track = $c->get_track('uri');
	
	$artist = $c->get_artist('uri');
	
	$album = $c->get_album('');
	 */
	
	
	
	