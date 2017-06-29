<html>
<body>
<h3>제품목록</h3>
<a href="addForm.php">제품등록</a><br>
<table border="1">
<tr>
<th>번호</th><th>이름</th>
</tr>
<?php
foreach($this->data as $p){
print "<tr>";
print "<td>".$p->sno."</td><td><a href='index.php?action=search&sno="
		.$p->sno."'>".$p->name."</a></td>";
print "</tr>";
}
?>
</table>
</body>
</html>

