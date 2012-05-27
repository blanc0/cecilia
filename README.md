Cecilia
========

What?
-------
Cecilia is a php library for interacting with the Spotify Web API.   

why?
-------
Because this.

how?
------

Example Usage:  


	// Search Example.
	
	require_once('/path/to/cecilia/cecilia.bootstrap.php');
	use \cecilia\core\Cecilia;
	
	$cecilia = new Cecilia();
	
	$albums = $cecilia->search('doom',array('type'=>'album');
	
	//or, if you are using php5.4
	$albums = (new Cecilia)->search('doom',['type'=>'album']);
	
	
	
	
	$play = (new Cecilia)->play('spotify:artist:23423423423',['theme'=>'light','size'=>640]);
	// returns an iframe with the 
	
	
Cecilia also comes with a ready to use api layer that speaks json.  This only requires one minor update to your web server configuration.

	curl -0 http://yoursite.com/cecilia/search/doom?&type=artist&page=4&
	
	curl -0 http://yoursite.com/cecilia/lookup/doom
	
	curl -0 http://yoursite.com/cecilia/play/spotify:track:unr4nr348n
	
	
nginx:  

    server{
			
			  ...
			 
			  rewrite ^/cecilia(.*)$ /path/to/cecilia/cecilia.php?$1 break;
			 
		      ...
	       }


  
Apache:    
    
    RewriteRule ^cecilia/(.*)$ /path/to/cecilia/cecilia.php/$1 [L]
	
	
	

	
References  
----------

Developer Site  
https://developer.spotify.com/  

Developer Web API Docs  
https://developer.spotify.com/technologies/web-api/  

Play Button Docs  
https://developer.spotify.com/technologies/spotify-play-button/documentation  

Linking to Spotify  
http://www.spotify.com/us/blog/archives/2008/01/14/linking-to-spotify/  
