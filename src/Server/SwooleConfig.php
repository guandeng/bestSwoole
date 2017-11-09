<?php

namespace Server;

class SwooleConfig
{
	protected static $_instance = null;

	public static function initialize()
	{
		if(is_null(self::$_instance)){
			self::$_instance = new static();
		}
		return self::$_instance;
	}

    public function load()
    {

    }

	private function __construct()
	{


	}


	private function __clone()
	{
		// to do 
	}


}
