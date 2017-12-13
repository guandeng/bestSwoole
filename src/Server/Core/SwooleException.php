<?php
/*
 * @Author: guandeng
 * @Date: 2017-12-13 23:40:11
 * @Last Modified by: guandeng
 * @Last Modified time: 2017-12-13 23:44:22
 */

namespace Server\Core;

class SwooleException extends \Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
