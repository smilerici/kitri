<?php
class Reply{
	private $num;
	private $img_id;
	private $content;
	private $wdate;
	private $wrtier;
	
	public function __construct($num,$img_id,$content,$wdate,$writer){
		$this->num = $num;
		$this->img_id = $img_id;
		$this->content = $content;
		$this->wdate = $wdate;
		$this->writer = $writer;
	}
	
	public function setNum($num){
		$this->num = $num;
	}
	
	public function getNum(){
		return $num();
	}
	public function setImg_id($img_id){
		$this->img_id= $img_id;
	}
	
	public function getImg_id(){
		return $img_id();
	}
	public function setContent($content){
	}
	
	public function getContent(){
		return $content();
	}
	public function setWdate($wdate){
		$this->wdate= $wdate;
	}
	
	public function getWdate(){
		return $wdate();
	}
	public function setWriter($writer){
		$this->writer = $writer;
	}
	
	public function getWriter(){
		return $writer();
	}
	
	public function toString(){
		return "num:".$this->num.", img_id : ".$this->img_id.", content:".$this->content.", wdate:".$this-wdate.",
writer : ".$this->writer."<br>";
	}
}
?>