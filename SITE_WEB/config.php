<?php


ini_set('display_errors', 'on');
error_reporting(E_ALL);

class Config
{

    public static function initGlobals()
    {

        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'. $host . '/P5/SITE_WEB/');

        define('ASSERT', HOST.'/public/css');
        define('IMG',HOST.'public/img/');
        define('VIEW', __DIR__.'/view') ;
        define('DL_IMG', __DIR__.'/public/uploadImg/') ;
        define('VIEW_IMG',HOST.'public/uploadImg/');
    }


}
