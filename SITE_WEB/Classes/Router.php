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
        '404.html' => ['class' => HomeController::class, 'method' => 'error404'],
        'test.html' => ['class' => HomeController::class, 'method' => 'test'],

        'loginPage.html' => ['class' => UserController::class, 'method' => 'login'],
        'logout' => ['class' => UserController::class, 'method' => 'logout'],
        'resetPassword.html' => ['class' => UserController::class, 'method' => 'newPassWordRequest'],
        'newPasswordPage.html' => ['class' => UserController::class, 'method' => 'newPassWord'],
        'registrer.html' => ['class' => UserController::class, 'method' => 'addUser'],

        'blogPage.html' => ['class' => BlogController::class, 'method' => 'showBlog'],
        'detail_post.html' => ['class' => BlogController::class, 'method' => 'showDetailBlog'],
        'deletePost'=>['class' => BlogController::class, 'method' => 'deletePost'],
        'addPost.html'=>['class' => BlogController::class, 'method' => 'addPost'],
        'editPost.html'=>['class' => BlogController::class, 'method' => 'editPost'],
        'addComment.html'=>['class'=>BlogController::class,'method'=>'addComment'],
        'editComment.html'=>['class'=>BlogController::class,'method'=>'editComment'],
        'deleteComment'=>['class'=>BlogController::class,'method'=>'deleteComment'],
        'switchCommentStatus.html'=>['class'=>BlogController::class,'method'=>'switchStatusOfComment'],


        'showExperience.html' => ['class' => ExperienceController::class, 'method' => 'showDetailExperience'],
        'crudExperience.html' => ['class' => ExperienceController::class, 'method' => 'showDetailExperience'],
        'deleteExperience' => ['class' => ExperienceController::class, 'method' => 'deleteExperience'],
        'addExperience.html' => ['class' => ExperienceController::class, 'method' => 'addExperience'],
        'editExperience.html' => ['class' => ExperienceController::class, 'method' => 'editDetailExperience'],

        'backOffice.html' => ['class' => BackController::class, 'method' => 'dashboardAdmin'],


    ];

    /**
     * Router constructor.
     * @param $request
     * @param $role
     */
    public function __construct($request)
    {

        $this->request = $request;

    }


    public function renderController()
    {
        try {
            if (key_exists($this->request, $this->route)) {
                $classes = $this->route[$this->request]['class'];
                $method = $this->route[$this->request]['method'];
                $myCurrentController = new $classes;
                $myCurrentController->$method();
            } else {
                throw new NotfoundPageException();

            }
        } catch (ForbiddenAccessException $e) {
            self::redirectToRoute();
        } catch (NeedAuthenticationException $e) {
            self::redirectToLoginPage();
        } catch (NotfoundPageException $e) {
            self::redirectTo404Page($e->getMessage());
        }

    }

    static function redirectToRoute()
    {

        header('Location:' . HOST . 'homePage.html');
        exit();
    }

    static function redirectToLoginPage()
    {
        header('Location:' . HOST . 'loginPage.html');
        exit();

    }

    static function redirectToBackOff()
    {
        header('Location:' . HOST . 'backOffice.html');
        exit();

    }

    static function redirectTo404Page($message = null)
    {
        $View = new View('/frontViews/erreur404');
        $View->renderView(['message' => $message]);
    }
}