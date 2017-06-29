<html>
<head>
<script>
	function a(){
		var arr = document.f.elements;
		for(i=0;i<arr.length;i++){
			if(arr[i].type == "text" && arr[i].value==""){
				alert("필수입력");
				arr[i].focus();
				return;		
			}
			
		
		}
		for(i=0;i<arr.length;i++){
		if(arr[i].type =="text" && isNaN(arr[i].value) && (i%4!=0)){
			alert("숫자를 입력해주세요.");
			arr[i].focus();
			return;
			}
		}
		f.submit();
	}

</script>
</head>
<body>
<form name="f" action="a.php" method="post">
	<table border="1">
		<tr>
			<th>name</th><th>kor</th><th>eng</th><th>math</th>
		</tr>	
		<tr>
			<td><input type="text" name="p1[]"></td>
			<td><input type="text" name="p1[]"></td>
			<td><input type="text" name="p1[]"></td>
			<td><input type="text" name="p1[]"></td>
		</tr>
		<tr>
			<td><input type="text" name="p2[]"></td>
			<td><input type="text" name="p2[]"></td>
			<td><input type="text" name="p2[]"></td>
			<td><input type="text" name="p2[]"></td>
		</tr>
		<tr>
			<td><input type="text" name="p3[]"></td>
			<td><input type="text" name="p3[]"></td>
			<td><input type="text" name="p3[]"></td>
			<td><input type="text" name="p3[]"></td>
		</tr>
		<tr>
			<td colspan="4"><input type="button" value="처리" onclick="a()">
		</tr>
		
	
	</table>


<!-- 
<input type ="checkbox" name="ch" value="오렌지">오렌지
<input type ="checkbox" name="ch" value="키위">키위
<input type ="checkbox" name="ch" value="바나나">바나나 
<input type ="button" value="aaa" onclick="a()">
-->

</form>

</body>
</html>