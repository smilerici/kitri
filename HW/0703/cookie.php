<?php
$count = 1;
if (isset ( $_COOKIE ["count"] )) {
	$count = $_COOKIE ["count"];
	$count ++;
}
setcookie ( "count", $count, time ( ) + 10 );

?>
<html>
<head>
<title>쿠키 테스트</title>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	쿠키테스트
	<br>
<?php
if ($count == 1) {
	?>
	첫 방문입니다.<br>
	<br> 쿠키정보가 없습니다.
	<br> 페이지를 새로고침 하세요.
	<br>
	<?php
} else {
	?>
당신의 방문은 <?=$count?> 번째 입니다.<br>
	<br>
10초 이내에 새로고침을 하면 카운트가 올라갑니다.
<?php
}
?>
</body>
</html>