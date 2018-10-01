<?php

namespace components;

use components\Router;
use components\Db;
use components\Core;
use components\exceptions\InvalidRouteException;

class App

{

    public static $router;

    public static $db;

    public static $core;

    public static function init()
    {
        static::bootstrap();

    }

    public static function bootstrap()
    {
        static::$router = new Router();
        static::$core = new Core();
        static::$db = new Db();

    }

}