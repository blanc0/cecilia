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

class Response
{
    public $success;

    public $pager;

    public $data;

    public $message;

    public function __construct($success,$data,$pager=null,$message='')
    {
        $this->success=$success;
        $this->data=$data;
        $this->pager=$pager;
        $this->message=$message;
    }

}
