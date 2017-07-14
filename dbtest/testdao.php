<?php
class emp{
	private $empid;
	private $name;
	private $deptid;
	
	public function __construct($empid, $name, $deptid){
		$this->empid = $empid;
		$this->name = $name;
		$this->deptid = $deptid;
	}
	
	public function setEmpId($empid){
		$this->empid = $empid;
	}
	public function getEmpId(){
		return $this->empid;
	}
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function setDeptId($deptid){
		$this->deptid= $deptid;
	}
	public function getDeptId(){
		return $this->deptid;
	}
}
?>