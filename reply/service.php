<?php
require_once 'dao.php';
class ReplyService{
	private $dao;
	public function __construct(){
		$this->dao = new ReplyDao();
	}
	
	public function addReply($reply){
		return $this->dao->insert($reply);
	}
	public function getReply($num){
		return $this->dao->select($num);
	}
	public function getAll(){
		return $this->dao->selectAll();
	}
	public function editReply($reply){
		$this->dao->update($reply);
	}
	public function delReply($num){
		return $this->dao->delete($num);
	}
}
?>