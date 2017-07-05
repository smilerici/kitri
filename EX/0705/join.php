<?php
require_once 'dbconnect.php';

$hobby = array();
$h = null;
$id = $_POST['id'];
$pwd = $_POST['pwd'];
$name= $_POST['name'];
$email = $_POST['email'];
$hobby = implode(",",$_POST['hobby']);
$msg = "";
if(isset($_POST['msg'])){
	$msg = $_POST['msg'];
}

//sql문장 작성
$sql = "insert into member values('".$id."', '".$pwd."', '".$name."', '".$email."', '".$hobby."', '".$msg."')";
//sql문장 실행
$conn->exec($sql);
//연결끊음
$conn = null;