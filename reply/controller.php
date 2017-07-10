<?php
require_once 'service';
class controller{
	
	private $action;
	private $service;
	private $data;
	private $view;
	
	
	public function __construct($action){
		$this->service = new ReplyService();
		$this->action = $action;
	}
	
	public function run(){
		switch($this->action){
			case "add":
			case "list":
			case "edit":
			case "del":
				
					
		}
		require 'view/'.$this->view;
	}
}
?>