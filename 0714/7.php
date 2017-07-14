<html>
<head>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(){
   var array = [
      {name: 'Hanbit Media', link: 'http://hanb.co.kr'},
      {name: 'Naver', link: 'http://naver.com'},
      {name: 'Daum', link: 'http://daum.net'},
      {name: 'Paran', link: 'http://paran.com'},
];
   $.each(array, function(index, item){  //$.each()메서드를 사용
      var output = '';   //변수선언
      output += '<a href="' + item.link+ '">';   //문자열 생성
      output += '<h1>' + item.name+ '</h1>';
      output += '</a>';
      document.body.innerHTML += output;  //문자열 삽입
   });
});
      </script>
      </head>
      <body>
      </body>
      </html>