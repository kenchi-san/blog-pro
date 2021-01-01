<?php

namespace App\Controller;


use App\Classes\Mailer\Mailing;
use App\Classes\Router;
use App\Classes\View;
use App\Model\ExperienceManager;

class HomeController extends AbstractController
{

    public function showHome()
    {
        $experienceManager = new ExperienceManager();
        $experience = $experienceManager->findAllExperiences();
        $homeView = new View('/frontViews/homePage');
        $homeView->renderView(array('experiences' => $experience));

    }


    public function showContact()
    {

        $contactView = new View('/frontViews/contactPage');

        $name = htmlspecialchars(trim($this->request->post('name')));
        $mail = htmlspecialchars(trim($this->request->post('email')));
        $phone = htmlspecialchars(trim($this->request->post('phone')));
        $message = htmlspecialchars(trim($this->request->post('message')));
        $errors = [];

        if ($this->request->isPost()) {

            if (empty($name)) {

                $errors[] = 'Veuillez indiquer un nom';
            }

            if (empty($mail)) {
                $errors[] = 'veuillez indiquer un mail';
            }

            if (empty($phone)) {
                $errors[] = 'veuillez indiquer un numéro de téléphone';
            }

            if (empty($message)) {
                $errors[] = 'Votre message ne contient rien';
            }

            if (count($errors)) {

                return $contactView->renderView(array('errors' => $errors));
            }

            $this->sendTheContactMail($name,$mail, $phone, $message);

        }
        $contactView->renderView();
    }


    public function sendTheContactMail($name, $mail,$phone, $message)
    {



        $mailView = new View('/mail/contact');
        $mailView->renderView(['name' => $name, 'mail'=>$mail,'phone' => $phone, 'message' => $message]);

    }

}