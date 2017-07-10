<html>
<head>
<script type="text/javascript">
var httpRequest = null;
function getXMLHttpRequest() {
   if (window.ActiveXObject) {
      try {
         return new ActiveXObject("Msxml2.XMLHTTP");
      } catch(e) {
         try {
            return new ActiveXObject("Microsoft.XMLHTTP");
         } catch(e1) {
            return null;
         }
      }
   } else if (window.XMLHttpRequest) {
      return new XMLHttpRequest();
   } else {
      return null;
   }
}
function a(){
   //var n = f.name.value;
   //httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
   //httpRequest = new XMLHttpRequest();
   var param = "name="+f.name.value;
   //alert(param);
   httpRequest = getXMLHttpRequest();
   httpRequest.onreadystatechange=b;
   //비동기 응답이 오면 호출될 함수 등록
   httpRequest.open   ("post", "a.php?", true);
   httpRequest.setRequestHeader("Content-Type", 
		   "application/x-www-form-urlencoded");
   //비동기 요청 설정
   httpRequest.send(param);
   //비동기 요청 보냄
   }
function b(){
   if(httpRequest.readyState == 4){
      if(httpRequest.status == 200){
             //   alert(httpRequest.readyState);
             //   alert(httpRequest.status);
         var txt=httpRequest.responseText;
         var myDiv = document.getElementById("myDiv");
         myDiv.innerHTML = txt;
      }
   }
}
</script>
</head>
<body>
<form action="" name="f">
<input type="text" name="name" id="t1">
<input type="button" value="click" onclick="a()">
</form>
<div id="myDiv"></div><!--  div사이의 값을 inner값이라고함. --> 
</body>
</html>