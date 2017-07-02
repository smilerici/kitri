<?php
require_once 'dto.php';

class Controller{
	private	$action;
	private $myfile;
	private $view;
	private $data;
	
	public function __construct($action){
		$this->action = $action;
		$this->myfile = new MyFile();
	}
	
	public function run(){
		switch($this->action){
			case "list":
				$this->flist();
				break;
			case "read":
				$this->read();
				break;
			case "writeForm":
				$this->writeForm();
				break;
			case "write":
				$this->write();
				return;
			case "check":
				$this->check();
				return;
			case "del":
				$this->del();
				return;
		}
		require $this->view;
	}
	
	public function flist(){
		$this->data = $this->myfile->flist(1);
		$this->view = "list.php";
	}
	
	public function read(){
		$this->myfile->setFileName($_GET['fname']);
		$this->myfile->read();
		$this->view = "read.php";
	}
	
	public function write(){
		$this->myfile->setFileName($_POST['fname']);
		$this->myfile->setContent($_POST['content']);
		$this->myfile->setImgName($_POST['iname']);
		$this->myfile->write();
		$this->action = "list";
		$this->run();
	}
	
	public function check(){
		$this->myfile->setFileName($_POST['fname']);
		$flag = $this->myfile->check();
		if($flag){
			print "<script>alert('중복된 이름');</script>";
			require "new.php";
		}else{		
			print "<script>opener.document.f1.fname.value='".$this->myfile->getFileName()."';opener.document.f1.result.value=true;self.close();</script>";			
		}
	}
	public function del(){
		$this->myfile->setFileName($_POST['fname']);
		$this->myfile->delete();
		$this->action = "list";
		$this->run();
	}
	public function writeForm(){
		$this->data = $this->myfile->flist(2);
		$this->view = "write.php";
	}
}
?>



