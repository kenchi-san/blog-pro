<?php


class Autoloader
{
    public static function run()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {

        $className = str_replace('App\\', '', $className);
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $file = $className . '.php';
        if (file_exists($file)) {
            include_once($file);
        }
    }
}