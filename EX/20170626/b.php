<?php
class Test{
	public static $x=0;
	public $y=0;
	
	public function __construct(){
		self::$x++;
		$this->y++;
		print self::$x."번째 객체의 y = ".$this->y." 입니다.<br>";
		
	}
	
	public function printXY(){
		print "x : ".self::$x.", y : ".$this->y."<br>";
	}
}

//print Test::$x."<br>";
//print Test::$y."<br>";
$t1 = new Test();
$t2 = new Test();
$t3 = new Test();
$t4 = new Test();
/* $t1->printXY();
$t2->printXY();
$t3->printXY();
$t4->printXY(); */
?>