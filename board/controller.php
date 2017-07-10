<?php
require_once 'service.php';
require_once '../member/service.php';

class BoardController{
	private $bService;
	private $hService;
	private $action;
	private $data;
	private $view;
	private $category;
	
	public function __construct($action){
		$this->bService = new BoardService();
		$this->hService = new HobbyService();
		$this->action = $action;
	}
	
	public function run(){
		switch($this->action){
			case "add":
				$this->add();
				return;
			case "list":
				$this->boardList();
				break;
			case "listByCategory":
				$this->listByCategory();
				break;
			case "listByWriter":
				break;
			case "listByTitle":
				break;
			case "detail":
				$this->detail();
				break;
			case "edit":
				$this->edit();
				return;
			case "del":
				$this->delete();
				return;
			case "writeForm":
				$this->writeForm();
				break;
		}
		require 'view/'.$this->view;
	}
	public function boardList(){
		$this->data = $this->bService->getAll();
		$this->getCategory();
		$this->view = "list.php";
	}
	public function getCategory(){
		$this->category = $this->hService->getAll();
	}
	public function listByCategory(){
		$this->data = $this->bService->getByCategory($_POST['cate']);
		$this->getCategory();
		$this->view = "list.php";
	}
	public function writeForm(){
		$this->getCategory();
		$this->view = "writeForm.php";
	}
	public function add(){
		$a = new Article(0, '', $_POST['title'], $_POST['content'], 
				$_POST['writer'], $_POST['cate']);
		$this->bService->addArticle($a);
		$this->action="list";
		$this->run();
	}
	public function detail(){
		$this->data = $this->bService->getByNum($_GET['num']);
		$this->getCategory();
		$this->view = "detail.php";
	}
	
	public function delete(){
		$this->bService->delArticle($_POST['num']);
		$this->action = "list";
		$this->run();
		$this->view = "list.php";
		
	}
	
	public function edit(){
		$a = new Article($_POST['num'], '', $_POST['title'], $_POST['content'], $_POST['writer'], $_POST['cate']);
		$this->bService->editArticle($a);
		$this->action="list";
		$this->run();
	}
}
?>


