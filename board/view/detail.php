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
<script type="text/javascript">
function del(num){
	var flag = confirm("정말 삭제하시겠습니까?");
	if(flag){
		location.href="/web1/board/index.php?action=del&num="+num;
	}else{
		alert("삭제취소");
	}
}
</script>
</head>
<body>
<h3>글 내용</h3>
<a href="/web1/board/index.php?action=list">글목록으로 돌아가기</a><br>
<form action="/web1/board/index.php?action=edit" method="post">
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
<input type="button" value="삭제" onclick="del(<?php print $this->data->getNum()?>)">
</td>
</tr>
<?php }?>
</table>
</form>
<h3>댓글작성</h3>
<form action="/web1/board/index.php?action=add" method="post">
<input type="text" name="content">
<input type="submit" value="작성">
<input type="hidden" name="title" 
value="--><?php print $this->data->getTitle()?>">
<input type="hidden" name="writer" 
value="<?php print $_SESSION['id']?>">
<input type="hidden" name="parent" 
value="<?php print $this->data->getNum()?>">
<input type="hidden" name="cate" 
value="<?php print $this->data->getCategory()?>">
</form>
</body>
</html>






