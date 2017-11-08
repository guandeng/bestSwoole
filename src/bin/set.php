<?php
define('BIN_PATH',__DIR__);
define('MY_PATH',BIN_PATH."/..");
require_once APP_PATH.'/vendor/autoload.php';

checkfile("SERVER_PATH", MY_PATH."/vendor/guandeng/bestswoole/src/Server");
checkfile("APP_PATH", MY_PATH . "/src/app");
checkfile("LOG_PATH", BIN_PATH . "/log");
checkfile("PID_PATH", BIN_PATH . "/pid");

function checkfile($name,$path)
{
	define($name,$path);
	if(!file_exists($path)){
		mkdir($path);
	}
}
