<?php


namespace Model;


use App\Classes\Router;
use Model\Entities\UserEntity;
use PDO;

class UserManager
{
    private $bdd;

    /**
     * SecurityManager constructor.
     * @param $login
     * @param $password
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=blop_pro;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }


    public function findUserFormCredentials($login, $password)
    {
        if ($login) {

            $query = "SELECT * FROM user WHERE username = :username ";
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

        // TODO creer methode UpdatePassword($login, $password)
//        if (isset($params['login']) && empty($params['password'])) {
//            $query ="UPDATE user SET password = :password WHERE username = :username";
//            $req = $bdd->prepare($query);
//            $req->execute(array(
//                'password' => $params['password']
//            ));
//        }
        var_dump('nouveau mot de passe');
    }
}