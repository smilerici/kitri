<?php
if(session_status()!=PHP_SESSION_ACTIVE){
	session_start();
}
function check($w){
	if($_SESSION['id'] == $w){
		return '';
	}else{
		return ' readonly';
	}
}
?>
<html>
<head>
<script>
function a(){
	f.action="/web1/board/index.php?action=del";
	f.submit();
	f.action="/web1/board/index.php?action=edit";	
}
</script>
</head>
<body>
<h3>글 내용</h3>
<a href="/web1/board/index.php?action=list">글목록으로 돌아가기</a><br>
<form name="f" action="/web1/board/index.php?action=edit" method="post">
<table border=1>
<tr>
<th>글번호</th><td><input type="text" name="num" 
value="<?php print $this->data->getNum();?>" readonly></td>
</tr>

<tr>
<th>작성자</th><td><input type="text" name="writer" 
value="<?php print $this->data->getWriter();?>" readonly></td>
</tr>

<tr>
<th>작성일</th><td><input type="text" name="wdate" 
value="<?php print $this->data->getWdate();?>" readonly></td>
</tr>
<tr>
<th>카테고리</th>
<td>
<select name="cate" 
<?php if($_SESSION['id']!=$this->data->getWriter()){print 'disabled';}?>>
	<?php 
	foreach ($this->category as $c){
		if($this->data->getCategory()==$c->getId()){
			print "<option value=".$c->getId()." selected>".
			$c->getName()."</option>";
		}else{
			print "<option value=".$c->getId().">".$c->getName().
			"</option>";
		}
	}
	?>
</select>
</td>
</tr>
<tr>
<th>제목</th><td><input type="text" name="title" 
value="<?php print $this->data->getTitle();?>" 
<?php print check($this->data->getWriter());?>></td>
</tr>
<tr>
<th>내용</th><td><textarea name="content" rows=5 cols=30
<?php print check($this->data->getWriter());?>>
<?php print $this->data->getContent();?></textarea></td>
</tr>
<?php if($_SESSION['id'] == $this->data->getWriter()){?>
<tr>
<td colspan="2">
<input type="submit" value="수정">
<input type="button" name="del" value="삭제" onclick="a()">
</td>
</tr>
<?php }?>
</table>
</form>
</body>
</html>