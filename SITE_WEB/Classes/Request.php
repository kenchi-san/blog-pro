<?php


namespace App\Classes;


class Request
{

    public function get(string $key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function file($key)
    {
         return isset($_FILES['img'][$key]) ? $_FILES['img'][$key] : null;

    }
    public function post(string $key, $default = null)
    {

        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
}