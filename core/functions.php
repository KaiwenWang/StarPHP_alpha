<?php


	//实例化模型类
	function M($modelName){
		$modelName=$modelName."Model";
		if(class_exists($modelName)){
			return new $modelName();
		}
	}
	//获取配置项
	function C($item){
		$app=new App();
		return $app->getConfVal($item);
	}
