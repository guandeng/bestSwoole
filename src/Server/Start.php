<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-01 00:07:34
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-03 23:16:13
 */

namespace Server;

class Start
{
    protected static $_worker;
    protected static $daemonize=false;

    public static function run()
    {
        self::checkSapiEnv();
        //self::init();
        self::parseCommand();
        self::display();
        self::startSwoole();
    }

    public static function checkSapiEnv()
    {
        if (PHP_SAPI !== 'cli') {
            exit("command line mode is not cli \n");
        }
    }

    protected static function parseCommand()
    {
        global $argv;
        if (!isset($argv[1])) {
            exit("please use start|stop|kill|reload|restart\n");
        }
        $server_name = getServerName();
        $manager_pid = exec("ps -ef | grep $server_name-Manager| grep -v 'grep '| awk '{print $2}'");
        $command = trim($argv[1]);
        $options = $argv[2] ?? '';
        switch ($command) {
            case 'start':
                if ($options === '-d') {
                    self::$daemonize = true;
                }
                // to do;
                break;
            case 'stop':
                // to do;
                break;
            case 'reload':
                posix_kill($manager_pid, SIGUSR1);
                break;
            case 'restart':
                break;
            default:
                exit("please use start|stop|kill|reload|restart\n");
                break;
        }
    }

    protected static function display()
    {
        $config = self::$_worker->conf;
        echo "\033[1A\n\033[K------------------------\033[47;30m server \033[0m---------------------------\n\033[0m" . "\n";
        echo "start success\n";
        echo "PHP version:", PHP_VERSION . "\n";
        echo "SWOOLE version:", SWOOLE_VERSION . "\n";
        echo 'worker_num: ', $config->get('server.set.worker_num', 0), "\t\t\t";
        echo 'task_num: ', $config->get('server.set.task_worker_num', 0), "\n";
        echo "\033[1A\n\033[K------------------------\033[47;30m server \033[0m---------------------------\n\033[0m" . "\n";
    }
    protected static function startSwoole()
    {
        self::$_worker->start();
    }

    public static function initServer($swooleServer)
    {
        self::$_worker = $swooleServer;
    }

    public static function getDaemonize()
    {
        return self::$daemonize ? 1 : 0;
    }

    public static function setProcessName($title)
    {
        if (PHP_OS == 'Darwin') {
            return;
        }
        /**
         * swoole_set_process_name兼容性比cli_set_process_title要差，
         * 如果存在cli_set_process_title函数则优先使用cli_set_process_title。
         */
        if (function_exists('cli_set_process_title')) {
            @cli_set_process_title($title);
        } else {
            @swoole_set_process_name($title);
        }
    }
}
