<?php
require_once 'service.php';
class ReplyController{
	private $action;
	private $service;
	private $data;
	private $view;
	private $num;
	
	public function __construct($action){
		$this->num = 0;
		$this->action = $action;
		$this->service = new ReplyService();
	}
	
	public function run(){
		switch ($this->action){
			case "add":
				$this->add();
				return;
			case "get":
				$this->get();
				break;
			case "getAll":
				$this->getAll();
				break;
			case "edit":
				$this->edit();
				break;
			case "del":
				$this->del();
				break;
		}
		require 'view/'.$this->view;
	}
	public function add(){
		$this->num = $this->service->addReply(new Reply(0, 
				$_POST['pwd'], $_POST['writer'], $_POST['content'],''));
		
		$this->action = "get";
		$this->run();
	}
	public function get(){
		if($this->num==0){
			$this->data = $this->service->getReply($_REQUEST['num']);
		}else{
			$this->data = $this->service->getReply($this->num);
		}
		$this->view = "reply.php";
	}
	public function getAll(){
		$this->data = $this->service->getAll();
		$this->view = "list.php";
	}
	public function edit(){
		$this->num = $_POST['num'];
		$this->service->editReply(new Reply($this->num, '', 
				'', $_POST['content'], ''));
		$this->data = $this->service->getReply($this->num);
		$this->view = "reply.php";
	}
	public function del(){
		$this->num = $_REQUEST['num'];
		$this->data = $this->service->delReply($this->num);
		$this->view = "del.php";
	}
}
?>



