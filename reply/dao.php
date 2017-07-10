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
	
	public function insert($reply){
		$this->connect();
		try{
			$sql = "insert into reply values(?,?,?,?,?)";
			$stm = $this->conn->prepare ($sql);
			$stm->bindValue(1, $reply->getNum());
			$stm->bindValue(2, $reply->getPwd());
			$stm->bindValue(3, $reply->getWriter());
			$stm->bindValue(4, $reply->getContent());
			$stm->bindValue(5, $reply->getWdate());
			$stm->execute();
		} catch(PDOException $e){
			print $e->getMessage();
		}
		$this->disconnect();
	}
	public function select($num){
		$a = null;
		$this->connect();
		try{
		$sql = "select * from reply where num=?";	
		$stm->$this->conn->prepare($sql);
		$stm->bindValue(1,$num);
		$stm->execute();
		$cnt->$stm->rowCount();
		if($cnt>0){
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			$a = new reply($row ['num'],$row ['pwd'],$row ['writer'],
					$row ['content'],$row ['wdate']);
		}
		} catch(PDOException $e){
			print $e->getMessage();
		}
		$this->disconnet();
		return $a;
	}
	public function selectAll(){
		$a = array();
		$this->connect();
		try{
			$sql = "select * from reply";
			$stm = $this->conn->prepare($sql);
			$stm->execute();
			$cnt = $stm.rowCount();
			if($cnt>0){
				while($row = $stm->fetch(PDO::FETCH_ASSOC)){
					$a[] = new reply($row['num'], $row['pwd'], $row['writer'],
							$row['content'], $row['wdate']);
				}
			}
			
		}catch(PDOException $e){
			$e.getMessage();
		}
		$this->disconnect();
		return $a;
		
	}
	public function update($reply){
		$this->connet();
		try{
			$sql = "update reply set num=?, pwd=?, writer=?, 
content=?, wdate=?";
			$stm = $this->conn->prepare($sql);
			$stm->bindValue(1,$reply->getNum());
			$stm->bindValue(2,$reply->getPwd());
			$stm->bindValue(3,$reply->getWriter());
			$stm->bindValue(4,$reply->getContent());
			$stm->bindValue(5,$reply->getWdate());
			$stm->execute();
		}catch(PDOException $e){
			$e.getMessage();
		}
		$this->disconnect();
	}
	public function delete($num){
		$this->connect();
		try{
			$sql = "delete from reply where num=?";
			$stm = $this->conn->prepare($sql);
			$stm->bindValue(1, $num);
			$stm->execute();
		}catch(PDOException $e){
			print $e->getMessage();
		}
		$this->disconnect();
	}
}
?>