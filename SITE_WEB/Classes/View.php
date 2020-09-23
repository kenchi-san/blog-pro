<?php

namespace App\Classes;

class View
{
    private $template;

    public function __construct($template = null)
    {
        $this->template = $template;
    }

    /**
     * @param null $params
     */
    public function renderView($params = null)
    {
        $session = new Session();

        if (empty($params)){

            $template = $this->template;
            ob_start();
            include_once(VIEW . $template . '.php');
            $contentPage = ob_get_clean();
            include_once(VIEW . 'gabarit.php');
        }else{
            extract($params);
            $template = $this->template;
            ob_start();
            include_once(VIEW . $template . '.php');
            $contentPage = ob_get_clean();
            include_once(VIEW . 'gabarit.php');
        }

    }

}