<html>
<head>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(){
   $('input[type=text]').val('Hello jQery..!');
});
$(document).ready(function(){
   $('input[type=button]').click(function(){
      $('input[type]').each(function(){  //input중 type에 대한걸 모두 찾아줌.
         var str=$(this).val(); //each가 foreach함수 역할을 해줌
         alert(str);
      });
   });
});
</script>
</head>
<body>
<input type="text" value = "text"/>
<input type="password" value = "password"/>
<input type="radio" value = "radio"/>
<input type="checkbox" value = "checkbox"/>
<input type="file"  value ="file" />
<input type="button" value = "전송" />
</body>
</html>