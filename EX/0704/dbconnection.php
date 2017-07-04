<?php
require_once 'testdao.php';
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

$emp = new emp($_POST['empid'],$_POST['name'],$_POST['deptid']);


//sql문장 작성
$sql = "insert into emp values(".$emp->getEmpId().",'".$emp->getName()."',".$emp->getDeptId().", 1)";
//sql문장 실행
$conn->exec($sql);
//연결끊음
$conn = null;


?>