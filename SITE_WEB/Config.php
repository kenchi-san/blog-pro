<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

class Config
{

    public static function initGlobals()
    {
//        chemin dossier
        $root = $_SERVER['DOCUMENT_ROOT'];
//         URL
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://' . $host . '/P5_blog_pro/SITE_WEB/');
        define('ROOT', $root . '/SITE_WEB/');

        define('PUBLIC', HOST . 'public');




    }


}