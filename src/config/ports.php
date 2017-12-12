<?php
/*
 * @Author:guandeng
 * @Date: 2017-12-12 14:52:14
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-12 14:57:57
 */

$config = [
    'ports' => [
        'server'=>[
            'socket_type' => SWOOLE_SOCK_TCP,
            'socket_name' => '0.0.0.0',
            'socket_port' => 9501,
        ],
        'http'=>[
            'socket_type' => '',
            'socket_name' => '0.0.0.0',
            'socket_port' => 9502,
        ],
        'tcp'=>[
            'socket_type' => '',
            'socket_name' => '0.0.0.0',
            'socket_port' => 9503,
        ],
        'ws'=>[
            'socket_type' => '',
            'socket_name' => '0.0.0.0',
            'socket_port' => 9504,
        ],
    ],
];
return $config;
