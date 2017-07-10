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

function request(method, uri, callback, param){
   //var n = f.name.value;
   //httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
   //httpRequest = new XMLHttpRequest();
   //var param = "name="+f.name.value;
   //alert(param);
   httpRequest = getXMLHttpRequest();
   httpRequest.onreadystatechange=callback;
   //비동기 응답이 오면 호출될 함수 등록
   if(method=="get" || method=="GET"){
	   if(param!=null && param!=''){
		   uri+="?"+param;
		   param = null;
	   }
   }
   httpRequest.open   (method, uri, true);
   httpRequest.setRequestHeader("Content-Type", 
		   "application/x-www-form-urlencoded");
   //비동기 요청 설정
   httpRequest.send(param);
   //비동기 요청 보냄
   }