<?php
namespace Server;


class SwooleHttpServer extends SwooleServer
{

    public static function initialize()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    private function __construct()
    {
    }

    public function start()
    {
        $this->getServer()->on('start', [$this,'onStart']);
        $this->getServer()->on('workerStart', [$this,'onWorkerStart']);
        $this->getServer()->on('workerStop', [$this,'onWorkerStop']);
        $this->getServer()->on('receive', [$this,'onReceive']);
        $this->getServer()->on('task', [$this,'onTask']);
        $this->getServer()->on('request', [$this,'onRequest']);
        $this->getServer()->on('finish', [$this,'onFinish']);
        $this->getServer()->on('close', [$this,'onClose']);
        $this->getServer()->start();
    }

	public function getServer()
	{
		return $this->server;
	}


    public function onStart(\swoole_server $server)
    {
		echo 'swoole http started';
    }

	public function onRequest($request,$response)
	{
		echo 'request';
	}

    public function onWorkerStart(\swoole_server $server, int $worker_id)
    {
    }

    public function onWorkerStop(\swoole_server $server, int $worker_id)
    {
    }

    public function onTask(\swoole_server $server, int $task_id, int $worker_id, $data)
    {
        return ;
    }

    public function onReceive(\swoole_server $server, int $fd, int $reactor_id, string $data)
    {
    }

    public function onFinish(\swoole_server $server, int $task_id, string $data)
    {
        // to do
    }

    public function onClose(\swoole_server $server, int $fd, int $reactor_id)
    {
        // to do
    }


    private function __clone()
    {
        // to do
    }
}

