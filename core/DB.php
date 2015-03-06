<?php


class Star_DB{
	private $_db;

	public function __construct(){
		$_type=C('DB');
		if($_type=="mysql"){
			$this->_db=new Lib_Db_Mysql();
		}elseif($_type=="mysqli"){
			$this->_db=new Lib_Db_Mysqli();
		}elseif($_type=="pdo"){
			$this->_db=new Lib_Db_PDO();
		}	
	}
	/*public function insert(){
	
	}*/


	//最重要的方法
	public function query($sql){
		$res=$this->_db->query($sql);
		return $res;
	}

}
