<html>
<head>
</head>
<body>
<h3>사원정보입력</h3>
<form name="f" action="newfile.php" method="post">
empId : <input type="text" name="empid"><br>
name : <input type="text" name="name"><br>
<select name="deptid">
<option value="10">총무부</option>
<option value="20">인사부</option>
<option value="30">개발부</option>
<option value="40">영업부</option>
</select><br>
mng : <input type="text" name="mng" value="1">
<input type="submit" value="입력">
</form>
</body>
</html>