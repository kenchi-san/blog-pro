<?php


namespace App\Classes;


class PasswordGenerator
{
    public function newPassWord($string)
    {
        try {
            $password = password_hash($string, PASSWORD_DEFAULT);
        } catch (\Exception $e) {
        }
        return $password;
    }

}