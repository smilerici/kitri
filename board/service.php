<?php
require_once 'dao.php';
class BoardService {
	private $dao;
	public function __construct() {
		$this->dao = new BoardDao ();
	}
	public function addArticle($article) {
		$this->dao->insert ( $article );
	}
	public function getByNum($num) {
		return $this->dao->selectByNum ( $num );
	}
	public function getByWriter($writer) {
		return $this->dao->selectByWriter ( $writer );
	}
	public function getByTitle($title) {
		return $this->dao->selectByTitle ( $title );
	}
	public function getByCategory($category) {
		return $this->dao->selectByCategory ( $category );
	}
	public function getAll() {
		$arr = $this->dao->selectAll ();
		for($i = 0; $i < count ( $arr ); $i ++) {
			$arr [$i]->setReps ( $this->dao->selectByParent ( $arr [$i]->getNum () ) );
		}
		return $arr;
	}
	public function editArticle($article) {
		$this->dao->update ( $article );
	}
	public function delArticle($num) {
		$this->dao->delete ( $num );
	}
}
?>