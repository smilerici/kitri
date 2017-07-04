<?php
$empid = $_GET['empid'];

try{
	$conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8','hr','hr');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e){
	print $e->getMessage();
}


$sql = "select * from emp where empid='".$empid."'";
$result = $conn->query($sql);
$cnt = $result->rowCount();
if($cnt>0){
	$row = $result ->fetch(PDO::FETCH_ASSOC);
	$name = $row['name'];	
	$deptid = $row['deptid'];
	$mng = $row['mng'];
	
	$arr = array();
	$sql = "select * from dept";
	
	$result = $conn->query($sql);
	
	$cnt = $result->rowCount();
	if($cnt>=1){
		
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$key = $row['deptid'];
			$val = $row['deptname'];
			$arr[$key]=$val;
		}
	}
	
	$mng = array();
	$sql = "select empid from emp";
	$result = $conn->query($sql);
	$cnt = $result->rowCount();
	if($cnt>=1){
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$mng[]=$row['empid'];
			
		}
	}
}
$conn = null;

?>
<html>
<head>
<script>
	function a(){
		if(f.mng.value == f.empid.value){
			alert("자기자신이 매니저가 될수는 없습니다.");
		}
	}
</script>
</head>
<body>
<h3><?php print $name;?> 사원 정보</h3>
<form name="f" action ="edit.php" method="post">
empId : <input type="text" name="empid" value="<?php print $empid;?>" readonly><br>
name : <input type="text" name="name" value="<?php print $name;?>" readonly><br>
dept : <select name="deptid">
<?php 
foreach($arr as $k=>$v){
	if($k==$deptid){
		print "<option value=".$k." selected>".$v."</option>";
	} else {
		print "<option value=".$k.">".$v."</option>";
	}
}
?>
</select><br>
mng : <select name="mng">
<?php 
foreach($mng as $k=>$v){
	if($k==$deptid){
		print "<option value=".$k." selected>".$v."</option>";
	} else {
		print "<option value=".$k.">".$v."</option>";
	}
}
?>
</select>
<br>
<input type="submit" value="edit" onclick="a()">
<input type="button" value="delete">
</form>
</body>
</html>

