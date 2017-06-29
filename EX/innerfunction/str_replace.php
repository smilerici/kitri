<?php
$html = '<FONT 	size="3">hello!</FONT><BR>';
$search = 'size="3"';
print $html;
$replace ='size="5"';
$result = str_replace($search, $replace, $html);
print $result;
?>