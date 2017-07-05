<?php
$conn = null;
try{
	//db연결 connection객체 반환
	$conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','hr','hr');
	//connection객체에 에러 메시지 사용설정
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//connection 객체에 프리페어드 객체 사용허용
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e){
	print $e->getMessage();
}
?>