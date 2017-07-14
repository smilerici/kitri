<html>
<body>
<form action="" method="post">
name:<input type="text" name="name"><br>
kor:<input type="number" name="kor"><br>
eng:<input type="number" name="eng"><br>
math:<input type="number" name="math"><br>
<input type="submit" value="추가"><br>
</form>
<?php
  class Student{
  	public $name;
  	public $kor;
  	public $eng;
  	public $math;
  	public $total;
  	public $avg;
  	
  	public function __construct($name, $kor, $eng, $math){
  		$this->name = $name;
  		$this->kor = $kor;
  		$this->eng = $eng;
  		$this->math = $math;
  	}
  	
  	public function calc(){
  		$this->total = $this->kor+$this->eng+$this->math;
  		$this->avg = (float)$this->total/3;
  	}
  	public function printInfo(){
  		print "name:".$this->name."<br>";
  		print "kor:".$this->kor."<br>";
  		print "eng:".$this->eng."<br>";
  		print "math:".$this->math."<br>";
  		print "total:".$this->total."<br>";
  		print "avg:".$this->avg."<br>";
  	}
  }
  if($_SERVER['REQUEST_METHOD']=='POST'){
  	session_start();
  	$datas;
  	if(isset($_SESSION['datas2'])){
  		$datas = $_SESSION['datas2'];
  	}else{
  		$datas = array();
  	}
  	$datas[] = new Student($_POST['name'], $_POST['kor'],
  			$_POST['eng'],$_POST['math']);
  	$datas[count($datas)-1]->calc();
  	print "<h3>result</h3><table border='1'>";
  	print "<tr><th>name</th><th>kor</th>
<th>eng</th><th>math</th><th>total</th><th>avg</th></tr>";
  	for($i=0;$i<count($datas);$i++){
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