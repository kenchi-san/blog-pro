<?php


namespace App\Controller;


use App\Classes\Session;
use App\Classes\Request;

abstract class AbstractController
{

    protected Session $session;
    protected  Request $request;



    public function __construct(Request $request)
    {
        $this->session = new Session();
        $this->request = $request;
    }


    /**
     * @param $url
     * @return bool
     */
    public function redirectTo($url)
    {
        header('Location:' . HOST . $url);
        return true;
    }


}