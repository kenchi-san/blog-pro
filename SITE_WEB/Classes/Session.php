<?php


namespace App\Classes;


use App\Exception\ForbiddenAccessException;
use App\Exception\NeedAuthenticationException;
use Model\Entities\UserEntity;

class Session
{

    const AUTH_KEY = 'auth';

    /**
     * @param  $user
     */
    public function authenticateUser($user)
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

    /**
     * @throws ForbiddenAccessException
     * @throws NeedAuthenticationException
     */
    public function checkAdminAutorisation()
    {
        $user = $this->checkAuth();
        if ($user && $user->getUserStatusId() == 1) {

            return $user;
        } else {
            throw new ForbiddenAccessException("Vous n'avez pas les droits pour accéder à cette page");
         }
    }

    /**
     * @return UserEntity
     * @throws NeedAuthenticationException
     */
    public function checkAuth(){
        $user = $this->isUserAuthenticated();

        if ($user) {
            return $user;
        } else {
            throw new NeedAuthenticationException("Vous devez vous connecter");
        }
    }

}