<?php


namespace App\Classes;


class PasswordValidator
{


    /**
     * @param $password_1
     * @param $password_2
     * @return mixed
     */
    public function passwordFormToken( $password_1, $password_2)
    {

        if ($password_1 != $password_2) {

           return ['invalidePassword' => true];

        }
        if (empty($password_1 || $password_2)) {
           return ['invalidePassword2' => true];
        }

    }
}