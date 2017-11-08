<?php
define('BIN_PATH',__DIR__);
define('APP_PATH',BIN_PATH."/..");
require_once APP_PATH.'/vendor/autoload.php';

checkfile("SERVER_PATH", APP_PATH."/vendor/guandeng/bestswoole/src/Server");
checkfile("APP_PATH", APP_PATH . "/src/app");
checkfile("LOG_PATH", APP_PATH . "/log");
checkfile("PID_PATH", APP_PATH . "/pid");

function checkfile($name,$path)
{
	define($name,$path);
	if(!file_exists($path)){
		mkdir($path);
	}
}
