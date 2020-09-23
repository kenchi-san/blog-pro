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
public function setupNewPasswordInBdd($password){
    if ($password) {
        var_dump($password);die();
        $req = $this->bdd->prepare('UPDATE user SET password = :nvpwd WHERE username = :login');
        $result = $req->execute($user);
        $user = new Entities\UserEntity();
        $user->setPassword($password);
        $user->getUsername($login);
        var_dump($result);
        return $result;
    }
    return false;
}

}