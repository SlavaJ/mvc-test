<?php

namespace components;

class Router
{

    public function getParam()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            $param = explode('/', $_SERVER['REQUEST_URI']);
            $result = [];
            array_shift($param);
            for ($i = 0, $countParam = count($param) - 1; $i <= $countParam; $i++) {
                if ($param[$i] == '') {
                    return $result;
                    break;
                }
                $result[$i] = $param[$i];
            }
            return $result;
        }
        return false;
    }
}
