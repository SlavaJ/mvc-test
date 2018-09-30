<?php

namespace components;

use components\Router;
use components\Db;
use components\Core;

class App

{

    public static $router;

    public static $db;

    public static $core;

    public static function init()
    {
        static::bootstrap();
        //set_exception_handler(['App','handleException']);

    }

    public static function bootstrap()
    {
        static::$router = new \components\Router();
        static::$core = new \components\Core();
        static::$db = new \components\Db();

    }


/*
    public function handleException (Throwable $e)
    {

        if($e instanceof \App\Exceptions\InvalidRouteException) {
            echo static::$core->launchAction('Error', 'error404', [$e]);
        }else{
            echo static::$core->launchAction('Error', 'error500', [$e]);
        }

    }*/

}