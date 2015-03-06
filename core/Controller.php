<?php

abstract class Star_Controller{

	public $_view;

	public function __construct(){
		$this->_view=new Star_View();
	}

	public function display($tpl=null){
		$content=$this->_view->fetch($tpl);
		echo $content;
	}


	public function parse_get($name){}

	public function parse_post($name){}


	public function parse_request(){}

	public function alert($str){
		echo "<div style='width:300px;height:200px;margin:100px auto;backgroud:#ccc;position:absolute;left:300px;top:200px;z-index:100'><p>".$str."</p></div>";
	}
}
