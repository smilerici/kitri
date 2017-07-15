<html>
<head>
	<script src ="http://code.jquery.com/jquery-1.7.js"></script>
	<script>
		$(document).ready(function() {
			$('tr:odd').css('background','#F9F9F9');
			$('tr:even').css('background','#9F9F9F');
			$('tr:first').css('background','#000000')
			.css('color','#FFFFFF');
		});
	</script>
</head>
<body>
	<table>
		<tr><th>이름</th><th>혈액형</th><th>지역</th></tr>
		<tr><th>한용희</th><th>A형</th><th>서울특별시 금천구</th></tr>
		<tr><th>한용구</th><th>B형</th><th>인천광역시 </th></tr>
		<tr><th>코끼리</th><th>AB형</th><th>캘리포니아</th></tr>
		<tr><th>김태균</th><th>C형</th><th>베네치아</th></tr>
		<tr><th>딱다구</th><th>D형</th><th>서울 성북구</th></tr>
		<tr><th>리수지</th><th>우리형</th><th>경기 부천시</th></tr>
	</table>
</body>
</html>