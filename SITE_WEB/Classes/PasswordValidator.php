<?php


namespace App\Classes;


use App\Controller\AbstractController;

class PasswordValidator extends AbstractController
{


    public function passwordFormToken($user)
    {
        $view = new View('/frontViews/updatePasswordPage');
        $password_1 = $this->request->post('password_1');
        $password_2 = $this->request->post('password_2');
        if ($user == false) {
             $view->renderView(['invalidToken' => true]);
        }
        if ($_POST && $password_1 != $password_2) {

            $view->renderView(['invalidePassword' => true]);

        }
        if (empty($password_1)) {
            $view->renderView(['invalidePassword2' => true]);
        }
        return true;


    }
}