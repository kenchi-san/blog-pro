<?php


namespace Model;


use App\Exception\NotfoundPageException;
use App\Model\HydratorTrait;
use App\Model\Manager;
use Model\Entities\UserEntity;
use PDO;

class UserManager extends Manager
{
    use HydratorTrait;

    /**
     * @param string $mail
     * @param string $newToken
     * @return bool
     */
    public function generateTokenInTheBdd(string $mail, string $newToken)
    {
        $req = $this->bdd->prepare('UPDATE user SET token = :nvtoken WHERE email = :mail');
        $result = $req->execute([
            'nvtoken' => $newToken,
            'mail' => $mail
        ]);
        return $result;

    }

    /**
     * @param string $mail
     * @return mixed
     * check the mail from the page forgetPasswordPage
     * and return the mail
     */
    public function checkMail(string $mail)
    {
        $query = "SELECT email FROM user WHERE email = :mail ";
        $req = $this->bdd->prepare($query);
        $req->execute(array('mail' => $mail));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();


        return ($result) ? $result['email'] : false;

    }

    /**
     * @param string $slug
     * @return string
     * @throws NotfoundPageException
     */
    public function findUserFormToken(string $slug)
    {
        if ($slug) {
            $query = "SELECT * FROM user WHERE token = :slug ";
            $req = $this->bdd->prepare($query);
            $req->execute(array('slug' => $slug));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return ($result);

        }
        throw new NotfoundPageException();
    }


    /**
     * @param string $login
     * @param string $password
     * @return false|mixed
     */
    public function findUserFormCredentials(string $login, string $password)
    {
        $query = "SELECT u.id ,u.email,u.firstname,u.username,u.user_status_id,u.name,u.password,u.create_time FROM user u
INNER JOIN user_status us on u.user_status_id = us.id 
WHERE username = :username ";
        $req = $this->bdd->prepare($query);
        $req->execute(array('username' => $login));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        if (password_verify($password, $result['password'])) {
            return $result;
        }

    }

    public function isCredentialsAvailable($username, $email)
    {
        $query = "SELECT u.id as userId, u.name,u.username,u.firstname,u.email,u.create_time FROM user u WHERE username = :username OR email = :email";
        $req = $this->bdd->prepare($query);
        $req->execute(array('username' => $username, 'email' => $email));
        $existingUser = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return ($existingUser) ? false : true;
    }

    public function setupNewPasswordInBdd($login, $password)
    {

        $req = $this->bdd->prepare('UPDATE user SET password = :nvpwd WHERE username = :login');

        $result = $req->execute([
            'nvpwd' => $password,
            'login' => $login
        ]);

        return $result;

    }

    public function destroyTokenFromSgbd($login)
    {
        $req = $this->bdd->prepare('UPDATE user SET token = :nvtoken WHERE username = :login');

        $result = $req->execute([
            'nvtoken' => null,
            'login' => $login
        ]);
        return $result;
    }

    public
    function newUser($username, $name, $firstname, $mail, $password)
    {

        $req = $this->bdd->prepare("INSERT INTO user (username, name, firstname, email, password) VALUES (:username, :name, :firstname, :email, :password)");
        $req->bindParam('name', $name);
        $req->bindParam('username', $username);
        $req->bindParam('firstname', $firstname);
        $req->bindParam('email', $mail);
        $req->bindParam('password', $password);
        $req->execute();
        return $req;

    }

    public
    function findAllUser()
    {
        $query = "SELECT * FROM user";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $users = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new UserEntity();

            $user->hydrate($row);


            $users[] = $user; // tableau d'objet
        };
        return $users;
    }

    public
    function updateTheStatusOfUser($userId, $user_status_id)
    {
        $req = $this->bdd->prepare('UPDATE user SET user_status_id=:nvuser_status_id WHERE id=:id');
        return $req->execute([
            'id' => $userId,
            'nvuser_status_id' => $user_status_id
        ]);
    }


}