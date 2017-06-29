<?php
$sales = array("TV2"=>"1000","TV1"=>"500","RADIO1"=>"800");
asort($sales);
print "<PRE>";
print_r($sales);
print "</PRE>";

arsort($sales);
print "<PRE>";
print_r($sales);
print "</PRE>";

ksort($sales);
print "<PRE>";
print_r($sales);
print "</PRE>";

krsort($sales);
print "<PRE>";
print_r($sales);
print "</PRE>";


?>