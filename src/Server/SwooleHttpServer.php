<?php
/*
 * @Author: guandeng 
 * @Date: 2017-12-01 00:07:50 
 * @Last Modified by:   guandeng 
 * @Last Modified time: 2017-12-01 00:07:50 
 */

namespace Server;

abstract class SwooleHttpServer extends SwooleServer
{

    public static function initialize()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    public function __construct()
    {
    }

    public function start()
    {
        $this->conf = Config::load(getConfigDir());
        $this->server = new swoole_http_server($this->conf->get('server.listen'), $this->conf->get('server.port'));
        $this->server()->on('start', [$this,'onStart']);
        $this->server()->on('workerStart', [$this,'onWorkerStart']);
        $this->server()->on('workerStop', [$this,'onWorkerStop']);
        $this->server()->on('receive', [$this,'onReceive']);
        $this->server()->on('task', [$this,'onTask']);
        $this->server()->on('request', [$this,'onRequest']);
        $this->server()->on('finish', [$this,'onFinish']);
        $this->server()->on('close', [$this,'onClose']);
        $this->server()->start();
    }

    public function onStart(\swoole_server $server)
    {
		echo 'swoole http server started';
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

