<?php
function fact($x){
	if($x==1){
		return 1;
	} else{
		return $x*fact($x-1);
	}
}

$sum = print fact(4);
?>