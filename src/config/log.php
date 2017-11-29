<?php

return [
    'log' => [
        'log_name' => 'BESTSWOOLE',
        'type' => 'file',
        'log_level' => \Monolog\Logger::DEBUG,
        'file' => [
            'log_max_files' => 15, 
        ]
    ]
] 