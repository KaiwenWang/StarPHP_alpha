<?php
class Lib_Db_Mysqli{
	

	private $conn;

	public function __construct(){
		$host="127.0.0.1";
		$user="root";
		$pass="huawei2114#";
		$db="starphp";
		$cst="utf8";
		$this->conn=self::connect($host,$user,$pass,$db);
		
	}

	public function init(){
		
	}

	
	public function connect($host,$user,$pass,$db=""){
		$mysqli = mysqli_connect($host, $user, $pass, $db);

		if ($mysqli->connect_error) {
		    die('Connect Error (' . $mysqli->connect_errno . ') '
			    . $mysqli->connect_error);
		}

		return $mysqli;
	}

	public function query($sql){
		echo $sql;
		$res=$this->conn->query($sql);
		var_dump($res);
		if($res){
			return $res;
		}

		return false;
	}

}
