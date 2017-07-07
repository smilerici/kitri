<html>
<head>
</head>
<body>
<h3>글목록</h3>
<a href='/web1/board/index.php?action=writeForm'>글쓰기</a><br>
<form action="/web1/board/index.php?action=listByCategory" method="post">
<select name="cate">
	<?php 
	foreach ($this->category as $c){
		print "<option value=".$c->getId().">".$c->getName()."</option>";
	}
	?>
</select>
<input type="submit" value="카테고리별로 보기">
<br>
</form>
<table border="1">
<tr>
<th>num</th><th>title</th><th>writer</th>
</tr>
<?php
	foreach ($this->data as $a){
		print "<tr>";
		print "<td>".$a->getNum()."</td>";
		print "<td><a href='/web1/board/index.php?action=detail&num=".
				$a->getNum()."'>".$a->getTitle()."</a></td>";
		print "<td>".$a->getWriter()."</td>";
		print "</tr>";
	}
?>
</table>
</body>
</html>
