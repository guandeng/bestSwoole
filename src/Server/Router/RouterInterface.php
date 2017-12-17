<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-16 20:14:37
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-16 21:27:31
 */
namespace Server\Router;

interface RouterInterface
{
    public function __construct();
    public function addRouter();
    public function request();
    public function response();
}
