<?php
require_once 'dbconnect.php';
$view = "";
$id = $_POST ['id'];
$pwd = $_POST ['pwd'];
$sql = "select * from member where id='". $id ."'";
// $sql = "select * from member where id='".$id."' and pwd='".$pwd."'";
$result = $conn->query( $sql );
$cnt = $result->rowCount ();
if ($cnt >= 0) {
	$row = $result->fetch ( PDO::FETCH_ASSOC );
	if ($pwd == $row ['pwd']) {
		session_start ();
		$_SESSION ['id'] = $id;
		$view = "main.php";
	} else {
		$view = "loginForm.php";
	}
} else {
	
	$view = "loginForm.php";

}
$conn= null;
header("Location:".$view);
?>
