<?php
namespace cecilia\model;

class Response {
	public $cursor;
	public $data;
	public $success;
	function __construct($data){
		$data = json_decode($data);
		$this->cursor = new \cecilia\core\Cursor($data->info);
		
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