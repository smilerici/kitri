<html>
  <head>
    <script type="text/javascript">
function a(){
	
	var html = "";
	html += "id="+f.id.value+"<br>";
	html += "pwd="+f.pwd.value+"<br>";
	html += "name="+f.name.value+"<br>";
	html += "email="+f.email.value+"<br>";
	
	var str = "";
	for(i=4;i<9;i++){
		if(f.elements[i].checked){
          str += f.elements[i].value+",";
		}
	}
	
	html += "취미="+str+"<br>";
	html += "학년="+f.grade.options[f.grade.options.selectedIndex].value
	+"<br>";
	//f.type.value
	for(i=0;i<f.type.length;i++){
		if(f.type[i].checked){
			html += "회원종류="+f.type[i].value+"<br>";
		}
	}
	html += f.msg.value+"<br>";
	html += "<input type='button' value='확인' onclick='b(1)'>";
	html += "<input type='button' value='취소' onclick='b(2)'>";
	var myDiv = document.getElementById("myDiv");
	myDiv.innerHTML = html;
	
}

function b(t){
	if(t==1){
		f.submit();
	}else if(t==2){
		alert("전송취소");
		var myDiv = document.getElementById("myDiv");
		myDiv.innerHTML = "";
		f.reset();
	}
}
    </script>
  </head>
  <body>
<h3>회원가입</h3>
<form action="e.php" method="post" name="f">
id:<input type="text" name="id"><br>
pwd:<input type="text" name="pwd"><br>
name:<input type="text" name="name"><br>
email:<input type="text" name="email"><br>
취미:
<input type="checkbox" name="hobby[]" value="1">운동
<input type="checkbox" name="hobby[]" value="2">영화 
<input type="checkbox" name="hobby[]" value="3">음악 
<input type="checkbox" name="hobby[]" value="4">쇼핑 
<input type="checkbox" name="hobby[]" value="5">여행<br>
학년:
<select name="grade[]" multiple>
<option value=1>1학년</option>
<option value=2>2학년</option>
<option value=3>3학년</option>
<option value=4>4학년</option>
</select><br>
회원종류:
<input type="radio" name="type" value="p">판매자
<input type="radio" name="type" value="o">구매자<br>
가입인사:
<textarea cols="45" rows="5" name="msg"></textarea><br>
<input type="submit" value="가입" onclick="a()">
<input type="reset" value="취소">
</form>
<div id="myDiv"></div>
</body>
</html>
