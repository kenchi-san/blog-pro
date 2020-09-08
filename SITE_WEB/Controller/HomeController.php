<?php

namespace App\Controller;


use App\Classes\Router;
use App\Classes\View;
use App\Model\FrontManager;
use Model\SecurityManager;

class HomeController
{


    public function showHome()
    {

        $homeView = new view('homePage');
        $homeView->renderView();

    }

    public function showContact()
    {
        $contactView = new View('contactPage');
        $contactView->renderView();
    }

    public function showBlog()
    {
        $manager = new FrontManager();
        $posts = $manager->findAll();
        $blogView = new View('blogPage');
        $blogView->renderView(array('posts' => $posts));
    }

    public function login()
    {


        if ($_POST!=null) {

            $errors = [];

            if (!isset($_POST['login'])) {
                $errors[] = 'votre login n\'est pas valide';
            }
            if (empty($_POST['login'])) {
                $errors[] = 'Login non renseigné';
            }
            if (!isset($_POST['password'])) {
                $errors[] = 'votre mot de passe n\'est pas valide';
            }
            if (empty($_POST['password'])) {
                $errors[] = 'Mot de passe non renseigné';
            }
            if (count($errors)) {
                $loginView = new View('loginPage');
                $loginView->renderView(array('errors' => $errors));

                // TODO if user not null rediriger page d'accueil
            }
            $conection = new SecurityManager();
            $conection->findUser($_POST['login'], $_POST['password']);
            Router::redirectToRoute();
        }
        $loginView = new View('loginPage');
        $loginView->renderView();

    }

    static function destroySession()
    {
        session_destroy();
        Router::redirectToRoute();

    }
}
