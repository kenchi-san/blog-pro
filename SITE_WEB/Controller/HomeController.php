<?php

namespace App\Controller;


use App\Classes\View;
use App\Model\ExperienceManager;

class HomeController
{

    public function showHome()
    {
        $experienceManager = new ExperienceManager();
        $experience = $experienceManager->findExperiences();
        $homeView = new View('/frontViews/homePage');
        $homeView->renderView(array('experiences' => $experience));

    }


    public function showContact()
    {

        $contactView = new View('/frontViews/contactPage');


        if ($_POST != null) {
            $errors = [];
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $errors[] = 'Veuillez indiquer un nom';
            }
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                $errors[] = 'veuillez indiquer un mail';
            }
            if (!isset($_POST['phone']) || empty($_POST['phone'])) {
                $errors[] = 'veuillez indiquer un numéro de téléphone';
            }
            if (!isset($_POST['message']) || empty($_POST['message'])) {
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