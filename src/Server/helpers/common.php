<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-01 00:08:47
 * @Last Modified by:   guandeng
 * @Last Modified time: 2017-12-01 00:08:47
 */

function getConfigDir()
{
    return CONFIG_PATH;
}

function checkExtension()
{
    $status = true;
    if (!extension_loaded('swoole')) {
        $status = false;
    }
    if (version_compare(PHP_VERSION, '7.0.0', '<')) {
        $status = false;
    }
    if (version_compare(SWOOLE_VERSION, '1.9.1', '<')) {
        $status = false;
    }
    return $status;
}

function _echo($title, $message)
{
    ob_start();
    if (is_string($message)) {
        $message = ltrim($message);
        $message = str_replace(PHP_EOL, $message);
    }
    print($message);
    ob_end_clean();
}
