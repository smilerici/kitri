<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login']=='success'){
		$id = $_SESSION['id'];
		print $id."님 반갑습니다.<br>";

?>
<a href="logout.php">로그아웃</a>

<?php 
	}
}
?>