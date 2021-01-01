<?php

use App\Classes\Request;
use App\Classes\Router;
session_start();

include_once('Autoloader.php');

Autoloader::run();
Config::initGlobals();

$request = new Request();
$router = new Router($request);
$router->renderController();


