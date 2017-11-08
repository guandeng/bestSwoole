<?php

namespace Server;

class Start
{
	public static function run()
	{
		self::checkEnv();
		//self::init();
		self::parseCommand();
		self::display();
	}

	public static function checkEnv()
	{
		if(substr(php_sapi_name(), 0, 3) != 'cli'){
			exit("command line mode is not cli \n");
		}
	}

	protected static function parseCommand()
	{
		global $argv;
		if(!isset($argv[1])){
			exit("please use start|stop|kill|reload|restart\n");
		}
		$command = trim($argv[1]);
		$options = $argv[2]??'';
		switch($command){
		case 'start':
			if($options === '-d'){
				self::$daemonize = true;
			}
			// to do;
			break;
		case 'stop':
			// to do;
			break;
		case 'reload':
			// to do
			break;
		case 'restart':
			break;
		}
	}

	protected static function display()
	{
		echo "start success\n";
		echo "PHP version",SWOOLE_VERSION."\n";
	}
}
