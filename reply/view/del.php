<?php
$str = "false";
if($this->data){
	$str = "true";
}
print '{"flag":"'.$str.'", "num":'.$this->num.'}';
?>