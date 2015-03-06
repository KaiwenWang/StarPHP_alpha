<?php
require("./core/App.php");
defined("ROOT")==false?define("ROOT",dirname(__FILE__)."/"):"";
defined("APPNAME") or define("APPNAME",'Home');
define("DEV",1);//1表示开发模式，0表示部署模式
date_default_timezone_set('Asia/Chongqing');
$app=new App();
$app->run();
?>
