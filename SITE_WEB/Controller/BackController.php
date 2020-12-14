<?php


namespace App\Controller;


use App\Classes\View;
use App\Model\CommentManager;
use App\Model\ExperienceManager;
use App\Model\PostManager;

class BackController extends AbstractController
{


    public function dashboardAdmin()
    {
        $this->session->checkAdminAutorisation();
        $experienceManager = new ExperienceManager();
        $postManager = new PostManager();
        $commentManager = new  CommentManager();


        $experiences = $experienceManager->findAllExperiences();
        $posts =$postManager->findAll();
        $comments = $commentManager->findAllComments();


        $dashboardView = new View('/backViews/dashBoard');
        $dashboardView->renderView(["experiences" => $experiences, "posts" => $posts, 'comments' => $comments]);


    }

}