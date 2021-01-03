<?php


namespace App\Classes;


use App\Exception\ForbiddenAccessException;
use App\Exception\NeedAuthenticationException;
use App\Model\HydratorTrait;
use Model\Entities\UserEntity;

class Session
{
    use HydratorTrait;

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
    public function checkAdminAutorisation(): UserEntity
    {
        $user = $this->checkAuth();
        if ($user && (int)$user->getUserStatusId() === UserEntity::STATUS_ADMIN) {
            return $user;
        } else {

            throw new ForbiddenAccessException("Vous n'avez pas les droits pour accéder à cette page");
        }
    }

    public function memberAccess()
    {
        $user = $this->checkAuth();
        if ($user && $user->getUserStatusId() === UserEntity::STATUS_MEMBER) {
            return $user;
        } else {

            throw new ForbiddenAccessException("Vous n'avez pas les droits pour accéder à cette page. Vous devez vous enregistrer");
        }
    }

    /**
     * @param null $checkUser
     * @throws ForbiddenAccessException
     */
    public function bannMembers($checkUser = null)
    {
        if ((int)$checkUser['user_status_id'] === UserEntity::STATUS_BANN) {
            throw new ForbiddenAccessException("Vous avez été banni du Site par l'administrateur");
        }
    }


    /**
     * @return UserEntity
     * @throws NeedAuthenticationException
     */
    public
    function checkAuth()
    {
        $user = $this->isUserAuthenticated();

        if ($user) {
            return $user;
        } else {
            throw new NeedAuthenticationException("Vous devez vous connecter");
        }
    }

}