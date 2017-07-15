<?php
session_start();
$sid = $_SESSION['id'];
$spwd = $_SESSION['pwd'];
if($sid==$_POST['id']){
	if($spwd == $_POST['pwd']){
		print "로그인 성공<br>";
		$_SESSION['login']='success';
		print "<a href='main.php'>메인페이지</a>";
	}else{
		print "잘못된 패스워드<br>";
	}
}else{
	print "없는 아이디<br>";
}
?>