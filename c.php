<?php
class Member {
	private $data;
	
	// 생성자, setter, getter
	public function __construct($id, $pwd, $name, $email) {
		$this->data ["id"] = $id;
		$this->data ["pwd"] = $pwd;
		$this->data ["name"] = $name;
		$this->data ["email"] = $email;
	}
	public function __set($k, $v) {
		if (array_key_exists ( $k, $this->data )) {
			$this->data [$k] = $v;
		}
	}
	public function __get($k) {
		if (array_key_exists ( $k, $this->data )) {
			return $this->data [$k];
		}
	}
	public function printMember() {
		foreach ( $this->data as $k => $v ) {
			print $k . ":" . $v . "<br>";
		}
	}
}

class ProcessMember{
	//배열
	private $members;
	
	public function addMember($m){
		$idx = $this->getMember($m->__get("id"));
		if($idx<0){
			$this->members[] = $m;
			return true;
		}else{
			return false;
		}
	}
	
	public function editMember($m){
		//pwd, email만 수정
	}
	public function printMember($id){
		//id로 검색하여 멤버 1개 출력
	}
	
	//검색
	public function getMember($id){
		for($i=0;$i<count($this->members);$i++){
			if($id == $members[$i]->__get("id")){
				return $i;
			}
		}
		return -1;
	}
	public function printAll(){
		//배열 members 전체 출력
	}
	public function delMember($id){
		//id 검색해서 한명 삭제
	}
	
}

?>



