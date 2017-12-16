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
            'reactor_num' => 4,
            'worker_num' => 4,
            'log_file' => LOG_PATH . '/swoole.log',
            'pid' => PID_PATH . '/server.pid',
            'heartbeat_check_interval' =>30,
            'heartbeat_idle_time'=>120,
            'log_level' => 5,
            'reactor_num' => 4,
            'task_worker_num' => 10,
            'max_connection' => 5000,
            'dispatch_mode' => 2,
        ],
    ],
];
return $config;
