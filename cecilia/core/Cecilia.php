<?php
namespace cecilia\core;
/**
 *
 * The Cecilia Class.
 * 
 * This class is the only class that actually needs to be instantiated by the application.
 * The autoloader included will handle including all of the required classes while executing a routine.
 * 
 * Here are some examples of how to call Cecilia.  Additional examples are available in the examples folder that comes with this package.
 * <code>
 * 
 * // A simple search....
 * 
 * // php 5.3.x and lower
 * $c = new Cecilia();
 * $grateful_dead_albums = $c->search('grateful dead',array('type'=>'album'));
 * 
 * // php 5.4+
 * $grateful_dead_albums = (new Cecilia)->search('grateful dead',['type'=>'album']);
 * 
 * 
 * // A complex search...
 * 
 * // php 5.4+
 * $grateful_dead_albums = (new Cecilia)->search('grateful dead',['type'=>'album','filter'=>'before:2003','page'=>2]);
 * 
 * 
 * 
 * </code>
 * 
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\core
 * @package cecilia
 * @subpackage core
 * @see 	https://developer.spotify.com/technologies/web-api/
 *
 */
use cecilia\model\Pager;

use cecilia\model\SpotifyURI;

use cecilia\model\Response;

class Cecilia {
	/**
	 * @type boolean
	 */
	private $_use_curl=true;

	/**
	 * @var unknown_type
	 */
	public $base_uri;
	
	/**
	 * @var unknown_type
	 */
	public $query_string;
	
	/**
	 * @var unknown_type
	 */
	private $_curl;
	
	
	/**
	 * @var string $_SPOTIFY_API_ENDPOINT The Spotify Enpoint for the Lookup Method
	 */
	public static $_SPOTIFY_LOOKUP_ENDPOINT='http://ws.spotify.com/lookup/1/.json';
	
	/**
	 * @var string $_SPOTIFY_API_ENDPOINT The Spotify Enpoint for the Search Method
	 */	
	public static $_SPOTIFY_SEARCH_ENDPOINT='http://ws.spotify.com/search/1/';
	
	
	public static $_SPOTIFY_SEARCH_METHODS=array('artist'=>'artist.json','album'=>'album.json','track'=>'track.json');
	
	/**
	 *
	 */
	function __construct(){
		// check to make sure cURL extension is enabled.
		if(!function_exists('curl_init')){
			throw new CeciliaError('An installation of the cURL extension does not exist! Please install cURL in PHP before using Cecilia');
		}
	}
	
	
	
