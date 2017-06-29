<?php
session_start();
		$_SESSION["datas2"];

class Product{
	public $pNum;
	public $pName;
	public $pPrice;
	public $pCount;
	
	public function __construct($pName,$pPrice,$pCount){
		
		
		
		$this->pNum = count($_SESSION['datas2'])+1;
		$this->pName=$pName;
		$this->pPrice=$pPrice;
		$this->pCount=$pCount;
		
		
	}
	
}
	?>

<html>
<head>

</head>
<body>
	<h1>제품리스트</h1>
	<form>
	<a href="product.php">제품등록</a>
	<table border='1'>
		<tr>
			<td>번호</td><td>제품명</td>
	<?php 	
		
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	
	$datas;
	if(isset($_SESSION["datas2"])){
		$datas = $_SESSION["datas2"];
		
	}else {
		$datas= array();
		
	}
	$datas[] =
	new Product($_POST['pName'],$_POST['pPrice'],$_POST['pCount']);
	
	for($i = 0; $i < count ($datas); $i ++) {
	?>
		<tr>
		<td><?php print $datas[$i]->pNum;?></td>
		<td><?php print $datas[$i]->pName;?></td>
		</tr>
	<?php 
	}
	$_SESSION['datas2']=$datas;
}
?>
		

	</table>
	</form>

</body>
</html>