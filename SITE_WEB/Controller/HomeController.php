<?php

namespace App\Controller;


use App\Classes\Mailer\Mailing;
use App\Classes\PasswordGenerator;
use App\Classes\Router;
use App\Classes\Session;
use App\Classes\TokenGenerator;
use App\Classes\View;
use App\Model\PostManager;
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

            if ($user) {
                $session = new Session();
                $session->authenticateUser($user);
                Router::redirectToRoute();
            }

        }
        $loginView->renderView();
    }

    /**
     *setup news passwords from the forgetPasswordPage
     * send the token by mail to users
     */
    public function newPassWordRequest()
    {
        $newPassView = new View('forgetPasswordPage');
        $token = new TokenGenerator();
        $userManager = new UserManager();

        $errors = [];
        $subject = '';
        if ($_POST != null) {
            if (empty($_POST['email'])) {
                $errors[] = 'Veuillez renseigner votre mail';
                $newPassView->renderView(['errors' => $errors]);

            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "le format de votre mail n'est pas correct";
                $newPassView->renderView(['errors' => $errors]);
            }


            $mail = $userManager->checkMail($_POST['email']);

            if ($mail) {
                $newToken = $token->newToken();
                $userManager->generateTokenInTheBdd($mail, $newToken);

                $mailer = new Mailing();
                $mailer->sendNewPasswordByMail($mail, $subject, $newToken);
                Router::redirectToRoute();
            } else {
                $errors[] = "Adresse introuvable";
            }


        }
        $newPassView->renderView(['errors' => $errors]);
    }

    /**
     * take the request from the link's send by users
     * check if the token exist and setup the new password in the SGBD
     *
     */
    public function newPassWord()
    {

        $view = new View('updatePasswordPage');
        $slug = $_GET['token'] ?? null;


        $userManager = new UserManager();
        $passwordGenerator = new PasswordGenerator();

        $errors = [];
        $user = $userManager->findUserFormToken($slug);
        if ($user == false) {
            return $view->renderView(['invalidToken' => true]);
        }
        if ($_POST && $_POST['password_1'] != $_POST['password_2']) {
            return $view->renderView(['invalidePassword' => true]);
        }
        if ($_POST && $_POST['password_1'] === $_POST['password_2']) {
            $password = $passwordGenerator->newPassWord($_POST["password_1"]);
            $userManager->setupNewPasswordInBdd($user['username'], $password);
            $userManager->destroyTokenFromSgbd($user['username']);
            return Router::redirectToRoute();
        } else {
            return $view->renderView();

        }

    }


    static function destroySession()
    {
        session_destroy();
        Router::redirectToRoute();

    }

}