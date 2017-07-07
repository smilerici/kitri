<?php
require_once 'dbconnect.php';
session_start();
if(!isset($_SESSION['id'])){
	header("Location:loginForm.php");
}
$id = $_SESSION['id'];
$pwd = "";
$name = "";
$email = "";
$hobby = array();
$msg = "";
$sql = "select * from member where id='".$id."'";
$result = $conn->query($sql);
$cnt = $result->rowCount();
if($cnt>=0){
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$pwd = $row['pwd'];
	$name =$row['name'];
	$email =$row['email'];
	$numbers = explode(",", $row['hobby']);
	$msg=$row['msg'];		
}

$sql = "select * from hobby";
$result = $conn->query($sql);
$cnt = $result->rowCount();
$arr = array();
if($cnt>=1){
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$k = $row['id'];
		$v = $row['name'];
		$hobby[$k] = $v;
	}
}
$conn=null;

?>
<html>
<head>

</head>
<body>
<h3>내 정보</h3>
<form action="myInfoEdit.php" method="post" name="f">
id : <input type="text" name="id" value="<?php print $id?>" readonly><br>
pwd : <input type="text" name="pwd" value="<?php print $pwd?>"><br>
name : <input type="text" name="name" value="<?php print $name?>" readonly><br>
email : <input type="text" name="email" value="<?php print $email?>"><br>
취미 : 
<?php 
$opt = "";
foreach($hobby as $k=>$v){
	foreach($numbers as $num){		
	if($k==$num){
		$opt = "checked";
	}
	}
	print "<input type='checkbox' name='hobby[]' value=".$k." ".$opt.">".$v;
	foreach($numbers as $num){
		if($k==$num){
			$opt = "";
		}
	}
}
?>
<br>가입인사 : <br>
<textarea rows="5" cols="45" name="msg"><?php print $msg?>"</textarea><br>
<input type="submit" value="정보수정" >

</form>
</body>
</html>