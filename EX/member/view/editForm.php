<html>
<head>

</head>
<body>
<h3>내 정보</h3>
<form action="/web1/EX/member/index.php?action=editInfo" method="post" name="f">
id : <input type="text" name="id" value="<?php print $this->m->getId();?>" readonly><br>
pwd : <input type="text" name="pwd" value="<?php print $this->m->getPwd();?>"><br>
name : <input type="text" name="name" value="<?php print $this->m->getName();?>" readonly><br>
email : <input type="text" name="email" value="<?php print $this->m->getEmail();?>"><br>
취미 :
<?php
$arr = explode(",", $this->m->getHobby());
$opt = "";
foreach($this->data as $v){
	foreach($arr as $num){		
	if($v->getId()==$num){
		$opt = "checked";
	}
	}
	print "<input type='checkbox' name='hobby[]' value=".$v->getId()." ".$opt.">".$v->getName();
	foreach($arr as $num){
		if($v->getId()==$num){
			$opt = "";
		}
	}
}
?>
<br>가입인사 : <br>
<textarea rows="5" cols="45" name="msg"><?php print $this->m->getMsg();?></textarea><br>
<input type="submit" value="정보수정" >

</form>
</body>
</html>