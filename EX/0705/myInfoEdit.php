<?php
require_once 'dbconnect.php';

$id=$_POST['id'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$hobby = implode(",",$_POST['hobby']);
$msg="";
if(isset($_POST['msg'])){	
$msg=$_POST['msg'];
}

$sql = "update member set pwd='".$pwd."', email='".$email."', 
	hobby='".$hobby."', msg='".$msg."' where id='".$id."'";
$conn->exec($sql);
$conn=null;
header('Location:main.php');
?>
