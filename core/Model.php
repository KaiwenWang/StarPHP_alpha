<?php
abstract class Star_Model{
	private $_db="";
	private $_tbl="";
	
	public function __construct(){
		$this->_db=new Star_DB();
	}

	public function insert($data,$tbl){
		$sql="insert into ".$tbl;
		$tbl_arch=$val="(";
		foreach($data as $key =>$value){
			$tbl_arch.=$key.",";
			$val.='"'.$value.'",';
		}

		$tbl_arch=substr($tbl_arch,0,-1).")";
		$val=substr($val,0,-1).")";

		$sql.=$tbl_arch." values ".$val;

		$res=$this->_db->query($sql);

		return $res;

	}

	public function delete(){

	}
	     /**
	     * 获取更新SQL语句
	     *
	     * @param    string     $tbl_name   表名
	     * @param    array      $info       数据
	     * @param    array      $condition  条件
	     */
	    public function update($info,$tbl,$condition)    {
			$i = 0;
			$data = '';
			if(is_array($info)&&!empty($info))		{
			    foreach( $info as $key=>$val ){
					if(isset($val)){
					    $val = $val;
					    if($i==0&&$val!==null){
							$data = $key."='".$val."'";
					    }else{
							$data .= ",".$key." = '".$val."'";
					    }

					    $i++;
					}
			    }	
			    $sql = "UPDATE ".$tbl." SET ".$data." WHERE ".$condition;
			    
			}
			

			$res=$this->_db->query($sql);
			return $res;
	    }

	public function select(){

	}

	public function cache(){

	}

	public function __call(string $name , array $arguments){
		echo "方法$name不存在";
	}

	

}
