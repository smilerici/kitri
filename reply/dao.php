<?php
require_once 'dto.php';
class ReplyDao{
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
	public function insert($r) {
		$num = 0;
		$this->connect ();
		try {
			$sql = "insert into reply values(null,?,?,?,now())";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $r->getPwd() );
			$stm->bindValue ( 2, $r->getWriter() );
			$stm->bindValue ( 3, $r->getContent() );
			$stm->execute ();
			$sql = "select last_insert_id()";//방금추가된 행의 pk값 검색
			$stm = $this->conn->prepare ( $sql );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				$row = $stm->fetch ( PDO::FETCH_BOTH );
				$num = $row[0];
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $num;
	}
	public function select($num) {
		$r = null;
		$this->connect ();
		try {
			$sql = "select * from reply where num=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $num );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				$row = $stm->fetch ( PDO::FETCH_BOTH);
				$r = new Reply ( $row ['num'], $row ['pwd'],
						$row ['writer'], $row ['content'], 
						$row ['wdate']);
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $r;
	}
	
	public function selectAll() {
		$r = array();
		$this->connect ();
		try {
			$sql = "select * from reply";
			$stm = $this->conn->prepare ( $sql );
			$stm->execute ();
			$cnt = $stm->rowCount ();
			if ($cnt > 0) {
				while ( $row = $stm->fetch ( PDO::FETCH_ASSOC ) ) {
					$r[] = new Reply ( $row ['num'], $row ['pwd'],
							$row ['writer'], $row ['content'],
							$row ['wdate']);
				}
			}
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $r;
	}
	public function update($r) {
		$this->connect ();
		try {
			$sql = "update reply set wdate=now(), content=? where num=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $r->getContent() );
			$stm->bindValue ( 2, $r->getNum() );
			$stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
	}
	public function delete($num) {
		$flag = false;
		$this->connect ();
		try {
			$sql = "delete from reply where num=?";
			$stm = $this->conn->prepare ( $sql );
			$stm->bindValue ( 1, $num );
			$flag = $stm->execute ();
		} catch ( PDOException $e ) {
			print $e->getMessage ();
		}
		$this->disconnect ();
		return $flag;
	}
}
?>





