<?php
namespace cecilia\core;

/**
 *
 * @author blanc0
 *        
 */
class Cecilia {
	/**
	 * @var boolean $_use_curl  Use cURL by default - if cURL does not exist, will use stream_get_contents() instead.
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
	 * @var string $_SPOTIFY_API_ENDPOINT The Spotify 
	 */
	public static $_SPOTIFY_LOOKUP_ENDPOINT='http://ws.spotify.com/lookup/1/.json';
	
	
	public static $_SPOTIFY_SEARCH_ENDPOINT='http://ws.spotify.com/search/1/';
	
	
	public static $_SPOTIFY_SEARCH_METHODS=array('artist'=>'artist.json','album'=>'album.json','track'=>'track.json');
	
	/**
	 *
	 */
	function __construct(){
		// check to make sure cURL extension is enabled.
		if(!function_exists('curl_init')){
			$this->_use_curl=false;
		}
	}
	
	
	private function _make_call($query){
		if(defined('CECLIA_CACHE_ENABLED') && CECLIA_CACHE_ENABLED==1){
			$rs = CeciliaCache::get();
		}
	}
	
	
	/**
	 * @param string $query
	 * @param array $options
	 * 
	 * 
	 * http://ws.spotify.com/search/1/album.json?q=astronautalis
	 * http://ws.spotify.com/search/1/track.json?q=contrails
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
		
		$response = $this->_search();
		
		$data = new \cecilia\model\Response($response);
		
		if($data->cursor->has_next){
			
			$threshold = ($data->cursor->total < CECILIA_PAGER_MAX_ITEMS ? $data->cursor->total : CECILIA_PAGER_MAX_ITEMS );
			
			$offset = 100;
			$i=0;
			$tmp_array = array();
			
			while($offset < $threshold){
				echo $offset . ' \ ' . $threshold.'<hr/>';
				if($i==0){

					$p = $data->cursor->page+1;
					$this->query_string = '?q='.json_encode($query) . '&page='.$p;
					$offset = 100;
					$page=3;
					
				}else{
					
					$this->query_string = '?q='.json_encode($query) . '&page='.$page;
					$offset = ($page*100);
					$page++;
					
				}
				
				$tmp = new \cecilia\model\Response($this->_search());
				$tmp_data = $tmp->data;
				$tmp_array=array_merge($tmp_data,$tmp_array);
				
				$i++;
				
			
			}	
			
			
		}
		
		$data->data = array_merge($data->data,$tmp_array);
		
		
		// now, we have the first page of results.  from this we can move forward with putting together the aggregated result set for caching.
		
		
		
		if(isset($options['filter'])){
			
			$filter = $options['filter'];
			$filters = explode(':',$filter);
			
			switch($filter){
				case 'alpha:desc':
				case 'alpha:asc':
				case 'popularity:asc':
				case 'popularity:desc':
					usort($data->data,function($a,$b) use ($filters) {
						switch($filters[0]){
							case "popularity":
								if($filters[1]=='asc'){
									return ($a->popularity > $b->popularity ? 1 : -1);
								}else{
									return ($a->popularity < $b->popularity ? 1 : -1);
								}
								
								break;
						}
					});
					break;																	
				default:
					throw new \Exception('You Must Pass a Valid Filter!');
			}
			
			$it = new ResponseIterator($data->data);
			$filtered = new ResponseFilterIterator($it);
			return $data;
		}
	
	}
	
	public function lookup(){
		$this->base_uri=self::$_SPOTIFY_LOOKUP_ENDPOINT;
	}
	
	public function filter(){}
	
	
	private function _lookup(){}
	
	private function _search(){
		if($this->_use_curl===true){
			$this->_curl = curl_init();
			curl_setopt($this->_curl,CURLOPT_URL,$this->base_uri.$this->query_string);
			curl_setopt($this->_curl,CURLOPT_CONNECTTIMEOUT,CECILIA_HTTP_TIMEOUT);
			curl_setopt($this->_curl, CURLOPT_HEADER, 1);
			curl_setopt($this->_curl,CURLOPT_RETURNTRANSFER,1);
			$response = curl_exec($this->_curl);
			
			if(!curl_errno($this->_curl)){
				
				list($headers, $content) = explode("\r\n\r\n", $response, 2);
				
				var_dump($headers);
				
				$info = curl_getinfo($this->_curl);
				$status_code = $info['http_code'];
			}else{
				$status_code = curl_errno($this->_curl);
			}
			var_dump($status_code);
		}else{
			$response = file_get_contents($this->base_uri.$this->query_string);
		}
		return $response;
	}
	
}