<?php

class App{
	
	private  $frameConfig="";

	public function __construct(){
		
		self::registerAutoload();
		$this->frameConfig=self::get_conf();
	
	}

	public function __get($name){
		return $this->frameConfig;
	}
	
	public function get_conf(){
		$obj_conf=new Star_Config();
		return $obj_conf->get_conf();
	}

	public function getConfVal($item){
		$conf_arr=$this->frameConfig;
		if(in_array($item,array_keys($conf_arr))){
			return $conf_arr[$item];
		}else{
			throw new Exception($item."未配置");
		}
	}

	public static function loadClass($className){
		if(substr($className,0,5)=="Star_"){
			$className=str_replace("Star_","",$className);
			include $className.".php";
			return;
		}

		//自动调用控制器时做如下处理
		if(substr($className,-10)=="Controller"){
			$conFile=ROOT.APPNAME."/Controller/".$className.".class.php";
			if(file_exists($conFile)){
				include $conFile;
			}else{
				throw new Exception($conFile."文件不存在");
			}
			return;
		}	

		//尝试引入Model
		if(substr($className,-5)=='Model'){
			$modFile=ROOT.APPNAME."/Model/".$className.".class.php";
			if(file_exists($modFile)){
				include $modFile;
			}else{
				throw new Exception($modFile."文件不存在");
			}
			return;
		}

		//引入lib中的类
		if(substr($className,0,3)=="Lib"){
			$filearr=explode("_",$className);
			$filepath=dirname(__FILE__)."/..";
			foreach($filearr as $v){
				$filepath.="/".$v;
			}
			
			$filepath.=".php";
			if(file_exists($filepath)){
				include $filepath;
			}else{
				throw new Exception($filepath."文件不存在");
			}
			return;
			
		}
	}

	public static function registerAutoload($func = 'self::loadClass', $enable = true){
		$enable ? spl_autoload_register($func) : spl_autoload_unregister($func);
	}

	
	public function begin(){
		if(file_exists(ROOT.'core/functions.php')){
			include ROOT."core/functions.php";
		}
		$foldarr=C('FILDARR');
		if(file_exists(APPNAME)){
			
		}else{
			mkdir(ROOT.APPNAME,0777);
		}
		self::createDir($foldarr,APPNAME);
		
		if(file_exists('Static')){
		
		}else{
			mkdir(ROOT."Static",0777);
		}
		
		$staticFold=C('STATICFOLD');
		self::createDir($staticFold,'Static');
	}
	

	public function getConMtd(){
		$pathinfo=Star_Route::getInfo();
		//根据对应的controller、method引入对应的类并实例化最后调用对应的方法
		$ctl=$pathinfo['controller']."Controller";
		$func=$pathinfo['method'];
		if(class_exists($ctl)){
			$Controller=new $ctl();

			if(method_exists($Controller,$func) && is_callable(array($Controller,$func))){
				$Controller->$func();
			}else{
				throw new Exception("方法不存在");
			}
		}else{
			throw new Exception("类不存在");
		}
		//$Controller->$func();

		//print_r(get_declared_classes());
	}

	public function run(){
		self::begin();
		self::getConMtd();
	}

	private function createDir($foldarr,$FOLD){
		foreach($foldarr as $p){
			if(file_exists($p)){
				
			}elseif(!file_exists($p)){
				@mkdir(ROOT.$FOLD."/".$p,0777);
			}	
		}
	}
}


