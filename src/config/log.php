<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-01 00:06:36
 * @Last Modified by:   guandeng
 * @Last Modified time: 2017-12-01 00:06:36
 */

return [
    'log' => [
        'log_name' => 'BESTSWOOLE',
        'type' => 'file',
        'log_level' => \Monolog\Logger::DEBUG,
        'file' => [
            'log_max_files' => 15,
        ],
    ],
];
