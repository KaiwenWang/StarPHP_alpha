<?php
class Star_View{
	

	public function display($tpl=null){
		if(is_null($tpl)){
			$tpl=self::getTemplateFile();
		}

		if(file_exists($tpl)){
			include $tpl;
		}else{
			throw new Exception("模板文件不存在");
		}
	}

	public  function fetch($tpl){
		ob_start();
	        ob_implicit_flush(0);
       		$this->display($tpl);
        	return ob_get_clean();

	}

	private function getTemplateFile(){
		$patharr=Star_Route::getInfo();
		$tpl=ROOT.APPNAME."/Tpl/".$patharr['controller']."/".$patharr['method'].".php";//默认采用原生php作为模板

		return $tpl;
	}


}
