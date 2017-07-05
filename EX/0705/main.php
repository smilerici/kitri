<?php
if(isset($_SESSION['id'])){
	print $_SESSION['id']."님 로그인중<br>";
}else {
	header("Location:loginForm.php");
}
?>
<a href="myInfo.php">내정보 수정</a><br>
<a href="logout.php">로그아웃</a><br>
<a href="out.php">탈퇴</a><br>
<a href="boardList.php">게시판</a><br>