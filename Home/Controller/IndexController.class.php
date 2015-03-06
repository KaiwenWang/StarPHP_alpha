<?php
class IndexController extends Star_Controller{

	
	public function Index(){
		$this->display();
		echo C('titile');
		$index=M('Index');
		//此处应有validation
		$data=$_GET;
		$res=$index->addUser($data);
		
		if($res){
			$this->alert('添加成功');
		}
	}
}
