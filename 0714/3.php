<html>
<head>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(){
   setTimeout(function(){ //창을 띄우고 3초 후에 코드를 실행
      var value = $('select > option:selected').val(); //변수선언
      alert(value); //출력
   }, 3000);
});
</script>
</head>
<body>
   <select>
      <option>Apple</option>
      <option>Bag</option>
      <option>Cat</option>
      <option>Dog</option>
      <option>Elephant</option>
   </select>
</body>
</html>