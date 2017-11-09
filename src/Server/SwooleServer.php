<?php
namespace Server; 

class SwooleSever
{
	protected static $_instance = null;
	private $listen; 
	private $port;
	private $taskWorkerNum;
	private $conf;

	public static function initialize()
	{
		if(is_null(self::$_instance)){
			self::$_instance = new static();
		}
		return self::$_instance;
	}

	private function __construct()
	{
		$this->listen = SwooleConfig::initialize()->load('SERVER.CONFIG.LISTEN');
		$this->port = SwooleConfig::initialize()->load('SERVER.CONFIG.PORT');
		$this->workNum = SwooleConfig::initialize()->load('SERVER.CONFIG.WORK_NUM');
		$this->taskWorkNum = SwooleConfig::initialize()->load('SERVER.CONFIG.TASK_WORK_NUM');
		$this->conf = SwooleConfig::initialize()->load('SERVER.CONFIG');
	}

	public function start()
	{
		//new \swoole_server();
		$this->setServer($this->conf);
		$this->server->on('start',[$this,'onStart']);
		$this->server->on('workerStart',[$this,'onWorkerStart']);
		$this->server->on('workerStop',[$this,'onWorkerStop']);
		$this->server->on('receive',[$this,'onReceive']);
		$this->server->on('task',[$this,'onTask']);
		$this->server->on('finish',[$this,'onFinish']);
		$this->server->on('close',[$this,'onClose']);
		$this->server->start();
	}

	public function setServer($conf)
	{
		
	}

	public function onStart(swoole_server $server)
	{
		
	}

	public function onWorkerStart(swoole_server $server,int $worker_id)
	{
		
	}

	public function onWorkerStop(swoole_server $server,int $worker_id)
	{
		
	}

	public function onReceive(swoole_server $server,int $fd,int $reactor_id,string $data)
	{
		
			
	}

	public function onFinish(swoole_server $server,int $task_id,string $data)
	{
		// to do
	}

	public function onClose(swoole_server $server,int $fd,int $reactor_id)
	{
		// to do
	}


	private function __clone()
	{
		// to do 
	}
}
