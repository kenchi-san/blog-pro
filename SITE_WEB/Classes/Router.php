<?php

namespace App\Classes;

use App\Controller\BackController;
use App\Controller\HomeController;


class Router
{

    private  $request;
    private  $route = [
        'homePage.html' => ['class' => HomeController::class, 'method' => 'showHome'],
        'contact.html' => ['class' => HomeController::class, 'method' => 'showContact'],
        'blogPage.html' => ['class' => HomeController::class, 'method' => 'showBlog'],
        'loginPage.html' => ['class' => HomeController::class, 'method' => 'login'],
        'destroySessionPage.html' => ['class' => HomeController::class, 'method' => 'destroySession'],
        'resetPassword.html' => ['class' => HomeController::class, 'method' => 'newPassWordRequest'],
        'newPasswordPage.html' => ['class' => HomeController::class, 'method' => 'newPassWord']


    ];

    /**
     * Router constructor.
     * @param $request
     */
    public function __construct($request)
    {

        $this->request = $request;
    }


    public function renderController()
    {
        if (key_exists($this->request, $this->route)) {
            $classes = $this->route[$this->request]['class'];
            $method = $this->route[$this->request]['method'];
            $myCurrentController = new $classes;
            $myCurrentController->$method();

        } else {
            echo "erreur 404";
        }
    }

    static function redirectToRoute()
    {
        header('Location:'.HOST.'homePage.html');
        exit();
    }

    static function redirectToLoginPage()
    {
        header('Location:'.HOST.'loginPage.html');
    }
}