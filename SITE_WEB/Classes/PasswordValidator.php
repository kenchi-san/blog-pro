<?php


namespace App\Classes;


class PasswordValidator
{


    /**
     * @param $user || null
     * @param $password_1
     * @param $password_2
     * @return mixed
     */
    public function passwordFormToken($user, $password_1, $password_2)
    {
        $view = new View('/frontViews/updatePasswordPage');

        if ($user == false && !empty($user)) {
            $view->renderView(['invalidToken' => true]);
        }
        if ($password_1 != $password_2) {

            $view->renderView(['invalidePassword' => true]);

        }
        if (empty($password_1 || $password_2)) {
            $view->renderView(['invalidePassword2' => true]);
        }
        if ($password_1 === $password_2) {
            return $password_1;
        }
    }
}