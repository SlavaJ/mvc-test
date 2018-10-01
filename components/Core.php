<?php

namespace components;

use components\App;
use components\Router;
use components\exceptions\InvalidRouteException;
use components\exceptions\InvalidClassException;
use components\exceptions\InvalidMethodException;

class Core
{
    public $defaultControllerName = 'HomeController';

    public $defaultActionName = "actionIndex";

    public $defaultActionParams = [];

    public function launch()
    {

        $params = App::$router->getParam();
        return $this->launchAction($params);

    }


    public function launchAction($params)
    {
        $controller = '\\controllers\\' . $this->defaultControllerName;
        $actionName = $this->defaultActionName;
        $actionParam = $this->defaultActionParams;


        if (!empty($params)){
            if (count($params) == 1) {
                $controller = '\\controllers\\'.ucfirst($params[0]).'Controller';
            } elseif (count($params) == 2) {
                $controller = '\\controllers\\'.ucfirst($params[0]).'Controller';
                $actionName = 'action'.ucfirst($params[1]);
            } else {
                $controller = '\\controllers\\'.ucfirst(array_shift($params[0])).'Controller';
                $actionName = 'action'.ucfirst(array_shift($params[1]));
                $actionParam = $params;
            }
        }


        $path = ROOT.str_replace('\\','/',$controller).'.php';
        if(!file_exists($path)){
            throw new InvalidRouteException('Error path '.$path);
        }

        $controllerName = new $controller;

        if(!class_exists(ucfirst($controller))) {
            throw new InvalidClassException('Class is not exist.');
        } elseif(!method_exists($controllerName, $actionName)) {
            throw new InvalidMethodException('Method is not exist.');
        }

        if(empty($actionParam)) {
            return $controllerName->$actionName();
        } else {
            return $controllerName->$actionName($actionParam);
        }
    }

}