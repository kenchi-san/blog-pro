<?php


namespace App\Classes;


class Request
{

    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    public function isGet(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';

    }

    public function get(string $key, $default = null)
    {

        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function file(string $key)
    {
         return isset($_FILES['img'][$key]) ? $_FILES['img'][$key] : null;

    }
    public function post(string $key, $default = null)
    {
       return isset($_POST[$key])? $_POST[$key] : $default;
    }
}