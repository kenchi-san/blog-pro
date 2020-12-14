<?php


namespace App\Controller;


use App\Classes\DownloadFile\DownloadImg;
use App\Classes\View;
use App\Exception\NotfoundPageException;
use App\Model\ExperienceManager;

class ExperienceController extends AbstractController
{
    public function showDetailExperience()
    {
        if (!empty($this->request->get('experienceId'))) {
            $experienceManager = new ExperienceManager();
            $experienceId = $this->request->get('experienceId');
            $experienceView = new View('/frontViews/experienceDetails');
            $experiences = $experienceManager->findExperienceById($experienceId);
            $experienceView->renderView(['experiences' => $experiences]);
        }
        throw new NotfoundPageException();
    }

    public function editDetailExperience()
    {
        $this->session->checkAdminAutorisation();
        if (empty($this->request->get('experienceId'))) {
            throw new NotfoundPageException();
        }

        $experienceManager = new ExperienceManager();
        $imgManager = new DownloadImg();
        $detailView = new View('/backViews/editExperiencePage');

        $experienceId = $this->request->get('experienceId');
        $experience = $experienceManager->findExperienceById($experienceId);

        if (!empty($this->request->post('title') || $this->request->post('description') || $this->request->post('link'))) {
            $experienceManager = new ExperienceManager();
            $curentImage = $imgManager->imgFromForm($this->request->file('name'), $this->request->file('tmp_name'), $experience['0']->getImg());
            $experienceManager->editExperience($this->request->get('experienceId'), $this->request->post('title'), $this->request->post('description'), $this->request->post('link'), $curentImage);
            $this->redirectTo('editExperience.html?experienceId=' . $experienceId);

        }
        $detailView->renderView(['exp' => $experience]);


    }


    public function deleteExperience()
    {

        $this->session->checkAdminAutorisation();
        if (!empty($this->request->get('experienceId'))) {
            $experienceManager = new ExperienceManager();
            $experienceId = $this->request->get('experienceId');
            $experienceManager->deleteExperience($experienceId);
            $this->redirectTo('backOffice.html');
        }


    }

    public function addExperience()
    {

        $user_id = $this->session->checkAdminAutorisation();
        $experienceView = new View('/backViews/addExperiencePage');


        if ($_POST != null) {
            $imgManager = new DownloadImg();

            $user = $user_id->getId();
            $imgName = $this->request->file('name');
            $tmp_name = $this->request->file('tmp_name');
            $title = $this->request->post('title');
            $description = $this->request->post('description');
            $link = $this->request->post('link');
            $experienceManager = new ExperienceManager();
            $lastImgName = $imgManager->imgFromForm($imgName, $tmp_name);
            $experienceManager->addExperience($user, $lastImgName, $title, $description, $link);
            $this->redirectTo('backOffice.html');
        }

        $experienceView->renderView();


    }
}