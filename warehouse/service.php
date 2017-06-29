<?php
require_once 'dao.php';
class ProductService{
	public $dao;
	public function __construct(){
		$this->dao = new ProductDao();
	}
	public function addProduct($p){
		$this->dao->insert($p);
	}
	public function getProduct($sno){
		return $this->dao->select($sno);
	}
	public function getAll(){
		return $this->dao->selectAll();
	}
	public function editProduct($p){
		$this->dao->update($p);
	}
	public function delProduct($sno){
		$this->dao->delete($sno);
	}
}
?>