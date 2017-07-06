<?php
require_once 'service.php';
class MemberController{
	private $hService;
	private $mService;
	private $action;
	private $data;
	private $view;
	
	public function __construct($action){
		$this->hService = new HobbyService();
		$this->mService = new MemberService();
		$this->action = $action;
	}
	public function run(){
		switch ($this->action){
			case "join":
				$this->join();
				break;
			case "login":
				$this->login($_POST['id'], $_POST['pwd']);
				break;
			case "editInfo":
				break;
			case "myInfo":
				break;
			case "logout":
				break;
			case "out":
				break;
			case "joinForm":
				$this->hobbyList();
				break;
		}
		require 'view/'.$this->view;
	}
	public function join(){
		$str = implode(",", $_POST['hobby']);
		$m = new Member($_POST['id'],$_POST['pwd'],$_POST['name'],
				$_POST['email'],$str,$_POST['msg']);
		$this->mService->join($m);
		$this->view = "loginForm.php";
	}
	public function hobbyList(){
		$this->data = $this->hService->getAll();
		$this->view = "joinForm.php";
	}
	
	public function login($id,$pwd){
		$this->data = $this->mService->login($id, $pwd);
		if($this->data == 3){
			$this->view="main.php";
		}else {
			$thiw->view="loginForm.php";
		}
		
	}
}
?>