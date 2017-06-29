<html>
<head>
<script type="text/javascript">
function del(sno){
	var flag = confirm("정말 삭제하시겠습니까?");
	if(flag){
		location.href="index.php?action=del&sno="+sno;
	}else{
		alert("삭제취소");
	}
}
</script>
</head>
<body>
<h3>제품상제정보</h3>
<a href="index.php?action=list">제품목록으로 이동</a><br>
<form name="f" action="index.php?action=edit" method="post">
sno:<input type="text" name="sno" 
value="<?php print $this->data->sno;?>" readonly><br>

name:<input type="text" name="name" 
value="<?php print $this->data->name;?>" readonly><br>

price:<input type="number" name="price" 
value="<?php print $this->data->price;?>" ><br>

quantity:<input type="number" name="quantity"
value="<?php print $this->data->quantity;?>"><br>

<input type="submit" value="edit">
<input type="button" value="del" 
onclick="del(<?php print $this->data->sno;?>)">
<br>
</form>
</body>
</html>