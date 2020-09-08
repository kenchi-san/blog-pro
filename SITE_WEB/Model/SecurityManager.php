<?php


namespace Model;


use App\Classes\Router;
use App\Controller\HomeController;
use Model\Entities\UserEntity;
use PDO;

class SecurityManager
{
    private $bdd;

    /**
     * SecurityManager constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=blop_pro;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    public function findUser($login, $password)
    {

        $bdd = $this->bdd;
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $req = $bdd->prepare($query);
        $req->execute(array('username' => $login, 'password' => $password));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();

        if ($login === $result['username'] && $password === $result['password']) {
            $this->sessionData($result);
        } else {
            Router::redirectToLoginPage();
        }

        return $result;
    }


    public function sessionData($result)
    {
        $_SESSION['auth'] = $result;
    }

}