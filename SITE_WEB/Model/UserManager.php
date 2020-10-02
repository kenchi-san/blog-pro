<?php


namespace Model;


use PDO;

class UserManager
{

    /**
     * SecurityManager constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=blop_pro;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

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

            $query = "SELECT * FROM user
INNER JOIN user_status us on user.user_status_id = us.id
WHERE username = :username";
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
}