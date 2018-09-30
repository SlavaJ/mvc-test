<?php

namespace controllers;

class HomeController
{

    public function actionIndex()
    {

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

}
