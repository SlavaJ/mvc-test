<?php

namespace components;

class Autoload
{

    public static function init()
    {
        spl_autoload_register(['static','loadClass']);
    }

    public static function loadClass($className)
    {
            $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
            require_once ROOT . DIRECTORY_SEPARATOR . $className . '.php';
    }

}