<?php


namespace App\Classes;


class CheckInformationsAddUser
{
    public function checkInformations($name, $username, $firstname, $mail, $password, $password2)
    {
        $errors = [];

        // Verification nom
        if (!filter_var($name, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z]{3,10}$#")])) {
            $errors[] = 'Le name n\'est pas valide';
        }

        if (!filter_var($username, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z0-9]{3,12}$#")])) {
            $errors[] = 'Le mail n\'est pas valide';
        }
        if (!filter_var($firstname, FILTER_VALIDATE_REGEXP, ["options" => array("regexp" => "#^[a-zA-Z]{3,10}$#")])) {
            $errors[] = 'Le prénom n\'est pas valide';
        }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Le mail n\'est pas valide';
        }
        if ($password != $password2){
            $errors[] = 'Le mot de passe est différent du premier';
        }
           return $errors;


    }
}