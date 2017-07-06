<html>
<head>

</head>
<body>
<h3>회원가입</h3>
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