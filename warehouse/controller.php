<?php
require_once 'service.php';
class ProductController{
	public $action;
	public $result;
	public $data;
	public $service;
	
	public function __construct($action){
		$this->action = $action;
		$this->service = new ProductService();
	}
	public function plist(){
		$this->data = $this->service->getAll();
		$this->result = "list.php";
	}
	public function add(){
		$p = new Product(0, $_POST['name'], $_POST['price'], 
				$_POST['quantity']);
		$this->service->addProduct($p);
		$this->action = "list";
		$this->run();
	}
	public function search(){
		$sno = $_GET['sno'];
		$this->data = $this->service->getProduct($sno);
		$this->result = "search.php";
	}
	public function run(){
		switch($this->action){
			case "list":
				$this->plist();
				break;
			case "add":
				$this->add();
				return;
			case "edit":
				return;
			case "del":
				return;
			case "search":
				$this->search();
				break;			
		}
		require "view/".$this->result;
	}
}
?>