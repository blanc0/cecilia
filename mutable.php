<?php 

function mutable(/* mutable */){
	$args  = func_get_args();
	var_dump($args);
	//if(is_array($args)){echo "array";}else{echo "not";}	
}


mutable([1,2,3]);

echo "<hr />";

mutable("a");

?>