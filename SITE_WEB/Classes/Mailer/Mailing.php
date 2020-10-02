<?php

namespace App\Classes\Mailer;

class Mailing
{

    public function sendNewPasswordByMail($to,$subject,$token){
        mail (  $to , $subject , 'Voici votre<a href="'.HOST.'newPasswordPage.html?token='.$token.'">lien pour réinitialiser votre mot de passe</a>');
    }
}