	/**
	 * The main method for calling the search method in the spotify web API.
	 * @param string $query
	 * @param array $options
	 * @link https://developer.spotify.com/technologies/web-api/search/
	 * 
	 * 
	 */
	function search($query,$options){
		
		if($query==''){
			throw new \Exception;
		}
		
		if(!array_key_exists($options['type'], self::$_SPOTIFY_SEARCH_METHODS)){
			// TODO: error
		}
		
		// TODO ex: 
		 
		$this->base_uri = self::$_SPOTIFY_SEARCH_ENDPOINT.strtolower($options['type']).'.json';
		// if page is set, add that as an additional parameter
		$this->query_string = '?q='.json_encode($query) .	(isset($options['page']) ? '&page='.$options['page'] : '' );
		
		$response = $this->_call_spotify_api();
		
		$data = new \cecilia\model\SpotifyResult($response);
		
		if($data->cursor->has_next){
			
			$threshold = ($data->cursor->total < CECILIA_PAGER_MAX_ITEMS ? $data->cursor->total : CECILIA_PAGER_MAX_ITEMS );
			
			$offset = 100;
			$i=0;
			$tmp_array = array();
			
			while($offset < $threshold){
				
				
				if($i==0){

					$p = $data->cursor->page+1;
					$this->query_string = '?q='.json_encode($query) . '&page='.$p;
					$offset = 200;
					$page=3;
					
				}else{
					
					if($offset < $threshold){
						
						$this->query_string = '?q='.json_encode($query) . '&page='.$page;
						$offset = ($page+100);
						$page++;
						
					}
					
				}
				
				$tmp = new \cecilia\model\SpotifyResult($this->_call_spotify_api());
				$tmp_data = $tmp->data;
				$tmp_array=array_merge($tmp_data,$tmp_array);
				
				$i++;
			}	
		}
		$data->data = array_merge($data->data,$tmp_array);
		// now, we have the first page of results.  from this we can move forward with putting together the aggregated result set for caching.
		
		$parsed=array();
		$class_name = '\cecilia\model\\' . ucfirst($data->type);
		foreach($data->data as $k=>$v){
			try{
				$parsed[]=new $class_name($v);
			}catch(\Exception $e){
				
			}
		}
		
		
		$it = new Iterator($parsed);
		
		// if the filter option is set, filter the result.
		$filtered = new Filter($it);
		
		$pager = new Pager($parsed);
		
		return new Response(1, $parsed, $pager);
	
	}
	
	
	/**
	 * Performs calls to the lookup method in the Spotify Web APIs
	 * @param string $uri
	 * @param array $options
	 * @link  https://developer.spotify.com/technologies/web-api/lookup/
	 */
	public function lookup($uri,$options){
		
		$uri_object = new SpotifyURI($uri);
		
		if($uri_object->is_valid){
			$q = '?uri='.$uri;
		}
		
		if(Constants::DETAILED_INFO){
			
			
			switch($uri_object->type){
				
				case 'artist':
					$q.='&extras=albumdetail';
					break;
					
				case 'album':
					$q.='&extras=trackdetail';
					break;
				
				//nothing extra to fetch
				case 'track':
				default:
					
					break;
			}
		}
		
		
		$this->query_string = $q;
		$data = $this->_call_spotify_api();
		
		$it = new Iterator($data);
		
		(isset($options['filter']) 
		 ? new Filter($it)
		 : null
		 );

		(isset($options['sort'])
		? $it->uasort(array($options['sort']))
		: null
		);
		
		
		return new Response(1, $data);
		
		// parse the lookup response.
		
	}
	
	
	/**
	 * Responds with a data parameter containing the HTML needed for creating the Spotify Play <iframe>.
	 * 
	 * 
	 * 
	 * @param string $uri
	 * @param unknown_type $player_options
	 * @return \cecilia\model\Response
	 * 
	 */
	function play($uri,$player_options=false){
		
		$uri = new SpotifyURI($uri);
		if(!$uri->is_valid){
			
		}
		
		// sanity check the uri;
		
		$player = new Player();
		$player_html = $player->get_player($uri, $player_options);
		
		return new Response(1, $player_html);
		
		
	}
	
	public function filter(){
		
	}
	
	
	private function _call_spotify_api(){
		
		
		$this->_curl = curl_init();
		
		curl_setopt($this->_curl,CURLOPT_URL,$this->base_uri.$this->query_string);
		curl_setopt($this->_curl,CURLOPT_CONNECTTIMEOUT,Constants::HTTP_TIMEOUT);
		curl_setopt($this->_curl, CURLOPT_HEADER, 1);
		curl_setopt($this->_curl,CURLOPT_HTTPHEADER,array('If-Modified-Since: ' . time() -  1000));
		curl_setopt($this->_curl,CURLOPT_RETURNTRANSFER,1);
		
		$response = curl_exec($this->_curl);
		if(!curl_errno($this->_curl)){
		
			list($headers, $content) = explode("\r\n\r\n", $response, 2);
		
			$this->_extract_headers($headers);
			$info = curl_getinfo($this->_curl);
			$this->status_code = $info['http_code'];
		}else{
			throw new CeciliaError('Error calling API: ' . $this->base_uri.$this->query_string);
		}

		//var_dump($response);
		return $content;		
	}
	
	public function batch(){}
	
	
	private function _extract_headers($headers){
		preg_match('/Expires: (.*)GMT/',$headers,$matches);
		
		($matches 
		 	 ? $this->expires=ltrim(rtrim($matches[1])) . ' GMT' 
			 : $this->expires=false
		);
		var_dump(strtotime($this->expires));
		return;
	}
	
	private function _set_query_string(){
			
	}
}