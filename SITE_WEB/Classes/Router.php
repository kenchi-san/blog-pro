<?php
namespace App\Classes;

class Router
{
    /**
     * @var mixed
     */
    private $request;
    private $route = [
        'homePage.html' => ['class' => \App\Controller\Home::class, 'method' => 'showHome'],
        'contact.html' => ['class' => \App\Controller\Home::class, 'method' => 'showContact']


    ];

    /**
     * Router constructor.
     * @param mixed $request
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


}