<?php


namespace App\Model;


use PDO;

class MailManager
{
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
    public function findUserFormToken(string $slug)
    {
        if ($slug) {
            $query = "SELECT * FROM user WHERE token = :slug ";
            $req = $this->bdd->prepare($query);
            $req->execute(array('slug' => $slug));
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

//            ? $result['token'] :false
            return ($result) ;

        }
    }

}