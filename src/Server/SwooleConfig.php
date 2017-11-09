<?php

namespace Server;

class Config
{
	protected static $_instance = null;

	public static function initialize()
	{
		if(is_null(self::$_instance)){
			self::$_instance = new static();
		}
		return self::$_instance;
	}

	private function __construct()
	{


	}


	private function __clone()
	{
		// to do 
	}


}
