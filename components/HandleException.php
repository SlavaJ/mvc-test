<?php

namespace components;
use components\exceptions\InvalidClassException;
use components\exceptions\InvalidRouteException;

class HandleException
{
    public static function init()
    {
        set_exception_handler(['components\HandleException','handleExc']);
    }

    public static function handleExc (\Throwable $e)
    {

        if($e instanceof InvalidRouteException) {
            header('Location: /error');
        }elseif($e instanceof InvalidClassException){
            header('Location: /error');
        } else {
            header('Location: /error');
        }

    }

}