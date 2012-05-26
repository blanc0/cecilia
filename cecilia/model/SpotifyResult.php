<?php
namespace cecilia\model;
/**
 *
 * Description Here
 *
 * @copyright 2012 Charlie Parks
 * @author  Charlie Parks <charlie@blanc0.net>
 * @namespace cecilia\model
 * @package cecilia
 * @subpackage model
 *
 */
class SpotifyResult {
	/**
	 * The Cecilia Internal Cursor.
	 * @type \cecilia\model\Cursor
	 */
	public $cursor;
	public $data;
	public $success;
	public $type;
	
	function __construct($data){
		$data = json_decode($data);
		$this->type = $data->info->type;
		$this->cursor = new \cecilia\model\Cursor($data->info);
		
		if($this->cursor->total<1){
			$this->success=0;
			$this->data=null;
		}else{
			$prop = $data->info->type . 's';
			$this->data = $data->$prop;
			$this->success=1;
		}
	}
}

?>