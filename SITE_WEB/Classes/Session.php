<?php


namespace App\Classes;


use Model\Entities\UserEntity;

class Session
{

    const AUTH_KEY = 'auth';

    public function authenticateUser($user){
        $_SESSION[self::AUTH_KEY] = $user;
    }

    public function isUserAuthenticated() : bool
    {
        return isset($_SESSION[self::AUTH_KEY]);
    }
}