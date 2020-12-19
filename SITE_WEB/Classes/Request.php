<?php


namespace App\Classes;


use Cassandra\Varint;

class Request
{
    public function clean($value): string
    {
        return htmlspecialchars(trim($value), ENT_DISALLOWED);
    }
    public function get(string $key)
    {

        return isset($_GET[$key]) ? $this->clean($_GET[$key]) : null;
    }

    public function file(string $key)
    {
         return isset($_FILES['img'][$key]) ? $this->clean($_FILES['img'][$key]) : null;

    }
    public function post(string $key, $default = null)
    {
       return isset($_POST[$key])? $this->clean($_POST[$key]) : $default;
    }
}