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
				$this->listByWriter();
				break;
			case "listByTitle":
				$this->listByTitle();
				break;
			case "detail":
				$this->detail();
				break;
			case "edit":
				$this->edit();
				return;
			case "del":
				$this->del();
				return;
			case "writeForm":
				$this->writeForm();
				break;
			case "article_json":
				$this->article_json();
				break;
		}
		require 'view/'.$this->view;
	}
	public function listByWriter(){
		$this->data = $this->bService->getByWriter($_POST['writer']);
		$this->view = "searchList.php";
	}
	public function listByTitle(){
		$this->data = $this->bService->getByTitle($_POST['title']);
		$this->view = "searchList.php";
	}
	public function article_json(){
		$this->data = $this->bService->getByNum($_REQUEST['num']);
		$this->view = "article_json.php";
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
		$a->setParent($_POST['parent']);
		$this->bService->addArticle($a);
		$this->action="list";
		$this->run();
	}
	public function detail(){
		$this->data = $this->bService->getByNum($_GET['num']);
		$this->getCategory();
		$this->view = "detail.php";
	}
	public function edit(){
		$a = new Article($_POST['num'], '', $_POST['title'],
				$_POST['content'],'', $_POST['cate']);
		$this->bService->editArticle($a);
		$this->action="list";
		$this->run();
	}
	public function del(){
		$this->bService->delArticle($_GET['num']);
		$this->action="list";
		$this->run();
	}
}
?>


