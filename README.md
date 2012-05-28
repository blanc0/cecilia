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
	
	require_once('/path/to/cecilia/cecilia.phar');
	
	$albums = (new Cecilia)->search('doom',['type'=>'album']);
	
	
	//Play Example.
	
	$play = (new Cecilia)->play('spotify:artist:23423423423',['theme'=>'light','size'=>640]);
	 

Responses  
 - Cecilia Adds Additional Response Information.
 - Below is an example of a Cecilia Response:
 	
		$albums = (new Cecilia)->search('doom',['type'=>'album']);
		var_dump($albums);
		
		{"success":1,
		 "data":[
		 	{
		 		"name":"album name",
		 		"popularity":0.5,
		 		"href":"spotify:album:fjsdjof490jf49",
		 		...
		 	},
		 	...
		 ],
		 "pager":{
		 	"has_next":true,
		 	"has_prev":false,
		 	"total_pages":12,
		 	...
		 	
		 },
		 "message":""
		 }
 	
 - If `success` is `0`, we know something failed and we should get the error in the `message` field.

Cecilia also comes with a ready to use api layer that speaks json.  This only requires one minor update to your web server configuration.  
		
	nginx:  
	
	    server{
				  ...
				  rewrite ^/cecilia(.*)$ /path/to/cecilia/api.php?$1 break;		 
			      ...
		       }
	
	Apache:    
	    
	    RewriteRule ^cecilia/(.*)$ /path/to/cecilia/api.php/$1 [L]
		
	
Once Your Configuration is updated and webserver restarted, try calling one of the following URLs:  

	curl -0 http://yoursite.com/cecilia/search/doom?type=track&page=4&
	
	curl -0 http://yoursite.com/cecilia/lookup/doom?type=artist
	
	curl -0 http://yoursite.com/cecilia/play/spotify:track:unr4nr348n?t=white&h=720&w=300 


Response Caching / Storage



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
