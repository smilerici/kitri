<?php
$empid = $_POST['empid'];
$name = $_POST['name'];
$deptid = $_POST['deptid'];
$mng = $_POST['mng'];

try{
	$conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','hr','hr');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e){
	print $e->getMessage();
}

$sql = "update emp set deptid='".$deptid."', mng='".$mng."' where empid='".$empid."'";

$conn->exec($sql);
$conn = null;
header("Location:list.php");
?>