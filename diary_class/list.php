<?php
print "<h3>그림일기</h3>";
print "<a href='index.php?action=writeForm'>일기쓰기</a><br><br>";
foreach ($this->data as $f){
	print "<a href=index.php?action=read&fname=".$f.">".$f."</a><br>";
	print "<a href=index.php?action=download&fname=".$f.">다운로드</a>";
	print "<a href=index.php?action=del&fname=".$f.">삭제</a><br>";

}
?>