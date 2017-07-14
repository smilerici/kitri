<html>
<head>
<style>
span{color:red;};
</style>
<script type="text/javascript" src="/web1/ajaxtest/request.js"></script>
<script type="text/javascript">
function b(){
	var param = "id="+f.id.value;
	var callback = c;
	var uri = "/web1/member/index.php?action=idCheck";
	request("post", uri, callback, param);
}
function c(){
	if(httpRequest.readyState == 4){
	    if(httpRequest.status == 200){
			var txt=httpRequest.responseText;
			var myDiv = document.getElementById("idDiv");
			myDiv.innerHTML = txt;
	    }
	}
}
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
		alert("name는 필수사항입니다.");
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
	<form action="/web1/member/index.php?action=join" method="post"
		name="f">
		id(필수):<input type="text" name="id"> <input type="button" value="중복체크"
			onclick="b()">
		<span id="idDiv"></span>
		<br> pwd(필수):<input type="text" name="pwd"><br> name(필수):<input
			type="text" name="name"><br> email(필수):<input type="text"
			name="email"><br>
취미:
<?php
$opt = "";
for($i = 0; $i < count ( $this->data ); $i ++) {
	if ($i == 0) {
		$opt = "checked";
	}
	print "<input type='checkbox' name='hobby[]' value=" . $this->data [$i]->getId () . " " . $opt . ">" . $this->data [$i]->getName ();
	if ($i == 0) {
		$opt = "";
	}
}
?>

<br>가입인사:
		<textarea cols="45" rows="5" name="msg"></textarea>
		<br> <input type="button" value="가입" onclick="a()"> <input
			type="reset" value="취소">
	</form>
</body>
</html>
