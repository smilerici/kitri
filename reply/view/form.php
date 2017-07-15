<html>
<head>
<script type="text/javascript" src="/web1/reply/view/request.js"></script>
<script type="text/javascript">
window.onload = function(){
	makeList();
}
function makeList(){
	var callback = makeListResult;
	var uri = "/web1/reply/index.php?action=getAll";
	request("post", uri, callback, null);
}
function makeListResult(){
	if(httpRequest.readyState == 4){
	    if(httpRequest.status == 200){
			var txt=httpRequest.responseText;
			var reply = eval('('+txt+')');
			var listDiv = document.getElementById("list");
			for(i=0;i<reply.length;i++){
				var rDiv = makeDiv(reply[i]);
				listDiv.appendChild(rDiv);
			}
	    }
	}
}
function makeDiv(r){
	var item = document.createElement("div");
	item.setAttribute("id", "r_" + r.num);
	item.setAttribute("pwd", r.pwd);
	var html = '<table border="1"><tr><th>내용</th><td colspan="3">'
				+r.content+'</td></tr>';
	html += '<tr><th>작성자</th><td>'+r.writer+'</td><th>작성일</th><td>'
			+r.wdate+'</td></tr>';
	html += '<tr><td colspan="4"><input type="button" value="edit" onclick="viewEditForm('+r.num+', \''+r.content+'\')">';
	html += '<input type="button" value="del" onclick="del('+r.num
			+')"></td></tr></table>';
	item.innerHTML = html;
	return item;
}
function add(){
	var param="";
	param += "content="+f.content.value;
	param += "&writer="+f.writer.value;
	param += "&pwd="+f.pwd.value;
	var callback = addResult;
	var uri = "/web1/reply/index.php?action=add";
	request("post", uri, callback, param);
}
function addResult(){
	if(httpRequest.readyState == 4){
	    if(httpRequest.status == 200){
			var txt=httpRequest.responseText;
			var reply = eval('('+txt+')');
			var listDiv = document.getElementById("list");
			var rDiv = makeDiv(reply);
			listDiv.appendChild(rDiv);
			f.content.value="";
			f.writer.value="";
			f.pwd.value="";
	    }
	}
}
function del(num){
	var delDiv = document.getElementById("r_"+num);
	var pwd = delDiv.getAttribute("pwd");
	var pwd2 = prompt("글 비밀번호", "0");
	if(pwd==pwd2){
		request("post", "/web1/reply/index.php?action=del", delResult, 
				"num="+num);
	}else{
		alert("글 비밀번호 불일치");
	}
}
function delResult(){
	if(httpRequest.readyState == 4){
	    if(httpRequest.status == 200){
			var txt=httpRequest.responseText;
			var res = eval('('+txt+')');
			if(res.flag=='true'){
				var listDiv = document.getElementById("list");
				var rDiv = document.getElementById("r_"+res.num);
				listDiv.removeChild(rDiv);
			}else{
				alert("삭제가 처리되지 않았음"); 
			}
	    }
	}
}
function viewEditForm(num, content){
	var editDiv = document.getElementById("editDiv");
	var parentDiv = document.getElementById("r_"+num);
	editDiv.parentNode.removeChild(editDiv);
	parentDiv.appendChild(editDiv);
	f2.num.value = num;
	f2.content.value = content;
	editDiv.style.display = '';
}
function cancel(){
	var editDiv = document.getElementById("editDiv");
	var bodyNode = document.getElementsByTagName("body").item(0);
	editDiv.parentNode.removeChild(editDiv);
	bodyNode.appendChild(editDiv);
	editDiv.style.display = 'none';
}
function edit(){
	var param = "num="+f2.num.value;
	param += "&content="+f2.content.value;
	var uri = "/web1/reply/index.php?action=edit";
	var callback = editResult;
	request("post", uri, callback, param);
	cancel();
}
function editResult(){
	if(httpRequest.readyState == 4){
	    if(httpRequest.status == 200){
			var txt=httpRequest.responseText;
			var res = eval('('+txt+')');
			var newDiv = makeDiv(res);
			var oldDiv = document.getElementById("r_"+res.num);
			var listDiv = document.getElementById("list");
			listDiv.replaceChild(newDiv, oldDiv);
	    }
	}
}
</script>
</head>
<body>
<h3>댓글예제</h3>
<img src="a.jpg" style="width:300;height:150"><br>
<form action="" name="f" method="post">
내용:<input type="text" name="content"><br>
작성자:<input type="text" name="writer"><br>
글 비밀번호:<input type="password" name="pwd"><br>
<input type="button" value="글작성" onclick="add()">
</form>
<div id="list"></div>
<div id="editDiv" style="display: none">
<form action="" name="f2" method="post">
<input type="hidden" name="num">
내용:<input type="text" name="content"><br>
<input type="button" value="저장" onclick="edit()">
<input type="button" value="취소" onclick="cancel()">
</form>
</div>
</body>
</html>