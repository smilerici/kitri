<html>
<head>
	<script type="text/javascript">
function a(){
	if(f.id.value==null || f.id.value==''){
		alert("id는 필수사항 입니다.");
		f.id.focus();
		}
	if(f.pwd.value==null || f.pwd.value==''){
		alert("pwd는 필수사항 입니다.");
		f.pwd.focus();
		}
	if(f.name.value==null || f.name.value==''){
		alert("name는 필수사항 입니다.");
		f.name.focus();
		}
	if(f.email.value==null || f.email.value==''){
		alert("email는 필수사항 입니다.");
		f.email.focus();
		}
	f.submit();
	
}
	</script>
</head>
<body>
<h3>회원가입</h3>
<form action="join.php" method="post" name="f">
id(필수) : <input type="text" name="id"><br>
pwd(필수) : <input type="text" name="pwd"><br>
name(필수) : <input type="text" name="name"><br>
email(필수) : <input type="text" name="email"><br>
취미 : 
<input type="checkbox" name="hobby[]" value="1">운동
<input type="checkbox" name="hobby[]" value="2">영화
<input type="checkbox" name="hobby[]" value="3">음악
<input type="checkbox" name="hobby[]" value="4">쇼핑
<input type="checkbox" name="hobby[]" value="5">여행<br>
가입인사 : 
<textarea rows="5" cols="45" name="msg"></textarea><br>
<input type="button" value="가입" onclick="a()">
<input type="reset" value="취소">


</form>
</body>
</html>