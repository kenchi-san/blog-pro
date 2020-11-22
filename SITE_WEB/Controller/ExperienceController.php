<?php


namespace App\Controller;


use App\Classes\DownloadFile\DownloadImg;
use App\Classes\Router;
use App\Classes\Session;
use App\Classes\View;
use App\Model\ExperienceManager;

class ExperienceController
{

    public function showDetailExperience()
    {
        if (isset($_GET['experienceId'])) if (!empty($_GET['experienceId'])) {
            $experienceManager = new ExperienceManager();
            $experienceId = $_GET['experienceId'];
            $experienceView = new View('/frontViews/experienceDetails');
            $experiences = $experienceManager->findExperienceById($experienceId);
            $experienceView->renderView(['experiences' => $experiences]);
        }
    }

    public function editDetailExperience()
    {
        $session = new Session();
        $session->checkAdminAutorisation();
        if (isset($_GET['experienceId'])) if (!empty($_GET['experienceId'])) {
            $experienceManager = new ExperienceManager();
            $imgManager = new DownloadImg();
            $detailView = new View('/backViews/editExperiencePage');

            $experienceId = $_GET['experienceId'];
            $experience = $experienceManager->findExperienceById($experienceId);

            $curentImage = $imgManager->imgFromForm($_FILES, $experience['0']->getImg());


            $detailView->renderView(['exp' => $experience]);
            if ($_POST) {
                $experienceManager = new ExperienceManager();
                $experienceManager->editExperience($_GET['experienceId'], $_POST, $curentImage);

            }

        } else return false;

    }

    public function deleteExperience()
    {
        $session = new Session();
        $session->checkAdminAutorisation();
        if (isset($_GET['experienceId'])) if (!empty($_GET['experienceId'])) {
            $experienceManager = new ExperienceManager();
            $experienceId = $_GET['experienceId'];
            $experienceManager->deleteExperience($experienceId);
            Router::redirectToBackOff();
        }


    }

    public function addExperience()
    {
        $session = new Session();
        $user_id = $session->checkAdminAutorisation();
        $experienceView = new View('/backViews/addExperiencePage');


        if ($_POST != null) {
            $imgManager = new DownloadImg();
            $user = ['user_id' => (int)$user_id->getId(), 'img' => $_FILES['img']['name']];
            $data = array_merge($user, $_POST);
            $dataExperience[] = $data;

            $experienceManager = new ExperienceManager();
            $imgManager->imgFromForm($_FILES);

            $experienceManager->addExperiences($dataExperience);
            Router::redirectToBackOff();
        }

        $experienceView->renderView();


    }
}