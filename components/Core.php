<?php

namespace components;

use components\App;
use components\Router;

class Core
{
    public $defaultControllerName = 'HomeController';

    public $defaultActionName = "actionIndex";

    public function launch()
    {

        $params = App::$router->getParam();
        return $this->launchAction($params);

    }


    public function launchAction($params)
    {
        $controller = '\\controllers\\' . $this->defaultControllerName;
        $actionName = $this->defaultActionName;

        if (empty($params)){
            $controllerName = new $controller;
           return $controllerName->$actionName();
        }

        if (count($params) == 1) {
            $controller = '\\controllers\\'.ucfirst($params[0]).'Controller';
            $controllerName  =  new $controller;;
            return $controllerName->$actionName();
        } elseif (count($params) == 2) {
            $controller = '\\controllers\\'.ucfirst($params[0]).'Controller';
            $controllerName  =  new $controller;
            $actionName = 'action'.ucfirst($params[1]);
            return $controllerName->$actionName();
        } else {
            $controller = '\\controllers\\'.ucfirst(array_shift($params[0])).'Controller';
            $controllerName  =  new $controller;
            $actionName = 'action'.ucfirst(array_shift($params[1]));
            return $controllerName->$actionName($params);
        }

        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);
        /*if(!file_exists(ROOT.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.$controllerName.'.php')){
            throw new \App\Exceptions\InvalidRouteException();
        }*/
        require_once ROOT.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$controllerName.'Controller.php';
        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);

        /*if(!class_exists("\\Controllers\\".ucfirst($controllerName))){
            throw new \App\Exceptions\InvalidRouteException();
        }*/
        $controllerName = "\\controllers\\".ucfirst($controllerName).'Controller';
        $controller = new $controllerName;
        $actionName = empty($actionName) ? $this->defaultActionName : 'action'.ucfirst($actionName);
        /*if (!method_exists($controller, $actionName)){
            throw new \App\Exceptions\InvalidRouteException();
        }*/
        $params = empty($params) ? '' : $params;
        return $controller->$actionName($params);

    }

}