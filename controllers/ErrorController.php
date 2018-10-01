<?php

namespace controllers;

class ErrorController
{
    public function actionIndex() {
        require_once ROOT.'/views/404/error.php';
    }
}