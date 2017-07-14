<?php
require_once 'service.php';
require_once '../../member/service.php';
require_once '../img_board/service.php';

class ImgsController{
	private $action;
	private $data;
	private $view;
	private $service;
	private $writer;
	private $ids;
	private $mService;
	private $bService;
	private $img_id;
	
	public function __construct($action){
		$this->action = $action;
		$this->service = new ImgsService();
		$this->mService = new MemberService();
		$this->bService = new ReplyService();
	}
	
	public function run(){
		switch($this->action){
			case "add":
				$this->add();
				return;
			case "list":
				$this->ilist();
				break;
			case "addReply":
				$this->addReply();
				return;
			case "listReply":
				$this->listReply();
				break;
			case "delReply":
				$this->delReply();
				break;
		}
		require 'view/'.$this->view;
	}
	public function add(){
		$fileUpload = new FileUpload();
		$path = $fileUpload->upload($_POST['writer']);
		$this->service->addImg(new Img(0, $path, $_POST['title'], 
				$_POST['writer'], ''));
		$this->action = "list";
		$this->run();
	}
	public function ilist(){
		$this->writer = $_REQUEST['writer'];
		$this->data = $this->service->getAll($this->writer);
		$this->ids = $this->mService->getIds($this->writer);
		foreach ($this->data as $i){
			$i->setReps($this->bService->getAll($i->getId()));
		}
		$this->view = "list.php";
	}
	public function addReply(){
		$this->bService->addReply(new Reply(0, $_POST['img_id'], 
				$_POST['content'], '', $_POST['writer']));
		$this->img_id = $_POST['img_id'];
		$this->action = "listReply";
		$this->run();
	}
	public function listReply(){
		$this->data = $this->bService->getAll($this->img_id);
		$this->view = "rList.php";
	}
}

?>