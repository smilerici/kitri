<?php
if(session_status()!=PHP_SESSION_ACTIVE){
	session_start();
}
if(isset($_SESSION['id'])){
	if($this->action=='login'){
		print "<script>alert('".$this->data."');</script>";
	}
	print $_SESSION['id']."님 로그인중<br>";
}else{
	header("Location:loginForm.php");
}
?>
<html>
<body>
<a href="/web1/EX/member/index.php?action=myInfo&id=<?php print $_SESSION['id'];?>">내정보 수정</a><br>
<a href="/web1/EX/member/index.php?action=logout">로그아웃</a><br>
<a href="/web1/EX/member/index.php?action=out">탈퇴</a><br>
<a href="/web1/EX/member/index.php?action=list">게시판</a><br>
</body>
</html>