<?php


ini_set('display_errors', 'on');
error_reporting(E_ALL);

class Config
{

    public static function initGlobals()
    {
//
//         URL
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'. $host . '/P5/SITE_WEB/');

        define('ASSERT', HOST.'/public/css');
        define('VIEW', __DIR__.'/view/frontViews/') ;
    }


}