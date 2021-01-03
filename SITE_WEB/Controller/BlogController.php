<?php


namespace App\Controller;


use App\Classes\Session;
use App\Classes\View;
use App\Exception\NotfoundPageException;
use App\Model\CommentManager;
use App\Model\PostManager;
use Model\UserManager;

class BlogController extends AbstractController
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

        if (!empty($this->request->get('postId'))) {
            $postManager = new PostManager();
            $commentManager = new CommentManager();
            $postId = $this->request->get('postId');
            $post = $postManager->findById($postId);
            $comments = $commentManager->findIdCommentFromOnePost($postId);
            $detailView = new View('/frontViews/postsDetails');
            $detailView->renderView(['post' => $post, 'comments' => $comments]);
            $this->addComment($this->request->post('content'), $postId);

        } else {
            throw new NotfoundPageException();
        }


    }

    public function addPost()
    {
        $session = new Session();
        $user_id = $session->checkAdminAutorisation();
        $postManager = new PostManager();
        $postView = new View('/backViews/addPost');


        if ($this->request->isPost()) {
            $user = $user_id->getId();
            $title = $this->request->post('title');
            $resume = $this->request->post('resume');
            $content = $this->request->post('content');

            $postManager->addPost($user, $title, $resume, $content);

            $this->redirectTo('backOffice.html');
        }

        $postView->renderView();
    }

    public function deletePost()
    {
        $this->session->checkAdminAutorisation();
        $postManager = new PostManager();

        if (!empty($this->request->get('postId'))) {
            $postId = $this->request->get('postId');
            $postManager->deletePost($postId);
            $this->redirectTo('backOffice.html');
        }
    }

    public function editPost()
    {
        $this->session->checkAdminAutorisation();

        $postId = $this->request->get('postId');
        if ($postId === null) {
            throw new NotfoundPageException();
        }
        $postManager = new PostManager();
        $post = $postManager->findById($postId);
        if ($post === null) {
            throw new NotfoundPageException();
        }


        $userManager = new UserManager();
        $listUsers = $userManager->findAllUser();

        if (!empty($this->request->post('title') && $this->request->post('resume') && $this->request->post('content'))) {
            $postManager->updatePost(
               $postId,
                $this->request->post('title'),
                $this->request->post('resume', 'Mon résumé'),
                $this->request->post('content'),
                $this->request->post('authorId'));

            $this->redirectTo('editPost.html?postId='.$postId);
        }

        $postView = new View('/backViews/editPost');
        $postView->renderView(['post' => $post, 'listUsers' => $listUsers]);
    }

    public function showDetailComment()
    {
        $this->session->checkAdminAutorisation();
        $commentId = $this->request->get('commentId');
        if ($commentId === null) {
            throw new NotfoundPageException();
        }
        $commentManager = new CommentManager();
        $comment = $commentManager->findById($commentId);
        if ($comment === null) {
            throw new NotfoundPageException();
        }
        $view = new View('/backViews/commentDetail');
        $view->renderView(['comment' => $comment]);
    }

    public function addComment($content, $postId)
    {

        if ($this->request->post('content') && $this->request->get('postId')) {

            $user = $this->session->checkAuth();
            $commentManager = new CommentManager();
           $userId = $user->getId();
            $commentManager->addCommentFromOnePostId($userId, $this->request->get('postId'), $this->request->post('content'));


        }else{
            throw new NotfoundPageException();
        }
    }


    public function switchStatusOfComment()
    {

        $this->session->checkAdminAutorisation();

        $commentId = $this->request->get('id') ?? false;
        $commentStatus = $this->request->post('commentStatus') ?? false;
        if ($commentId && $commentStatus) {

            $commentManager = new CommentManager();

            $commentManager->switchStatus($commentId, $commentStatus);
            $this->redirectTo('backOffice.html');
        }
    }

    public function deleteComment()
    {

        $this->session->checkAdminAutorisation();
        $commentManager = new CommentManager();
        if (!empty($this->request->get('commentId'))) {
            $commentId = $this->request->get('commentId');
            $commentManager->deleteComment($commentId);
            $this->redirectTo('backOffice.html');
        }
    }

}