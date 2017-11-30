<?php
/*
 * @Author: guandeng 
 * @Date: 2017-12-01 00:06:21 
 * @Last Modified by:   guandeng 
 * @Last Modified time: 2017-12-01 00:06:21 
 */
define('BIN_PATH', __DIR__);
define('MY_PATH', BIN_PATH."/..");
require_once MY_PATH.'/vendor/autoload.php';

checkfile("SERVER_PATH", MY_PATH."/vendor/guandeng/bestswoole/src/Server");
checkfile("APP_PATH", MY_PATH . "/src/app");
checkfile("LOG_PATH", BIN_PATH . "/log");
checkfile("PID_PATH", BIN_PATH . "/pid");
checkfile("CONFIG_PATH", MY_PATH . "/src/config");

function checkfile($name, $path)
{
    define($name, $path);
    if (!file_exists($path)) {
        mkdir($path);
    }
}
