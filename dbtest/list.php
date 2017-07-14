<?php
$conn = null;
try {
	$conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8',
			'hr', 'hr');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch (PDOException $e){
	print $e->getMessage();
}
$arr = array();
$sql = "select empid from emp";
$result = $conn->query($sql);
$cnt = $result->rowCount();
if($cnt>=1){
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$arr[] = $row['empid'];
	}
}
print "<h3>사원 아이디</h3>";
foreach ($arr as $id){
	print "<a href=search.php?empid=".$id.">".$id."</a><br>";
}
$conn = null;
?>



