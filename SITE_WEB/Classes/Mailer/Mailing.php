<?php

namespace App\Classes\Mailer;

class Mailing
{

    const ADMIN_MAIL = "charon.hugo@gmail.com";
    const SUBJECT_CONTACT = "Demande d'information";



    public function sendNewPasswordByMail($to, $subject, $token)
    {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';
        mail($to, $subject, 'Voici votre <a href="' . HOST . 'newPasswordPage.html?token=' . $token . '">lien pour réinitialiser votre mot de passe</a>', implode("\r\n", $headers));
    }

    public function sendTheMailFromContactForm($contentMail)
    {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';

        mail(self::ADMIN_MAIL, self::SUBJECT_CONTACT, $contentMail, implode("\r\n", $headers));
    }
}
