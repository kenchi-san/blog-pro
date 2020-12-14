<?php


namespace App\Controller;


use App\Classes\Mailer\Mailing;
use App\Classes\PasswordGenerator;
use App\Classes\PasswordValidator;
use App\Classes\Session;
use App\Classes\TokenGenerator;
use App\Classes\View;
use App\Exception\NotfoundPageException;
use Model\Entities\UserEntity;
use Model\UserManager;

class UserController extends AbstractController
{
    public function login()
    {
        $loginView = new View('/frontViews/loginPage');

        if ($this->request->post('login') != null && $this->request->post('password') != null) {
            $userManager = new UserManager();
            $session = new Session();
            $errors = [];
            $login = $this->request->post('login');
            $password = $this->request->post('password');

            if (empty($login)) {
                $errors[] = 'Login non renseigné';
            }

            if (empty($password)) {
                $errors[] = 'Mot de passe non renseigné';
            }
            if (count($errors)) {
                $loginView->renderView(['errors' => $errors]);
            }

            $user = $userManager->findUserFormCredentials($login, $password);
            if ($user) {
                $this->session->bannMembers($user);

                $session->authenticateUser($user);
                $user = $session->isUserAuthenticated();

                switch ($user->getUserStatusId()){
                    case UserEntity::STATUS_ADMIN:
                        $url = 'backOffice.html';
                        break;
                    case UserEntity::STATUS_MEMBER:
                        $url = 'homePage.html';
                        break;
                    default:
                        $url = 'loginPage.html';

                }
                return $this->redirectTo($url);
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
        $newPassView = new View('/frontViews/forgetPasswordPage');


        $errors = [];
        $subject = '';
        if ($_POST != null) {
            $userManager = new UserManager();
            $tokenGenerator = new TokenGenerator();
            $mailing = new Mailing();
            $mail = $this->request->post('email');
            if (empty($mail)) {
                $errors[] = 'Veuillez renseigner votre mail';
                $newPassView->renderView(['errors' => $errors]);

            }
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "le format de votre mail n'est pas correct";
                $newPassView->renderView(['errors' => $errors]);
            }


            $email = $userManager->checkMail($mail);

            if ($email) {
                $newToken = $tokenGenerator->newToken();
                $userManager->generateTokenInTheBdd($email, $newToken);

                $mailing->sendNewPasswordByMail($email, $subject, $newToken);
                $this->redirectTo('homePage.html');

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

        $slug = $this->request->get('token') ?? null;

        $user = $userManager->findUserFormToken($slug);
        $this->session->bannMembers($user);
        $passwordValidator->passwordFormToken($user);

        $password_1 = $this->request->post('password_1');
        $password_2 = $this->request->post('password_2');

        if ($_POST && $password_1 === $password_2) {
            $password = $passwordGenerator->newPassWord($password_1);
            $userManager->setupNewPasswordInBdd($user['username'], $password);
            $userManager->destroyTokenFromSgbd($user['username']);
            $this->redirectTo('homePage.html');
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

        $password = $this->request->post('password');
        $password2 = $this->request->post('password2');
        if ($_POST && $password === $password2) {


            $username = $this->request->post('username');
            $name = $this->request->post('name');
            $firstname = $this->request->post('firstname');
            $name = $this->request->post('name');
            $mail = $this->request->post('email');
            /** faire une vérif si username ou mail existe déja**/
            $resultCheck = $userManager->checkUserToTheBdd($username, $mail);

            if ($resultCheck === true) {
                // Verification nom
                if (!filter_var($name, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z]{3,10}$#")])) {
                    $errors[] = 'Le name n\'est pas valide';
                }

                if (!filter_var($username, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z0-9]{3,12}$#")])) {
                    $errors[] = 'Le mail n\'est pas valide';
                }
                if (!filter_var($firstname, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z]{3,10}$#")])) {
                    $errors[] = 'Le prénom n\'est pas valide';
                }
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Le mail n\'est pas valide';
                }

                if (count($errors) === 0) {


                    $nvpassword = $passwordGenerator->newPassWord($password);
                    $password = $nvpassword;
                    $userManager->newUser($username, $name, $firstname, $mail, $password);
                    $this->redirectTo('homePage.html');
                }

            } else {
                $errors[] = 'Le mail ou le username est déjà prit';

            }
            $registerView->renderView(array('errors' => $errors));
        }
        $registerView->renderView();
    }


    public function memberOfSiteWeb()
    {
        $this->session->checkAdminAutorisation();
        $view = new View('/backViews/listOfUsers');
        $userManager = new UserManager();
        $listUsers = $userManager->findAllUser();

        if ($this->request->post('StatusId')) {
            if (empty($this->request->get('id'))) {
                throw new NotfoundPageException();
            } else {
                $userId = $this->request->get('id');

            }
            $userManager = new UserManager();
            $userManager->updateTheStatusOfUser($userId, $this->request->post('StatusId'));
            $this->redirectTo('listOfUsers.html');

        }
        $view->renderView(['listUsers' => $listUsers]);
    }


    public function logout()
    {
        session_destroy();
        $this->redirectTo('homePage.html');

    }
}