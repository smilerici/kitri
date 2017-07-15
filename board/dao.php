<?php
require_once 'dto.php';
class BoardDao {
	private $conn = null;
	public function connect() {
		try {
			$this->conn = new PDO ( 'mysql:host=localhost;dbname=mydb;
				charset=utf8', 'hr', 'hr' );
			$this->conn->setAttribute ( PDO::ATTR_ERRMODE, 
					PDO::ERRMODE_EXCEPTION );
			$this->conn->setAttribute ( PDO::ATTR_EMULATE_PREPARES, 
					false );
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
	}
	public function disconnect() {
		$this->conn = null;
	}
	public function insert($b) {
		$this->connect ();
		try {
			$sql = "insert into board values(null,now(),?,?,?,?,?)";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $b->getTitle () );
			$stm->bindValue ( 2, $b->getContent () );
			$stm->bindValue ( 3, $b->getWriter () );
			$stm->bindValue ( 4, $b->getCategory () );
			$stm->bindValue ( 5, $b->getParent () );
			$stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
	}
	public function selectByNum($num) {
		$a = null;
		$this->connect ();
		try {
			$sql = "select * from board where num=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $num );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				$row = $stm->fetch ( PDO::FETCH_ASSOC );
				$a = new Article ( $row ['num'], $row ['wdate'], 
					$row ['title'], $row ['content'], $row ['writer'], 
						$row ['category'] );
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $a;
	}
	public function selectByWriter($writer) {
		$a = array();
		$this->connect ();
		try {
			$sql = "select * from board where writer=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $writer );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				while ( $row = $stm->fetch ( PDO::FETCH_ASSOC ) ) {
					$a[] = new Article ( $row ['num'], $row ['wdate'],
					$row ['title'], $row ['content'], $row ['writer'],
							$row ['category'] );
				}
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $a;
	}
	public function selectByCategory($category) {
		$a = array();
		$this->connect ();
		try {
			$sql = "select * from board where category=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $category);
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				while ( $row = $stm->fetch ( PDO::FETCH_ASSOC ) ) {
					$a[] = new Article ( $row ['num'], $row ['wdate'],
					$row ['title'], $row ['content'], $row ['writer'],
							$row ['category'] );
				}
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $a;
	}
	public function selectByTitle($title) {
		$a = array();
		$this->connect ();
		try {
			$sql = "select * from board where title like '%".
			$title."%'";
			$stm = $this->conn->prepare ( $sql );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				while ( $row = $stm->fetch ( PDO::FETCH_ASSOC ) ) {
					$a[] = new Article ( $row ['num'], $row ['wdate'],
					$row ['title'], $row ['content'], $row ['writer'],
							$row ['category'] );
				}
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $a;
	}
	public function selectAll() {
		$a = array();
		$this->connect ();
		try {
			$sql = "select * from board where parent=0";
			$stm = $this->conn->prepare ( $sql );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				while ( $row = $stm->fetch ( PDO::FETCH_ASSOC ) ) {
					$a[] = new Article ( $row ['num'], $row ['wdate'],
					$row ['title'], $row ['content'], $row ['writer'],
							$row ['category'] );
				}
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $a;
	}
	public function selectByParent($parent){
		$a = array();
		$this->connect ();
		try {
			$sql = "select * from board where parent=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $parent);
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				while ( $row = $stm->fetch ( PDO::FETCH_ASSOC ) ) {
					$a[] = new Article ( $row ['num'], $row ['wdate'],
					$row ['title'], $row ['content'], $row ['writer'],
					$row ['category'] );
				}
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $a;
	}
	public function update($a) {
		$this->connect ();
		try {
			$sql = "update board set wdate=now(), title=?, 
						content=?, category=? where num=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $a->getTitle () );
			$stm->bindValue ( 2, $a->getContent () );
			$stm->bindValue ( 3, $a->getCategory () );
			$stm->bindValue ( 4, $a->getNum () );
			$stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
	}
	public function delete($num) {
		$this->connect ();
		try {
			$sql = "delete from board where num=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $num );
			$stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
	}
}//dao end
?>






