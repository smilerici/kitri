<?php
session_start();
class Member{
	public $name;
	public $tel;
	public $address;
	
	public function __construct($name, $tel, $address){
		$this->name = $name;
		$this->tel = $tel;
		$this->address = $address;
		
	}
	public function memberInfo(){
		print "name : ".$this->name."<br>"; 
		print "tel : ".$this->tel."<br>"; 
		print "address : ".$this->address."<br>"; 
		print "=====================<br>"; 
	
	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$members;
	if(isset($_SESSION["datas"])){
		$members = $_SESSION["datas"];
	}else {
		$members= array();
	}
		$members[] =
	new Member($_POST["name"],$_POST["tel"],$_POST["address"]); 
for($i = 0; $i < count ( $members ); $i ++) {
		$members [$i]->memberInfo();
}
}
?>
<html>
<head></head>
<body>
<h3>주소록 등록</h3>
<form name="f" action="" method="post">
name : <input type="text" name="p1[]"><br>
tel : <input type="tel" name="p1[]"><br>
address : <input type="text" name="p1[]"><br>
<input type="submit" value="등록">
</form></body>
</html>