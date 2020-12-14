<?php

namespace App\Controller;


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


        if ($_POST != null) {
            $errors = [];
            $name =$this->request->post('name');
            $mail = $this->request->post('email');
            $phone = $this->request->post('phone');
            $message = $this->request->post('message');
            if (!isset($name) || empty($name)) {
                $errors[] = 'Veuillez indiquer un nom';
            }
            if (!isset($mail) || empty($mail)) {
                $errors[] = 'veuillez indiquer un mail';
            }
            if (!isset($phone) || empty($phone)) {
                $errors[] = 'veuillez indiquer un numéro de téléphone';
            }
            if (!isset($message) || empty($message)) {
                $errors[] = 'Votre message ne contient rien';
            }

            if (count($errors)) {
                $contactView->renderView(array('errors' => $errors));

            }

        }
        $contactView->renderView();
    }


    public function test()
    {
        $imageView = new View('/frontViews/test');
        $imageView->renderView();
    }


}