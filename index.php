<?php
use components\Autoload;
use components\App;
use components\HandleException;

ini_set('display_errors','1');
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Autoload.php');

Autoload::init();
HandleException::init();
App::init();
App::$core->launch();
