<?php
$string = '<a href="http://www.namgrambooks.co.kr/">남가람북스</a>';
$result = htmlspecialchars($string,ENT_QUOTES);
print $result;
?>