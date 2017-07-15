<html>
<head>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script>
	$(document).ready(function () {
		$("p").click(function() {
			$(this).hide();
			});
		});
	$(document).ready(function () {
		$("p").css("background","orange");
	});
	$(document).ready(function () {
		$("h1, p").css("color","pink");
	});
	$(document).ready(function () {
		$("h1#target").css("color","skyblue");
	});
	$(document).ready(function () {
		$('.item').css('color','gray');
		$("h1.item").css("background","green");
	});
	
</script>
</head>
<body>
<p>aaa</p>
<p>bbb</p>
<p>ccc</p>
<p>ddd</p>
<p>eee</p>
<h1>adfsdfsaf</h1>
<p>sdfsadfsadf</p>
<p>sdfsadfsadf</p>
<h1>adfsdfsaf</h1>
<p>sdfsadfsadf</p>
<h1>이건핑크</h1>
<h1 id="target">skyblue</h1>
<h1>이건핑크</h1>
<h1 class="item">다크다크</h1>
<h1 class="item select">그린그린</h1>
<h1 class="item">다크다크</h1>
</body>
</html>