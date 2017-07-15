<?php
require_once 'dbconnect.php';

$id = $_POST['id'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];
$email = $_POST['email'];
$hobby = implode(",", $_POST['hobby']);
$msg = "";
if(isset($_POST['msg'])){
	$msg = $_POST['msg'];
}
$sql = "insert into member values('".$id."', '".$pwd."', '".$name."', '"
		.$email."', '".$hobby."', '".$msg."')";
$conn->exec($sql);
$conn = null;
header('Location:loginForm.php');
?>