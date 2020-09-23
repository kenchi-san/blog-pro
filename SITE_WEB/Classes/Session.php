<?php


namespace App\Classes;


use Model\Entities\UserEntity;

class Session
{

    const AUTH_KEY = 'auth';

    /**
     * @param string $user
     */
    public function authenticateUser(string $user)
    {
        $_SESSION[self::AUTH_KEY] = $user;
    }

    public function isUserAuthenticated(): ?UserEntity
    {
        if (!isset($_SESSION[self::AUTH_KEY])) {
            return null;
        }

        $userData = $_SESSION[self::AUTH_KEY];

        $user = new UserEntity();
        $user->setName($userData['name']);
        $user->setUsername($userData['username']);
        $user->setId($userData['id']);
        $user->setFirstname($userData['firstname']);
        $user->setUserStatusId($userData['user_status_id']);
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        $user->setCreateTime($userData['create_time']);
        return $user;
    }
}