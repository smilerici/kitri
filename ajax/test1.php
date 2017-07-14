<html>
<head>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
			$("input[type=button]").click(function(){				
				$('input[type]').each(function(){
					if($(this).is(':checkbox')){
						if($(this).is(':checked')){
							alert($(this).val());
						}
					}else if($(this).is(':radio')){
						if($(this).is(':checked')){
							alert($(this).val());
						}
					}else{
						alert($(this).val());
					}
        		});
				var value = $('select > option:selected').val();
				alert(value);
			});
        });
        
    </script>
</head>
<body>
<form action="">
id:<input type="text" name="id"><br>
pwd:<input type="text" name="pwd"><br>
name:<input type="text" name="name"><br>
좋아하는 연예인:<br>
<input type="checkbox" name="ch" value="강호동">강호동
<input type="checkbox" name="ch" value="김영철">김영철
<input type="checkbox" name="ch" value="서장훈">서장훈
<input type="checkbox" name="ch" value="이상민">이상민<br>
주거지역:
<input type="radio" name="ra" value="서울특별시">서울특별시
<input type="radio" name="ra" value="대전광역시">대전광역시
<input type="radio" name="ra" value="부산광역시">부산광역시
<input type="radio" name="ra" value="울산광역시">울산광역시
<input type="radio" name="ra" value="인천광역시">인천광역시
<input type="radio" name="ra" value="수원광역시">수원광역시
<br>
좋아하는 과일
<select name="sel">
<option value="사과">사과
<option value="포도">포도
<option value="수박">수박
<option value="바나나">바나나
</select>
<input type="button" value="정보확인">
</form>
</body>
</html>
