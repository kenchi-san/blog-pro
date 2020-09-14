<?php

namespace App\Controller;


use App\Classes\Router;
use App\Classes\Session;
use App\Classes\View;
use App\Model\PostManager;
use App\Model\MailManager;
use Model\UserManager;

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


            if ($_POST != null) {
                $errors = [];
                if (!isset($_POST['name']) || empty($_POST['name'])) {
                    $errors[] = 'Veuillez indiquer un nom';
                }
                if (!isset($_POST['email']) || empty($_POST['email'])) {
                    $errors[] = 'veuillez indiquer un mail';
                }
                if (!isset($_POST['phone']) || empty($_POST['phone'])) {
                    $errors[] = 'veuillez indiquer un numéro de téléphone';
                }
                if (!isset($_POST['message']) || empty($_POST['message'])) {
                    $errors[] = 'Votre message ne contient rien';
                }

                if (count($errors)) {
                    $contactView->renderView(array('errors' => $errors));

                }

            }
        $contactView->renderView();
        }
//    }
//            $mail = new MailManager();
//            $mail->sendMail();
//    }


    public function showBlog()
    {
        $manager = new PostManager();
        $posts = $manager->findAll();
        $blogView = new View('blogPage');
        $blogView->renderView(array('posts' => $posts));
    }

    public function login()
    {
        $loginView = new View('loginPage');

        if ($_POST != null) {


            $errors = [];

            if (empty($_POST['login'])) {
                $errors[] = 'Login non renseigné';
            }

            if (empty($_POST['password'])) {
                $errors[] = 'Mot de passe non renseigné';
            }
            if (count($errors)) {
                $loginView->renderView(['errors' => $errors]);
            }

            $conection = new UserManager();
            $user = $conection->findUserFormCredentials($_POST['login'], $_POST['password']);
            if($user){
                $session = new Session();
                $session->authenticateUser($user);
                Router::redirectToRoute();
            }

        }
        $loginView->renderView();
    }

    public function newPassWord(){
        $newPassView = new View();
    }
    static function destroySession()
    {
        session_destroy();
        Router::redirectToRoute();

    }
}
