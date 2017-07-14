<?php
require_once 'dbconnect.php';
$sql = "select * from hobby";
$result = $conn->query($sql);
$cnt = $result->rowCount();
$arr = array();
if($cnt>=1){
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$k = $row['id'];
		$v = $row['name'];
		$arr[$k] = $v;
	}
}
$conn = null;
?>
<html>
  <head>
    <script type="text/javascript">
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
<form action="join.php" method="post" name="f">
id(필수):<input type="text" name="id"><br>
pwd(필수):<input type="text" name="pwd"><br>
name(필수):<input type="text" name="name"><br>
email(필수):<input type="text" name="email"><br>
취미:
<?php
$opt = "";
foreach ($arr as $k=>$v){
	if($k==1){
		$opt = "checked";
	}
	print "<input type='checkbox' name='hobby[]' value=".$k." ".$opt.
	">".$v;
	if($k==1){
		$opt = "";
	}
}
?>

<br>가입인사:
<textarea cols="45" rows="5" name="msg"></textarea><br>
<input type="button" value="가입" onclick="a()">
<input type="reset" value="취소">
</form>
</body>
</html>
