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
	//배열. db
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
		$idx = $this->getMember($m->__get("id"));
		if($idx<0){
			print "없는 아이디<br>";
		}else{
			$this->members[$idx]->__set("pwd", $m->__get("pwd"));
			$this->members[$idx]->__set("email", $m->__get("email"));
		}
	}
	public function printMember($id){
		//id로 검색하여 멤버 1개 출력
		$idx = $this->getMember($id);
		if($idx<0){
			print "없는 아이디<br>";
		}else{
			$this->members[$idx]->printMember();
		}
	}
	
	//검색
	public function getMember($id){
		for($i=0;$i<count($this->members);$i++){
			if($id == $this->members[$i]->__get("id")){
				return $i;
			}
		}
		return -1;
	}
	public function printAll(){
		//배열 members 전체 출력
		foreach ($this->members as $m){
			$m->printMember();
		}
	}
	public function delMember($id){
		//id 검색해서 한명 삭제
		$idx = $this->getMember($id);
		if($idx<0){
			print "없는 아이디<br>";
		}else{
			unset($this->members[$idx]);
			$this->members = array_values($this->members);
		}
	}
	
}
$dao = new ProcessMember();
$flag = true;
function printFlag($type){
	global $flag;
	if(!$flag){
		print $type."처리불가<br>";
	}
}

$flag = $dao->addMember(new Member('aaa', '111', 'asdf', 'qwer'));
printFlag("add");
$flag = $dao->addMember(new Member('aaa', '111', 'asdf', 'qwer'));
printFlag("add");
$flag = $dao->addMember(new Member('bbb', '222', 'asdf', 'qwer'));
printFlag("add");
$flag = $dao->addMember(new Member('ccc', '333', 'asdf', 'qwer'));
printFlag("add");
$dao->printAll();
$dao->editMember(new Member("bbb", '2345','','456'));
$dao->printMember('bbb');
$dao->delMember('bbb');
$dao->printAll();
?>



