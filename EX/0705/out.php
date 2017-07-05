<?php
require_once 'dbconnect.php';
session_start();
$id = $_SESSION['id'];
$sql = "delete from member where id='".$id."'";
$conn->exec($sql);
$conn = null;
header("Location:loginForm.php");
?>