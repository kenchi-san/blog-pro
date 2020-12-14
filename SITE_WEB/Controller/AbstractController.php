<?php


namespace App\Controller;


use App\Classes\Session;
use App\Classes\Request;

abstract class AbstractController
{

    protected Session $session;
    protected Request $request;

    public function __construct()
    {
        $this->session = new Session();
        $this->request = new Request();
    }


    public function redirectTo($url)
    {
        header('Location:' . HOST . $url);
        return true;
    }


}