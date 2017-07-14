<?php
class Article{
	private $num;
	private $wdate;
	private $title;
	private $content;
	private $writer;
	private $category;
	private $parent;
	private $reps;
	
	public function __construct($num, $wdate, $title, $content, $writer, $category){
		$this->num = $num;
		$this->wdate = $wdate;
		$this->title = $title;
		$this->content = $content;
		$this->writer = $writer;
		$this->category = $category;
	}
	public function setParent($parent){
		$this->parent = $parent;
	}
	public function getParent(){
		return $this->parent;
	}
	public function setReps($arr){
		$this->reps = $arr;
	}
	
	public function getReps(){
		return $this->reps;
	}
	
	public function setNum($num){
		$this->num = $num;
	}
	public function getNum(){
		return $this->num;
	}
	public function setWdate($wdate){
		$this->wdate = $wdate;
	}
	public function getWdate(){
		return $this->wdate;
	}
	public function setTitle($title){
		$this->title= $title;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setContent($content){
		$this->content= $content;
	}
	public function getContent(){
		return $this->content;
	}
	public function setWriter($writer){
		$this->writer= $writer;
	}
	public function getWriter(){
		return $this->writer;
	}
	public function setCategory($category){
		$this->category= $category;
	}
	public function getCategory(){
		return $this->category;
	}
	public function __toString(){
		return "num:".$this->num.", wdate:".$this->wdate.", title:".
				$this->title.", content:".$this->content.", writer:".
				$this->writer.", category:".$this->category."<br>";
	}
}

?>


