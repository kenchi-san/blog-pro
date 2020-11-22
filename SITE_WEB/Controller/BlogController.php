<?php


namespace App\Controller;


use App\Classes\Router;
use App\Classes\Session;
use App\Classes\View;
use App\Model\CommentManager;
use App\Model\PostManager;

class BlogController
{


    public function showBlog()
    {
        $postManager = new PostManager();
        $posts = $postManager->findAll();

        $blogView = new View('/frontViews/blogPage');
        $blogView->renderView(array('posts' => $posts));
    }

    public function showDetailBlog()
    {

        if (!empty($_GET['postId'])) if (isset($_GET['postId'])) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $postId = $_GET['postId'];
            $posts = $postManager->findById($postId);

            $comments = $commentManager->findIdCommentFromOnePost($postId);

            $detailView = new View('/frontViews/postsDetails');
            $detailView->renderView(['posts' => $posts, 'comments' => $comments]);
            $this->addComment($_POST, $postId);

        } else return false;


    }

    public function addPost()
    {
        $session = new Session();
        $user_id = $session->checkAdminAutorisation();
        $postManager = new PostManager();
        $postView = new View('/backViews/addPost');


        if ($_POST) {
            $user = ['user_id' => (int)$user_id->getId()];
            $data = array_merge($user, $_POST);
            $dataPost[] = $data;

            $postManager->addPost($dataPost);

            Router::redirectToBackOff();
        }

        $postView->renderView();
    }

    public function deletePost()
    {
        $session = new Session();
        $session->checkAdminAutorisation();
        $postManager = new PostManager();

        if (isset($_GET['postId'])) if (!empty($_GET['postId'])) {
            $postId = $_GET['postId'];
            $postManager->deletePost($postId);
            Router::redirectToBackOff();
        }
    }

    public function editPost()
    {
        $session = new Session();
        $session->checkAdminAutorisation();

        if (isset($_GET['postId'])) if (!empty($_GET['postId'])) {
            $postView = new View('/backViews/editPost');
            $postManager = new PostManager();

            $postId = $_GET['postId'];
            $posts = $postManager->findById($postId);

            $postView->renderView(['posts' => $posts]);
            if ($_POST) {

                $postManager->updatePost($_POST, $postId);

            } else return false;


        }
    }

    public function addComment($comment, $postId)
    {
        if ($_POST) {
            $session = new Session();
            $commentManager = new CommentManager();
            $user = $session->checkAuth();
            $userId = $user->getId();
            $dataComment = array_merge(['userId' => $userId, 'postId' => $postId], $comment);
            $commentManager->AddCommentFromOnePostId($dataComment);


        }
    }

    public function editComment()
    {

    }

    public function switchStatusOfComment()
    {

        $session = new Session();
        $session->checkAdminAutorisation();
        $commentId = $_GET['id'] ?? false;
        $commentStatus = $_POST['commentStatus'] ?? false;
        if ($commentId && $commentStatus) {
            $commentManager = new CommentManager();
            $commentManager->switchStatus($commentId, $commentStatus);
            Router::redirectToBackOff();
        }
    }

    public function deleteComment()
    {
        $session = new Session();
        $session->checkAdminAutorisation();
        $commentManager = new CommentManager();
        if (isset($_GET['commentId'])) if (!empty($_GET['commentId'])) {
            $commentId = $_GET['commentId'];
            $commentManager->deleteComment($commentId);
            Router::redirectToBackOff();
        }
    }
}