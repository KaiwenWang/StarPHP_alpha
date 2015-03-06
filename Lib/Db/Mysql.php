<?php
class Lib_Db_Mysql{
	

	private $conn;

	public function __construct(){
		$host="127.0.0.1:3306";
		$user="root";
		$pass="huawei2114#";
		$db="starphp";
		$cst="utf8";
		$this->conn=self::connect($host,$user,$pass);
		mysql_set_charset($cst,$this->conn);
		mysql_select_db($db, $this->conn) or die ('Can\'t use foo : ' . mysql_error());
		
	}

	public function init(){
		
	}

	
	public function connect($host,$user,$pass){
		$link = mysql_connect($host,$user,$pass);
		if (!$link) {
		    die('Could not connect: ' . mysql_error());
		}

		return $link;

	}

	public function query($sql){
		echo $sql;
		$res=mysql_query($sql,$this->conn);
		var_dump($res);
		if($res){
			return $res;
		}

		return false;
	}

}
