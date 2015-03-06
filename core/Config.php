<?php

class Star_Config{

	public  $config;
	

	public function __construct(){
		$this->config=array_merge($this->getSysConf(),self::getAppConf());
	}


	//获取项目的配置内容
	private function getAppConf(){
		$app_conf_file=ROOT.APPNAME."/Conf/conf.php";

		if(file_exists($app_conf_file)){
			include $app_conf_file;
		}else{
			throw new Exception("项目配置文件不存在");
		}

		return $app_conf;
	}

	private function getSysConf(){
		$sys_conf_file=ROOT."core/sysconf.php";
		if(file_exists($sys_conf_file)){
			include $sys_conf_file;
		}else{
			throw new Exception("系统配置文件不存在");
		}

		return $sys_conf;
	}

	public function get_conf(){
		return $this->config;
	}

}
