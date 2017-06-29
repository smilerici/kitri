<?php
$arr = array("이름", "국", "영", "수");
$num[0]= array("name1"=>"", "ko1"=>"","en1"=>"","ma1"=>"");
$num[1]= array("name2"=>"", "ko2"=>"","en2"=>"","ma2"=>"");
$num[2]= array("name3"=>"", "ko3"=>"","en3"=>"","ma3"=>"");



?>
<html>
<head>
<script>

	function a(){
		var arr = document.forms[0].ch;
		var str = "";
		for(i=0;i<arr.length;i++){
			if(arr[i].checked){
				if(str!=""){
					str+=",";
				}
				str += arr[i].value;
			}
		}
		alert(str);
		forms[0].action="a.php?str="+str;
		forms[0].submit();
	}
	
</script>
</head>
<body>
<form action="" method="post">
<table border="1">

<?php 
print "<tr>";
		
for($e=0;$e<count($arr);$e++){
   print "<td>".$arr[$e]."</td>";
}
print "</tr>";

foreach($num as $n){
	print "<tr>";
	foreach($n as $k=>$v){
		print "<td><input type= 'text' name= '$k'></td>";
	}
	print "</tr>";
}


?>


</table>
<input type ="checkbox" name="ch" value="오렌지">오렌지
<input type ="checkbox" name="ch" value="키위">키위
<input type ="checkbox" name="ch" value="바나나">바나나
<input type ="button" value="aaa" onclick="a()">
<input type = "submit" value="제출">


</form>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$num[0]= array("name1"=>$_POST["name1"], "ko1"=>(int)$_POST["ko1"],"en1"=>(int)$_POST["en1"],"ma1"=>(int)$_POST["ma1"]);
	$num[1]= array("name2"=>$_POST["name2"], "ko2"=>(int)$_POST["ko2"],"en2"=>(int)$_POST["en2"],"ma2"=>(int)$_POST["ma2"]);
	$num[2]= array("name3"=>$_POST["name3"], "ko3"=>(int)$_POST["ko3"],"en3"=>(int)$_POST["en3"],"ma3"=>(int)$_POST["ma3"]);
	
	$sum=0;
	foreach($num as $n){
		
		foreach($n as $k => $v){
			
			if($k=="name1" || $k=="name2" || $k=="name3"){
				print "이름 : ".$v."\t";
			} else {
				if($k=="ko1" || $k=="ko2" || $k=="ko3") {
					print "국어 : ".$v."\t";
					
				}else if($k=="en1" || $k=="en2" || $k=="en3"){
					print "영어 : ".$v."\t";
				} else if($k=="ma1" || $k=="ma2" || $k=="ma3"){
					print "수학 : ".$v."\t";
				}
				
				$sum += $v;
				$avg = $sum/3;
				
			}
			
			
			/* print "국어 : ".$ko."영어 : ".$en."수학 : ".$ma;
			 print "총점 : ".$sum."평균 : ".$avg."<br>";
			 $sum=0; */
		}
		print "총점 : ".$sum;
		print "평균 : ".$avg."<br>";
		$sum = 0;
		$avg = 0;
		
		
	}
	
}

?>
</body>
</html>