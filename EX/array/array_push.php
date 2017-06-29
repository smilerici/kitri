<?php
$data = array("사과","귤","감");
array_push($data, "없음","수박");
print "<pre>";
print_r($data);
print "</pre>";

$kaki = array_pop($data);
print "<pre>";
print_r($data);
print "</pre>";
print $kaki;

?>