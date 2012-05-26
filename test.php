<?php
error_reporting('E_ALL');
ini_set('display_errors','On');
	abstract class a{
		public static $_test='yes';
		abstract function test($a);
		private function a(){
			echo "a called!";
		}
	}
	
	class b extends a{
		function test($a){
			parent::a();
		}
		
		
	}
	
	$b = new b;
	$b->test();