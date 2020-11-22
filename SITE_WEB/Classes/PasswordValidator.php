<?php


namespace App\Classes;


class PasswordValidator
{


    public function passwordFormToken($user)
    {
        $view = new View('/frontViews/updatePasswordPage');
        if ($user == false) {
             $view->renderView(['invalidToken' => true]);
        }
        if ($_POST && $_POST['password_1'] != $_POST['password_2']) {

            $view->renderView(['invalidePassword' => true]);

        }
        if (empty($_POST['password_1'])) {
            $view->renderView(['invalidePassword2' => true]);
        }
        return true;


    }
}