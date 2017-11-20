<?php

$config = [
    'name' => 'BS',
    'server' => [
        'send_use_task_num' => 20,
        'set' => [
            'log_file' => LOG_DIR.'/swoole.log',
            'pid' => PID_DIR.'/server.pid',
            'log_level' => 5,
            'reactor_num' =>4,
            'work_num'=> 4,
            'max_connection' => 50000
        ],
		'port' => 9501,
		'listen' => '0.0.0.0',
		'socket_type' => SWOOLE_SOCK_TCP,
    ],
];
return $config;
