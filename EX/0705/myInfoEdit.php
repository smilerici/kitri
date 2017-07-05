<?php
require_once 'dbconnect.php';
session_start();
$id=$_SESSION['id'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$email = $_POST['email'];
$hobby=array();
$hobby = explode(",",$_POST['hobby']);
$msg=$_POST['msg'];

$sql = "update member set pwd='".$pwd."', name='".$name."', email='".$email."', 
	hobby='".$hobby."', msg='".$msg."'";

$conn->exec($sql);
$conn=null;
header("Location:main.php");
?>
