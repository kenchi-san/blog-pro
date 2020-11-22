<?php


namespace Model;


use App\Model\Manager;
use PDO;

class UserManager extends Manager
{


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
     */
    public function findUserFormToken(?string $slug)
    {
        if ($slug) {
            $query = "SELECT * FROM user WHERE token = :slug ";
            $req = $this->bdd->prepare($query);
            $req->execute(array('slug' => $slug));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return ($result);

        }
        return false;
    }


    /**
     * @param string $login
     * @param string $password
     * @return false|mixed
     */
    public function findUserFormCredentials(string $login, string $password)
    {
        if ($login) {

            $query = "SELECT u.id ,u.email,u.firstname,u.username,u.user_status_id,u.name,u.password,u.create_time FROM user u
INNER JOIN user_status us on u.user_status_id = us.id 
WHERE username = :username ";
            $req = $this->bdd->prepare($query);
            $req->execute(array('username' => $login));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();


            if ($result['username'] === $login) {
                if (password_verify($password, $result['password'])) {

                    return $result;

                }
            }
            return false;
        }
        return true;
    }

    public function checkUserToTheBdd($username, $email)
    {
        if ($username || $email) {

            $query = "SELECT u.id as userId, u.name,u.username,u.firstname,u.email,u.create_time FROM user u WHERE username = :username OR email = :email";
            $req = $this->bdd->prepare($query);
            $req->execute(array('username' => $username, 'email' => $email));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
            if ($username === $result['username']) {

                return false;
            }
            if ($email === $result['email']) {

                return false;
            }
            return true;
        }
        return true;
    }

    public function setupNewPasswordInBdd($login, $password)
    {
        if ($password) {
            $req = $this->bdd->prepare('UPDATE user SET password = :nvpwd WHERE username = :login');

            $result = $req->execute([
                'nvpwd' => $password,
                'login' => $login
            ]);
            return $result;
        }
        return false;
    }

    public function destroyTokenFromSgbd($login)
    {
        $req = $this->bdd->prepare('UPDATE user SET token = :nvtoken WHERE username = :login');

        $result = $req->execute([
            'nvtoken' => NULL,
            'login' => $login
        ]);
        return $result;
    }

    public function newUser(array $dataUser)
    {

        $req = $this->bdd->prepare("INSERT INTO user (username, name, firstname, email, password) VALUES (:username, :name, :firstname, :email, :password)");
        $req->bindParam('name', $dataUser['name']);
        $req->bindParam('username', $dataUser['username']);
        $req->bindParam('firstname', $dataUser['firstname']);
        $req->bindParam('email', $dataUser['email']);
        $req->bindParam('password', $dataUser['password']);
        $req->execute();
        return $req;

    }


}