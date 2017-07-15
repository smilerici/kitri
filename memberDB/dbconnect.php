<?php
$conn = null;
try {
	$conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8',
			'hr', 'hr');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch (PDOException $e){
	print $e->getMessage();
}
?>