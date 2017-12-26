<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-01 00:07:50
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-12 14:58:49
 */

namespace Server;

use Noodlehaus\Config;

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
        parent::__construct();
    }

    public function start()
    {
        $this->conf = Config::load(getConfigDir());
        $this->server = new \swoole_http_server($this->conf->get('ports.http.socket_name'), $this->conf->get('ports.http.socket_port'));
        $this->server->on('start', [$this, 'onStart']);
        $this->server->on('workerStart', [$this, 'onWorkerStart']);
        $this->server->on('workerStop', [$this, 'onWorkerStop']);
        $this->server->on('task', [$this, 'onTask']);
        $this->server->on('request', [$this, 'onRequest']);
        $this->server->on('finish', [$this, 'onFinish']);
        $this->server->on('close', [$this, 'onClose']);
        $this->server->start();
    }

    public function onRequest($request, $response)
    {
        $path_info = explode('/', $request->server['path_info']);
        if (empty($path_info)) {

        }
        // 获取模块，控制器，方法
        $model = (isset($path_info[1]) && !empty($path_info[1])) ? $path_info[1] : 'Home';
        $controller = (isset($path_info[2]) && !empty($path_info[2])) ? $path_info[2] : 'Index';
        $method = (isset($path_info[3]) && !empty($path_info[3])) ? $path_info[3] : 'index';
        try {
            $class_name = "\\{$model}\\Controller\\$controller";
            $object = new $class_name;
            if (!method_exists($object, $method)) {
                throw new Exception('404');
            }
            $result = $object->$method($request, $response);
            $response->status(200);
            $response->end($result);
        } catch (Exception $e) {
            $response->status(503);
            $response->end(var_export($e, true));
        }
    }

    public function onWorkerStart(\swoole_server $server, int $worker_id)
    {
    }

    public function onWorkerStop(\swoole_server $server, int $worker_id)
    {
    }

    public function onTask(\swoole_server $server, int $task_id, int $worker_id, $data)
    {
        return;
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
