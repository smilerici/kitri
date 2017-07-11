<html>
<head>
<script type="text/javascript">
function a(){
	var str="";
	var el = document.getElementsByTagName("h3");
	for(i=0;i<el.length;i++){
		var item = el.item(i);
		str += item.firstChild.nodeValue+"<br>";
	}
	var resDiv = document.getElementById("myDiv");
	resDiv.innerHTML = str;
}
function c(){
	var resDiv = document.getElementById("myDiv");
	resDiv.innerHTML = "";
}
function b(){
	var el = document.getElementsByTagName("div");
	for(i=0;i<el.length;i++){
		var item = el.item(i);
		item.innerHTML = (i+1)+" 영역";
		}	
}
function d(){
	var el = document.getElementsByTagName("input");
	for(i=0;i<el.length;i++){
		var item = el.item(i);
		var str = item.getAttribute("value");
		alert(str);
		}	
}
function e(btn){
	var val = btn.getAttribute("value");
	if(val== null || val=='' || val == 'off'){
	btn.setAttribute("value", "on");
	}else{
	btn.setAttribute("value", "off");
	}	
}
</script>
</head>
<body>
<h3>dom test</h3>
<h3>aaa</h3>
<h3>bbb</h3>
<div></div>
<div></div>
<div></div>
<div></div>
<div id="myDiv"></div>
<input type="button" value="read" onclick="a()">
<input type="button" value="clear" onclick="c()">
<input type="button" value="write" onclick="b()">
<input type="button" value="attr test" onclick="d()">
<input type="button" value="on" onclick="e(this)">
</body>
</html>