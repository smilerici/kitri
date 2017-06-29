<?php
$data = array("A","B","C","D","E");
/* print implode(',', $data)."<br>"; */
/*  $result = array_slice($data, 0,4);
//A,B,C,D 를 꺼내 $result에 저장

print implode(',', $result).'<br>'; 
$result = array_slice($data, -3,1);
//C를 꺼냅니다.
print implode(',', $result).'<br>'; */

$result = array_slice($data, 2, -2);
print implode(',', $result).'<br>';

/* $result = array_slice($data, 2);
print implode(',', $result).'<br>'; */



?>