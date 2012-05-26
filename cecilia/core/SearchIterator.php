<?php
namespace cecilia\core;

class SearchIterator extends \ArrayIterator{
	private $_sort_by='natural';
	
	private static $_SORT_METHODS=array(
			'natural'=>'natural',
			'length'=>'',
			'popularity'=>'',
			'alpha'=>''
	);
}