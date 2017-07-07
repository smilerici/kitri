<html>
<head>
<script>
function a(){
	if(f.id.value==null || f.id.value==''){
		alert("id는 필수사항입니다.");
		f.id.focus();
	}
	if(f.pwd.value==null || f.pwd.value==''){
		alert("pwd는 필수사항입니다.");
		f.pwd.focus();
	}
	if(f.name.value==null || f.name.value==''){
		alert("name은 필수사항입니다.");
		f.name.focus();
	}
	if(f.email.value==null || f.email.value==''){
		alert("email는 필수사항입니다.");
		f.email.focus();
	}
	f.submit();
}
	</script>
</head>
<body>
<h3>회원가입</h3>
<form name = "f" action = "/web1/EX/member/index.php?action=join" method = "post">
id: <input type="text" name="id"><br>
pwd: <input type="text" name="pwd"><br>
name: <input type="text" name="name"><br>
email: <input type="text" name="email"><br>
취미:
<?php 
$opt = "";
for($i = 0 ;$i<count($this->data);$i++){
	if($i==0){
		$opt = "checked";
	}
	print "<input type='checkbox' name='hobby[]' value=".$this->data[$i]->getId()." ".$opt.">".$this->data[$i]->getName();
	if($i==0){
		$opt= "";
	}
}

?>
<br>가입인사:<br>
<textarea name="msg"  rows="6" cols="45"></textarea><br>
<input type="button" value="가입" onclick="a()">
<input type="reset" value="취소">
</form>
</body>
</html>