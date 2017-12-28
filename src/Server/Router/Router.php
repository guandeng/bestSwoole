<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-16 20:16:49
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-16 20:19:11
 */

namespace Server\Router;

class Router implements RouterInterface
{
    public function dispatch()
    {
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                break;
            case FastRoute\Dispatcher::FOUND:
                break;
        }
    }

    public function addRouter(RouterCollect $route_collector)
    {
        $route_collector->addRouter(

        );
    }
}
