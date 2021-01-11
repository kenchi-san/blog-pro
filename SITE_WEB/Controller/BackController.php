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

        $experiences = $experienceManager->findAllExperiences();

        $dashboardView = new View('/backViews/dashBoard');
        $dashboardView->renderView(["experiences" => $experiences]);


    }
    public function showCommentsList(){
        $this->session->checkAdminAutorisation();
        $commentManager = new  CommentManager();
        $comments = $commentManager->findAllComments();

        $dashboardView = new View('/backViews/listOfComments');
        $dashboardView->renderView(['comments' => $comments]);

    }

    public function showPostsList(){
        $this->session->checkAdminAutorisation();
        $postManager = new PostManager();
        $posts =$postManager->findAll();
        $dashboardView = new View('/backViews/listOfPosts');
        $dashboardView->renderView([ "posts" => $posts]);
    }
}