<?php
use App\Classes\Router;
session_start();

include_once('Autoloader.php');

Autoloader::run();
Config::initGlobals();

//
$request = $_GET['action'] ?? 'homePage.html' ;
$slug = $_GET['token'] ?? null;
$router = new Router($request, $slug);
$router->renderController();


