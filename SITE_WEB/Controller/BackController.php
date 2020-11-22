<?php


namespace App\Controller;


use App\Classes\Session;
use App\Classes\View;
use App\Model\CommentManager;
use App\Model\ExperienceManager;
use App\Model\PostManager;

class BackController
{


    public function dashboardAdmin()
    {
        $session = new Session();
        $session->checkAdminAutorisation();
        $experienceManager = new ExperienceManager();
        $postManager = new PostManager();
        $commentManager = new  CommentManager();
        $experiences = $experienceManager->findExperiences();
        $posts = $postManager->findAll();
        $comments = $commentManager->findAllComments();


        $dashboardView = new View('/backViews/dashBoard');
        $dashboardView->renderView(["experiences" => $experiences, "posts" => $posts, 'comments' => $comments]);


    }

}