<?php

namespace App\Classes;

use App\Controller\BackController;
use App\Controller\BlogController;
use App\Controller\ExperienceController;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Exception\ForbiddenAccessException;
use App\Exception\NeedAuthenticationException;
use App\Exception\NotfoundPageException;


class Router
{
    private $request;
    private $route = [
        'homePage.html' => ['class' => HomeController::class, 'method' => 'showHome'],
        'contact.html' => ['class' => HomeController::class, 'method' => 'showContact'],
        'sendMail.html' => ['class' => HomeController::class, 'method' => 'sendTheContactMail'],

        'loginPage.html' => ['class' => UserController::class, 'method' => 'login'],
        'logout' => ['class' => UserController::class, 'method' => 'logout'],
        'resetPassword.html' => ['class' => UserController::class, 'method' => 'newPassWordRequest'],
        'newPasswordPage.html' => ['class' => UserController::class, 'method' => 'newPassWord'],
        'registrer.html' => ['class' => UserController::class, 'method' => 'addUser'],
        'listOfUsers.html' => ['class' => UserController::class, 'method' => 'memberOfSiteWeb'],

        'blogPage.html' => ['class' => BlogController::class, 'method' => 'showBlog'],
        'detail_post.html' => ['class' => BlogController::class, 'method' => 'showDetailBlog'],
        'detail_comment.html' => ['class' => BlogController::class, 'method' => 'showDetailComment'],
        'deletePost' => ['class' => BlogController::class, 'method' => 'deletePost'],
        'addPost.html' => ['class' => BlogController::class, 'method' => 'addPost'],
        'editPost.html' => ['class' => BlogController::class, 'method' => 'editPost'],
        'addComment.html' => ['class' => BlogController::class, 'method' => 'addComment'],
        'editComment.html' => ['class' => BlogController::class, 'method' => 'editComment'],
        'deleteComment' => ['class' => BlogController::class, 'method' => 'deleteComment'],
        'switchCommentStatus.html' => ['class' => BlogController::class, 'method' => 'switchStatusOfComment'],
        'switchAuthorOfPost.html' => ['class' => BlogController::class, 'method' => 'switchAuthorOfPost'],

        'showExperience.html' => ['class' => ExperienceController::class, 'method' => 'showDetailExperience'],
        'crudExperience.html' => ['class' => ExperienceController::class, 'method' => 'showDetailExperience'],
        'deleteExperience' => ['class' => ExperienceController::class, 'method' => 'deleteExperience'],
        'addExperience.html' => ['class' => ExperienceController::class, 'method' => 'addExperience'],
        'editExperience.html' => ['class' => ExperienceController::class, 'method' => 'editDetailExperience'],

        'backOffice.html' => ['class' => BackController::class, 'method' => 'dashboardAdmin'],


    ];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function renderController()
    {
        $action = $this->request->get('action', 'homePage.html');
        try {
            if (!key_exists($action, $this->route)) {
                throw new NotfoundPageException();
            }

            $classes = $this->route[$action]['class'];
            $method = $this->route[$action]['method'];
            $myCurrentController = new $classes($this->request);
            $myCurrentController->$method();

        } catch (ForbiddenAccessException $e) {
            self::redirectToErrorPage($e->getMessage());
        } catch (NeedAuthenticationException $e) {
            self::redirectToLoginPage();
        } catch (NotfoundPageException $e) {
            self::redirectTo404Page($e->getMessage());
        }

    }

    static function redirectToLoginPage()
    {

        $View = new View('/frontViews/loginPage');
        $View->renderView();
    }


    static function redirectTo404Page($message = null)
    {
        $View = new View('/frontViews/erreur404');
        $View->renderView(['message' => $message]);
    }

    static function redirectToErrorPage($message = null)
    {
        $View = new View('/frontViews/erreurPage');
        $View->renderView(['message' => $message]);
    }
}