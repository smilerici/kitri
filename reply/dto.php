<?php
class reply{
	
	private $num;
	private $pwd;
	private $writer;
	private $content;
	private $wdate;
	
	public function __construct($num, $pwd, $writer, $content, $wdate){
		$this->num = $num;
		$this->pwd = $pwd;
		$this->writer = $writer;
		$this->content = $content;
		$this->wdate = $wdate;
	}
	
	public function setNum($num){
		$this->num = $num;
	}
	
	public function getNum(){
		return $this->num;
	}
	
	public function setPwd($pwd){
		$this->pwd = $pwd;
	}
	
	public function getPwd(){
		return $this->pwd;
	}
	public function setWriter($writer){
		$this->writer = $writer;
	}
	
	public function getWriter(){
		return $this->writer;
	}
	public function setContent($content){
		$this->content = content;
	}
	
	public function getContent(){
		return $this->content;
	}
	public function setWdate($wdate){
		$this->wdate = $wdate;
	}
	
	public function getWdate(){
		return $this->wdate;
	}
}
		
?>