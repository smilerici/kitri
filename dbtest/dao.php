<?php
include 'vo.php';

class Dao{
	private $conn = null;
	
	public function openDB(){
		try {			
			$this->conn = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'hr', 'hr');			
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);			
		}catch (PDOException $e){
			print $e->getMessage();
		}
	}
	
	public function closeDB(){
		$this->conn= null;
	}
	
	public function getConn(){
		return $this->conn;
	}
	public function insert(Member $m){
		$this->openDB();
		
		try {
			$sql = "insert into member values(?,?,?,?)";
			$stm = $this->conn->prepare($sql);
			$stm->bindValue(1, $m->getId());
			$stm->bindValue(2, $m->getPwd());
			$stm->bindValue(3, $m->getName());
			$stm->bindValue(4, $m->getEmail());
			$stm->execute();
		}catch (PDOException $e){
			print $e->getMessage();
		}
		
		$this->closeDB();
	}
	public function select($id){
		$this->openDB();
		
		try {
			$sql = "select * from member where id=?";
			$stm = $this->conn->prepare($sql);
			$stm->bindValue(1, $id);
			$stm->execute();
			$cnt = $stm->rowCount();
			if($cnt>=1){		
				$row = $stm->fetch(PDO::FETCH_ASSOC);
				$m = new Member($row['id'], $row['pwd'], $row['name'], $row['email']);
			}
		}catch (PDOException $e){
			print $e->getMessage();
		}
		
		$this->closeDB();
	
		return $m;
	}
	public function update(Member $m){
		$this->openDB();
		
		try {
			$sql = "update member set pwd=?, email=? where id=?";
			$stm = $this->conn->prepare($sql);			
			$stm->bindValue(1, $m->getPwd());
			$stm->bindValue(2, $m->getEmail());
			$stm->bindValue(3, $m->getId());
			$stm->execute();
		}catch (PDOException $e){
			print $e->getMessage();
		}
		
		$this->closeDB();
	}
	public function delete($id){
		$this->openDB();
		
		try {
			$sql = "delete from member where id=?";
			$stm = $this->conn->prepare($sql);
			$stm->bindValue(1, $id);
			$stm->execute();
		}catch (PDOException $e){
			print $e->getMessage();
		}
		
		$this->closeDB();
	}
}

?>