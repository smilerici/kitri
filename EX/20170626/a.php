
<html>
<body>
<form action="" method="post">
name : <input type="text" name="name"><br>
kor : <input type="number" name="kor"><br>
eng : <input type="number" name="eng"><br>
math : <input type="number" name="math"><br>
<input type="submit" value="추가"><br>


</form>

<?php

class Member{
	public $name;
	public $kor;
	public $eng;
	public $math;
	public $total;
	public $avg;
	
	public function __construct($name,$kor,$eng,$math){
		$this->name = $name;
		$this->kor = $kor;
		$this->eng = $eng;
		$this->math = $math;
		$this->total = $kor+$eng+$math;
		$this->avg = (float)$this->total/3;
	}
	
	public function memberjumsu(){
		print "이름 : "	.$this->name."<br>";
		print "국어 : "	.$this->kor."<br>";
		print "영어 : "	.$this->eng."<br>";
		print "수학 : "	.$this->math."<br>";
		print "총점 : "	.$this->total."<br>";
		print "평균 : "	.$this->avg."<br>";
	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	$datas;
	if(isset($_SESSION["datas2"])){
		$datas = $_SESSION["datas2"];
	}else {
		$datas= array();
	}
	$datas[] =
	new Member($_POST['name'],$_POST['kor'],$_POST['eng'],$_POST['math']);
	print "<h3>result</h3><table border='1'>";
	for($i = 0; $i < count ($datas); $i ++) {
	?>
	<tr>
	<td><?php print $datas[$i]->name;?></td>
		<td><?php print $datas[$i]->kor;?></td>
		<td><?php print $datas[$i]->eng;?></td>
		<td><?php print $datas[$i]->math;?></td>
		<td><?php print $datas[$i]->total;?></td>
		<td><?php print $datas[$i]->avg;?></td>
		</tr>
	<?php 
	}
	print "</table>";
	$_SESSION['datas2']=$datas;
}
?>

</body>
</html>

<!-- //$_POST["name"],$_POST["kor"],$_POST["eng"],$_POST["math"]


/* 
$arr [0] = $_POST ["p1"];
$arr [1] = $_POST ["p2"];
$arr [2] = $_POST ["p3"];

$keys = [ 
		"name",
		"kor",
		"eng",
		"math",
		"total",
		"avg"
];
$total = 0;
$avg = 0;
foreach ( $arr as $p ) {
	for($i = 0; $i < 4; $i ++) {
		print $keys [$i] . " : " . $p [$i] . "<br>";
	}
	$total = result1($p);
	$avg = result2($total);
	print $keys [$i ++]." : ".$total . "<br>";
	print $keys [$i] . " : " . $avg . "<br>======================<br>";
}

function result($x){
	$t = 0;
	for($i=0;$i<4;$i++){
		$t += (int)$x[$i];
	}
	return $t;
}

function result($y){
	return (float)$y/3;
} 



 * for($i = 0; $i < count ( $arr ); $i ++) {
 * $cnt = 0;
 * $data = array ();
 * foreach ( $arr [$i] as $v ) {
 * if ($cnt == 0) {
 * $data [$keys [$cnt ++]] = $v;
 * } else {
 * $data [$keys [$cnt ++]] = ( int ) $v;
 * }
 * }
 *
 * $datas [] = $data;
 * }
 * for($i=0;$i<count($datas);$i++){
 * foreach($datas[$i] as $k => $v){
 * print $k." : ".$v."<br>";
 * }
 * print "================<br>";
 * }
?> -->
