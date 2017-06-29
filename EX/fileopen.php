<?php
$fp = fopen("test.txt","r");//읽기모드
$str = fread($fp,50);//읽어(포인터,크기)
print $str;
fclose($fp);
$fp = fopen("test2.txt","w");//쓰기모드
fwrite($fp, $str);
fclose($fp);
?>