<?php


namespace App\Model;


use PDO;

class MailManager
{
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=blop_pro;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }


}