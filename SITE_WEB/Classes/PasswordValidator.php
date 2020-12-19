<?php


namespace App\Classes;


use App\Controller\AbstractController;

class PasswordValidator extends AbstractController
{


    public function passwordFormToken($user)
    {
        $view = new View('/frontViews/updatePasswordPage');

        if ($user == false) {
             $view->renderView(['invalidToken' => true]);
        }
        if ( $this->request->post('password_1') != $this->request->post('password_2')) {

            $view->renderView(['invalidePassword' => true]);

        }
        if (empty($this->request->post('password_1'))) {
            $view->renderView(['invalidePassword2' => true]);
        }
        return true;


    }
}