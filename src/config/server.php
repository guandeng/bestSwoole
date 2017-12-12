<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-01 00:06:46
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-01 00:07:21
 */

$config = [
    'name' => 'BS',
    'server' => [
        'send_use_task_num' => 20,
        'set' => [
            'log_file' => LOG_PATH . '/swoole.log',
            'pid' => PID_PATH . '/server.pid',
            'log_level' => 5,
            'reactor_num' => 4,
            'worker_num' => 4,
            'task_worker_num'=> 10,
            'max_connection' => 50000,
        ],
        'port' => 9501,
        'listen' => '0.0.0.0',
        'socket_type' => SWOOLE_SOCK_TCP,
    ],
];
return $config;
