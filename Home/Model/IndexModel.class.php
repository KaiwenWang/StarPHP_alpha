<?php
class IndexModel extends Star_Model{
	private $_tbl="user";

	public function addUser($data){
		print_r($data);
		//插入数据尝试，在Mdoel曾中应该处理字段名称问题
		$res=$this->insert($data,$this->_tbl);
		return $res;
	}	

}
