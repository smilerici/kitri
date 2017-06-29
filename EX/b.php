<?php
//클래스 정의, 즉 사용자 정의 데이터 타입을 만든다
class Point {
	public $x;
	public $y;
	
	public function __construct($x,$y){
		print "생성자<br>";
		$this -> x = $x;
		$this -> y = $y;
	}
	public function printPoint(){
		print "x : ".$this->x.", y : ".$this->y."<br>";
	}
}
//객체 생성. 클래스 타입의 변수를 생성한다.

//$p0 = new Point ();
$p1 = new Point (2,3);

//생성한 객체의 멤버 변수에 값 할당
$p1->x = 10;
$p1->y = 20;

//객체의 멤버 변수 값 읽기
$p1->printPoint();
$p1->printPoint();
$p1->printPoint();
?>