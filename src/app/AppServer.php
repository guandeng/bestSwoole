<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-10 10:22:33
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-10 10:24:38
 */

namespace app;

use Server\SwooleControllerServer;

class AppServer extends SwooleControllerServer
{
    public function __construct()
    {
        parent::__construct();
    }
}
