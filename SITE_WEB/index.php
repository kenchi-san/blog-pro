<?php
use App\Classes\Router;
session_start();

include_once('Autoloader.php');

Autoloader::run();
Config::initGlobals();

//
$action = $_GET['action'] ?? 'homePage.html' ;
$router = new Router($action);
$router->renderController();


