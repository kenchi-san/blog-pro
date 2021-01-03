<?php


namespace App\Controller;


use App\Classes\CheckInformationsAddUser;
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
            if (!filter_var($login, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z0-9]{3,12}$#")])) {
                $errors[] = 'Vous devez mettre votre nom d\'utilisateur';
            }
            if (count($errors)) {
                return $loginView->renderView(['errors' => $errors]);
            }

            $user = $userManager->findUserFormCredentials($login, $password);
//
            if ($user) {
                $this->session->bannMembers($user);

                $session->authenticateUser($user);
                $user = $session->isUserAuthenticated();
                switch ($user->getUserStatusId()) {

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
        $subject = 'Mail de réinitialisation de votre mot de passe';

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
     * @throws NotfoundPageException
     */
    public function newPassWord()
    {

        $password_1 = $this->request->post('password_1');
        $password_2 = $this->request->post('password_2');

        $userManager = new UserManager();
        $passwordGenerator = new  PasswordGenerator();
        $passwordValidator = new PasswordValidator();
        $view = new View('/frontViews/updatePasswordPage');

        $slug = $this->request->get('token') ?? null;

        $user = $userManager->findUserFormToken($slug);

        $this->session->bannMembers($user);
        if (!empty($password_1) && !empty($password_2)) {
            $password_ok = $passwordValidator->passwordFormToken($user, $password_1, $password_2);

            $password = $passwordGenerator->newPassWord($password_ok);

            $nvPassword = $userManager->setupNewPasswordInBdd($user['username'], $password);
            if ($nvPassword == true) {
                $modification = $userManager->destroyTokenFromSgbd($user['username']);
            }
            if ($modification == true) {
                return $this->redirectTo('loginPage.html');
            }
        }


        $view->renderView();


    }

    public function addUser()
    {
        /**TODO a retrailler**/
        $registerView = new View('/frontViews/registerPage');

        $userManager = new UserManager();
        $passwordGenerator = new PasswordGenerator();
        $checkInformation = new CheckInformationsAddUser();
        $errors = [];
        if($this->request->isPost()){

            $password = $this->request->post('password');
            $password2 = $this->request->post('password2');

            $username = $this->request->post('username');
            $firstname = $this->request->post('firstname');
            $name = $this->request->post('name');
            $mail = $this->request->post('email');

            if ($userManager->isCredentialsAvailable($username, $mail)) {
                $errors = $checkInformation->checkInformations($name, $username, $firstname, $mail, $password, $password2);
                if (count($errors) === 0) {
                    $nvpassword = $passwordGenerator->newPassWord($password);
                    $password = $nvpassword;
                    $userManager->newUser($username, $name, $firstname, $mail, $password);
                    return $this->redirectTo('homePage.html');
                }
            } else {
                $errors[] = "le nom d\'utilisateur ou le mail est déjà pris";
            }
        }

        return  $registerView->renderView(['errors' => $errors]);

    }


    public
    function memberOfSiteWeb()
    {
        $this->session->checkAdminAutorisation();
        $view = new View('/backViews/listOfUsers');
        $userManager = new UserManager();
        $listUsers = $userManager->findAllUser();

        if (!empty($this->request->post('StatusId'))) {


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


    public
    function logout()
    {
        session_destroy();
        $this->redirectTo('homePage.html');

    }
}