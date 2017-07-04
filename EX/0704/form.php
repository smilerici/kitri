<?php
$conn = null;
try{
	$conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','hr','hr');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e){
	print $e->getMessage();
}

$arr = array();
$sql = "select * from dept";
//query()는 검색문장을 실행하고 검색 결과를 스테이트먼트 객체형태로 반환한다.
$result = $conn->query($sql);
//rowCount() 검색 결과의 줄수 반환
$cnt = $result->rowCount();
if($cnt>=1){
	//스테이트먼트 객체의 fetch()는 검색결과에서 한줄씩 반환
	//PDO::FETCH_ASSOC는 반환한 한줄의 각 컬럼의 값을 읽을때 연관이름으로 접근
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		//FETCH_ASSOC 연관배열형태
		$key = $row['deptid'];
		$val = $row['deptname'];
		$arr[$key]=$val;
	}
}

//$conn->exec($sql);
$conn = null;
?>
<html>
<head>
</head>
<body>
<h3>사원정보입력</h3>
<form name="f" action="newfile.php" method="post">
empId : <input type="text" name="empid"><br>
name : <input type="text" name="name"><br>
<select name="deptid">
<?php 
foreach ($arr as $k=>$v){
	print "<option value=".$k." > ".$v."</option>";
}
?>

</select><br>
<input type="hidden" name="mng" value="1">
<input type="submit" value="저장">
</form>
</body>
</html>