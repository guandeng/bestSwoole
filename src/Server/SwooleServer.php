<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-01 00:05:15
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-01 00:08:21
 */
namespace Server;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Noodlehaus\Config;

class SwooleServer
{
    protected static $_instance = null;
    private $listen;
    private $port;
    private $taskWorkerNum;
    public $conf = [];
    public $workerId;
    public $name;
    /*
    public static function initialize()
    {
    if (is_null(self::$_instance)) {
    self::$_instance = new static();
    }
    return self::$_instance;
    }*/

    public function __construct()
    {
        $this->conf = Config::load(getConfigDir());
        Start::initServer($this);
        $this->setLogHandler();
        register_shutdown_function([$this, 'checkErrors']);
        set_error_handler([$this, 'displayErrorHandler']);
    }

    public function setLogHandler()
    {
        $this->log = new Logger($this->conf->get('log.log_name'));
        switch ($this->conf->get('log.type')) {
            case 'file':
                $this->log->pushHandler(new RotatingFileHandler(LOG_PATH . "/" . $this->name . ".log",
                    $this->conf->get('log.file.log_max_files'),
                    $this->conf->get('log.log_level')));
                break;
        }
    }

    /**
     * 启动服务
     *
     * @return void
     */
    public function start()
    {
        $this->server = new \swoole_server($this->conf->get('ports.server.socket_name'), $this->conf->get('ports.server.socket_port'));
        $this->setServer();
        $this->getServer()->on('start', [$this, 'onStart']);
        $this->getServer()->on('workerStart', [$this, 'onWorkerStart']);
        $this->getServer()->on('workerStop', [$this, 'onWorkerStop']);
        $this->getServer()->on('receive', [$this, 'onReceive']);
        $this->getServer()->on('task', [$this, 'onTask']);
        $this->getServer()->on('shutdown', [$this, 'onShutDown']);
        $this->getServer()->on('ManagerStart', [$this,'onManagerStart']);
        $this->getServer()->on('ManagerStop', [$this,'onManagerStop']);
        $this->getServer()->on('finish', [$this, 'onFinish']);
        $this->getServer()->on('close', [$this, 'onClose']);
        $this->beforeSwooleStart();
        $this->getServer()->start();
    }

    public function getServer()
    {
        return $this->server;
    }

    public function setServer()
    {
        $set = $this->conf->get('server.set');
        $set['daemonize'] = Start::getDaemonize();
        $this->server->set($set);
    }
    /**
     *  Master进程管理
     */
    public function onStart(\swoole_server $server)
    {
        echo 'swoole server started';
    }
    /**
     * 启动前操作
     *
     * @return void
     */
    public function beforeSwooleStart()
    {

    }

    public function onManagerStart()
    {
        Start::setProcessName(getServerName().'-Manager');
    }

    public function onManagerStop()
    {
    }

    public function onWorkerStart(\swoole_server $server, int $worker_id)
    {
        $this->workerId = $worker_id;
        $this->conf = Config::load(getConfigDir());
    }

    public function onWorkerStop(\swoole_server $server, int $worker_id)
    {
    }

    public function onTask(\swoole_server $server, int $task_id, int $worker_id, $data)
    {
        return;
    }

    public function onReceive(\swoole_server $server, int $fd, int $reactor_id, string $data)
    {
    }
    
    public function onShutDown(\swoole_server $server)
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

    public function checkErrors()
    {
        $error = error_get_last();
        if (isset($error['type'])) {
            if (in_array($error['type'], [E_ERROR])) {

            }
        }
    }

    /**
     * 全局监听
     *
     * @return void
     */
    public function displayErrorHandler()
    {

    }
}