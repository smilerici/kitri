<?php
print "id : ".$_POST['id']."<br>";
print "pwd : ".$_POST['pwd']."<br>";
print "name : ".$_POST['name']."<br>";
print "email : ".$_POST['email']."<br>";

$arr = $_POST['ch'];
foreach($arr as $n){
switch ($n){
	case "1":
		$arr[]="운동";
		break;
	case "2":
		$arr[]="영화";
		break;
	case "3":
		$arr[]="음악";
		break;
	case "4":
		$arr[]="쇼핑";
		break;
	case "5":
		$arr[]="여행";
		break;
	
}
}
	print "취미 : ";
	foreach($arr as $a){
		print $a."\t";
	}
	print "<br>";
	$grades = $_POST['grade'];
	print "학년 : ";
	foreach($grades as $g){
		print $g."학년, ";
	}
	
	print "<br>";
	print "회원타입 : ";
	print ($_POST['type']=="o")?"구매자":"판매자";
	print "<br>가입인사 : ".$_POST['msg'];
	
?>