<?php


namespace App\Controller;


use App\Classes\Mailer\Mailing;
use App\Classes\PasswordGenerator;
use App\Classes\PasswordValidator;
use App\Classes\Router;
use App\Classes\Session;
use App\Classes\TokenGenerator;
use App\Classes\View;
use App\Exception\ForbiddenAccessException;
use Model\UserManager;

class UserController
{
    public function login()
    {
        $loginView = new View('/frontViews/loginPage');

        if ($_POST != null) {
            $userManager = new UserManager();
            $session = new Session();
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

            $user = $userManager->findUserFormCredentials($_POST['login'], $_POST['password']);
            if ($user) {

                $session->authenticateUser($user);

                if ($user["status"] === 'Admin') {
                    Router::redirectToBackOff();

                }
                if ($user["status"] != 'Admin') {
                    throw new ForbiddenAccessException("Vous n'avez pas les droits pour accéder à cette page");
                }
            }
            Router::redirectToLoginPage();

        }
        $loginView->renderView();
    }

    /**
     *setup news passwords from the forgetPasswordPage
     * send the token by mail to users
     */
    public function newPassWordRequest()
    {
        $newPassView = new View('/frontViews/forgetPasswordPage');


        $errors = [];
        $subject = '';
        if ($_POST != null) {

            $userManager = new UserManager();
            $tokenGenerator = new TokenGenerator();
            $mailing = new Mailing();

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
                $newToken = $tokenGenerator->newToken();
                $userManager->generateTokenInTheBdd($mail, $newToken);


                $mailing->sendNewPasswordByMail($mail, $subject, $newToken);
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

        $userManager = new UserManager();
        $passwordValidator = new PasswordValidator();
        $passwordGenerator = new  PasswordGenerator();
        $view = new View('/frontViews/updatePasswordPage');

        $slug = $_GET['token'] ?? null;

        $user = $userManager->findUserFormToken($slug);
        $passwordValidator->passwordFormToken($user);

        if ($_POST && $_POST['password_1'] === $_POST['password_2']) {
            $password = $passwordGenerator->newPassWord($_POST["password_1"]);
            $userManager->setupNewPasswordInBdd($user['username'], $password);
            $userManager->destroyTokenFromSgbd($user['username']);
            Router::redirectToRoute();
        } else {

            $view->renderView();

        }

    }

    public function addUser()
    {
        /**TODO faire message flash pour signaler que l'utilisateur est bien enregistré***/

        $registerView = new View('/frontViews/registerPage');
        $userManager = new UserManager();
        $passwordGenerator = new PasswordGenerator();
        $errors = [];

        if ($_POST && $_POST['password'] === $_POST['password2']) {
            $dataForm = $_POST;
            array_pop($dataForm);


            /** faire une vérif si username ou mail existe déja**/
            $resultCheck = $userManager->checkUserToTheBdd($dataForm['username'], $dataForm['email']);

            if ($resultCheck === true) {
                // Verification nom
                if (!filter_var($dataForm['name'], FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z]{3,10}$#")])) {
                    $errors[] = 'Le name n\'est pas valide';
                }

                if (!filter_var($dataForm['username'], FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z0-9]{3,12}$#")])) {
                    $errors[] = 'Le mail n\'est pas valide';
                }
                if (!filter_var($dataForm['firstname'], FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z]{3,10}$#")])) {
                    $errors[] = 'Le prénom n\'est pas valide';
                }
                if (!filter_var($dataForm['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Le mail n\'est pas valide';
                }

                if (count($errors) === 0) {


                    $password = $passwordGenerator->newPassWord($dataForm['password']);
                    $dataForm['password'] = $password;
                    $userManager->newUser($dataForm);
                    Router::redirectToRoute();
                }

            } else {
                $errors[] = 'Le mail ou le username est déjà prit';

            }
            $registerView->renderView(array('errors' => $errors));
        }
        $registerView->renderView();
    }


    static function logout()
    {
        session_destroy();
        Router::redirectToRoute();

    }
}