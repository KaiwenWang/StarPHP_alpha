<?php
class Star_Route{

	public static function getInfo(){
		if(!isset($_SERVER['PATH_INFO'])){
			$Controller="Index";
			$Method="Index";
		}else{
			$path=substr($_SERVER['PATH_INFO'],1,strlen($_SERVER['PATH_INFO'])-1);
			if ($path==false || $path=="" || empty($path)) {
				$Controller="Index";
				$Method="Index";
			}else{
				$patharr=explode("/", $path);
				$Controller=$patharr[0];
				if(!isset($patharr[1]) || empty($patharr[1]) || $patharr[1]==""){
					$Method="Index";
				}else{
					$Method=$patharr[1];
				}
			}
				
		}

		$info=array('controller'=>ucfirst($Controller),'method'=>ucfirst($Method));
		return  $info;
	}



}
