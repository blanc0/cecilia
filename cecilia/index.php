<?php

	$c = new \cecilia\core\Cecilia();
	
	$c->get();
	
	$results = $c->search('someone',CECILIA_SEARCH_ALL);
	
	foreach($results as $item){
		//each item should have the following:
		// type:
		// data: 
	}
	
	
/*	$playlist = $c->get_playlist('uri');
	
	$track = $c->get_track('uri');
	
	$artist = $c->get_artist('uri');
	
	$album = $c->get_album('');
*/
	
	
	
	
	