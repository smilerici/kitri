<?php
class Product{
	public $sno;
	public $name;
	public $price;
	public $quantity;
	
	public function __construct($sno, $name, $price, $quantity){
		$this->sno = $sno;
		$this->name = $name;
		$this->price = $price;
		$this->quantity = $quantity;
	}
	
	public function printProduct(){
		print "sno:".$this->sno."<br>";
		print "name:".$this->name."<br>";
		print "price:".$this->price."<br>";
		print "quantity:".$this->quantity."<br>";
		print "================<br>";
	}
}
?>