<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-03 22:52:51
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-03 23:00:09
 */

namespace Server;

abstract class SwooleControllerServer extends SwooleHttpServer
{
    public function __construct()
    {
        parent::__construct();
        if(!checkExtension()){
            exit(-1);
        }
    }

    public function start()
    {
        return parent::start();
    }
}
