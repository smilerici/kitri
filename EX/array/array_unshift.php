<?php
$data = array("사과","귤","감");
array_unshift($data, "파ㅣ파야","키위");
print "<pre>";
print_r($data);
print "</pre>";

$apple=array_shift($data);
print "<pre>";
print_r($data);
print "</pre>";
print $apple;

?>